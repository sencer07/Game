<?php

require_once("../initialize.php");
$userinfo = Game::Viwedata();


if($session->is_logged_in()){



    /**
     * Updating user Clicks on every page
     */
    Game::UpdateClicks();




    if(isset($_GET['action'])){

        $action = $_GET['action'];

        $viwemessage ="";

        switch ($action) {
            case "inbox":





                $data = array(

                    "message"=> $viwemessage,
                    "game"   => $userinfo,

                );

                $data = (object) $data;


               Render::views("mail/inbox",$data);
                break;






                case "sendMsg":
                Render::views("mail/sendMsg");
                break;




            case "sendmessage":


                //Array ( [send] => yes [nick] => 1 [subject] => 23 [msg] => 3 [undefined] => Send )

                if(isset($_POST['nick'] ) && isset($_POST['msg'])){

                    $nick = $_POST['nick'];
                    $msg = $_POST['msg'];
                    $subject = $_POST['subject'];

                    $validuser = SysMAil::CheckifUserExistes($nick);

                    if($validuser){

                     $viwemessage =   SysMAil::SendMsg($nick,$subject,$msg);

                    }else{

                        $viwemessage ="User not Found or is dead ";

                    }



                }


                $data = array(

                    "message"=> $viwemessage,
                    "game"   => $userinfo,


                );

                $data = (object) $data;


                Render::views("mail/inbox",$data);

                break;



            case "delMsg":


                if(isset($_GET['iId'])){
                    $iId = $_GET['iId'];

                    $sysdel = SysMAil::find_by_id($iId);

                    if ($sysdel->send_to === $userinfo->character->name or $sysdel->send_to === ucfirst($userinfo->character->name)){


                        $sysdel->dell =1;
                        $sysdel->Update();


                    }else{

                        $data = array(

                            "message"=> "This message Dont exits",
                            "game"   => $userinfo,


                        );

                        $data = (object) $data;
                        Render::views("mail/inbox",$data);

                    }



                }




               if(isset($_POST['selective'])){

                   $dell = $_POST['selective'];


                   foreach ($dell as $del):

                       $sysdel = SysMAil::find_by_id($del);

                    $sysdel->dell =1;
                    $sysdel->Save();



                  endforeach;



               }

                $data = array(

                    "message"=> "message deleted",
                    "game"   => $userinfo,


                );

                $data = (object) $data;


                Render::views("mail/inbox",$data);



                break;

            case "showMsg":

                if(isset($_GET['iMsgId'])){

                    $getid = $_GET['iMsgId'];


                    $mail = SysMAil::find_by_id($getid);

                    if($mail){

                        if($mail->send_to === $userinfo->character->name or $mail->send_to === ucfirst($userinfo->character->name) ){

                            $data = array(
                                "from"=> $mail->sendername,
                                "type"=> $mail->type,
                                "subject"=>$mail->subject,
                                "msg"=> $mail->msg,
                                "date"=> $mail->date,
                                "sendername" =>$mail->sendername,
                                "id" =>$mail->id,

                            );


                            $mail->readed =1;
                            $mail->Update();

                            $data = (object) $data;
                            Render::views("mail/read",$data);

                        }else{

                            $data = array(

                                "message"=> "This message Dont exits",
                                "game"   => $userinfo,


                            );

                            $data = (object) $data;


                            Render::views("mail/inbox",$data);
                        }


                    }else{

                        $data = array(

                            "message"=> "This message Dont exits",
                            "game"   => $userinfo,


                        );

                        $data = (object) $data;


                        Render::views("mail/inbox",$data);

                    }





                }

                break;




        }


    }else{


        $sql2 = "SELECT * FROM mail ";
        $sql2 .= " WHERE send_to='{$userinfo->character->name}' ";
        $sql2 .= " AND dell='0'";
        $sql2 .= " AND readed='0'";
        $sql2 .= " AND alert='1'";
        $count2 = SysMAil::find_by_sql($sql2);
        foreach ($count2 as $co2):


        $UpdateData = SysMAil::find_by_id($co2->id);
        $UpdateData->alert = 0;
        $UpdateData->Update();

        endforeach;



        $data = array(

            "message"=> "",
            "game"   => $userinfo,


        );

        $data = (object) $data;


        Render::views("mail/inbox",$data);


    }





}