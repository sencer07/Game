<?php
require_once("../initialize.php");

$data = Game::Viwedata();


if(isset($_POST['67bcekxAPZ']) =="yes"){


    $chance = $_POST['1entxGIJOW'];



    switch ($chance) {
        case "chance1":



            Characters::CrimeCount();
            Characters::UpdateUserRP($data->character->rankleval);

            break;
        case "chance2":



            Characters::CrimeCount();
            Characters::UpdateUserRP($data->character->rankleval);
            break;
        case "chance3":



            Characters::CrimeCount();
            Characters::UpdateUserRP($data->character->rankleval);
            break;
        case "chance4":



            Characters::CrimeCount();
            Characters::UpdateUserRP($data->character->rankleval);
            break;
        case "chance5":



            break;

    }




}








Render::views("Crimes/Hand");