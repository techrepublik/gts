<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Educational_attainment extends MY_Model {
    
    const DB_TABLE = 'educational_attainment';
    const DB_TABLE_PK = 'AttainmentId';
    
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
    public $AttainmentId;
    
    /**
     * graduates foreign key
     * @var int
     */
    public $GraduateId;
    
    /**
     * Degree.
     * @var string
     */
    public $EducationDegree;
    
    /**
     * School where degree was taken.
     * @var string
     */
    public $School;
    
    /**
     * Year graduated.
     * @var year
     */
    public $YearGraduated;
    
    /**
     * Awards and honors received.
     * @var year
     */
    public $Honors;
    
    /**
     * Last updated.
     * @var datetime
     */
    public $UpdatedOn;
    
}