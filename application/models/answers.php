<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Answers extends MY_Model {
    
    const DB_TABLE = 'answers';
    const DB_TABLE_PK = 'AnswerId';
    
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Taipei');
        $this->UpdatedOn = date('Y-m-d H:i:s');
    }
    
    /**
     * Unique identifier.
     * @var int
     */
    public $AnswerId;
    
    /**
     * Answer.
     * @var string
     */
    public $AnswerValue;
    
    /**
     * Answer validation flag.
     * @var bit
     */
    public $IsValidated;
    
    /**
     * Answer validation flag.
     * @var bit
     */
    public $AnswerCount;
    
    /**
     * Last updated.
     * @var datetime
     */
    public $UpdatedOn;
    
    /**
     * answerfields foreign key.
     * @var int
     */
    public $AnswerFieldId;
    
    /**
     * graduates foreign key
     * @var int
     */
    public $GraduateId;
    
}