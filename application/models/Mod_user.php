<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mod_user
 *
 * @author iPLUS DATA
 */
class Mod_user extends CI_Model {
 
    public function __construct() {
        parent::__construct();

    }

    function save_data() {
//        $write_db = $this->load->database('write', TRUE); /* database conection for write operation */
        
        $current_date_time = date('Y-m-d H:i:s');
        $created_by = $this->session->userdata('admin_login_email');
        
        $data_arry = array(              
            'username' => $this->security->xss_clean($this->input->post('username')),
            'password' => $this->security->xss_clean($this->input->post('password')),
            'status' => $this->security->xss_clean($this->input->post('status')),
            'created_by' => $created_by,
            'created_date_time' => $current_date_time,
        );

		$this->db->insert('user', $data_arry);
        $master_insert_id = $this->db->insert_id();
        
        if(!empty($master_insert_id)){
        	return $master_insert_id;
        }else{
        	return false;
        }
    }
    
    
    function get_user_list() {
//        $read_db = $this->load->database('read', TRUE); /* database conection for read operation */

        $result = "";

        $query = $this->db->order_by("id", 'DESC');
        $query = $this->db->get('user');

        if ( $query->num_rows() > 0 ) {
            $result = $query->result();                
        } 

        return $result;         
    }
    function count_records(){
//       $read_db = $this->load->database('read', TRUE); /* database conection for read operation */

       $sql_where = "";
       $name="";
       
       if ($this->input->server('REQUEST_METHOD') === 'POST'){

        $name = $this->security->xss_clean($this->input->post('username'));

        $sql_where .= "id != ''";

        if (!empty($name)) {
            $sql_where .= " and username = '$name'";
        }

        $this->session->unset_userdata('sql_where_session');
        $this->session->set_userdata('sql_where_session',$sql_where);

    }else{
        $sql_where = $this->session->userdata('sql_where_session');            
    }

    if($sql_where != "") {
        $this->db->where($sql_where);
    }

    $query = $this->db->select('id');
    $query = $this->db->get('user');

    return $query->num_rows();
}


function get_records($limit = 20,$row = 0) {
//    $read_db = $this->load->database('read', TRUE); /* database conection for read operation */
    $result = "";
    $sql_where = "";
    $name="";

    if ($this->input->server('REQUEST_METHOD') === 'POST'){

        $name = $this->security->xss_clean($this->input->post('username'));
        $sql_where .= "id != ''";

        if (!empty($name)) {
            $sql_where .= " and username = '$name'";
        }

        $this->session->unset_userdata('sql_where_session');
        $this->session->set_userdata('sql_where_session',$sql_where);
    }else{
        $sql_where = $this->session->userdata('sql_where_session');            
    }
    if($sql_where != "") {
        $this->db->where($sql_where);
    }
    $query = $this->db->order_by("id", 'DESC');
    $query = $this->db->get('user', $limit, $row);

    if ( $query->num_rows() > 0 ) {
        $result = $query->result();                
    } 

    return $result;         
}


    function get_details($auto_id) {
//        $read_db = $this->load->database('read', TRUE); /* database conection for read operation */

        $query = $this->db->where("id",$auto_id);
        $query = $this->db->get('user');

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
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        $status = $this->security->xss_clean($this->input->post('status'));

        $current_date_time = date('Y-m-d H:i:s');

        $updated_by = $this->session->userdata('admin_login_email');

        $data_arry = array(
            'username' => $username,
            'password' => $password,
            'updated_by' => $updated_by,
            'updated_date_time' => $current_date_time,
            'status' => $status,
        );
		$this->db->where('id', $auto_id);
        $res_flag = $this->db->update('user', $data_arry); /* call active record functio to save information  */
        
        if(!empty($res_flag)){
            return true;
        }else{
            return false;
        }
    }
    


 }


