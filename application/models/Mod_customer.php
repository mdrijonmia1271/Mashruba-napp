<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mod_dc
 *
 * @author iPLUS DATA
 */
class Mod_customer extends CI_Model {
 
    public function __construct() {
        parent::__construct();

    }

    function save_data() {
//        $write_db = $this->load->database('write', TRUE); /* database conection for write operation */
        
        $dob_year = $this->security->xss_clean($this->input->post('dob_year'));
        $dob_month = $this->security->xss_clean($this->input->post('dob_month'));
        $dob_day = $this->security->xss_clean($this->input->post('dob_day'));

        if(!empty($dob_year) and !empty($dob_month) and !empty($dob_day)){
            $date_of_birth = $dob_year."-".$dob_month."-".$dob_day;
        }else{
            $date_of_birth = "0000-00-00";
        }
        
        $data_arry = array(              
            'cust_category' => $this->security->xss_clean($this->input->post('cust_category')),
            'cust_name' => $this->security->xss_clean($this->input->post('cust_name')),
            'cust_phone' => $this->security->xss_clean($this->input->post('cust_phone')),
            'cust_phone2' => $this->security->xss_clean($this->input->post('cust_phone2')),
            'cust_phone3' => $this->security->xss_clean($this->input->post('cust_phone3')),
            'cust_phone4' => $this->security->xss_clean($this->input->post('cust_phone4')),
            'lan_phone' => $this->security->xss_clean($this->input->post('lan_phone')),
            'cust_email' => $this->security->xss_clean($this->input->post('cust_email')),
            'date_of_birth' => $date_of_birth,
            'working_place' => $this->security->xss_clean($this->input->post('working_place')),
            'cust_designation' => $this->security->xss_clean($this->input->post('cust_designation')),
            'special_achivement' => $this->security->xss_clean($this->input->post('special_achivement')),
            'present_address' => $this->security->xss_clean($this->input->post('present_address')),
            'permanent_address' => $this->security->xss_clean($this->input->post('permanent_address')),
            'cust_status' => $this->security->xss_clean($this->input->post('cust_status')),
        );

		$this->db->insert('cust_info', $data_arry);
        $master_insert_id = $this->db->insert_id();
        
        if(!empty($master_insert_id)){
        	return $master_insert_id;
        }else{
        	return false;
        }
    }
    
    
    function get_customer_list() {
//            $read_db = $this->load->database('read', TRUE); /* database conection for read operation */
            
            $result = "";
            
            $query = $this->db->order_by("cust_id", 'DESC');
            $query = $this->db->get('cust_info');

            if ( $query->num_rows() > 0 ) {
                $result = $query->result();                
            } 
            
            return $result;         
    }


    function get_details($auto_id) {
//        $read_db = $this->load->database('read', TRUE); /* database conection for read operation */

        $query = $this->db->where("cust_id",$auto_id);
        $query = $this->db->get('cust_info');

        if ($query->num_rows() > 0) {
           $record = $query->row();           
           return $record;
        }else{
            return null;
        }     
    }

    function update_data() {
//        $write_db = $this->load->database('write', TRUE); /* database conection for write operation */
        
        $auto_id = $this->security->xss_clean($this->input->post('auto_id'));

        $dob_year = $this->security->xss_clean($this->input->post('dob_year'));
        $dob_month = $this->security->xss_clean($this->input->post('dob_month'));
        $dob_day = $this->security->xss_clean($this->input->post('dob_day'));

        if(!empty($dob_year) and !empty($dob_month) and !empty($dob_day)){
            $date_of_birth = $dob_year."-".$dob_month."-".$dob_day;
        }else{
            $date_of_birth = "0000-00-00";
        }

        $cust_category = $this->security->xss_clean($this->input->post('cust_category'));
        $cust_name = $this->security->xss_clean($this->input->post('cust_name'));
        $cust_phone = $this->security->xss_clean($this->input->post('cust_phone'));
        $cust_phone2 = $this->security->xss_clean($this->input->post('cust_phone2'));
        $cust_phone3 = $this->security->xss_clean($this->input->post('cust_phone3'));
        $cust_phone4 = $this->security->xss_clean($this->input->post('cust_phone4'));
		$lan_phone = $this->security->xss_clean($this->input->post('lan_phone'));
        $cust_email = $this->security->xss_clean($this->input->post('cust_email'));
        $working_place = $this->security->xss_clean($this->input->post('working_place'));
        $cust_designation = $this->security->xss_clean($this->input->post('cust_designation'));
        $special_achivement = $this->security->xss_clean($this->input->post('special_achivement'));
        $present_address = $this->security->xss_clean($this->input->post('present_address'));
        $permanent_address = $this->security->xss_clean($this->input->post('permanent_address'));
        $cust_status = $this->security->xss_clean($this->input->post('cust_status'));
            
        $updated_by = $this->session->userdata('admin_login_email');

        $data_arry = array(
            'cust_category' => $cust_category,
            'cust_name' => $cust_name,
            'cust_phone' => $cust_phone,
            'cust_phone2' => $cust_phone2,
            'cust_phone3' => $cust_phone3,
            'cust_phone4' => $cust_phone4,
			'lan_phone' => $lan_phone,
            'cust_email' => $cust_email,
            'date_of_birth' => $date_of_birth,
            'working_place' => $working_place,
            'cust_designation' => $cust_designation,
            'special_achivement' => $special_achivement,
            'present_address' => $present_address,
            'permanent_address' => $permanent_address,
            'cust_status' => $cust_status,
        );


		$this->db->where('cust_id', $auto_id);
        $res_flag = $this->db->update('cust_info', $data_arry); /* call active record function to save information  */
        
        if(!empty($res_flag)){
            return true;
        }else{
            return false;
        }
    }
    
