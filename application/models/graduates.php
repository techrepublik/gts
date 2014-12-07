<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Graduates extends MY_Model {
    
    const DB_TABLE = 'graduates';
    const DB_TABLE_PK = 'GraduateId';
    
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Taipei');
        $this->UpdatedOn = date('Y-m-d H:i:s');
        $this->Picture = 'default-profile-image.png';
    }
    
    public function set_profile_pic()
    {
        $this->db->update($this::DB_TABLE, array('Picture' => $this->Picture), array($this::DB_TABLE_PK => $this->{$this::DB_TABLE_PK}));
    }
    
    public function load_graduate($post = 0){
        $like = array(
            'LastName' =>  $this->LastName,
            'FirstName' => $this->FirstName,
            'YearGraduated' => $this->YearGraduated
        );
        $query = $this->db->like($like)->get('graduates');
        $this->populate($query->row(),$post);
    }

    public function graduates_summary($var = 'College'){
        $where = array(
            'user_id IS NOT NULL' => NULL,
            'user_id <>' => 'NULL',
            'user_id <>' => ''
        );

        if($var == 'BirthDate'){
            $query = $this->db
            ->select($var.', TIMESTAMPDIFF(YEAR, `BirthDate`,CURDATE()) as age, COUNT(*) as total')
            ->group_by('age')->get_where($this::DB_TABLE, $where);
        } else {
            $query = $this->db->select($var.', COUNT(*) as total')->group_by($var)->get_where($this::DB_TABLE, $where);
        }
        return $query->result();
    }
    /*
    SELECT answers.AnswerValue, COUNT(*) as total 
    FROM graduates 
    LEFT JOIN answers ON graduates.GraduateId = answers.GraduateId 
    RIGHT JOIN answerfields ON answers.AnswerFieldId = answerfields.AnswerFieldId
    RIGHT JOIN questions ON answerfields.QuestionId = questions.QuestionId 
    WHERE 
    graduates.user_id IS NOT NULL
    AND graduates.user_id <> '' 
    AND questions.QuestionId = 3 
    AND answerfields.AnswerFieldId = 8 // IF PRESENT
    AND questions.IsVisible = 1 
    GROUP BY answers.AnswerValue
    */
    public function answer_summary($question_id = 0, $field_id = 0){
        $where = array(
            'questions.QuestionId' => $question_id,
            'questions.IsVisible' => 1,
            'graduates.user_id IS NOT NULL' => NULL,
            'graduates.user_id <>' => 'NULL',
            'graduates.user_id <>' => ''
        );
        if($field_id > 0) $where['answerfields.AnswerFieldId'] = $field_id;

        $query = $this->db->select('answers.AnswerValue, COUNT(*) as total')
            ->join('answers', 'graduates.GraduateId = answers.GraduateId', 'left')
            ->join('answerfields','answers.AnswerFieldId = answerfields.AnswerFieldId','right')
            ->join('questions','answerfields.QuestionId = questions.QuestionId','right')
            ->group_by('answers.AnswerValue')
            ->get_where($this::DB_TABLE, $where);
        return $query->result();
    }
    
    /**
     * Graduate unique identifier.
     * @var int
     */
    public $GraduateId;
    
    public $StudentId;
    
    public $YearGraduated;
    
    public $College;
    
    public $Department;
    
    /**
     * Graduate 10-digit numbers.
     * @var string
     */
    public $GraduateNo;
    
    /**
     * Graduate last name.
     * @var string
     */
    public $LastName;
    
    /**
     * Graduate first name.
     * @var string
     */
    public $FirstName;
    
    /**
     * Graduate middle Name.
     * @var string
     */
    public $MiddleName;
    
    /**
     * Graduate maiden last name.
     * @var string
     */
    public $LastName01;
    
    /**
     * Graduate extension name.
     * @var string
     * Example: Jr., Sr., etc.
     */
    public $ExtensionName;
    
    /**
     * Graduate address.
     * @var string
     */
    public $Address;
    
    /**
     * Graduate civil status.
     * @var string
     */
    public $CivilStatus;
    
    /**
     * Graduate sex.
     * @var bit
     * 0 = Male
     * 1 = Female
     */
    public $Sex;
    
    /**
     * Graduate birthdate.
     * @var date
     */
    public $BirthDate;
    
    /**
     * Graduate region of origin.
     * @var string
     */
    public $RegionOfOrigin;
    
    /**
     * Graduate province.
     * @var string
     */
    public $Province;
    
    /**
     * Graduates location of residence.
     * @var bit
     * 0 = Municipality
     * 1 = City
     */
    public $LocationOfResidence;
    
    /**
     * Graduate telephone number.
     * @var string
     */
    public $TelephoneNo;
    
    /**
     * Graduate cellphone number.
     * @var int
     */
    public $CellphoneNo;
    
    /**
     * User unique identifier.
     * @var int
     */
    public $user_id;
    
    /**
     * Last updated.
     * @var datetime
     */
    public $UpdatedOn;
    
    /**
     * ID Picture location.
     * @var string
     */
    public $Picture;
    
}