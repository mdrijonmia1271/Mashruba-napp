<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mod_login
 *
 * @author iPLUS DATA
 */
class Mod_login extends CI_Model {
 
    public function __construct() {
        parent::__construct();

    }

    function check_user_info($username=NULL,$password=NULL) {
        
        //$read_db = $this->load->database('read', TRUE); /* database conection for read operation */

        $result = "";
        $query = $this->db->select('id,username');
        $query = $this->db->where('username',$username);
        $query = $this->db->where('password',$password);
        $query = $this->db->get('user');

//        print_r($query->result()); die();

        if ( $query->num_rows() > 0 ) {
            $result = $query->result();                
        } 

        return $result;         
    }
    
 }


