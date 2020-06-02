<?php
require_once("../initialize.php");
if(isset($_GET['time'])){
    $render = new Render();
    $time= $_GET['time'];
    $time =strip_tags($time);

    if(is_numeric($time)){

        $data=array(
            "request"=>$time,
            "response"=>time()
        );


    }else{
        $data=array(
            "request"=>time(),
            "response"=>time()
        );
    }



    $render->Json($data);
}