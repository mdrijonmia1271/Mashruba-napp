<?php
/**
 * Description of admin_logout
 *
 * @author  iPLUS DATA
 * Date : 02-March-2014
 */
class Logout extends CI_Controller{
   function __construct(){
        parent::__construct();

	   $this->load->helper('url');
    }
    function index(){
         $this->session->sess_destroy();
         redirect('login');
    }
}
