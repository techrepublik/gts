<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Functions extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Taipei');
    }
    
    public function get_degree_reasons($GraduateId)
    {
        $undergraduate_where = array(
            'GraduateId' => $GraduateId,
            'AnswerFieldId' => 8
        );
        $query1 = $this->db->get_where('answers', $undergraduate_where);
        $data['Undergraduate'] = array();
        foreach ($query1->result() as $row) {
            $data['Undergraduate'][] = $row->AnswerValue;
        }
        $graduate_where = array(
            'GraduateId' => $GraduateId,
            'AnswerFieldId' => 9
        );
        $query2 = $this->db->get_where('answers', $graduate_where); 
        $data['Graduate'] = array();
        foreach ($query2->result() as $row) {
            $data['Graduate'][] = $row->AnswerValue;
        }
        
        $others = array(
            'GraduateId' => $GraduateId,
            'AnswerFieldId' => 10
        );
        $query3 = $this->db->get_where('answers', $others); 
        $data['Others'] = array();
        foreach ($query3->result() as $row) {
            $data['Others'] = $row->AnswerValue;
        }
        return $data;
    }
}