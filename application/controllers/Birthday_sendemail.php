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
class Birthday_sendemail extends CI_Controller{
    
    private $data = '';
       
    public function __construct() {
        parent::__construct();
               
        $this->data['module_name']= "Birth Day Send Email";
             
        $this->load->model('Mod_birthday_sendemail');
        $this->load->model('Mod_noti_sendmail');

    }
    

    function index(){
        
        set_time_limit(0);
        //$write_db = $this->load->database('write', TRUE); /* database conection for write operation */
		
      /*  $this->load->library('email');
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");
		*/
		
        $mail_subject = "Happy Birthday";
        
        $birthday_greeting_images_url = "http://www.mashruba.com/napp/images/Greeting.jpg";
        $mail_text = 'Wish you a wonderful year of happiness and success! <br><br><img src="'.$birthday_greeting_images_url.'" alt="Birthday Image" width="550px"> <br><br><br>MASHRUBA Medical Technologies. <br>Phone: +88-01730798598 <br>Email: info@mashruba.com <br>Web: www.mashruba.com';
        //exit();
        $res = $this->Mod_birthday_sendemail->get_daily_birthday_list();
        // echo date('d h:i:s');
        //print_r($res);
        // exit();
		$my_send_gird_email = array();
		
       if(!empty($res)){
            
           foreach ($res as $key => $value) {
                
                if(!empty($value->cust_email)){
                    
                    $my_send_gird_email[] = $value->cust_email;
					
                 /* $this->email->clear(TRUE);
                    $this->email->from('info@mashruba.com', 'MASHRUBA Medical Technologies');
                    $this->email->to($value->cust_email);
                    $this->email->subject($mail_subject);

                    $email_body = "Happy Birthday,";
                    $email_body .= "<br><br>";

                    $email_body .= $mail_text;

                    $email_body .= "<br>";

                    $this->email->message($email_body);
                    
                    if($this->email->send()){
                        $mail_send_flag = 1;
                    }else{
                        $mail_send_flag = 0;
                    }
					*/

					$mail_send_flag = 1;
                    $data_arry = array(                                 
                        'email' => $value->cust_email,
                        'subject' => $mail_subject,
                        'text' => $mail_text,
                        'file_name' => "Greeting.jpg",
                        'send_date_time' => date('Y-m-d H:i:s'),
                        'status' => $mail_send_flag
                    );

                    $res_insert = $this->db->insert('send_mail', $data_arry);
                }
                        
            }
//           echo '<pre>';
//           print_r($my_send_gird_email);
//           exit;
			
			if( !empty($my_send_gird_email) ){
					$email_body = '';
                    $email_body .= "Happy Birthday,";
                    $email_body .= "<br><br>";

                    $email_body .= $mail_text;

                    $email_body .= "<br>";
					
					$EmailFrom = 'info@mashruba.com';
					$Fromname = 'MASHRUBA Medical Technologies';

                $this->Mod_noti_sendmail->send_sendgrid_email($EmailFrom,$mail_subject,$my_send_gird_email,$email_body,$file=null);
		
//						  $url = 'https://sendgrid.com/';
//						  $user = 'awtomal';
//						  $pass = 'ComJagat91';
//						  $json_string = array(
//											'to'            => $my_send_gird_email,
//											'fromname'      => $EmailFrom,
//											'fromname'      => $Fromname
//								);
//
//                                $params['api_user']  = $user;
//                                $params['api_key']   = $pass;
//                                $params['x-smtpapi'] = json_encode($json_string);
//                                $params['to']        = 'info@mashruba.com';
//                                $params['subject']   = $mail_subject;
//                                $params['html']      = $email_body;
//                                $params['from']      = $EmailFrom;
//                                $params['fromname']  = $Fromname;
//
//								$request =  $url.'api/mail.send.json';
//
//								  // Generate curl request
//								  $session = curl_init($request);
//								  // Tell curl to use HTTP POST
//								  curl_setopt ($session, CURLOPT_POST, true);
//								  // Tell curl that this is the body of the POST
//								  curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
//
//								  // Tell curl not to return headers, but do return the response
//								  curl_setopt($session, CURLOPT_HEADER, false);
//								  curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
//
//								  // obtain response
//								  $response = curl_exec($session);
//								  curl_close($session);
			}
        }
        
    }

}
   
   
