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
class Noti_sendmail extends CI_Controller{
    private $record_per_page = 20;
    private $record_num_links = 5;
    private $data = array();

    public function __construct() {
        parent::__construct();

		$this->load->helper('url');
               
        $this->data['module_name']= "Send Mail";
             
        $this->load->model('Mod_noti_sendmail');
        $this->load->model('Mod_common');
        $this->load->library('form_validation'); /* load validation library*/
        $this->load->library('pagination');/*  load pagination library */ 
        $this->load->library('common_lib');/*  load pagination library */
        
        $this->data['category_type'] = $this->Mod_common->get_category_array();
        $this->data['customer_array'] = $this->Mod_common->get_customer_array();
        
        $this->data['status_array'] = $this->common_lib->get_status_array(); /* get no_of_connection  as array */
    }

//    function test_email(){
//        $from = "info@mashruba.com";
//        $subject = "Test Email";
//        $to = "shihab.bigm@gmail.com";
//        $body = "<strong>Test Mail Body</strong>";
//
//        $this->Mod_noti_sendmail->send_sendgrid_email($from,$subject,$to,$body);
//    }
    
    function index(){
        $this->load->view('noti_sendmail/view_create_noti_sendmail',$this->data);      
    }
    
    function save(){        
         $res_flag = $this->Mod_noti_sendmail->save_data();
        
        if(!empty($res_flag)){
            $this->session->set_flashdata('flashOK', 'Email has been send successfully');
        }else{
            $this->session->set_flashdata('flashError', 'Failed to send Email');
        }
    
        redirect('noti_sendmail');
    }
       
     function records(){        
        $row = 0;
        $temp_record_postion = $this->uri->segment(3);
        
        if(!empty ($temp_record_postion)){
            $row = $temp_record_postion;
        }else{
            $this->session->unset_userdata('sql_where_session');
        }
        
        $config['base_url'] = base_url().'noti_sendmail/paging';        
        $config['total_rows'] = $this->Mod_noti_sendmail->count_records();
        $config['per_page'] =  $this->record_per_page;
        $config['num_links'] = $this->record_num_links;
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        $this->pagination->initialize($config);
        
        $this->data['record_pos'] = $row;    
        $this->data['total_rows'] = $this->Mod_noti_sendmail->count_records();
        $this->data['links']=$this->pagination->create_links();  
          
        $this->data['rec'] = $this->Mod_noti_sendmail->get_records($this->record_per_page,$row);
        $this->load->view('noti_sendmail/view_noti_sendmail_list',$this->data);
    }
    
   function paging() {
        $row = 0;
        $temp_record_postion = $this->uri->segment(3);
        
        if(!empty ($temp_record_postion)){
            $row = $temp_record_postion;
        }
        
        $config['base_url'] = base_url().'noti_sendmail/paging';        
        $config['total_rows'] = $this->Mod_noti_sendmail->count_records();
        $config['per_page'] =  $this->record_per_page;
        $config['num_links'] = $this->record_num_links;
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        $this->pagination->initialize($config);
        
        $this->data['record_pos'] = $row;
        $this->data['total_rows'] = $this->Mod_noti_sendmail->count_records();
        $this->data['links']=$this->pagination->create_links();  
          
        $this->data['rec'] = $this->Mod_noti_sendmail->get_records($this->record_per_page,$row);
        $this->load->view('noti_sendmail/view_noti_sendmail_list',$this->data);
    }

    function email_report(){
		$year = $this->security->xss_clean($this->input->post('email_year'));
    	if(empty($year)){
			$year = date('Y');
		}
//    	echo $year;exit();

		$this->data['search_year'] = $year;
		$this->data['emails'] = $this->Mod_noti_sendmail->get_month_wise_count($year);

		$this->data['years'] = range(date('Y'), 2016);
		$this->load->view('noti_sendmail/view_email_report', $this->data);
	}
    
    
}
