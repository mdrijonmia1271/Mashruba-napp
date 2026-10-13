<?php
$username = urlencode('Abdulla Al Mamun');
$pass = urlencode('abdcphav');
$sms_text = urlencode('Hello from Big & M server');
$sender = urlencode('MASHRUBA MT');
$url = 'username='.$username.'&password='.$pass.'&gsm=8801734008903&text='.$sms_text.'&sender='.$sender.'&unicode=1';
echo $res = file_get_contents('http://180.234.210.62:8282/apps/messaging/sendsms?'.$url);
exit;
/*
$url = 'http://180.234.210.62:8282/apps/messaging/sendsms?'.$url;
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);
$data = curl_exec($curl);
curl_close($curl);

print_r($data);
echo ">>".$data;
*/