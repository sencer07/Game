<?php
require_once("../initialize.php");




$data =array(

);


Game::UpdateClicks();


Render::views("informationv2", $data);