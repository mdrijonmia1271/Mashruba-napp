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
class Category extends CI_Controller{
    
    private $record_per_page = 20;
    private $record_num_links = 5;
//    private $data[] = '';
         
    public function __construct() {
        parent::__construct();

		$this->load->helper('url');
        $this->data['module_name']= "Category Information";
             
        $this->load->model('Mod_category');
        $this->load->model('Mod_common');
        $this->load->library('form_validation'); /* load validation library*/
        $this->load->library('pagination');/*  load pagination library */ 
        $this->load->library('common_lib');/*  load pagination library */ 
        $this->data['status_type'] = $this->common_lib->category_type_array();
        $this->data['category_type'] = $this->Mod_common->get_category_array();
        }


    
    function index(){
            //$department_id= $this->uri->segment(2);
    //echo $department_id;
//		echo '<pre>';
//		print_r($this->data['status_type']);
//		exit;
        $this->load->view('category/view_create_category',$this->data);
            
    }


    function add_category(){
        $data['title']="Add Category";
        $this->load->view('category/view_create_category',$this->data);
    }
    function save(){        
        
        $this->form_validation->set_rules('name','status','required');
        
        if ($this->form_validation->run() == FALSE){
            $this->load->view('category/view_create_category',$this->data);
        }else{
            $res_flag = $this->Mod_category->save_data();
            
            if(!empty($res_flag)){
                $this->session->set_flashdata('flashOK', 'Category type created successfully');
            }else{
                $this->session->set_flashdata('flashError', 'Failed to create category type');
            }
            redirect('category/category_list');                 
        } 
        
    }
      /* function category_list(){
         $get_category_list = $this->Mod_category->get_category_list();
         $this->data['rec'] = $get_category_list;
         $this->load->view('category/view_content',$this->data);  
    }*/
    
    function category_list(){        
        $row = 0;
        $temp_record_postion = $this->uri->segment(3);
        
        if(!empty ($temp_record_postion)){
            $row = $temp_record_postion;
        }else{
            $this->session->unset_userdata('sql_where_session');
        }
        
        $config['base_url'] = base_url().'category/paging';        
        $config['total_rows'] = $this->Mod_category->count_records();
        $config['per_page'] =  $this->record_per_page;
        $config['num_links'] = $this->record_num_links;
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        $this->pagination->initialize($config);
        
        $this->data['record_pos'] = $row;    
        $this->data['total_rows'] = $this->Mod_category->count_records();
        $this->data['links']=$this->pagination->create_links();  
          
        $this->data['rec'] = $this->Mod_category->get_records($this->record_per_page,$row);
        $this->load->view('category/view_content',$this->data);
    }
    
    function paging() {
        $row = 0;
        $temp_record_postion = $this->uri->segment(3);
        
        if(!empty ($temp_record_postion)){
            $row = $temp_record_postion;
        }
        
        $config['base_url'] = base_url().'category/paging';        
        $config['total_rows'] = $this->Mod_category->count_records();
        $config['per_page'] =  $this->record_per_page;
        $config['num_links'] = $this->record_num_links;
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        $this->pagination->initialize($config);
        
        $this->data['record_pos'] = $row;
        $this->data['total_rows'] = $this->Mod_category->count_records();
        $this->data['links']=$this->pagination->create_links();  
          
        $this->data['rec'] = $this->Mod_category->get_records($this->record_per_page,$row);
        $this->load->view('category/view_content',$this->data);
    }
    
    

    function edit() {
        $auto_id =  $this->uri->segment(3);
        $get_details =  $this->Mod_category->get_details($auto_id);
        
        $this->data['res'] = $get_details;
        $this->load->view('category/view_edit_category',$this->data);      
    }

 function update(){
        $this->form_validation->set_rules('name','status','required');
        
        if ($this->form_validation->run() == FALSE){
            $this->load->view('category/view_edit_category',$this->data);
        }else{
            $res_flag = $this->Mod_category->update_data();
            if(!empty($res_flag)){
                $this->session->set_flashdata('flashOK', 'Diagnosis updated successfully');
            }else{
                $this->session->set_flashdata('flashError', 'Failed to update diagnosis');
            }
            redirect('category/category_list');                   
        }      
    }
}
