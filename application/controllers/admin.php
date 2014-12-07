<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {
            
    function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('security');
        $this->load->library('tank_auth');
        $this->lang->load('tank_auth');
        $this->form_validation->set_error_delimiters('<li>', '</li>');
    }
    
    /**
     * Index Page for this controller.
     */
    public function index()
    {
        if ($this->tank_auth->is_logged_in()) {
            $this->load->model('Graduates');
            $profile = $this->Graduates->get_where(array('user_id' => $this->tank_auth->get_user_id()));
            if(count($profile) > 0)
            {
                redirect('/user/profile/');
            } else {
                redirect('/user/update/');
            }
        } elseif ($this->tank_auth->is_logged_in(FALSE)) {
            redirect('/auth/send_again/');
        } else {
            redirect('/auth/login/');
        }
    }
    
    public function graduate_list($year = 'All', $college = 'All', $department = 'All', $limit = 30, $offset = 0)
    {
        if ($this->tank_auth->is_logged_in()) {
            $this->load->model('Graduates');
            $this->load->library('table');
            $tmpl = array ( 'table_open'  => '<table class="table">' );
            $this->table->set_template($tmpl); 
            $this->table->set_heading(array('Full Name', 'College', 'Department', 'Civil Status', 'Birth Date', 'Sex', 'Region', 'Location'));
            $year_graduated = $this->input->post('year_graduated');
            $college_post = $this->input->post('college');
            $department_post = $this->input->post('department');
            if($year_graduated || $college_post || $department_post){
                redirect('/admin/graduate_list/'
                        .($year_graduated ? $year_graduated : $year).'/'
                        .($college_post ? $college_post : $college).'/'
                        .($department_post ? $department_post : $department));
            }
            
            if($year == 'All' && $college == 'All' && $department == 'All'){
                $graduates = $this->Graduates->get($limit, $offset + 1);
                $total_graduates = count($this->Graduates->get());
            } else {
                $where = array();
                if($year != 'All'){
                    $where['YearGraduated'] = $year;
                }
                if($college != 'All'){
                    $where['College'] = $college;
                }
                if($department != 'All'){
                    $where['Department'] = $department;
                }
                $graduates = $this->Graduates->get_where($where, $limit, $offset + 1);
                $total_graduates = count($this->Graduates->get_where($where));
            }
            
            $this->load->library('pagination');
            $config['base_url'] = base_url() . 'index.php/admin/graduate_list/' . $year . '/' . $college . '/' . $department . '/' . $limit . '/';
            $config['uri_segment'] = 7;
            $config['total_rows'] = $total_graduates;
            $config['per_page'] = $limit;
            $config['full_tag_open'] = '<div class="navigation"><ul class="pagination pagination-sm">';
            $config['full_tag_close'] = '</ul></div>';
            $config['next_link'] = 'Next';
            $config['next_tag_open'] = '<li class="pagination-next">';
            $config['next_tag_close'] = '</li>';
            $config['prev_link'] = 'Previous';
            $config['prev_tag_open'] = '<li class="pagination-previous">';
            $config['prev_tag_close'] = '</li>';
            $config['first_link'] = '&#171;';
            $config['first_tag_open'] = '<li class="pagination-previous">';;
            $config['first_tag_close'] = '</li>';
            $config['last_link'] = '&#187;';
            $config['last_tag_open'] = '<li class="pagination-next">';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $this->pagination->initialize($config);
            $pagination = $this->pagination->create_links();

            if(!empty($graduates)) {
                foreach ($graduates as $graduate){
                    $sex = '';
                    if($graduate->Sex == 1){
                        $sex = 'Male';
                    } elseif ($graduate->Sex == 0 && !is_null($graduate->Sex)){
                        $sex = 'Female';
                    }
                    
                    $location = '';
                    if($graduate->LocationOfResidence == 1){
                        $location = 'City';
                    } elseif ($graduate->LocationOfResidence == 0 && !is_null($graduate->LocationOfResidence)){
                        $location = 'Municipality';
                    }
                    $this->table->add_row(array($graduate->LastName . ', ' . $graduate->FirstName . ' ' . $graduate->MiddleName, $graduate->College, $graduate->Department, $graduate->CivilStatus, $graduate->BirthDate, $sex, $graduate->RegionOfOrigin, $location));
                }
            }
            
            $options = array(
                'All'   => 'All',
                /*'2002'  => '2002',
                '2003'  => '2003',
                '2004'  => '2004',
                '2005'  => '2005',
                '2006'  => '2006',
                '2007'  => '2007',*/
                '2008'  => '2008',
                '2009'  => '2009',
                '2010'  => '2010',
                '2011'  => '2011',
                '2012'  => '2012',
                '2013'  => '2013'
            );

            $colleges = array(
                'All'   => 'All'
            );
            $departments = array(
                'All'   => 'All'
            );
            $get_colleges = $this->db->distinct()->group_by('College')->get('graduates');
            if($get_colleges->num_rows() > 0){
                foreach ($get_colleges->result() as $row){
                    if(! empty($row->College)) $colleges[$row->College] = $row->College;
                }
            }
            $get_departments = $this->db->distinct()->group_by('Department')->get_where('graduates', array( 'College' => $college ));
            if($get_departments->num_rows() > 0){
                foreach ($get_departments->result() as $row){
                    if(! empty($row->Department)) $departments[$row->Department] = $row->Department;
                }
            }

            $year_dropdown = form_dropdown('year_graduated', $options, $year, 'class="form-control" id="year_graduated"');
            $college_dropdown = form_dropdown('college', $colleges, $college, 'class="form-control" id="college"');
            $department_dropdown = form_dropdown('department', $departments, $department, 'class="form-control" id="department"');
            
            $data['graduates'] = $this->table->generate();
            $data['pagination'] = $pagination;
            $data['year_dropdown'] = $year_dropdown;
            $data['college_dropdown'] = $college_dropdown;
            $data['department_dropdown'] = $department_dropdown;
            $module['content'] = $this->load->view('template/graduates', $data, TRUE);
            $module['title'] = 'List of Graduates';
            $module['menu'] = $this->load->view('menu/graduate_profile', NULL, TRUE);
            $this->load->view('template/base-template', $module);
        } elseif ($this->tank_auth->is_logged_in(FALSE)) {
            redirect('/auth/send_again/');
        } else {
            redirect('/auth/login/');
        }
    }

    public function summary()
    {
        if ($this->tank_auth->is_logged_in()) {
            $this->load->model('Graduates');
            $this->load->library('table');
            $tmpl = array ( 'table_open'  => '<table class="table">' );
            $this->table->set_template($tmpl); 
           
            $summarize_table = $this->input->post('table_dropdown');
            $to_summarize = $summarize_table ? $summarize_table : '1.1.';
            $where = array(
                'user_id IS NOT NULL' => NULL,
                'user_id <>' => 'NULL',
                'user_id <>' => ''
            );
            $total_graduates = count($this->Graduates->get());
            $graduates = $this->Graduates->get_where($where);
            switch ($to_summarize) {
            	case '1.1.':
                    $this->table->set_heading(array('Variable', 'Frequency', 'Percent'));
                    $results = $this->Graduates->graduates_summary('CivilStatus');
                    $this->table->add_row(array('<b>Civil Status</b>', '', ''));
                    foreach ($results as $result){
                        $status = '';
                        if ($result->CivilStatus == '' || is_null($result->CivilStatus)){
                            $status = 'Not Set';
                            if($result->total == 0){
                                continue;
                            }
                        } elseif ($result->CivilStatus == 'NULL'){
                            $status = 'NULL';
                            if($result->total == 0){
                                continue;
                            }
                        } else {
                            $status = $result->CivilStatus;
                        }
                        $percentage = ($result->total / count($graduates)) * 100;
                        $this->table->add_row(array($status, $result->total, round($percentage, 2).'%'));
                    }

                    $results = $this->Graduates->graduates_summary('Sex');
                    $this->table->add_row(array('<b>Sex</b>', '', ''));
                    foreach ($results as $result){
                        $sex = '';
                        if($result->Sex == 1){
                            $sex = 'Male';
                        } elseif ($result->Sex == 0 && !is_null($result->Sex)){
                            $sex = 'Female';
                        }

                        if ($result->Sex == '' || is_null($result->Sex)){
                            $sex = 'Not Set';
                            if($result->total == 0){
                                continue;
                            }
                        } elseif ($result->Sex == 'NULL'){
                            $sex = 'NULL';
                            if($result->total == 0){
                                continue;
                            }
                        }

                        $percentage = ($result->total / count($graduates)) * 100;
                        $this->table->add_row(array($sex, $result->total, round($percentage, 2).'%'));
                    }

                    $results = $this->Graduates->graduates_summary('BirthDate');
                    $this->table->add_row(array('<b>Age</b>', '', ''));
                    foreach ($results as $result){
                        $Age = '';
                        if ($result->age == '' || is_null($result->age)){
                            $Age = 'Not Set';
                            if($result->total == 0){
                                continue;
                            }
                        } elseif ($result->age == 'NULL'){
                            $Age = 'NULL';
                            if($result->total == 0){
                                continue;
                            }
                        } elseif($result->BirthDate == '0000-00-00'){
                            $Age = 'Invalid';
                        } else {
                            $Age = $result->age;
                        }

                        $percentage = ($result->total / count($graduates)) * 100;
                        $this->table->add_row(array($Age, $result->total, round($percentage, 2).'%'));
                    }

                    $results = $this->Graduates->graduates_summary('RegionOfOrigin');
                    $this->table->add_row(array('<b>Region Of Origin</b>', '', ''));
                    foreach ($results as $result){
                        $roo = '';
                        if ($result->RegionOfOrigin == '' || is_null($result->RegionOfOrigin)){
                            $roo = 'Not Set';
                            if($result->total == 0){
                                continue;
                            }
                        }  elseif ($result->RegionOfOrigin == 'NULL'){
                            $roo = 'NULL';
                            if($result->total == 0){
                                continue;
                            }
                        } else {
                            $roo = $result->RegionOfOrigin;
                        }
                        $percentage = ($result->total / count($graduates)) * 100;
                        $this->table->add_row(array($roo, $result->total, round($percentage, 2).'%'));
                    }

                    $results = $this->Graduates->graduates_summary('Province');
                    $this->table->add_row(array('<b>Province</b>', '', ''));
                    foreach ($results as $result){
                        $Province = '';
                        if ($result->Province == '' || is_null($result->Province)){
                            $Province = 'Not Set';
                            if($result->total == 0){
                                continue;
                            }
                        } elseif ($result->Province == 'NULL'){
                            $Province = 'NULL';
                            if($result->total == 0){
                                continue;
                            }
                        } else {
                            $Province = $result->Province;
                        }

                        $percentage = ($result->total / count($graduates)) * 100;
                        $this->table->add_row(array($Province, $result->total, round($percentage, 2).'%'));
                    }

                    $results = $this->Graduates->graduates_summary('LocationOfResidence');
                    $this->table->add_row(array('<b>Location of Residence</b>', '', ''));
                    foreach ($results as $result){
                        $location = '';
                        if($result->LocationOfResidence == 1){
                            $location = 'City';
                        } elseif ($result->LocationOfResidence == 0 && !is_null($result->LocationOfResidence)){
                            $location = 'Municipality';
                        }

                        if ($result->LocationOfResidence == '' || is_null($result->LocationOfResidence)){
                            $location = 'Not Set';
                            if($result->total == 0){
                                continue;
                            }
                        } elseif ($result->LocationOfResidence == 'NULL'){
                            $location = 'NULL';
                            if($result->total == 0){
                                continue;
                            }
                        }
                        
                        $percentage = ($result->total / count($graduates)) * 100;
                        $this->table->add_row(array($location, $result->total, round($percentage, 2).'%'));
                    }
            		break;
                case '1.2.':
                	break;
                case '1.3.':
                	break;
                case '1.4.':
                	break;
                case '1.5.':
                	break;
                case '1.6.a.':
                	break;
                case '1.6.b.':
                	break;
                case '2.1.':
                	break;
                case '2.2.':
                	break;
                case '2.3.':
                	break;
                case '2.4.':
                	break;
                case '2.5.':
                	break;
                case '2.6.':
                	break;
                case '2.7.':
                	break;
                case '2.8.':
                	break;
                case '2.9.':
                	break;
                case '2.10.':
                	break;
                case '3.1.':
                	break;
                case '3.2.':
                	break;
                case '3.3.':
                	break;
            }
            
            $options = array(
                '1.1.' => 'Demographic profile of the respondents.',
                /*'1.2.' => 'Educational background of the respondents.',
                '1.3.' => 'Respondents\' reasons for taking the undergraduate courses or degrees.',
                '1.4.' => 'Respondents\' reasons for taking the graduate courses or degrees.',
                '1.5.' => 'Trainings attended after college by the respondents',
                '1.6.a.' => 'Advance studies attended after college by the respondents',
                '1.6.b.' => 'Respondents\' reasons of pursuing advance studies.',
                '2.1.' => 'Respondents\' employment status.',
                '2.2.' => 'Respondents\' reasons they are not employed.',
                '2.3.' => 'Respondents\' present employment status.',
                '2.4.' => 'Respondents\' present occupation.',
                '2.5.' => 'Major line of business of the company that the respondents are presently employed.',
                '2.6.' => 'Respondents\' reasons for staying on the job.',
                '2.7.' => 'Respondents\' first job experience.',
                '2.8.' => 'Respondents\' job level position of the first job.',
                '2.9.' => 'Respondents\' job level position of the current or present job.',
                '2.10.' => 'Respondents\' initial gross monthly earning in their first job after college.',
                '3.1.' => 'Relevance of the curriculum in college.',
                '3.2.' => 'Competencies learned in college found very useful in the respondents\' first job.',
                '3.3.' => 'Respondents\' suggestions to further improve their course curriculum.'*/
            );

            $table_dropdown = form_dropdown('table_dropdown', $options, $to_summarize, 'class="form-control" id="table_dropdown"');
            
            $data['table_no'] = $to_summarize;
            $data['table_dropdown'] = $table_dropdown;
            $data['summary'] = $this->table->generate();

            $this->table->set_heading(array('Total Graduates', 'Registered', 'Percent'));
            $percentage = (count($graduates) / $total_graduates) * 100;
            $this->table->add_row(array($total_graduates, count($graduates), round($percentage, 2).'%'));
            $data['total'] = $this->table->generate();
            $module['content'] = $this->load->view('template/summary', $data, TRUE);
            $module['title'] = 'Data Summary';
            $module['menu'] = $this->load->view('menu/graduate_profile', NULL, TRUE);
            $this->load->view('template/base-template', $module);
        } elseif ($this->tank_auth->is_logged_in(FALSE)) {
            redirect('/auth/send_again/');
        } else {
            redirect('/auth/login/');
        }
    }
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */