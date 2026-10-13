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
class Designation extends CI_Controller{
    
    private $record_per_page = 20;
    private $record_num_links = 5;

    public function __construct() {
        parent::__construct();

		$this->load->helper('url');
        $this->data['module_name']= "Designation Information";
             
        $this->load->model('Mod_designation');
        $this->load->model('Mod_common');
        $this->load->library('form_validation'); /* load validation library*/
        $this->load->library('pagination');/*  load pagination library */ 
        $this->load->library('common_lib');/*  load pagination library */ 
        $this->data['designation_type'] = $this->common_lib->designation_type_array();
        }


    
    function index(){
         
        $this->load->view('designation/view_create_designation',$this->data);
            
    }
    function add_designation(){
        $data['title']="Add Designation Type";   
        $this->load->view('designation/view_create_designation',$this->data);
    }


    function save(){        
        $this->form_validation->set_rules('name','status','required');
        
        if ($this->form_validation->run() == FALSE){
            $this->load->view('designation/view_create_designation',$this->data);
        }else{
            $res_flag = $this->Mod_designation->save_data();
            
            if(!empty($res_flag)){
                $this->session->set_flashdata('flashOK', 'Category type created successfully');
            }else{
                $this->session->set_flashdata('flashError', 'Failed to create category type');
            }
            redirect('designation/designation_list');                 
        } 
        
    }
      /* function designation_list(){
         $get_designation_list = $this->Mod_designation->get_designation_list();
         $this->data['rec'] = $get_designation_list;
         $this->load->view('designation/view_designation_list',$this->data);  
    }*/
    
    
    function designation_list(){        
        $row = 0;
        $temp_record_postion = $this->uri->segment(3);
        
        if(!empty ($temp_record_postion)){
            $row = $temp_record_postion;
        }else{
            $this->session->unset_userdata('sql_where_session');
        }
        
        $config['base_url'] = base_url().'designation/paging';        
        $config['total_rows'] = $this->Mod_designation->count_records();
        $config['per_page'] =  $this->record_per_page;
        $config['num_links'] = $this->record_num_links;
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        $this->pagination->initialize($config);
        
        $this->data['record_pos'] = $row;    
        $this->data['total_rows'] = $this->Mod_designation->count_records();
        $this->data['links']=$this->pagination->create_links();  
          
        $this->data['rec'] = $this->Mod_designation->get_records($this->record_per_page,$row);
        $this->load->view('designation/view_designation_list',$this->data);
    }
    
   function paging() {
        $row = 0;
        $temp_record_postion = $this->uri->segment(3);
        
        if(!empty ($temp_record_postion)){
            $row = $temp_record_postion;
        }
        
        $config['base_url'] = base_url().'designation/paging';        
        $config['total_rows'] = $this->Mod_designation->count_records();
        $config['per_page'] =  $this->record_per_page;
        $config['num_links'] = $this->record_num_links;
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        $this->pagination->initialize($config);
        
        $this->data['record_pos'] = $row;
        $this->data['total_rows'] = $this->Mod_designation->count_records();
        $this->data['links']=$this->pagination->create_links();  
          
        $this->data['rec'] = $this->Mod_designation->get_records($this->record_per_page,$row);
        $this->load->view('designation/view_designation_list',$this->data);
    }
    
    
    
    

    function edit() {
        $auto_id =  $this->uri->segment(3);
        $get_details =  $this->Mod_designation->get_details($auto_id);
        
        $this->data['res'] = $get_details;
        $this->load->view('designation/view_edit_designation',$this->data);      
    }

    function update(){
        $this->form_validation->set_rules('name','status','required');
        
        if ($this->form_validation->run() == FALSE){
            $this->load->view('designation/view_edit_designation',$this->data);
        }else{
            $res_flag = $this->Mod_designation->update_data();
            if(!empty($res_flag)){
                $this->session->set_flashdata('flashOK', 'Diagnosis updated successfully');
            }else{
                $this->session->set_flashdata('flashError', 'Failed to update diagnosis');
            }
            redirect('designation/designation_list');                   
        }      
    }
    


 }
