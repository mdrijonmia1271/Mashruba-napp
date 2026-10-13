<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mod_birthday_sendsms
 *
 * @author iPLUS DATA
 */
class Mod_birthday_sendsms extends CI_Model {
    
    var $username = '';
    var $pass = '';
    var $sms_text = '';
    var $sender = '';

    public function __construct() {
        parent::__construct();
   
    }

    function get_daily_birthday_list() {
//        $read_db = $this->load->database('read', TRUE); /* database conection for read operation */
        $cur_date = date('Y-m-d');
        $cur_month_day = date('m-d');
        
        $sql = "select cust_id,cust_phone from cust_info where MID(`date_of_birth`,6,5) = '$cur_month_day'";
        //exit();
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
           $record = $query->result();           
           return $record;
        }else{
           return null;
        }     
    }

}
