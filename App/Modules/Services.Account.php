<?php

if($session->is_logged_in()){


    $info = Game::Viwedata();






    $data2 = array(
    'user_status' => Characters::DeadOrAlive(),
    'version' => Game::GameVersion()->version,
    'release' => '1392 days ago',
    'city' =>
        array(
            'id'    => $info->character->cityid,
            'name'  => $info->city,
        ),
    'family' => '0',
    'extra' =>
        array(
            'mail' => false,
        ),
    'cooldowns' =>
        array(
            'crime' => $info->character->handcrimetime,
            'car' => $info->character->carcrimetime,
            'travel' => 0,
            'bullets' => 0,
        ),
    'progressbars' =>
        array(
            'rankprogress' => $info->character->rank_pro,
            'health' => $info->character->health,
            'killskill' => '0.00',
            'bustskill' => 0,
            'raceform' => 0,
            'honorpoints' => '0',
        ),

        /**
         * more info to be add on SysMAil::Alert()
         * cerful is admin msg is set to one it blocks de user to veiwe the messages is as to be send off on landing page
         */
    'messages' =>SysMAil::Alert(),
    'money'     => $info->character->money,
    'bank'      => $info->character->backmoney,
    'bullets'   => $info->character->bullets,
    'rankname'  => $info->character->rankNames,
    'tickets'   =>
        array(),
    'bugs' =>
        array(),
    'widgets' =>
        array(
            'eog' => false,
        ),
    'users' => array(),
    'city_gift' => false,
    'activeMilestones' => 0,
    'milestoneTimeLeft' => 0,
);


$debug = array();
$data = array(
    "data" => $data2,
    "code" => 0,
    "time" => time(),
    "debug" => $debug
);

$render = new Render();
$render->Json($data);

}