    function count_records() {
//        $read_db = $this->load->database('read', TRUE); /* database conection for read operation */

        $sql_where = "";
        $cust_category = "";
        $cust_name="";
        $cust_designation="";
        $cust_phone="";
        $cust_phone2="";
        $cust_phone3="";
        $cust_phone4="";
        $cust_email="";
        $cust_status="";
        $has_email_phone = "";
        
        if ($this->input->server('REQUEST_METHOD') === 'POST'){
            


            $cust_category = $this->security->xss_clean($this->input->post('cust_category'));
            $cust_name = $this->security->xss_clean($this->input->post('cust_name'));
            $cust_designation = $this->security->xss_clean($this->input->post('cust_designation'));
            $cust_phone = $this->security->xss_clean($this->input->post('cust_phone'));
            $cust_phone2 = $this->security->xss_clean($this->input->post('cust_phone2'));
            $cust_phone3 = $this->security->xss_clean($this->input->post('cust_phone3'));
            $cust_phone4 = $this->security->xss_clean($this->input->post('cust_phone4'));
            $lan_phone = $this->security->xss_clean($this->input->post('lan_phone'));
            $cust_email = $this->security->xss_clean($this->input->post('cust_email'));
            $cust_status = $this->security->xss_clean($this->input->post('cust_status'));
            $has_email_phone = $this->security->xss_clean($this->input->post('has_email_phone'));
            $from_dob_month = $this->security->xss_clean($this->input->post('from_dob_month'));
            $from_dob_day = $this->security->xss_clean($this->input->post('from_dob_day'));
            if(!empty($from_dob_month) and !empty($from_dob_day)){
                $from_dob_month_day = $from_dob_month."-".$from_dob_day;
            }else{
                $from_dob_month_day = "";
            }
            $to_dob_month = $this->security->xss_clean($this->input->post('to_dob_month'));
            $to_dob_day = $this->security->xss_clean($this->input->post('to_dob_day'));
            if(!empty($to_dob_month) and !empty($to_dob_day)){
                $to_dob_month_day = $to_dob_month."-".$to_dob_day;
            }else{
                $to_dob_month_day = "";
            }
            
            $sql_where .= "cust_id != ''";
            
            if (!empty($cust_category)) {
                $sql_where .= " and cust_category = '$cust_category'";
            }
            if (!empty($cust_name)) {
                $sql_where .= " and cust_name like '%$cust_name%'";
            }
            if (!empty($cust_designation)) {
                $sql_where .= " and cust_designation = '$cust_designation'";
            }
            if (!empty($cust_phone)) {
                $sql_where .= " and cust_phone = '$cust_phone'";
            }
            if (!empty($cust_phone2)) {
                $sql_where .= " and cust_phone2 = '$cust_phone2'";
            }
            if (!empty($cust_phone3)) {
                $sql_where .= " and cust_phone3 = '$cust_phone3'";
            }
            if (!empty($cust_phone4)) {
                $sql_where .= " and cust_phone4 = '$cust_phone4'";
            }
             if (!empty($lan_phone)) {
                $sql_where .= " and lan_phone = '$lan_phone'";
            }
            if (!empty($cust_email)) {
                $sql_where .= " and cust_email = '$cust_email'";
            }
            if (!empty($cust_status)) {
                $sql_where .= " and cust_status = '$cust_status'";
            }
            if (!empty($has_email_phone)) {
                if($has_email_phone == "E"){
                    $sql_where .= " and cust_email != ''";
                }elseif($has_email_phone == "P"){
                    $sql_where .= " and cust_phone != ''";
                }
            }
            if(!empty($from_dob_month_day) and !empty($to_dob_month_day)){
                $sql_where .= " and MID(`date_of_birth`,6,5) BETWEEN '$from_dob_month_day' AND '$to_dob_month_day'";
            }
            
            $this->session->unset_userdata('sql_where_session');
            $this->session->set_userdata('sql_where_session',$sql_where);
            
        }else{
            $sql_where = $this->session->userdata('sql_where_session');            
        }
        
        if($sql_where != "") {
			$this->db->where($sql_where);
        }
        
        $query = $this->db->select('cust_category');
        $query = $this->db->get('cust_info');

        return $query->num_rows();
    }
    
