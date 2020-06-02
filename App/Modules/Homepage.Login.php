<?php
require_once("../initialize.php");

use Rakit\Validation\Validator;


$mailm ="No";
$code=0;

$validator = new Validator;

$validator->addValidator('unique', new UniqueRule());


$validation = $validator->validate($_POST, [
    'email' =>   'required',
    'pass'  =>   'required',
]);


$validation->validate();

if ($validation->fails()) {
    // handling errors
    $code=10;
    $errors = $validation->errors();

    foreach ($errors->firstOfAll() as $key=>$value):
        $messages['message'] = $value;
    endforeach;

} else {

    $email = $_POST['email'];
    $password = $_POST['pass'];


    $found_user = Accounts::autenticate($email,$password);
    if($found_user){

        $session->login($found_user);
        $messages="";
        /*
        $messages=array(
            "success"=>"Registration successful. To activate your account, please confirm your email address by clicking on the link we just sent to your mailbox.",
            "forward"=> "\index.php"
        );

        /*
         *
         */

    }else{
        $code = 10;
        $messages=array(
            "message"=>"You entered a wrong password. If you want to recover, please click on Do not remember the password?"
        );
    }



}





$debug = array($_POST);
$data = array(
    "data" => $messages,
    "code" => $code,
    "time" => time(),
    "debug" => $debug
);

$render = new Render();
$render->Json($data);