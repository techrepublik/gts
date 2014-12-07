<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Questions extends MY_Model {
    
    const DB_TABLE = 'questions';
    const DB_TABLE_PK = 'QuestionId';
    
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Taipei');
        $this->UpdatedOn = date('Y-m-d H:i:s');
    }
    
    public function get_answer_selections()
    {
        $where = array(
            'QuestionId' => $this->{$this::DB_TABLE_PK},
            'IsVisible' => 1,
            'IsDefault' => 1
        );
        $query = $this->db->get_where('answerselections', $where);
        if ($query->num_rows() > 0) return $query->result();
        return NULL;
    }
    
    public function get_question_answers($GraduateId, $QuestionId = 4)
    {
        $data = array();
        $join = $this->db->join('answerfields','answers.AnswerFieldId = answerfields.AnswerFieldId','left')
                    ->join('questions','answerfields.QuestionId = questions.QuestionId','left')
                    ->get_where('answers', array('answers.GraduateId' => $GraduateId, 'questions.IsVisible' => 1, 'questions.QuestionId >' => $QuestionId));
        
        if ($join->num_rows() > 0)
        {
            $result = $join->result();
            foreach($result as $row)
            {
                $data[$row->QuestionId][$row->AnswerFieldId][] = $row;
            }
        }
        return $data;
    }
    
    public function get_question_fields()
    {
        $data = array();
        $join = $this->db->join('answerfields','questions.QuestionId = answerfields.QuestionId','left')
                    ->get_where('questions', array('questions.IsVisible' => 1, 'questions.QuestionId >' => 4));
        
        if ($join->num_rows() > 0)
        {
            $result = $join->result();
            foreach($result as $row)
            {
                $data[$row->QuestionId][$row->AnswerFieldId] = $row;
            }
        }
        return $data;
    }

    /**
     * Question unique identifier.
     * @var int
     */
    public $QuestionId;
    
    /**
     * Question.
     * @var string
     */
    public $QuestionStatement;
    
    /**
     * Question number.
     * @var int
     */
    public $QuestionNo;
    
    /**
     * Category foreign key for question category.
     * @var int
     */
    public $CategoryId;
    
    /**
     * Question visibility flag.
     * @var bit
     */
    public $IsVisible;
    
    /**
     * Last updated.
     * @var datetime
     */
    public $UpdatedOn;
    
}