    function get_records($limit = 20,$row = 0) {
        $result = '';
//        $read_db = $this->load->database('read', TRUE); /* database conection for read operation */
        $sql_where = "";
        $cust_category="";
        $cust_name="";
        $cust_designation="";
        $cust_phone="";
        $cust_phone2="";
        $cust_phone3="";
        $cust_phone4="";
        $lan_phone="";
        $cust_email="";
        $cust_status="";
        $has_email_phone = "";
        
         //print_r($_POST);

        if ($this->input->server('REQUEST_METHOD') === 'POST'){
            $cust_category = $this->security->xss_clean($this->input->post('cust_category'));
            $cust_name = $this->security->xss_clean($this->input->post('cust_name'));
            $cust_designation = $this->security->xss_clean($this->input->post('cust_designation'));
            $cust_phone = $this->security->xss_clean($this->input->post('cust_phone'));
            $cust_phone2 = $this->security->xss_clean($this->input->post('cust_phone2'));
            $cust_phone3 = $this->security->xss_clean($this->input->post('cust_phone3'));
            $cust_phone4 = $this->security->xss_clean($this->input->post('cust_phone4'));
            $lan_phone = $this->security->xss_clean($this->input->post('lan_phone'));
            $cust_email = $this->security->xss_clean($this->input->post('cust_email'));
            $working_place = $this->security->xss_clean($this->input->post('working_place'));
            $cust_status = $this->security->xss_clean($this->input->post('cust_status'));
            $has_email_phone = $this->security->xss_clean($this->input->post('has_email_phone'));
            $from_dob_month = $this->security->xss_clean($this->input->post('from_dob_month'));
            $from_dob_day = $this->security->xss_clean($this->input->post('from_dob_day'));
            if(!empty($from_dob_month) and !empty($from_dob_day)){
                $from_dob_month_day = $from_dob_month."-".$from_dob_day;
            }else{
                $from_dob_month_day = "";
            }
            $to_dob_month = $this->security->xss_clean($this->input->post('to_dob_month'));
            $to_dob_day = $this->security->xss_clean($this->input->post('to_dob_day'));
            if(!empty($to_dob_month) and !empty($to_dob_day)){
                $to_dob_month_day = $to_dob_month."-".$to_dob_day;
            }else{
                $to_dob_month_day = "";
            }
            
            $sql_where .= "cust_id != ''";
            
            if (!empty($cust_category)) {
                $sql_where .= " and cust_category = '$cust_category'";
            }
            if (!empty($cust_name)) {
                $sql_where .= " and cust_name like '%$cust_name%'";
            }
            if (!empty($cust_designation)) {
                $sql_where .= " and cust_designation = '$cust_designation'";
            }
            if (!empty($cust_phone)) {
                $sql_where .= " and cust_phone = '$cust_phone'";
            }
            if (!empty($cust_phone2)) {
                $sql_where .= " and cust_phone2 = '$cust_phone2'";
            }
            if (!empty($cust_phone3)) {
                $sql_where .= " and cust_phone3 = '$cust_phone3'";
            }
            if (!empty($cust_phone4)) {
                $sql_where .= " and cust_phone4 = '$cust_phone4'";
            }
             if (!empty($lan_phone)) {
                $sql_where .= " and lan_phone = '$lan_phone'";
            }
             if (!empty($cust_email)) {
                $sql_where .= " and cust_email = '$cust_email'";
            }
             if (!empty($working_place)) {
                $sql_where .= " and working_place LIKE '%$working_place%'";
            }
            if ($cust_status == "1" or $cust_status == "0") {    
                $sql_where .= " and cust_status = '$cust_status'";
            }
            if (!empty($has_email_phone)) {
                if($has_email_phone == "E"){
                    $sql_where .= " and cust_email != ''";
                }elseif($has_email_phone == "P"){
                    $sql_where .= " and cust_phone != ''";
                }
            }
            if(!empty($from_dob_month_day) and !empty($to_dob_month_day)){
                $sql_where .= " and MID(`date_of_birth`,6,5) BETWEEN '$from_dob_month_day' AND '$to_dob_month_day'";
            }


            // $this->session->unset_userdata('sql_where_session');
            // $this->session->set_userdata('sql_where_session',$sql_where);
        }else{
            $sql_where = $this->session->userdata('sql_where_session');            
        }
        if($sql_where != "") {
			$this->db->where($sql_where);
        }
        $query = $this->db->order_by("cust_id", 'DESC');
        $query = $this->db->get('cust_info', $limit, $row);
        //echo $read_db->last_query();exit();
        if ( $query->num_rows() > 0 ) {
            $result = $query->result();                
        } 
        return $result;         
    }

 }
