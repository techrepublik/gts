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