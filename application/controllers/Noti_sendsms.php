<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Customer
 * @author iPLUS DATA
 * Date : 02-March-2014
 */
class Noti_sendsms extends CI_Controller{
    private $record_per_page = 20;
    private $record_num_links = 5;

    public function __construct() {
        parent::__construct();

		$this->load->helper('url');
               
        $this->data['module_name']= "Send SMS";
             
        $this->load->model('Mod_noti_sendsms');
        $this->load->model('Mod_common');
        $this->load->library('form_validation'); /* load validation library*/
        $this->load->library('pagination');/*  load pagination library */ 
        $this->load->library('common_lib');/*  load pagination library */ 
        
        $this->data['category_type'] = $this->Mod_common->get_category_array_sms();
        $this->data['customer_array'] = $this->Mod_common->get_customer_array_sms();
        
        $this->data['status_array'] = $this->common_lib->get_status_array(); /* get no_of_connection  as array */
    }
    

    function index(){
        $this->load->view('noti_sendsms/view_create_noti_sendsms',$this->data);      
    }
    


    function save(){  

        $res_flag = $this->Mod_noti_sendsms->save_data();      
        
        if(!empty($res_flag)){
            $this->session->set_flashdata('flashOK', 'SMS has been send successfully');
        }else{
            $this->session->set_flashdata('flashError', 'Failed to send SMS');
        }
    
        redirect('noti_sendsms');
    }
    
    function test_purpose(){
         $res_flag = $this->Mod_noti_sendsms->test_only();  
         
         
    }
      function test_purpose_now(){
         $res_flag = $this->Mod_noti_sendsms->test_only_now();  
         
         
    }

    function records(){        
        $row = 0;
        $temp_record_postion = $this->uri->segment(3);
        
        if(!empty ($temp_record_postion)){
            $row = $temp_record_postion;
        }else{
            $this->session->unset_userdata('sql_where_session');
        }
        
        $config['base_url'] = base_url().'noti_sendsms/paging';        
        $config['total_rows'] = $this->Mod_noti_sendsms->count_records();
        $config['per_page'] =  $this->record_per_page;
        $config['num_links'] = $this->record_num_links;
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        $this->pagination->initialize($config);
        
        $this->data['record_pos'] = $row;    
        $this->data['total_rows'] = $this->Mod_noti_sendsms->count_records();
        $this->data['links']=$this->pagination->create_links();  
          
        $this->data['rec'] = $this->Mod_noti_sendsms->get_records($this->record_per_page,$row);
        $this->load->view('noti_sendsms/view_noti_sendsms_list',$this->data);
    }
    function paging() {
        $row = 0;
        $temp_record_postion = $this->uri->segment(3);
        
        if(!empty ($temp_record_postion)){
            $row = $temp_record_postion;
        }
        
        $config['base_url'] = base_url().'noti_sendsms/paging';        
        $config['total_rows'] = $this->Mod_noti_sendsms->count_records();
        $config['per_page'] =  $this->record_per_page;
        $config['num_links'] = $this->record_num_links;
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        $this->pagination->initialize($config);
        
        $this->data['record_pos'] = $row;
        $this->data['total_rows'] = $this->Mod_noti_sendsms->count_records();
        $this->data['links']=$this->pagination->create_links();  
          
        $this->data['rec'] = $this->Mod_noti_sendsms->get_records($this->record_per_page,$row);
        $this->load->view('noti_sendsms/view_noti_sendsms_list',$this->data);
    }
    function view(){
        $auto_id =  $this->uri->segment(3);
        $get_details =  $this->Mod_noti_sendsms->get_details($auto_id);
        
        $this->data['res'] = $get_details;
        $this->load->view('customer/view_details_customer',$this->data);  
    }

	function sms_report(){
		$year = $this->security->xss_clean($this->input->post('sms_year'));
		if(empty($year)){
			$year = date('Y');
		}
//    	echo $year;exit();

		$this->data['search_year'] = $year;
		$this->data['month_sms'] = $this->Mod_noti_sendsms->get_month_wise_sms_count($year);

		$this->data['years'] = range(date('Y'), 2016);
		$this->load->view('noti_sendmail/view_sms_report', $this->data);
	}

}
   
   
