<?php
require_once("../initialize.php");
// all data is in class funtion
$data = Game::Viwedata();



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