<?php
require_once("../initialize.php");





$server_name = $_SERVER ['SERVER_NAME'];


$data = array(

    "server_name" => $server_name,
    "Online"        =>1,
    "Lackeys"       =>2,
    "Total"         =>3,
    "Registered"    =>4


);

$data = (object) $data;




if($session->is_logged_in()){


    $account = Accounts::find_by_id($session->user_id);
    $character = Characters::find_by_account_id($account->id);


    if(!$character){

        Render::views("character",$data);

    }else{

        Render::views("game",$data);

    }







}else {



    Render::views("home", $data);

}