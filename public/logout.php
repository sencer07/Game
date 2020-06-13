<?php
require_once("../initialize.php");



if($session->is_logged_in()) {





        $account = Accounts::find_by_id($session->user_id);
        $character = Characters::find_by_account_id($account->id);


        if($character) {


            $character->lastclick = 0;
            $character->Update();


        }



    $session->logout();
}
redirect_to("index.php");