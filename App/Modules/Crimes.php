<?php
require_once("../initialize.php");


$data = Game::Viwedata();

$crimeType = "crime";


$logo       = "icon-waiting.png";
$icon       = "jail-logo";
$wrapper    = "popup-warning";
$message    = "You are too tired to handle another crime attempt right now. Take a rest and you will soon be ready to roll again.";
$money ="";
$headname="Too tired";

$TypeMessage=2;





if($data->character->prison >= time()){


    $message="";

    $data3 = array(
        "timeleft"=>$data->character->prison,
        "timeleftphp"=>Game::Timeleft($data->character->handcrimetime),
        "message"=>$message,
        "byout"=>Game::PrisonPrice(),
    );

    Game::UpdateClicks();

    Render::views("prison",$data3);
}





$data = Game::Viwedata();

$make =0;



if(isset($_POST['67bcekxAPZ']) =="yes"){


    $chance = $_POST['1entxGIJOW'];



    switch ($chance) {
        case "chance1":


            $make =1;
            Characters::CrimeCount($crimeType, $chance);

            $CrimeDataOutput =  Game::Crimes($crimeType);
            $logo        = $CrimeDataOutput->logo;
            $icon        = $CrimeDataOutput->icon;
            $wrapper     = $CrimeDataOutput->wrapper;
            $message     = $CrimeDataOutput->message;
            $money       = $CrimeDataOutput->money;
            $TypeMessage = $CrimeDataOutput->TypeMessage;
            $headname    = $CrimeDataOutput->headname;





            /**
             *  Characters::UpdateUserRP($data->character->rankleval);
             *  can be reused easy to update
             */
            Characters::UpdateUserRP($data->character->rankleval);
            break;
        case "chance2":




            $make =1;
            Characters::CrimeCount($crimeType);
            Characters::UpdateUserRP($data->character->rankleval);
            break;

        case "chance3":


            $make =1;
            Characters::CrimeCount($crimeType);
            Characters::UpdateUserRP($data->character->rankleval);
            break;

        case "chance4":



            $make =1;
            Characters::CrimeCount($crimeType);
            Characters::UpdateUserRP($data->character->rankleval);
            break;

        case "chance5":


            $make =1;
            Characters::CrimeCount($crimeType);
            Characters::UpdateUserRP($data->character->rankleval);
            break;

    }




}




$data2 = Game::Viwedata();

$time = $data2->character->handcrimetime;

if($time >= time()){

    /**
     * if the user is can do crimes
     * then hide a percentage of successful
     *
     */

    $chance1 = 0;
    $chance2 = 0;
    $chance3 = 0;
    $chance4 = 0;
    $chance5 = 0;

}elseif($time <= time()){

    /**
     * if the user is can do crimes
     * then display a percentage of successful
     *
     */

    $chance1 = 61;
    $chance2 = 62;
    $chance3 = 58;
    $chance4 = 51;
    $chance5 = 47;

}

$html = array(

    "logo"          =>  $logo,
    "icon"          =>  $icon,
    "wrapper"       =>  $wrapper,
    "message"       =>  $message,
    "money"         =>  $money,
    "TypeMessage"   =>  $TypeMessage,
    "headname"      =>  $headname
);

$html = (object) $html;


$data5 = array(

    "crime_time"    =>$time,
    "chance1"       =>$chance1,
    "chance2"       =>$chance2,
    "chance3"       =>$chance3,
    "chance4"       =>$chance4,
    "chance5"       =>$chance5,
    "make"          =>$make,
    "CrimeType"     =>$crimeType,
    "html"          =>$html

);


$data5 = (object) $data5;




/**
 * Updating user Clicks on every page
 */
Game::UpdateClicks();


Render::views("Crimes/Hand",$data5);