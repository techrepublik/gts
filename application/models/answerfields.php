<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Answerfields extends MY_Model {
    
    const DB_TABLE = 'answerfields';
    const DB_TABLE_PK = 'AnswerFieldId';
    
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
    public $AnswerFieldId;
    
    /**
     * Answer field.
     * @var string
     */
    public $AnswerFieldName;
    
    /**
     * Answer field display order.
     * @var int
     */
    public $AnswerFieldOrderNo;
    
    /**
     * Answer field visibility flag.
     * @var bit
     */
    public $IsVisible;
    
    /**
     * Question foreign key for answer field.
     * @var int
     */
    public $QuestionId;
    
    /**
     * Last updated.
     * @var datetime
     */
    public $UpdatedOn;
    
}