<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class File_upload extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Index Page for this controller.
     *
     */
    public function index()
    {
        error_reporting(E_ALL | E_STRICT);
        $this->load->library("UploadHandler");
    }
}

/* End of file file_upload.php */
/* Location: ./application/controllers/file_upload.php */