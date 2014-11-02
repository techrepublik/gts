<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Test extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('security');
        
        $this->form_validation->set_error_delimiters('<li>', '</li>');
    }

    /**
     * Index Page for this controller.
     *
     */
    public function index()
    {
        $module['content'] = $this->load->view('form/graduate_tracer_survey', null, TRUE);
        $module['styles'] = array(
            'page/graduate_tracer_survey'
        );
        $module['jscripts'] = array(
            'page/graduate_tracer_survey'
        );
        $this->load->view('template/base-template', $module);
    }
    
    public function answers($GraduateId)
    {
        $this->load->model('Questions');
        $ins = new Questions();
        $result = $ins->get_question_answers($GraduateId);
        echo "<pre>";
        print_r($result);
        echo "</pre>";
    }
    
    public function fields()
    {
        $this->load->model('Questions');
        $ins = new Questions();
        $result = $ins->get_question_fields();
        echo "<pre>";
        print_r($result);
        echo "</pre>";
    }
}

/* End of file test.php */
/* Location: ./application/controllers/test.php */