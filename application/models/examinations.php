<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Examinations extends MY_Model {
    
    const DB_TABLE = 'examinations';
    const DB_TABLE_PK = 'ExaminationId';
    
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
    public $ExaminationId;
    
    /**
     * graduates foreign key
     * @var int
     */
    public $GraduateId;
    
    /**
     * Examination name.
     * @var string
     */
    public $ExaminationName;
    
    /**
     * Examination date.
     * @var date
     */
    public $ExaminationDate;
    
    /**
     * Examination rating.
     * @var string
     */
    public $Rating;
    
    /**
     * Last updated.
     * @var datetime
     */
    public $UpdatedOn;
    
}