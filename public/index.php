<?php
require_once("../initialize.php");







if($session->is_logged_in()){


// all data is in class funtion
    $data = Game::Viwedata();




    $account = Accounts::find_by_id($session->user_id);
    $character = Characters::find_by_account_id($account->id);


    if(!$character){



        Render::views("character",$data);



    }else{





        //echo "<pre>";
        //print_r($data);

        //echo "</pre>";



        Render::views("game",$data);

    }







}else {



 $data = array(

        "server_name"   => $_SERVER ['SERVER_NAME'],
        "Online"        => 1,
        "Lackeys"       => 2,
        "Total"         => 3,
        "Registered"    => 4,
        "game"          => Game::GameVersion(),


    );





        $data = (object) $data;


    Render::views("home", $data);

}