<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Request extends CI_Controller {
            
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
                redirect('/user/new_profile/');
            }
        } elseif ($this->tank_auth->is_logged_in(FALSE)) {
            redirect('/auth/send_again/');
        } else {
            redirect('/auth/login/');
        }
    }
    
     /**
     * Request for educational attainment.
     */
    public function edu($AttainmentId = 0)
    {
        if ($this->tank_auth->is_logged_in()) {
            if($AttainmentId > 0)
            {
                $this->load->model('Educational_attainment');
                $edu = new Educational_attainment();
                $edu->load($AttainmentId);
                $this->output->set_header('Content-type:application/json');
                $this->output->set_output(json_encode($edu));
            }
        } elseif ($this->tank_auth->is_logged_in(FALSE)) {
            redirect('/auth/send_again/');
        } elseif( ! $this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        }
    }
    
    /**
     * Request for professional examination.
     */
    public function exam($ExaminationId = 0)
    {
        if ($this->tank_auth->is_logged_in()) {
            if($ExaminationId > 0)
            {
                $this->load->model('Examinations');
                $exam = new Examinations();
                $exam->load($ExaminationId);
                $this->output->set_header('Content-type:application/json');
                $this->output->set_output(json_encode($exam));
            }
        } elseif ($this->tank_auth->is_logged_in(FALSE)) {
            redirect('/auth/send_again/');
        } elseif( ! $this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        }
    }
    
    public function training($TrainingId = 0)
    {
        if ($this->tank_auth->is_logged_in()) {
            if($TrainingId > 0)
            {
                $this->load->model('Trainings');
                $training = new Trainings();
                $training->load($TrainingId);
                $this->output->set_header('Content-type:application/json');
                $this->output->set_output(json_encode($training));
            }
        } elseif ($this->tank_auth->is_logged_in(FALSE)) {
            redirect('/auth/send_again/');
        } elseif( ! $this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        }
    }
    
    public function answers()
    {
        $this->load->model('Questions');
        $this->load->model('Graduates');
        $profile = $this->Graduates->get_where(array('user_id' => $this->tank_auth->get_user_id()));
        $json = 0;
        if(count($profile) > 0)
        {
            $GraduateId = current(array_keys($profile));
            $ins = new Questions();
            $result = $ins->get_question_answers($GraduateId);
            $json = json_encode($result);
        }
        $this->output->set_header('Content-Type: application/json');
        echo $json;
    }

    public function get_departments($college = null)
    {
        $json = 0;
        $departments = array(
            'All'   => 'All'
        );
        $get_departments = $this->db->distinct()->group_by('Department')->get_where('graduates', array( 'College' => $college ));
        if($get_departments->num_rows() > 0){
            foreach ($get_departments->result() as $row){
                if(! empty($row->Department)) $departments[$row->Department] = $row->Department;
            }
        }
        $json = json_encode($departments);
        $this->output->set_header('Content-Type: application/json');
        echo $json;
    }
}

/* End of file request.php */
/* Location: ./application/controllers/request.php */