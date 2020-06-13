<?php
require_once("../initialize.php");
// all data is in class funtion
$data = Game::Viwedata();



if($session->is_logged_in()) {




$message ="";






    if(isset($_POST)){


        if(isset($_POST['type'])){


            if(!empty($_POST['type'])){



                $type = $_POST['type'];


                $user = Characters::find_by_id($data->character->id);

                $postmoney = $_POST['amounttpob'];



                switch ($type) {
                    case "into":


                        if(!empty($postmoney)){



                        if($user->money >= $postmoney) {


                            $user->backmoney = $user->backmoney + $postmoney;
                            $user->money = $user->money - $postmoney;
                            $user->banktimer = Bank::BankTimer();
                            $user->Update();
                        }


                        }else{

                            $message = "<b style='color: darkgray'>You Don't Have enough money!</b>";

                        }



                        break;

                    case "off":


                        if(!empty($postmoney)){


                            if ($user->backmoney >= $postmoney) {

                                $user->backmoney = $user->backmoney - $postmoney;
                                $user->money = $user->money + $postmoney;
                                $user->Update();


                            } else {
                                $message = "<b style='color: darkgray'>You Don't Have enough money in your bank</b>";
                            }

                        }else{
                            $message = "<b style='color: darkgray'>You moron you want to take out 0$ !</b>";
                        }



                        break;

                }





            }

        }


        /**
         * this is sending money to user in game
         */
        if(isset($_POST['toub'])){

          if($_POST['toub'] ==="us"){


             print_r($_POST);

          }





        }



    }












    $data = Game::Viwedata();




    $percentage =  Bank::BanckIntrece($data->character->backmoney);
    $totalWidth = $data->character->backmoney;

     $new_width = ($percentage / 100) * $totalWidth;




    /**
     * if $User as money in bank and time is over lets get the money back to the user
     */
    if($data->character->banktimer <= time()){


        if($data->character->backmoney >= 1){


            $user = Characters::find_by_id($data->character->id);


            $user->money = $user->money+ floor($data->character->backmoney+$new_width);
            $user->backmoney = 0;
            $user->Update();





        }



    }


    /**
     *
     *  $data = Game::Viwedata();
     * hear is rereading all the update values to the user
     */

    $data = Game::Viwedata();

    $bankdata  = Bank::intBack($data->character->backmoney);

    $data3=array(
        "cash"=>$data->character->money,
        "back"=>$data->character->backmoney,

        "msg"=>$message,

        "percentage"=>$bankdata->percentage,
         "recive"=>$bankdata->recive,

        "btime"=>$data->character->banktimer,
        "phptime"=>Game::Timeleft($data->character->banktimer),
        "identity"=>$data->character->id

    );


    Game::UpdateClicks();

    $data3 = (object) $data3;

    Render::views("bank", $data3);

}