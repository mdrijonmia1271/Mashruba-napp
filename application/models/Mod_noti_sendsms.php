<?php


/*if( ini_get('allow_url_fopen') ) {
    die('allow_url_fopen is enabled. file_get_contents should work well');
} else {
    die('allow_url_fopen is disabled. file_get_contents would not work');
}*/

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mod_noti_sendmail
 *
 * @author iPLUS DATA
 */
class Mod_noti_sendsms extends CI_Model {
    
    var $username = '';
    var $pass = '';
    var $sms_text = '';
    var $sender = '';

    public function __construct() {
        parent::__construct();

        //$this->username = urlencode('Abdulla Al Mamun');
        //$this->pass = urlencode('abdcphav');
        //$this->sender = urlencode('MASHRUBA MT'); 
        
        //$this->username = urlencode('Mashrubamt');
        //$this->pass = urlencode('12332199');
        //$this->sender = urlencode('MashrubamtBrand');   
        
        $this->username = urlencode('mashruba');
        $this->pass = urlencode('HPCY623N');
    }

    function save_data() {
        
        // print_r($_post);
        // exit;
      
        
        set_time_limit(0);
        
        
//        $write_db = $this->load->database('write', TRUE); /* database conection for write operation */
        $current_date_time = date('Y-m-d H:i:s');
        $created_by = $this->session->userdata('admin_login_email');
        
        /*data insert by category*/
        $category_type_array = $this->security->xss_clean($this->input->post('category_type'));
        
        $sms_text_to_send = $this->security->xss_clean($this->input->post('text'));
        $this->sms_text =  urlencode($sms_text_to_send);
        
        if(!empty($category_type_array)){
            foreach($category_type_array as $cat_key => $cat_value){

                $customer_list = $this->Mod_common->get_customer_list_by_category_id($cat_value); 

                foreach($customer_list as $key => $value){

                    $data_arry = array(        
                        'phone' => $value->cust_phone,
                        'text' => $this->security->xss_clean($this->input->post('text')),
                        'send_date_time' => date('Y-m-d H:i:s'),
                        'status' => 1,
                        );

                    $res = $this->db->insert('send_sms', $data_arry);
                   
                    
                    if(!empty($value->cust_phone)) {
                        
                         //file_get_contents('http://66.45.237.70/maskingapi.php?'.$url);
                        //$url = 'username='.$this->username.'&password='.$this->pass.'&gsm='.$my_mobile.'&text='.$this->sms_text.'&sender='.$this->sender.'&unicode=1';
                        //$res = file_get_contents('http://apps.planetgroupbd.com/ords/messaging/v2/sendsms?'.$url);
                        //$url = 'http://180.234.210.62:8282/apps/messaging/sendsms?'.$ref;
                            
                            $my_mobile = "88".$value->cust_phone;
                            $ref = "username={$this->username}&password={$this->pass}&number={$my_mobile}&senderid=MASHRUBA.MT&message={$this->sms_text}";
                            $url = 'http://66.45.237.70/api.php?'.$ref;
                         
                            $curl = curl_init();
                            curl_setopt($curl, CURLOPT_URL, $url);
                            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($curl, CURLOPT_HEADER, false);
                            $data = curl_exec($curl);
                            curl_close($curl);                       
                    }
                }

            }

        }
        
        /*data insert by name*/
        $phone_array = $this->security->xss_clean($this->input->post('phone'));
        
        if(!empty($phone_array)){
            
            foreach($phone_array as $key => $value_phone){
               
              

                $data_arry = array(              
                    'phone' => $value_phone,
                    'text' => $this->security->xss_clean($this->input->post('text')),
                    'send_date_time' => date('Y-m-d H:i:s'),
                    'status' => 1,
                );
                
               

                $res = $this->db->insert('send_sms', $data_arry);
                







                    if(!empty($value_phone)){
                        
                        
                        
                        
                        
                        
                           $my_mobile = "88".$value_phone;
                       
                              
                                $url = "https://bulksmsbd.net/api/smsapi";
                                $api_key = "Q0cuWMCz1ZY9wEOYwy2w";
                                $senderid = "8809617617998";
                               // $number = "8801676338612,8801889967513";
                                $message =$this->input->post('text');
                               // $message="abc";
                             
                                $data = [
                                    "api_key" => $api_key,
                                    "senderid" => $senderid,
                                    "number" =>  $my_mobile,
                                    "message" => $message
                                ];
                                $ch = curl_init();
                                curl_setopt($ch, CURLOPT_URL, $url);
                                curl_setopt($ch, CURLOPT_POST, 1);
                                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                $response = curl_exec($ch);
                               // print_r($response);
                                curl_close($ch);
                               // return $response;
                        
                        
                        
                        
                        
                        
                 
                    } 
                    
                    
                    
                    
                    
            }
        }
        
        
        
        
        
        
        if(!empty(  $response)){
           
            return true;
        }else{
           
            return false;
        }


    }
    
    
    function test_only(){
       
    $url = "https://bulksmsbd.net/api/smsapi";
    $api_key = "Q0cuWMCz1ZY9wEOYwy2w";
    $senderid = "8809617617998";
    $number = "8801676338612,8801889967513";
    $message = "test sms check please ..a random test";
 
    $data = [
        "api_key" => $api_key,
        "senderid" => $senderid,
        "number" => $number,
        "message" => $message
    ];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
   // print_r($response);
    curl_close($ch);
    return $response;
    }
    


