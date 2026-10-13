<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Dbnapp extends CI_Controller
{
    
    protected $data;
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {		
        
        ini_set('max_execution_time', '-1');
        ini_set('memory_limit','-1');
		
		$db_load = $this->load->database('default',TRUE);
		$db_name = "mashruba_napp";
		$folder_name="mashruba_notification_soft_live";
		$datetime = date("Y-m-d-H-i-s");
        $fileName = "$datetime-$db_name.zip";
        $this->load->dbutil();
        $prefs = array(
            'tables'      => array(),           			// Array of tables to backup.
            'ignore'      => array(),           			// List of tables to omit from the backup
            'format'      => 'zip',             			// gzip, zip, txt
            'filename'    => "$datetime-$db_name.sql",    	// File name - NEEDED ONLY WITH ZIP FILES
            'add_drop'    => TRUE,              			// Whether to add DROP TABLE statements to backup file
            'add_insert'  => TRUE,              			// Whether to add INSERT data to backup file
            'newline'     => "\n"               			// Newline character used in backup file
        );
        $ftpLocalpath = 'upload/backup/';
		if ( ! file_exists($ftpLocalpath) )
		{
			$create = mkdir($ftpLocalpath, 0777);
			if ( ! $create)
				return false;
		}
	
        $backup = $this->dbutil->backup($prefs);	
		$dbs = $this->dbutil->list_databases();
		
        $save = $ftpLocalpath.$fileName;
        $this->load->helper('file');
		write_file($save, $backup);
		
				
	/******************** CONNECT TO SPACES API ****************************/
		$this->key = "53AGK7IQM65PLN4OKOWR";
		$this->secret = "LRBP8ljagvFrgt4PYRn0e4ygrCz6JZsFsNwnUlxLfzM";
		$this->space_name = "bigmspace";
		$this->region = "sgp1";
        
        require_once("spaces-api/spaces.php");
		$space = new SpacesConnect($this->key, $this->secret, $this->space_name, $this->region);
		
        	$path_on_space_db = "dbbackup/$folder_name/$fileName";
			if($space->uploadFile($save, "private", $path_on_space_db )){
				unlink($save);
        	}
    }
    
    
}
