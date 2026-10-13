<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mod_customer
 *
 * @author iPLUS DATA
 */
class Mod_pdf extends CI_Model {
 
    public function __construct() {
        parent::__construct();

    }

    function InvoiceList($customer_type,$month,$year,$limit) {

//        $read_db = $this->load->database('read', TRUE); /* database conection for read operation */
        
        $this->db->where('status', 'active');
        $this->db->where('customer_type', $customer_type);
        $this->db->where('pdf', 0);
        $this->db->where('receive', 0);
        $this->db->where('invoice_month', $month);
        $this->db->where('invoice_year', $year);
        $this->db->order_by("id", 'DESC');
        $query = $this->db->get('invoice', $limit);
        return $query->result();
    }
    
    function InvoiceListTotal($customer_type,$month,$year) {

//        $read_db = $this->load->database('read', TRUE); /* database conection for read operation */
        
        $this->db->where('status', 'active');
        $this->db->where('customer_type', $customer_type);
        $this->db->where('pdf', 0);
        $this->db->where('receive', 0);
        $this->db->where('invoice_month', $month);
        $this->db->where('invoice_year', $year);
        $this->db->order_by("id", 'DESC');
        $query = $this->db->get('invoice');
        return $query->num_rows();
    }
    
    function UpdateFlag($list) {
//        $read_db = $this->load->database('read', TRUE);
        foreach($list as $rec) {

			$this->db->update('invoice', array('pdf'=>1), array('id'=>$rec->id));
        }
        return true;
    }

    function reset($month,$year) {
//        $read_db = $this->load->database('read', TRUE);

		$this->db->update('invoice', array('pdf'=>0), array('status'=>'active','customer_type'=>'internet','invoice_month'=>$month,'invoice_year'=>$year));
        
        return $this->db->affected_rows();
    }
}