    function count_records(){
//       $read_db = $this->load->database('read', TRUE); /* database conection for read operation */

       $sql_where = "";
       $phone="";
       $from_date_time = "";
       $to_date_time = "";
       
       if ($this->input->server('REQUEST_METHOD') === 'POST'){

        $phone = $this->security->xss_clean($this->input->post('phone'));
        $from_date_time = $this->security->xss_clean($this->input->post('from_date_time'));
        $to_date_time = $this->security->xss_clean($this->input->post('to_date_time'));

        $sql_where .= "id != ''";

        if (!empty($phone)) {
            $sql_where .= " and phone = '$phone'";
        }
        if(!empty($from_date_time) and !empty($to_date_time)){
            $final_date_from = $from_date_time." 00:00:00";
            $final_date_to = $to_date_time." 23:59:59";
            $sql_where .= " and send_date_time BETWEEN '$final_date_from' AND '$final_date_to'";
        }
        $this->session->unset_userdata('sql_where_session');
        $this->session->set_userdata('sql_where_session',$sql_where);

    }else{
        $sql_where = $this->session->userdata('sql_where_session');            
    }

    if($sql_where != "") {
		$this->db->where($sql_where);
    }

    $query = $this->db->select('phone');
    $query = $this->db->get('send_sms');

    return $query->num_rows();
}

function get_records($limit = 20,$row = 0) {
//    $read_db = $this->load->database('read', TRUE); /* database conection for read operation */
    $sql_where = "";
    $phone="";
    $from_date_time = "";
    $to_date_time = "";

    if ($this->input->server('REQUEST_METHOD') === 'POST'){

        $phone = $this->security->xss_clean($this->input->post('phone'));
        $from_date_time = $this->security->xss_clean($this->input->post('from_date_time'));
        $to_date_time = $this->security->xss_clean($this->input->post('to_date_time'));

        $sql_where .= "id != ''";

        if (!empty($phone)) {
            $sql_where .= " and phone = '$phone'";
        }
        if(!empty($from_date_time) and !empty($to_date_time)){
            $final_date_from = $from_date_time." 00:00:00";
            $final_date_to = $to_date_time." 23:59:59";
            $sql_where .= " and send_date_time BETWEEN '$final_date_from' AND '$final_date_to'";
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
    $query = $this->db->get('send_sms', $limit, $row);

    if ( $query->num_rows() > 0 ) {
        $result = $query->result();                
    } 

    return $result;         
}

     
   function get_details($auto_id) {
//        $read_db = $this->load->database('read', TRUE); /* database conection for read operation */

        $query = $this->db->where("id",$auto_id);
        $query = $this->db->get('send_sms');

        if ($query->num_rows() > 0) {
           $record = $query->row();           
           return $record;
        }else{
            return null;
        }     
    }

	function get_month_wise_sms_count($year){
		$current_year = date('Y');

		if($year == $current_year){
			$months = date('m');
		}else{
			$months = '12';
		}

		$x = 1;
		while( $x <= $months){
			$sql_where = $this->db->query('select COUNT(id) from send_sms where YEAR(send_date_time)='.$year.' and MONTH(send_date_time)='.$x);
			$row_arr = $sql_where->row_array();
			$email_months[] = array(
				'month' => $x,
				'total_sms' => $row_arr['COUNT(id)']
			);

			$x++;
		}

		return $email_months;
	}

}
