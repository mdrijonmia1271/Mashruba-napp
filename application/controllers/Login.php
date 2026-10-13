<?php

/**
 * Description of login
 *
 * @author  iPLUS DATA
 * Date : 02-March-2014
 */
class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();

		$this->load->helper('url');
        $this->load->library('common_lib');
        $this->load->model('Mod_login');
    }

    function index() {
        $this->load->view('login/view_login');
    }

    function process() {
        $flag = '';
        $username = '';
        $pass = '';

        $username = $this->input->post('username');
        $pass = $this->input->post('password');

        if (!empty($username) and !empty($pass)) {

            $res = $this->Mod_login->check_user_info($username,$pass);
            
            if(!empty($res)){            
                $flag = true;
            } else {
                $flag = false;
            }
        } else {
            $flag = false;
        }

        $this->Mod_login->check_user_info($username,$pass);

        if (!empty($flag)) { /* set session */
            
            $data_session = array(
                'admin_logged_in' => true,
                'admin_login_email' => $username,
            );

            $this->session->set_userdata($data_session); /* put data into seesion */

            redirect('category');
        } else { /* send error */
            redirect('login');
        }
    }

}
