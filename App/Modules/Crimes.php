<?php
require_once("../initialize.php");

$crimeType = "crime";


$data = Game::Viwedata();

/**
 * @todo
 * this is till need to fix if it is susseful template or faild
 * on template
 *
 * it still need to now how many procenteges on eche crime attemps
 * this part need lital bit stady an traning
 * workin on
 * my room3622
 */

//echo "<pre>";
//print_r($data);


$make =0;

if(isset($_POST['67bcekxAPZ']) =="yes"){


    $chance = $_POST['1entxGIJOW'];



    switch ($chance) {
        case "chance1":


            $make =1;
            Characters::CrimeCount($crimeType);


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


$data5 = array(

    "crime_time"    =>$time,
    "chance1"       =>$chance1,
    "chance2"       =>$chance2,
    "chance3"       =>$chance3,
    "chance4"       =>$chance4,
    "chance5"       =>$chance5,
    "make"          =>$make,
    "CrimeType"     =>$crimeType

);


$data5 = (object) $data5;


Render::views("Crimes/Hand",$data5);