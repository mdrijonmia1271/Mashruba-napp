<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dc
 *
 * @author Big M Resources Ltd
 */
class User extends CI_Controller{
    
    private $record_per_page = 20;
    private $record_num_links = 5;
    private $data = array();

    public function __construct() {
        parent::__construct();

		$this->load->helper('url');
             
        $this->data['module_name']= "User Information";
             
        $this->load->model('Mod_user');
        $this->load->model('Mod_common');
        $this->load->library('form_validation'); /* load validation library*/
        $this->load->library('pagination');/*  load pagination library */ 
        $this->load->library('common_lib');/*  load pagination library */ 
        
        $this->data['status_array'] = $this->common_lib->get_status_array();
    }


    
    function index(){
         
        $this->load->view('user/view_create_user',$this->data);
            
    }
    
    function add_user(){
        $data['title']="Add User Type";   
        $this->load->view('user/view_create_user',$this->data);
    }

    function save(){        
        $this->form_validation->set_rules('username','User Name','required');
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('status','Status','required');
        
        if ($this->form_validation->run() == FALSE){
            $this->load->view('user/view_create_user',$this->data);
        }else{
            $res_flag = $this->Mod_user->save_data();
            
            if(!empty($res_flag)){
                $this->session->set_flashdata('flashOK', 'User information created successfully');
            }else{
                $this->session->set_flashdata('flashError', 'Failed to save data');
            }
            redirect('user/user_list');                 
        } 
        
    }

    function user_list(){        
        $row = 0;
        $temp_record_postion = $this->uri->segment(3);
        
        if(!empty ($temp_record_postion)){
            $row = $temp_record_postion;
        }else{
            $this->session->unset_userdata('sql_where_session');
        }
        
        $config['base_url'] = base_url().'user/paging';        
        $config['total_rows'] = $this->Mod_user->count_records();
        $config['per_page'] =  $this->record_per_page;
        $config['num_links'] = $this->record_num_links;
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        $this->pagination->initialize($config);
        
        $this->data['record_pos'] = $row;    
        $this->data['total_rows'] = $this->Mod_user->count_records();
        $this->data['links']=$this->pagination->create_links();  
          
        $this->data['rec'] = $this->Mod_user->get_records($this->record_per_page,$row);
        $this->load->view('user/view_user_list',$this->data);
    }
    
   function paging() {
        $row = 0;
        $temp_record_postion = $this->uri->segment(3);
        
        if(!empty ($temp_record_postion)){
            $row = $temp_record_postion;
        }
        
        $config['base_url'] = base_url().'user/paging';        
        $config['total_rows'] = $this->Mod_user->count_records();
        $config['per_page'] =  $this->record_per_page;
        $config['num_links'] = $this->record_num_links;
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        $this->pagination->initialize($config);
        
        $this->data['record_pos'] = $row;
        $this->data['total_rows'] = $this->Mod_user->count_records();
        $this->data['links']=$this->pagination->create_links();  
          
        $this->data['rec'] = $this->Mod_user->get_records($this->record_per_page,$row);
        $this->load->view('user/view_user_list',$this->data);
    }
    function edit() {
        $auto_id =  $this->uri->segment(3);
        $get_details =  $this->Mod_user->get_details($auto_id);
        
        $this->data['res'] = $get_details;
        $this->load->view('user/view_edit_user',$this->data);      
    }

    function update(){
        $this->form_validation->set_rules('username','User Name','required');
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('status','Status','required');
        
        if ($this->form_validation->run() == FALSE){
            $this->load->view('user/view_edit_user',$this->data);
        }else{
            $res_flag = $this->Mod_user->update_data();
            if(!empty($res_flag)){
                $this->session->set_flashdata('flashOK', 'User information updated successfully');
            }else{
                $this->session->set_flashdata('flashError', 'Failed to update data');
            }
            redirect('user/user_list');                   
        }      
    }
    


 }
