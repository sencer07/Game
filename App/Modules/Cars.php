<?php
require_once("../initialize.php");

$data = Game::Viwedata();
$make =0;

$crimeType = "Car";

$logo       = "icon-waiting.png";
$icon       = "jail-logo";
$wrapper    = "popup-warning";
$message    = "You are too tired to handle another crime attempt right now. Take a rest and you will soon be ready to roll again.";
$money ="";
$headname="Too tired";

$TypeMessage=2;





if(isset($_POST['69djklsFNP']) =="yes"){



    if(isset($_POST['08dpqAISUV'])){

        $chance = $_POST['08dpqAISUV'];

        switch ($chance) {
            case "chance1":

                Characters::CrimeCount($crimeType);


                $CrimeDataOutput =  Game::Crimes($crimeType);



                $logo        = $CrimeDataOutput->logo;
                $icon        = $CrimeDataOutput->icon;
                $wrapper     = $CrimeDataOutput->wrapper;
                $message     = $CrimeDataOutput->message;
                $money       = $CrimeDataOutput->money;
                $TypeMessage = $CrimeDataOutput->TypeMessage;
                $headname    = $CrimeDataOutput->headname;


                Characters::UpdateUserRP($data->character->rankleval);
                $make =1;

                break;
            case "chance2":

                Characters::CrimeCount($crimeType);
                Characters::UpdateUserRP($data->character->rankleval);
                $make =1;

                break;
            case "chance3":
                Characters::CrimeCount($crimeType);
                Characters::UpdateUserRP($data->character->rankleval);
                $make =1;

                break;
            case "chance4":
                Characters::CrimeCount($crimeType);
                Characters::UpdateUserRP($data->character->rankleval);
                $make =1;
                break;


        }



    }




}


$data2 = Game::Viwedata();

$time = $data2->character->carcrimetime;




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


}elseif($time <= time()){

    /**
     * if the user is can do crimes
     * then display a percentage of successful
     *
     */


    $chance1 = 21;
    $chance2 = 13;
    $chance3 = 28;
    $chance4 =  9;

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
    "make"          =>$make,
    "CrimeType"     =>$crimeType,
    "html"          =>$html

);





$data5 = (object) $data5;





Render::views("Crimes/Cars", $data5);