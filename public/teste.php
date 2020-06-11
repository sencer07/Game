<?php
require_once("../initialize.php");



$data = SysMAil::Alert();


$data4 = array(
    'inbox' =>
        array(

        ),
    'alert' =>
        array(

        ),
    'admin' =>
        array(

        ),
    'news' =>
        array(

        ),
    'counter' =>
        array(
            'inbox' => 55,
            'alert' => 56,
            'admin' => 56,


        ),
);

echo json_encode($data4);


echo "\n
\n";






Render::Json($data);
