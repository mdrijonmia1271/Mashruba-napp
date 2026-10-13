<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mod_common
 *
 * @author iPLUS DATA
 */
class Mod_common extends CI_Model {

    public function __construct() {
        parent::__construct();

    }
	
    
    function get_customer_array(){
//        $read_db = $this->load->database('read', TRUE); /* database conection for read operation */
        $data_arry = array();
        //$query = $read_db->select('cust_id,cust_email,cust_name');
        //$query = $read_db->where('cust_status',1);
        //$query = $read_db->order_by('cust_name','ASC');
        //$query = $read_db->get('cust_info');
        $sql = "select cust_id,cust_email,cust_name from cust_info where cust_status = 1 and cust_email != '' order by cust_name ASC";
        $query = $this->db->query($sql);
        //$data_arry[''] = 'Select';
        if($query->num_rows() > 0){
            $res = $query->result();
            foreach ($res as $item) {
                $data_arry[$item->cust_email] = $item->cust_name." ( ".$item->cust_email." )";
            }
         }

         return $data_arry;
    }

    function get_category_array(){
//        $read_db = $this->load->database('read', TRUE); /* database conection for read operation */
        $data_arry = array('' => 'Select');
        $query = $this->db->select('id,name');
        $query = $this->db->where('status',1);
        $query = $this->db->order_by('name','ASC');
        $query = $this->db->get('category');
        if($query->num_rows() > 0){
            $res = $query->result();
            foreach ($res as $item) {
                $data_arry[$item->id] = $item->name;
            }
         }

         return $data_arry;
    }


    function get_designation_array(){
//        $read_db = $this->load->database('read', TRUE); /* database conection for read operation */
		$data_arry = array('' => 'Select');
        $query = $this->db->select('id,name');
        $query = $this->db->where('status',1);
        $query = $this->db->order_by('name','ASC');
        $query = $this->db->get('designation');
        if($query->num_rows() > 0){
            $res = $query->result();
            foreach ($res as $item) {
                $data_arry[$item->id] = $item->name;
            }
         }

         return $data_arry;
    }
    function get_customer_array_sms(){
//        $read_db = $this->load->database('read', TRUE); /* database conection for read operation */
        $data_arry = '';
        //$query = $read_db->select('cust_id,cust_phone,cust_name');
        //$query = $read_db->where('cust_status',1);
        //$query = $read_db->order_by('cust_phone','ASC');
        //$query = $read_db->get('cust_info');
        $sql = "select cust_id,cust_phone,cust_name from cust_info where cust_status = 1 and cust_phone != '' order by cust_name ASC";
        $query = $this->db->query($sql);
        //$data_arry[''] = 'Select';
		$data_arry = array();
        if($query->num_rows() > 0){
            $res = $query->result();
            foreach ($res as $item) {
                $data_arry[$item->cust_phone] = $item->cust_name." ( ".$item->cust_phone." )";;
            }
         }

         return $data_arry;
    }

    function get_category_array_sms(){
//        $read_db = $this->load->database('read', TRUE); /* database conection for read operation */
        $data_arry = array();
        $query = $this->db->select('id,name');
        $query = $this->db->where('status',1);
        $query = $this->db->order_by('name','ASC');
        $query = $this->db->get('category');
        //$data_arry[''] = '';
        if($query->num_rows() > 0){
            $res = $query->result();
            foreach ($res as $item) {
                $data_arry[$item->id] = $item->name;
            }
         }

         return $data_arry;
    }


    function get_designation_array_sms(){
//        $read_db = $this->load->database('read', TRUE); /* database conection for read operation */
        $data_arry = '';
        $query = $this->db->select('id,name');
        $query = $this->db->where('status',1);
        $query = $this->db->order_by('name','ASC');
        $query = $this->db->get('designation');
        // $data_arry[''] = '';
        if($query->num_rows() > 0){
            $res = $query->result();
            foreach ($res as $item) {
                $data_arry[$item->id] = $item->name;
            }
         }

         return $data_arry;
    }

    function get_customer_list_by_category_id($category_type){
//        $read_db = $this->load->database('read', TRUE); /* database conection for read operation */
        $res = '';
        $query = $this->db->select('cust_id,cust_name,cust_phone');
        $query = $this->db->where('cust_category',$category_type);
        $query = $this->db->where('cust_status',1);
        $query = $this->db->order_by('cust_name','ASC');
        $query = $this->db->get('cust_info');
        if($query->num_rows() > 0){
            $res = $query->result();
         }

         return $res;

    }

    function get_customer_list_by_category_id_mail($category_type){
//        $read_db = $this->load->database('read', TRUE); /* database conection for read operation */
        $res = '';
        $query = $this->db->select('cust_id,cust_name,cust_email');
        $query = $this->db->where('cust_category',$category_type);
        $query = $this->db->where('cust_email !=','');
        $query = $this->db->where('cust_status',1);
        $query = $this->db->order_by('cust_name','ASC');
        $query = $this->db->get('cust_info');
        if($query->num_rows() > 0){
            $res = $query->result();
         }

         return $res;

    }
    
}//end class
