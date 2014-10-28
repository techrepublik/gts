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
            $this->table->set_heading(array('Last Name', 'First Name', 'Middle Name', 'Ext.', 'New Last Name', 'Civil Status', 'Birth Date', 'Sex', 'Region', 'Location'));
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
                $total_graduates = count($this->Graduates->get_where(array('YearGraduated' => $year)));
            }
            
            $this->load->library('pagination');
            $config['base_url'] = base_url() . 'index.php/admin/graduate_list/' . $year . '/' . $college . '/' . $department . '/' . $limit . '/';
            $config['uri_segment'] = 5;
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
                    } elseif ($graduate->Sex == 0 && !is_null($graduate->Sex)){
                        $location = 'Municipality';
                    }
                    $this->table->add_row(array($graduate->LastName, $graduate->FirstName, $graduate->MiddleName, $graduate->ExtensionName, $graduate->LastName01, $graduate->CivilStatus, $graduate->BirthDate, $sex, $graduate->RegionOfOrigin, $location));
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

            $year_dropdown = form_dropdown('year_graduated', $options, $year, 'class="form-control"');
            $college_dropdown = form_dropdown('college', array(), NULL, 'class="form-control" disabled');
            $department_dropdown = form_dropdown('department', array(), NULL, 'class="form-control" disabled');
            
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
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */