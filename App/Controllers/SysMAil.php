<?php

class SysMAil
{

    private static $table_name = "mail";
    public static $db_fields = array();

    public $id;
    public $senderid;
    public $sendername;
    public $send_to;
    public $subject;
    public $msg;
    public $readed;
    public $dell;
    public $type;
    public $date;
    public $alert;





    public function __construct()
    {
        $db = $this->databese();

        $result_set = $db->query("SELECT * FROM ".self::$table_name." LIMIT 1");
        $num_fields = $result_set->result->field_count;
        foreach($result_set->result_array() as $key => $value)
        {
            $stdArray[$key] = (array) $value;
            foreach ($stdArray[0] as $key=>$value):
                self::$db_fields[] = $key;
                $name =  $this->{$key} ;
            endforeach;
        }


    }




    public static function MessagesTypes($type){
        /**
         *  1=Personal, 2=Donate, 3=Admin, 4=Bustout, 5=Group Crime, 6=Family, 7=System
         */


        if($type==1){
            return "Personal";
        }elseif ($type==2){
            return "Donate";
        }elseif ($type==3){
            return "Admin";
        }elseif ($type==4){
            return "Bustout";
        }elseif ($type==5){
            return "Group Crime";
        }elseif ($type==6){
            return "Family";
        } elseif ($type==7){
            return "System";
        }



    }




    public static function Alert(){

        $session = new Session();


        if ($session->is_logged_in()) {

            $data = Game::Viwedata();


            $sql = "SELECT * FROM mail ";
            $sql .= " WHERE send_to='{$data->character->name}' ";
            $sql .= " AND dell='0'";
            $sql .= " AND readed='0'";
            $count = self::find_by_sql($sql);
            $a = 0;
            foreach ($count as $co):
                $a = $a+1;
            endforeach;



            $sql2 = "SELECT * FROM mail ";
            $sql2 .= " WHERE send_to='{$data->character->name}' ";
            $sql2 .= " AND dell='0'";
            $sql2 .= " AND readed='0'";
            $sql2 .= " AND alert='1'";
            $count2 = self::find_by_sql($sql2);
            $b = 0;
            foreach ($count2 as $co2):
                $b = $b+1;
            endforeach;




            $inbox  =$a;
            $alert  =$b;
            $admin  =0;
            $news   =0;



            $showinfo=array(

                        'inbox' => $inbox,
                        'alert' => $alert,
                        'admin' => $admin,
                        'news'  => $news,

            );
            if($inbox && $admin==0){
                $inboxdata = array('inbox'=>$inbox);
            }else{
                $inboxdata = array();
            }


            if($alert and $admin==0){
                $alertdata = array('alert'=>$alert);
            }else{
                $alertdata = array();
            }

            if($admin==0 and $admin==0){
                $admindata = array();
            }else{
                $admindata = array('admin'=>$admin);
            }

            if($news && $admin==0){
                $newsdata = array('news'=>$news);
            }else{
                $newsdata = array();
            }


            $data4 = array('inbox'=>$inboxdata, 'alert'=>$alertdata, 'admin'=>array(), 'news'=>array() ,"counter"=>$showinfo);







            return $data4;
        }
    }



    public static function CountMail(){


        $session = new Session();


        if ($session->is_logged_in()) {

            $data = Game::Viwedata();



        $sql  = "SELECT * FROM mail ";
        $sql .= " WHERE send_to='{$data->character->name}' ";
        $sql .= " AND dell='0'";
        $sql .= " AND readed='0'";

        $count = self::find_by_sql($sql);

        $n =0;
        foreach ($count as $co):

            $n = $n+1;

        endforeach;



        $msg  = '<a href="/?module=Mail&action=inbox">Inbox('.$n.')</a><br>';
        //$msg .= '<a href="/?module=Mail&action=outbox">Outbox</a><br>';
        $msg .= '<a href="/?module=Mail&action=sendMsg">Compose</a><br>';
        //$msg .= '<a href="/?module=Mail&action=editIgnore">Ignore List</a><br>';
        //$msg .= '<a href="/?module=Mail&action=editQuick">Quick Messages</a>';


        return $msg;

        }

    }





    public static function SendMsg($to,$subject,$msg){


        $session = new Session();

        if($session->is_logged_in()) {

            $userdata = Game::Viwedata();


            $Send = new self();
            $Send->senderid     = $userdata->character->id;
            $Send->sendername   = $userdata->character->name;
            $Send->send_to      = $to;
            $Send->subject      = $subject;
            $Send->msg          = $msg;
            $Send->readed       = 0;
            $Send->dell         = 0;
            $Send->type         = 1;
            $Send->alert        = 1;
            $Send->date         = date('d-F @ H:i:s');
            $Send->Save();

            return "Message Sent";
        }


    }


    public static function CheckifUserExistes($nick){




        $sql  = "SELECT * FROM characters ";
        $sql .= " WHERE name='{$nick}' ";
        $sql .= " AND alive='1' ";
        $sql .= " LIMIT 1";

        $data = Characters::find_by_sql($sql);




        if(isset($data[0])){

            return 1;

        }else{
            return 0;
        }



    }






    function databese() {
        // We could simply use `global $db;`, but using globals is bad. Instead we can do this:
        $db = Database::instance();
        return$db;
    }


    public function __get($name) {
        echo "Object <b>$name</b> does not exist From <b>".ucfirst(self::$table_name)."</b> Class";
        exit();
    }



    public function __set($name, $value) {
        echo "Object <b>$name</b> does not exist On <b>".ucfirst(self::$table_name)."</b> Database";
        exit();
    }




    public static function find_by_id($id=0) {
        $result_array = self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE id={$id} LIMIT 1");
        return !empty($result_array) ? array_shift($result_array) : false;
    }

    public static function find_by_sql($sql=""){
        $database = new Database();
        $result_set = $database->query($sql);
        $data= $result_set->result_array();


        $object_array = array();
        $i = 0;
        foreach($row = $result_set->result_array() as $key => $value)
        {

            $object_array[] = self::instantiate($row[$i++]);
        }

        return $object_array;
    }



    public static function convertToObject($array) {
        $array = (object)$array;

        return $array;
    }

    public function Save(){
        return isset($this->id) ? $this->Update() : $this->Create();
    }

    public function Create(){

        $data = (array) $this;

        $db = $this->databese();
        $db->insert(self::$table_name,$data);
        return $db->id();
    }




    public function Update(){
        $attributes = $this->sanitized_attributes();
        $attribute_pairs = array();
        foreach($attributes as $key => $value) {
            $attribute_pairs[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE ".self::$table_name." SET ";
        $sql .= join(", ", $attribute_pairs);
        $sql .= " WHERE id=". $this->id;
        $db = $this->databese();
        $db->query($sql);
        return ($db->affected() == 1) ? true : false;
    }


    protected function sanitized_attributes() {

        $clean_attributes = array();
        // sanitize the values before submitting
        // Note: does not alter the actual value of each attribute
        foreach($this->attributes() as $key => $value){
            $clean_attributes[$key] = $value;
        }
        return $clean_attributes;
    }


    public static function instantiate($record) {
        $object = new self;
        foreach($record as $attribute=>$value){
            if($object->has_attribute($attribute)) {
                $object->$attribute = $value;
            }
        }
        return $object;
    }

    private function has_attribute($attribute) {
        return array_key_exists($attribute, $this->attributes());
    }
    protected function attributes() {
        $attributes = array();
        foreach(self::$db_fields as $field) {
            if(property_exists($this, $field)) {
                $attributes[$field] = $this->$field;
            }
        }
        return $attributes;
    }
}