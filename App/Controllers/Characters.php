<?php
use Hackzilla\PasswordGenerator\Generator\ComputerPasswordGenerator;

class Characters
{

    private static $table_name = "characters";
    public static $db_fields = array();

    public $id;
    public $account_id;
    public $name;
    public $alive;
    public $health;
    public $sex;
    public $sexKeyName;
    public $rankNames;
    public $cityid;
    public $money;
    public $backmoney;
    public $airplanetypes;
    public $flytime;
    public $admin;
    public $crime_at;
    public $rank_pro;
    public $bullets;
    public $rankleval;
    public $startDate;
    public $dead;
    public $handcrimecount;
    public $handcrimetime;
    public $carcrimecount;
    public $carcrimetime;
    public $lastclick;
    public $prison;
    public $banktimer;



    public static function CrimeCount($typeCrime=null,$chance=null){

        /**
         * @todo
         * $chance = the type of crime selected my procentage in game mode to be add
         * invremente as it gos on
         */


        /**
         * counting hand crimes only
         */
        $session = new Session();

        if ($session->is_logged_in()) {

            $account = Accounts::find_by_id($session->user_id);
            $character = Characters::find_by_account_id($account->id);

           if($typeCrime =="crime") {

               $character->handcrimecount = $character->handcrimecount + 1;
               $character->handcrimetime = time() + 90;

           }elseif ($typeCrime == "Car"){

               $character->carcrimecount = $character->carcrimecount + 1;
               $character->carcrimetime = time() + 300;


           }

            $character->Save();
        }

    }


    public static function cooldown($type, $time=null){

        $cooldown ="<script>";
        $cooldown .="omerta_cooldown('$type', $time, $time);";
        $cooldown .="</script>";

        return $cooldown;
    }



    public static function UpdateTheDead(){
        /**
         * very inportan this update the user to dead
         * still need som work
         * @todo if the user gows to make new carecter and tray to loog in still need to
         * display account is dead
         * then back to new charecter still like a loop
         */
        $session = new Session();
        if ($session->is_logged_in()) {
            if ($_GET['module'] == "Account") {
                $account = Accounts::find_by_id($session->user_id);
                if ($account->id) {
                    $character = Characters::find_by_account_id($account->id);
                    if(!empty($character)){

                        if($character->dead ==1){
                            $character->alive=0;
                            $character->Save();
                        }
                    }
                }
            }
        }
    }


    public static function UpdateUserRP($rankleval=null){

        $data = Game::Viwedata();
        $session = new Session();


        if ($session->is_logged_in()) {

            $account = Accounts::find_by_id($session->user_id);
            $character = Characters::find_by_account_id($account->id);

            $character->rank_pro = $character->rank_pro + self::RP($data->character->rankleval) ;
            $character->Save();

            if($character->rank_pro >= 100){

                /**
                 * verti iportant dont tach
                 * hear is wen the player is 100 or more  RP menes is ready to upgrade
                 *
                 * but still needs chack if is level 16 if is level 16 Rp will not be ressete
                 *
                 */

                    self::UpdateUserRpLevel();


            }


        }



    }


    public static function UpdateUserRpLevel(){

        /**
         * this funtion is to update all RP from it will be cold from meny functions
         */
        $session = new Session();

        if ($session->is_logged_in()) {

            $account = Accounts::find_by_id($session->user_id);
            $character = Characters::find_by_account_id($account->id);

            $character->rank_pro = 0;
            $character->rankleval = $character->rankleval + 1;
            $character->Save();


            $character->rankNames = self::Ranks_Names($character->rankleval, $character->sex)->RackName;


            /**
             * send promotion msg from system
             *
             */

            $uplevel = new SysMAil();
            $uplevel->senderid      ="System";
            $uplevel->sendername    ="System";
            $uplevel->send_to       =$character->name;
            $uplevel->subject       ="Promoted";
            $uplevel->msg           ="You have been promoted to ".self::Ranks_Names($character->rankleval, $character->sex)->RackName;
            $uplevel->readed        =0;
            $uplevel->dell          =0;
            $uplevel->type          =7;
            $uplevel->alert         =1;
            $uplevel->date          =date('d-F @ H:i:s');
            $uplevel->Create();

            $character->Save();

        }

    }






    public static function RP($levol=0){

        if($levol == "0"){  $data = 10/100*100; }
        if($levol == "1"){  $data = self::RP(0)/2; }
        if($levol == "2"){  $data = self::RP(1)/2; }
        if($levol == "3"){  $data = self::RP(2)/2; }
        if($levol == "4"){  $data = self::RP(3)/2; }
        if($levol == "5"){  $data = self::RP(4)/2; }
        if($levol == "6"){  $data = self::RP(5)/2; }
        if($levol == "7"){  $data = self::RP(6)/2; }
        if($levol == "8"){  $data = self::RP(7)/2; }
        if($levol == "9"){  $data = self::RP(8)/2; }
        if($levol == "10"){ $data = self::RP(9)/2; }
        if($levol == "11"){ $data = self::RP(10)/2; }
        if($levol == "12"){ $data = self::RP(11)/2; }
        if($levol == "13"){ $data = self::RP(12)/2; }
        if($levol == "14"){ $data = self::RP(13)/2; }
        if($levol == "15"){ $data = self::RP(14)/2; }
        if($levol == "16"){ $data = self::RP(15)/2; }

        return $data;
    }


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


    public static function DeadOrAlive(){

        /**
         * this function is displayng on acount services
         * will send 3 or 2
         * 3 account is dead
         * 2 account is alive
         */

        $session = new Session();

        if ($session->is_logged_in()) {

            $account = Accounts::find_by_id($session->user_id);
            $character = Characters::find_by_account_id($account->id);

            if($character->dead ==1){

                $data = 3;

            }elseif ($character->dead ==0){

                $data = 2;
            }

        }

        return $data;

    }



