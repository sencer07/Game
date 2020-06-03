<?php
require_once("../initialize.php");



use Rakit\Validation\Validator;


$validator = new Validator;

$validator->addValidator('unique', new UniqueRule());

if (isset($_GET['action'])) {

    $action = $_GET['action'];
    $data = "";


    switch ($action) {
        case "FooterEndpoint":
            $data = Accounts::FooterEndpoint();
            break;
        case "AliveUserEndpoint":
            $data = Accounts::AliveUserEndpoint();
            break;
        case "create":
            //ssuseful create
            //{"aliveUser":{"rankName":"Empty-suit","name":"Dad","sex":1,"lastrank":1,"bLoading":false,"bNewUser":false},"messages":[{"text":"You successfully created the account.","type":"success"}]}

            if (isset($_POST['character'])) {

                $character = json_decode($_POST['character'], true);
                $characterData = Characters::convertToObject($character);

                //print_r($character->milestones[0]['label']);

            }


            $validation = $validator->validate($character, [
                'name' => 'required|unique:characters,name',
            ]);

            $validation->setMessages([
                'name:unique' => 'This ' . $characterData->name . ' has been taken',

            ]);


            $validation->validate();


            if ($validation->fails()) {

                $errors = $validation->errors();

                $errors = $validation->errors();

                $messages = array();
                foreach ($errors->firstOfAll() as $key => $value):
                    $messages['message'] = $value;
                endforeach;


                $data = Characters::AliveUser(
                    $characterData->name,
                    $characterData->sex,
                    $characterData->lastrank,
                    $messages,
                    "",
                    false,
                    true
                );

            } else {

                //if pass Validation

                if ($session->is_logged_in()) {

                    $rondomcity = Characters::RondonCity();

                    $account = Accounts::find_by_id($session->user_id);


                    $Ranckname =   Characters::Ranks_Names(0,$characterData->sex);




                    $characters = new Characters();
                    $characters->account_id = $account->id;
                    $characters->name = $characterData->name;
                    $characters->alive = 1;
                    $characters->sex = $characterData->sex;
                    $characters->sexKeyName = Characters::sexKeyName($characterData->sex);
                    $characters->rankNames  = $Ranckname->RackName;
                    $characters->cityid = $rondomcity->id;
                    $characters->money = 0;
                    $characters->backmoney = 0;
                    $characters->airplanetypes = 0;
                    $characters->flytime = time() - 50;
                    $characters->admin = 0;
                    $characters->crime_at = 0;
                    $characters->rank_pro = 0;
                    $character->bullets = 0;
                    $characters->Save();

                }

                $messages['message'] = "You successfully created the account.";

                $data = Characters::AliveUser(
                    $characterData->name,
                    $characterData->sex,
                    $characterData->lastrank,
                    $messages,
                    1,
                    false,
                    false
                );

            }

            //$data = Characters::AliveUser(1);
            /*
             * [character] =>
    {
        "bNewUser":true,
        "bLoading":false,
        "name":"asd",
        "sex":1,
        "sexKeyName":"male",
        "rankName":"Empty-suit",
        "lastrank":0,

        "milestones":
            [
            {"value":0,"label":"Rank Progress","type":100},
            {"value":0,"label":"Bullets","type":200},
            {"value":0,"label":"Bustouts","type":300},
            {"value":0,"label":"Money","type":700}
            ],

        "errors":[]
        }
             */


            break;
    }


    $render = new Render();
    $render->Json($data);

}