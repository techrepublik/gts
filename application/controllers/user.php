<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller {
            
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
    
    /**
     * Graduate profile page.
     */
    public function profile($active_tab = 'profile', $collapsed = '')
    {
        if ($this->tank_auth->is_logged_in()) {
            $this->load->model('Graduates');
            $user_id = $this->tank_auth->get_user_id();
            $profile = $this->Graduates->get_where(array('user_id' => $user_id));
            if(count($profile) > 0)
            {
                $this->load->model('Questions');
                $this->load->model('Educational_attainment');
                $this->load->model('Examinations');
                $this->load->model('Trainings');
                $this->load->model('Functions');
                $this->load->model('tank_auth/users','Users');
                
                $this->Questions->load(3);
                $GraduateId = current(array_keys($profile));
                $profile = current($profile);
                $degree_reasons = $this->Questions->get_answer_selections();
                $stored_errors = $this->session->userdata('errors');
                $this->session->unset_userdata('errors');
                $edu_attainment = $this->Educational_attainment->get_where(array('GraduateId' => $GraduateId));
                $pro_exams = $this->Examinations->get_where(array('GraduateId' => $GraduateId));
                $trainings = $this->Trainings->get_where(array('GraduateId' => $GraduateId));
                $degree_reason_answer = $this->Functions->get_degree_reasons($GraduateId);
                $answers = $result = $this->Questions->get_question_answers($GraduateId);
                
                $data['edu_attainment'] = $edu_attainment;
                $data['pro_exams'] = $pro_exams;
                $data['trainings'] = $trainings;
                $data['degree_reasons_answers'] = $degree_reason_answer;
                $data['answers'] = $answers;
                if( ! empty($active_tab))
                {
                    $data['active_tab'] = $active_tab;
                    if($active_tab == 'edu')
                    {
                        $data['collapsed'] = $collapsed; 
                    }
                }
                if( ! empty($degree_reasons))
                {
                    $data['degree_reasons'] = $degree_reasons;
                }
                if( ! empty($stored_errors))
                {
                    $data['errors'] = $stored_errors;
                }
                $data['profile'] = $profile;
                $data['user'] = $this->Users->get_user_by_id($user_id, TRUE);
                $module['content'] = $this->load->view('template/profile', $data, TRUE);
                $module['title'] = 'Profile';
                $module['menu'] = $this->load->view('menu/graduate_profile', NULL, TRUE);
                $module['modals'] = array(
                    $this->load->view('modals/upload_picture', NULL, TRUE),
                    $this->load->view('modals/educational_attainment', NULL, TRUE),
                    $this->load->view('modals/examinations', NULL, TRUE),
                    $this->load->view('modals/degree_reasons', NULL, TRUE),
                    $this->load->view('modals/trainings', NULL, TRUE),
                    $this->load->view('modals/advance_study_reasons', NULL, TRUE)
                );
                $module['jscripts'] = array(
                    'bootstrap-3.1.1/bootstrap-filestyle.min',
                );
                $this->load->view('template/base-template', $module);
            } else {
                redirect('/user/update/');
            }
        } elseif ($this->tank_auth->is_logged_in(FALSE)) {
            redirect('/auth/send_again/');
        } else {
            redirect('/auth/login/');
        }
    }
    
    /**
     * Change/Create graduate profile.
     */
    public function update()
    {
        if ($this->tank_auth->is_logged_in()) {
            $this->load->model('Graduates');
            $profile = $this->Graduates->get_where(array('user_id' => $this->tank_auth->get_user_id()));
            $this->form_validation->set_rules('LastName', 'Lastname', 'trim|required');
            $this->form_validation->set_rules('FirstName', 'Firstname', 'trim|required');
            $this->form_validation->set_rules('MiddleName', 'Middlename', 'trim|required');
            $this->form_validation->set_rules('LastName01', 'Maiden Lastname', 'trim');
            $this->form_validation->set_rules('ExtensionName', 'Name Suffix', 'trim');
            $this->form_validation->set_rules('Address', 'Address', 'trim');
            $this->form_validation->set_rules('BirthDate', 'Birthdate', 'trim|required');
            $this->form_validation->set_rules('Province', 'Province', 'trim');
            $this->form_validation->set_rules('TelephoneNo', 'Telephone Number', 'trim');
            $this->form_validation->set_rules('CellphoneNo', 'Cellphone Number', 'trim');
            if ($this->form_validation->run() == FALSE) {
                $data['errors'] = validation_errors();
            } else {
                if(count($profile) > 0)
                {
                    $GraduateId = current(array_keys($profile));
                    $this->Graduates->GraduateId = $GraduateId;
                }
                $this->Graduates->LastName = $this->form_validation->set_value('LastName');
                $this->Graduates->FirstName = $this->form_validation->set_value('FirstName');
                $this->Graduates->MiddleName = $this->form_validation->set_value('MiddleName');
                $this->Graduates->LastName01 = $this->form_validation->set_value('LastName01');
                $this->Graduates->ExtensionName = $this->form_validation->set_value('ExtensionName');
                $this->Graduates->Address = $this->form_validation->set_value('Address');
                $this->Graduates->CivilStatus = $this->input->post('CivilStatus');
                $this->Graduates->Sex = (int) $this->input->post('Sex');
                $this->Graduates->BirthDate = $this->form_validation->set_value('BirthDate');
                $this->Graduates->RegionOfOrigin = $this->input->post('RegionOfOrigin');
                $this->Graduates->Province = $this->form_validation->set_value('Province');
                $this->Graduates->LocationOfResidence = (int) $this->input->post('LocationOfResidence');
                $this->Graduates->TelephoneNo = $this->form_validation->set_value('TelephoneNo');
                $this->Graduates->CellphoneNo = $this->form_validation->set_value('CellphoneNo');
                $this->Graduates->user_id = $this->tank_auth->get_user_id();
                $this->Graduates->save();
                $this->session->unset_userdata('graduate');
                redirect('/user/profile/');
            }
            if(count($profile) > 0)
            {
                $GraduateId = current(array_keys($profile));
                $this->Graduates->load($GraduateId, 1);
            }
            $module['content'] = $this->load->view('form/graduate_profile', $data, TRUE);
            $module['title'] = 'Create new profile';
            $module['menu'] = $this->load->view('menu/graduate_profile', NULL, TRUE);
            $this->load->view('template/base-template', $module);
        } elseif ($this->tank_auth->is_logged_in(FALSE)) {
            redirect('/auth/send_again/');
        } else {
            redirect('/auth/login/');
        }
    }
    
    public function save_attainment(){
        if ($this->tank_auth->is_logged_in()) {
            $this->load->model('Graduates');
            $profile = $this->Graduates->get_where(array('user_id' => $this->tank_auth->get_user_id()));
            $this->form_validation->set_rules('EducationDegree', 'Degree and specialization', 'trim');
            $this->form_validation->set_rules('School', 'College or university', 'trim');
            $this->form_validation->set_rules('YearGraduated', 'Year Graduated', 'numeric');
            $this->form_validation->set_rules('Honors', 'Honors and Awards', 'trim');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_userdata('errors', validation_errors());
            } else {
                if(count($profile) > 0)
                {
                    $this->load->model('Educational_attainment');
                    $GraduateId = current(array_keys($profile));
                    
                    $edu = new Educational_attainment();
                    $AttainmentId = $this->input->post('AttainmentId');
                    if(!empty($AttainmentId))
                    {
                        $edu->AttainmentId = $AttainmentId;
                    }
                    $edu->GraduateId = $GraduateId;
                    $edu->EducationDegree = $this->input->post('EducationDegree');
                    $edu->School = $this->input->post('School');
                    $edu->YearGraduated = $this->input->post('YearGraduated');
                    $edu->Honors = $this->input->post('Honors');
                    $edu->save();
                }
            }
            redirect('/user/profile/edu/edu_attainment/');
        } elseif ($this->tank_auth->is_logged_in(FALSE)) {
            redirect('/auth/send_again/');
        } else {
            redirect('/auth/login/');
        }
    }
    
    public function remove_attainment($AttainmentId = 0) {
        if ($this->tank_auth->is_logged_in()) {
            if($AttainmentId > 0)
            {
                $this->load->model('Educational_attainment');
                $edu = new Educational_attainment();
                $edu->load($AttainmentId);
                $edu->delete();
            }
            redirect('/user/profile/edu/edu_attainment/');
        } elseif ($this->tank_auth->is_logged_in(FALSE)) {
            redirect('/auth/send_again/');
        } elseif( ! $this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        }
    }
    
    public function save_examination(){
        if ($this->tank_auth->is_logged_in()) {
            $this->load->model('Graduates');
            $profile = $this->Graduates->get_where(array('user_id' => $this->tank_auth->get_user_id()));
            $this->form_validation->set_rules('ExaminationName', 'Name of Examination', 'trim');
            $this->form_validation->set_rules('ExaminationDate', 'Examination Date', 'trim');
            $this->form_validation->set_rules('Rating', 'Rating', 'trim');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_userdata('errors', validation_errors());
            } else {
                if(count($profile) > 0)
                {
                    $this->load->model('Examinations');
                    $GraduateId = current(array_keys($profile));
                    
                    $exam = new Examinations();
                    $ExaminationId = $this->input->post('ExaminationId');
                    if(!empty($ExaminationId))
                    {
                        $exam->ExaminationId = $ExaminationId;
                    }
                    $exam->GraduateId = $GraduateId;
                    $exam->ExaminationName = $this->input->post('ExaminationName');
                    $exam->ExaminationDate = $this->input->post('ExaminationDate');
                    $exam->Rating = $this->input->post('Rating');
                    $exam->save();
                }
            }
            redirect('/user/profile/edu/pro_exams/');
        } elseif ($this->tank_auth->is_logged_in(FALSE)) {
            redirect('/auth/send_again/');
        } else {
            redirect('/auth/login/');
        }
    }
    
    public function remove_examination($ExaminationId = 0) {
        if ($this->tank_auth->is_logged_in()) {
            if($ExaminationId > 0)
            {
                $this->load->model('Examinations');
                $exam = new Examinations();
                $exam->load($ExaminationId);
                $exam->delete();
            }
            redirect('/user/profile/edu/pro_exams/');
        } elseif ($this->tank_auth->is_logged_in(FALSE)) {
            redirect('/auth/send_again/');
        } elseif( ! $this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        }
    }
    
    public function save_reasons(){
        if ($this->tank_auth->is_logged_in()) {
            $this->load->model('Graduates');
            $profile = $this->Graduates->get_where(array('user_id' => $this->tank_auth->get_user_id()));
            $this->form_validation->set_rules('Others', 'Other reasons', 'trim');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_userdata('errors', validation_errors());
            } else {
                if(count($profile) > 0)
                {
                    $GraduateId = current(array_keys($profile));
                    $undergrad = $this->input->post('Undergraduate');
                    $grad = $this->input->post('Graduate');
                    $others = $this->input->post('Others');
                    if(empty($undergrad) && empty($grad) && empty($others))
                    {
                        $this->session->set_userdata('errors', '<li>One or more reasons must be selected.</li>');
                    } else {
                        $this->load->model('Answers');
                        if( ! empty($undergrad))
                        {
                            $where = array(
                                'AnswerFieldId' => 8,
                                'GraduateId' => $GraduateId
                            );
                            $this->Answers->delete($where);
                            foreach ($undergrad as $key => $value)
                            {
                                $reason = new Answers();
                                $reason->AnswerValue = $value;
                                $reason->IsValidated = 1;
                                $reason->AnswerCount = 0;
                                $reason->AnswerFieldId = 8;
                                $reason->GraduateId = $GraduateId;
                                $reason->save();
                            }
                        }
                        if( ! empty($grad))
                        {
                            $where = array(
                                'AnswerFieldId' => 9,
                                'GraduateId' => $GraduateId
                            );
                            $this->Answers->delete($where);
                            foreach ($grad as $key => $value)
                            {
                                $reason = new Answers();
                                $reason->AnswerValue = $value;
                                $reason->IsValidated = 1;
                                $reason->AnswerCount = 0;
                                $reason->AnswerFieldId = 9;
                                $reason->GraduateId = $GraduateId;
                                $reason->save();
                            }
                        }
                        if( ! empty($others))
                        {
                            $where = array(
                                'AnswerFieldId' => 10,
                                'GraduateId' => $GraduateId
                            );
                            $this->Answers->delete($where);
                            $reason = new Answers();
                            $reason->AnswerValue = $others;
                            $reason->IsValidated = 1;
                            $reason->AnswerCount = 0;
                            $reason->AnswerFieldId = 10;
                            $reason->GraduateId = $GraduateId;
                            $reason->save();
                        } else {
                            $where = array(
                                'AnswerFieldId' => 10,
                                'GraduateId' => $GraduateId
                            );
                            $this->Answers->delete($where);
                        }
                    }
                } else {
                    redirect('/user/update/');
                }
                redirect('/user/profile/edu/degree_reasons/');
            }
        } elseif ($this->tank_auth->is_logged_in(FALSE)) {
            redirect('/auth/send_again/');
        } else {
            redirect('/auth/login/');
        }
    }
    
    public function save_training(){
        if ($this->tank_auth->is_logged_in()) {
            $this->load->model('Graduates');
            $profile = $this->Graduates->get_where(array('user_id' => $this->tank_auth->get_user_id()));
            $this->form_validation->set_rules('Title', 'Title of Training or Advance Study', 'trim');
            $this->form_validation->set_rules('Duration', 'Duration', 'trim');
            $this->form_validation->set_rules('CreditsEarned', 'Credits Earned', 'trim');
            $this->form_validation->set_rules('TrainingInstitutionName', 'Name of Training Institution/College/University', 'trim');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_userdata('errors', validation_errors());
            } else {
                if(count($profile) > 0)
                {
                    $this->load->model('Trainings');
                    $GraduateId = current(array_keys($profile));
                    
                    $training = new Trainings();
                    $TrainingId = $this->input->post('TrainingId');
                    if(!empty($TrainingId))
                    {
                        $training->TrainingId = $TrainingId;
                    }
                    $training->GraduateId = $GraduateId;
                    $training->Title = $this->input->post('Title');
                    $training->Duration = $this->input->post('Duration');
                    $training->CreditsEarned = $this->input->post('CreditsEarned');
                    $training->TrainingInstitutionName = $this->input->post('TrainingInstitutionName');
                    $training->save();
                }
            }
            redirect('/user/profile/training/');
        } elseif ($this->tank_auth->is_logged_in(FALSE)) {
            redirect('/auth/send_again/');
        } else {
            redirect('/auth/login/');
        }
    }
    
    public function remove_training($TrainingId = 0)
    {
        if ($this->tank_auth->is_logged_in()) {
            if($TrainingId > 0)
            {
                $this->load->model('Trainings');
                $training = new Trainings();
                $training->load($TrainingId);
                $training->delete();
            }
            redirect('/user/profile/training/');
        } elseif ($this->tank_auth->is_logged_in(FALSE)) {
            redirect('/auth/send_again/');
        } elseif( ! $this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        }
    }
    
    public function save_adv_study_reasons()
    {
        if ($this->tank_auth->is_logged_in()) {
            $this->load->model('Graduates');
            $profile = $this->Graduates->get_where(array('user_id' => $this->tank_auth->get_user_id()));
            $this->form_validation->set_rules("answers_5_15", 'Reason for Pursuing Advance Studies', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_userdata('errors', validation_errors());
            } else {
                if(count($profile) > 0)
                {
                    $this->load->model('Answers');
                    $GraduateId = current(array_keys($profile));
                    
                    $answer = new Answers();
                    $AnswerId = $this->input->post('AnswerId');
                    if(!empty($AnswerId))
                    {
                        $answer->AnswerId = $AnswerId;
                    }
                    $answer->GraduateId = $GraduateId;
                    $answer->AnswerValue = $this->input->post('answers_5_15');
                    $answer->IsValidated = 1;
                    $answer->AnswerCount = 0;
                    $answer->AnswerFieldId = 15;
                    $answer->save();
                }
            }
            redirect('/user/profile/training/');
        } elseif ($this->tank_auth->is_logged_in(FALSE)) {
            redirect('/auth/send_again/');
        } else {
            redirect('/auth/login/');
        }
    }
    
    public function employment_data()
    {
        if ($this->tank_auth->is_logged_in()) {
            $answers = $this->input->post('answers');
            if($answers){
                $this->load->model('Graduates');
                $profile = $this->Graduates->get_where(array('user_id' => $this->tank_auth->get_user_id()));
                
                $this->load->model('Answers');
                
                $GraduateId = current(array_keys($profile));
                foreach ($answers as $answer_field){
                    foreach ($answer_field as $AnswerFieldId => $AnswerValue){
                        if(!empty($AnswerFieldId)){
                            $where = array(
                                'AnswerFieldId' => $AnswerFieldId,
                                'GraduateId' => $GraduateId
                            );
                            $this->Answers->delete($where);
                            if(is_array($answer_field[$AnswerFieldId])){
                                foreach ($answer_field[$AnswerFieldId] as $value) {
                                    $new_answer = new Answers();
                                    $new_answer->AnswerValue = $value;
                                    $new_answer->IsValidated = 1;
                                    $new_answer->AnswerCount = 0;
                                    $new_answer->AnswerFieldId = $AnswerFieldId;
                                    $new_answer->GraduateId = $GraduateId;
                                    $new_answer->save();
                                }
                            } else {
                                $new_answer = new Answers();
                                $new_answer->AnswerValue = $AnswerValue;
                                $new_answer->IsValidated = 1;
                                $new_answer->AnswerCount = 0;
                                $new_answer->AnswerFieldId = $AnswerFieldId;
                                $new_answer->GraduateId = $GraduateId;
                                $new_answer->save();
                            }
                        }
                    }
                }
                redirect('/user/profile/employment/');
            }
            $module['content'] = $this->load->view('form/employment_data', NULL, TRUE);
            $module['title'] = 'Employment Data';
            $module['menu'] = $this->load->view('menu/graduate_profile', NULL, TRUE);
            $this->load->view('template/base-template', $module);
        } elseif ($this->tank_auth->is_logged_in(FALSE)) {
            redirect('/auth/send_again/');
        } else {
            redirect('/auth/login/');
        }
    }

    public function upload_pic()
    {
        if ($this->tank_auth->is_logged_in()) {
            $GraduateId = $this->_graduate_id();
            $config['upload_path'] = './assets/uploads/images';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']	= '100';
            $config['max_width']  = '500';
            $config['max_height']  = '500';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload())
            {
                $this->session->set_userdata('errors', $this->upload->display_errors());
            } else {
                $data = $this->upload->data();
                $this->load->model('Graduates');
                $this->Graduates->GraduateId = $GraduateId;
                $this->Graduates->Pricture = $data['file_name'];
                $this->Graduates->set_profile_pic();
                redirect('/user/profile/');
            }
        } elseif ($this->tank_auth->is_logged_in(FALSE)) {
            redirect('/auth/send_again/');
        } else {
            redirect('/auth/login/');
        }
    }
    
    private function _graduate_id()
    {
        $this->load->model('Graduates');
        $profile = $this->Graduates->get_where(array('user_id' => $this->tank_auth->get_user_id()));
        if(count($profile) <= 0)
        {
            redirect('/user/change_profile/');
        } else {
            $GraduateId = current(array_keys($profile));
            return $GraduateId;
        }
    }
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */