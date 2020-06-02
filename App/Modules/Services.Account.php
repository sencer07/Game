<?php

if($session->is_logged_in()){

    $account = Accounts::find_by_id($session->user_id);
    $character = Characters::find_by_account_id($account->id);
    $city = Citys::find_by_id($character->cityid);


    $RPname = Characters::Ranks_Names($character->rankNames, $character->sex);


    $data2 = array(
    'user_status' => 2,
    'version' => '5.6.16.1',
    'release' => '1392 days ago',
    'city' =>
        array(
            'id' => $city->id,
            'name' => $city->name,
        ),
    'family' => '0',
    'extra' =>
        array(
            'mail' => false,
        ),
    'cooldowns' =>
        array(
            'crime' => 0,
            'car' => 0,
            'travel' => $character->flytime-time(),
            'bullets' => 0,
        ),
    'progressbars' =>
        array(
            'rankprogress' => 50000,
            'health' => '100',
            'killskill' => '0.00',
            'bustskill' => 0,
            'raceform' => 0,
            'honorpoints' => '0',
        ),
    'messages' =>
        array(
            'inbox' =>
                array(),
            'alert' =>
                array(),
            'admin' =>
                array(),
            'news' =>
                array(),
            'counter' =>
                array(
                    'inbox' => 0,
                    'alert' => 0,
                    'admin' => 0,
                ),
        ),
    'money' => $character->money,
    'bank' => $character->backmoney,
    'bullets' => '150',
    'rankname' => $RPname->RackName,
    'tickets' =>
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