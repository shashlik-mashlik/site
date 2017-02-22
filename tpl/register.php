<?
//$dgt='4232';
//$phonenumber='79214297230';
//$msg_sms='Для подтверждения регистрации введите код: '.$dgt;
//echo($msg_sms);
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Данные для отправки
$request = array(

    'messages'=>array(
        '0'=>array(
           'phone'=> $phonenumber, 
           'sender'=> 'BONVIO.net', 
           'clientId'=> '2', 
           'text'=> $msg_sms),
),

   'statusQueueName'=> 'myQueue1', 
   'login'=> 't89214295194', 
   'password'=> '175319'
);
 
// Указание опций для контекста потока
$options = array (
    'http' => array (
        'method' => 'POST',
        'headr' => "Content-Type: application/json; charset=utf-8\r\n",
        'content' => json_encode($request)
    )
);
 
// Создание контекста потока
$context = stream_context_create($options);

// Отправка данных и получение результата
//echo 
file_get_contents('http://api.prostor-sms.ru/messages/v2/send.json', 0, $context);
////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>