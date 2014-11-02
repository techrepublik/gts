<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Trainings extends MY_Model {
    
    const DB_TABLE = 'trainings';
    const DB_TABLE_PK = 'TrainingId';
    
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
    public $TrainingId;
    
    /**
     * graduates foreign key
     * @var int
     */
    public $GraduateId;
    
    /**
     * Training title.
     * @var string
     */
    public $Title;
    
    /**
     * Training duration in hours.
     * @var double
     */
    public $Duration;
    
    /**
     * Credits earned.
     * @var int
     */
    public $CreditsEarned;
    
    /**
     * Institution where training was taken.
     * @var string
     */
    public $TrainingInstitutionName;
    
    /**
     * Last updated.
     * @var datetime
     */
    public $UpdatedOn;
    
}