    public static function fly_times($plane=null){
        switch ($plane) {
            case "1":
                //Fokker DR-1: 60 minutes
                $time = time()+60*60;
                break;
            case "2":
                // Havilland DH 82A: 50 minutes
                $time = time()+60*50;
                break;
            case "3":
                // Havilland DH 82A: 50 minutes
                $time = time()+60*50;
                break;
            case "4":
                // Douglas DC-3: 30 minutes
                $time = time()+60*30;
                break;
            default:
                // No plane: 75 minutes (not possible to travel intercontinental)
                $time = time()+60*75;
        }


        return $time;
    }


    public static function Ranks_Names($i, $sex){

        $RackName = "";
        $Booze = 1;
        $Narcotics=0;
        $HonourPoints=0;
        $PointAbility="No";

        switch ($i) {
            case 0:
                $RackName = "Empty-Suit";
                break;
            case 1:

                if($sex ==1){
                    $RackName = "Delivery boy";
                }
                elseif ($sex==2){
                    $RackName = "Delivery Girl";
                }

                $Booze = 2;
                break;

            case 2:
                $RackName = "Picciotto";
                $Booze = 5;
                $Narcotics=1;
                break;
            case 3:
                $RackName = "Shoplifter";
                $Booze = 7;
                $Narcotics=2;
                $HonourPoints =80;
                break;
            case 4:
                $RackName = "Pickpocket";
                $Booze = 10;
                $Narcotics=4;
                $HonourPoints =100;
                $PointAbility = "Yes";
                break;
            case 5:
                $RackName = "Thief";
                $Booze = 15;
                $Narcotics=5;
                $HonourPoints =120;
                $PointAbility = "Yes";
                break;
            case 6:
                $RackName = "Associate";
                $Booze = 20;
                $Narcotics=7;
                $HonourPoints =140;
                $PointAbility = "Yes";
                break;
            case 7:
                $RackName = "Mobster";
                $Booze = 25;
                $Narcotics=8;
                $HonourPoints =160;
                $PointAbility = "Yes";
                break;
            case 8:
                $RackName = "Soldier";
                $Booze = 30;
                $Narcotics=10;
                $HonourPoints =180;
                $PointAbility = "Yes";
                break;

            case 9:
                $RackName = "Swindler";
                $Booze = 35;
                $Narcotics=11;
                $HonourPoints =200;
                $PointAbility = "Yes";
                break;
            case 10:
                $RackName = "Assassin";
                $Booze = 40;
                $Narcotics=13;
                $HonourPoints =220;
                $PointAbility = "Yes";
                break;
            case 11:
                $RackName = "Local Chief";
                $Booze = 45;
                $Narcotics=14;
                $HonourPoints =240;
                $PointAbility = "Yes";
                break;
            case 12:
                $RackName = "Chief";
                $Booze = 50;
                $Narcotics=16;
                $HonourPoints =260;
                $PointAbility = "Yes";
                break;

            case 13:
                $RackName = "Bruglione";
                $Booze = 60;
                $Narcotics=17;
                $HonourPoints =280;
                $PointAbility = "Yes";
                break;
            case 14:
                $RackName = "Capodecina";
                $Booze = 70;
                $Narcotics=20;
                $HonourPoints =300;
                $PointAbility = "Yes";
                break;
            case 15:

                if($sex ==1){
                    $RackName = "Godfather";
                }
                elseif ($sex==2){
                    $RackName = "First Lady";
                }

                $Booze = 70;
                $Narcotics=20;
                $HonourPoints =320;
                $PointAbility = "Yes";
                break;
        }

        $data =array(
            "RackName"=>$RackName,
            "Booze"=>$Booze,
            "Narcotics"=>$Narcotics,
            "Honour Points"=>$HonourPoints,
            "Dis-Honour Point Ability"=>$PointAbility,
        );

        return $data = (object) $data;

    }



    public static function RondonCity(){
        $city = Citys::rondonSellect();

        if(!$city){
            $city = Citys::rondonSellect();
        }else{
            return $city;
        }

        return $city;
    }






    public static function sexKeyName($n=null){

        if($n===1){
            $name = "male";
        }elseif ($n===2){
            $name ="femail";
        }
        return $name;
    }

    public static function AliveUser($name=null,$sex=null,$lastrank=null, $message=null,$type=null,$bLoading=false,$bNewUser=false){



        if ($type){
            $type="success";
        }else{
            $type="error";
        }


        $aliveUser=array(
            "rankName"=>"Empty-suit",
            "name"=>$name,
            "sex"=>$sex,
            "lastrank"=>$lastrank,

            //allow user to edit name
            "bLoading"=>$bLoading,
            //page refresh == false
            "bNewUser"=>$bNewUser
        );


        $messagesToUser=array(
            "text"=>$message['message'],
            // "type"=>"success"
            "type"=>$type
        );


        $messages=array($messagesToUser);
        $data=array(
            "aliveUser"=>$aliveUser,
            "messages"=>$messages
        );


        return $data;

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



    public static function find_by_account_id($id=0) {


        $sql = "SELECT * FROM ".self::$table_name;
        $sql .= " WHERE account_id=". $id;
        $sql .=" AND alive=1 LIMIT 1";
        $result_array = self::find_by_sql($sql);
        return !empty($result_array) ? array_shift($result_array) : false;
    }

    public static function find_by_id($id=0) {
        $result_array = self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE id={$id} LIMIT 1");
        return !empty($result_array) ? array_shift($result_array) : false;
    }

    public static function find_by_sql($sql=""){
        $database = new Database();
        $result_set = $database->query($sql);
        $data=$result_set->result_array();

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