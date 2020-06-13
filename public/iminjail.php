<?php
require_once("../initialize.php");
// all data is in class funtion
$data = Game::Viwedata();

$message="tests";


/**
 * this is if the user trays to by is self out but is not in prison no more redirect the user
 */

if($data->character->prison < time()){


    Game::UpdateClicks();



    Render::views("informationv2", $data);

}



if(isset($_POST['buymeout'])){





    $buymeout = $_POST['buymeout'];




    $s = $buymeout;
    $firstPart = strtok( $s, '$' );
    $allTheRest = strtok( '' );



    $user = Characters::find_by_id($data->character->id);


    if($data->character->money >= $allTheRest){

        $user->prison = 0;
        $user->money = $user->money - $allTheRest;
        $user->Update();

        $message = "<b style='color: green'>You Don't Have enough money to buy yourself out</b>";



    }else{
        $message = "<b style='color: red'>You Don't Have enough money to buy yourself out</b>";
    }





}


$data3 = array(
    "timeleft"=>$data->character->prison,
    "timeleftphp"=>Game::Timeleft($data->character->handcrimetime),
    "message"=>$message,
    "byout"=>Game::PrisonPrice(),
);






Game::UpdateClicks();




Render::views("prison",$data3);