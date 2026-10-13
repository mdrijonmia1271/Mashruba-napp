<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of birthday_sendsms
 * @author iPLUS DATA
 * Date : 27-DEC-2016
 */
class Birthday_sendsms extends CI_Controller{
    
    private $data = [];
    var $username = '';
    var $pass = '';
    var $sms_text = '';
    var $sender = '';
        
    public function __construct() {
        parent::__construct();
               
        $this->data['module_name']= "Birth Day Send SMS";
             
        $this->load->model('Mod_birthday_sendsms');
        
        $this->username = urlencode('mashruba');
        $this->pass = urlencode('HPCY623N');
        $this->sender = urlencode('MashrubamtBrand'); 
    }
    

    function index(){
        set_time_limit(0);
        //$write_db = $this->load->database('write', TRUE); /* database conection for write operation */
        $birthday_greeting_images_url = "https://goo.gl/0G3B7u";
        $sms_text_to_send = 'Happy Birthday, Wish you a wonderful year of happiness and success! '.$birthday_greeting_images_url.' MASHRUBA Medical Technologies. Phone: +88-01730798598, Email: info@mashruba.com, Web: www.mashruba.com';
        //exit();
       // $this->sms_text =  urlencode($sms_text_to_send);
        $this->sms_text =  $sms_text_to_send;
        $res = $this->Mod_birthday_sendsms->get_daily_birthday_list();
        // echo '<pre>';
        // print_r(    $res);
        // print_r("echo");
        // exit;
        
        if(!empty($res)){
            foreach ($res as $key => $value) {
//                print_r($value->cust_phone);exit();
                $data_arry = array(
                    'phone' => $value->cust_phone,
                    'text' => $this->sms_text,
                    'send_date_time' => date('Y-m-d H:i:s'),
                    'status' => 1,
                );

                $res = $this->db->insert('send_sms', $data_arry);

                if(!empty($value->cust_phone)){
                    $my_mobile = "88".$value->cust_phone;

//                     $ref = "username={$this->username}&password={$this->pass}&number={$my_mobile}&senderid=MASHRUBA.MT&message={$this->sms_text}";
// //                    $ref = "username={$this->username}&password={$this->pass}&number=8801824021261&senderid=MASHRUBA.MT&message={$this->sms_text}";
//                     $url = 'http://66.45.237.70/maskingapi.php?'.$ref;
//                     $curl = curl_init();
//                     curl_setopt($curl, CURLOPT_URL, $url);
//                     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//                     curl_setopt($curl, CURLOPT_HEADER, false);
//                     $data = curl_exec($curl);
//                     curl_close($curl);
                    
                    
                    
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
                                    "message" => $this->sms_text
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

                    

                }
            }
        }
        
    }

}