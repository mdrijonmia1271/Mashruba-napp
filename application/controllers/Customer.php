<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dc
 *
 * @author iPLUS DATA
 * Date : 17-August-2015
 */
class Customer extends CI_Controller{
    
    private $record_per_page = 20;
    private $record_num_links = 5;
    private $data = array();

    public function __construct() {
        parent::__construct();

		$this->load->helper('url');
        $this->data['module_name']= "Customer Information";
             
        $this->load->model('Mod_customer');
        $this->load->model('Mod_common');
        $this->load->library('form_validation'); /* load validation library*/
        $this->load->library('pagination');/*  load pagination library */ 
        $this->load->library('common_lib');/*  load pagination library */ 

        //$this->load->plugin('dhtmlgoodies_calendar');
        $this->data['cust_status_type'] = $this->common_lib->cust_status_type_array();
        $this->data['category_array'] = $this->Mod_common->get_category_array();
        $this->data['designation_array'] = $this->Mod_common->get_designation_array();
        $this->data['year_array'] = $this->common_lib->get_year_array();
        $this->data['month_array'] = $this->common_lib->get_month_array();
        $this->data['day_array'] = $this->common_lib->get_day_array();
        $this->data['has_email_phone_array'] = $this->common_lib->cust_has_email_phone_array();
    }
    
    function index(){

        $this->load->view('customer/view_create_customer',$this->data);
            
    }


    function add_customer(){
        $data['title']="Add Customer";
        $this->load->view('customer/view_create_customer',$this->data);
    }
    function save(){        
        
        $this->form_validation->set_rules('cust_category','Customer Category','required');
        $this->form_validation->set_rules('cust_name','Customer Name','required');
        //$this->form_validation->set_rules('cust_phone','Customer Phone','required');
        //$this->form_validation->set_rules('dob_year','DOB Year','required');
        //$this->form_validation->set_rules('dob_month','DOB Month','required');
        //$this->form_validation->set_rules('dob_day','DOB Day','required');
        $this->form_validation->set_rules('cust_status','Status','required');
        
        if ($this->form_validation->run() == FALSE){
            $this->load->view('customer/view_create_customer',$this->data);
        }else{
            $res_flag = $this->Mod_customer->save_data();
            
            if(!empty($res_flag)){
                $this->session->set_flashdata('flashOK', 'Customer created successfully');
            }else{
                $this->session->set_flashdata('flashError', 'Failed to create Customer');
            }
            redirect('customer/records');                 
        }          
    }

    function records(){        
        $row = 0;
        $temp_record_postion = $this->uri->segment(3);
        
        if(!empty ($temp_record_postion)){
            $row = $temp_record_postion;
        }else{
            $this->session->unset_userdata('sql_where_session');
        }
        
        $config['base_url'] = base_url().'customer/paging';        
        $config['total_rows'] = $this->Mod_customer->count_records();
        $config['per_page'] =  $this->record_per_page;
        $config['num_links'] = $this->record_num_links;
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        $this->pagination->initialize($config);

        $this->data['record_pos'] = $row;    
        $this->data['total_rows'] = $this->Mod_customer->count_records();
        $this->data['links']=$this->pagination->create_links();  
          
        $this->data['rec'] = $this->Mod_customer->get_records($this->record_per_page,$row);
        $this->load->view('customer/view_customer_list',$this->data);
    }
    
    function paging() {
        $row = 0;
        $temp_record_postion = $this->uri->segment(3);
        
        if(!empty ($temp_record_postion)){
            $row = $temp_record_postion;
        }
        
        $config['base_url'] = base_url().'customer/paging';        
        $config['total_rows'] = $this->Mod_customer->count_records();
        $config['per_page'] =  $this->record_per_page;
        $config['num_links'] = $this->record_num_links;
        
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        $this->pagination->initialize($config);
        
        $this->data['record_pos'] = $row;
        $this->data['total_rows'] = $this->Mod_customer->count_records();
        $this->data['links']=$this->pagination->create_links();  
          
        $this->data['rec'] = $this->Mod_customer->get_records($this->record_per_page,$row);
        $this->load->view('customer/view_customer_list',$this->data);
    }

    function edit() {
        $auto_id =  $this->uri->segment(3);
        $get_details =  $this->Mod_customer->get_details($auto_id);
        
        $this->data['res'] = $get_details;
        $this->load->view('customer/view_edit_customer',$this->data);      
    }

    function update() {

        $auto_id = $this->security->xss_clean($this->input->post('auto_id'));

        $this->form_validation->set_rules('cust_category','Customer Category','required');
        $this->form_validation->set_rules('cust_name','Customer Name','required');
        // $this->form_validation->set_rules('cust_phone1','Customer Phone1','required');
        //$this->form_validation->set_rules('dob_year','DOB Year','required');
        //$this->form_validation->set_rules('dob_month','DOB Month','required');
        //$this->form_validation->set_rules('dob_day','DOB Day','required');
        $this->form_validation->set_rules('cust_status','Status','required');

        if ($this->form_validation->run() == FALSE){
            $get_details =  $this->Mod_customer->get_details($auto_id);
        
            $this->data['res'] = $get_details;
            $this->load->view('customer/view_edit_customer',$this->data);
        }else{
            $res_flag = $this->Mod_customer->update_data();
            
            if(!empty($res_flag)){
                $this->session->set_flashdata('flashOK', 'Customer Information updated successfully.');
            }else{
                $this->session->set_flashdata('flashError', 'Failed to update information.');
            }
            redirect('customer/records');                   
        } 
         
    }

    function view(){
        $auto_id =  $this->uri->segment(3);
        $get_details =  $this->Mod_customer->get_details($auto_id);
        
        $this->data['res'] = $get_details;
        $this->load->view('customer/view_details_customer',$this->data);  
    }


    }
