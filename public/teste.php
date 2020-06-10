<?php
require_once("../initialize.php");

$data = Game::Viwedata();






Game::Health($data->character->health);

echo"<pre>";
print_r($data);
