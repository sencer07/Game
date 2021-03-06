<?php
use Hackzilla\PasswordGenerator\Generator\ComputerPasswordGenerator;

class Game
{

    private static $table_name = "game";
    public static $db_fields = array();

    public $id;
    public $version;






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

    public static function CountOnlineUsers(){






            $sql2 = "SELECT * FROM characters ";

            $t = time();
            $sql2 .= " WHERE lastclick > '{$t}' ";


            $count2 = Characters::find_by_sql($sql2);


            $nunber=0;
            foreach ($count2 as $cont):
                $nunber++;

            endforeach;

            return$nunber;






    }

    public static function UpdateClicks(){



        $session = new Session();

        if ($session->is_logged_in()) {

            $account = Accounts::find_by_id($session->user_id);
            $character = Characters::find_by_account_id($account->id);


            if($character){



                $character->lastclick = time()+300;
                $character->Update();


            }


        }


    }

    public static function PrisonPrice(){

        $Price = 100;



        return $Price;
    }


    public static function Crimes($type=null){

        $attempts =  self::CrimesAtempt();

        if($attempts==1){



            $logo       = "check.png";
            $icon       = "check";
            $wrapper    = "";
            $message    = "hehehe";
            $money      = number_format(48885);
            $attemp     = 3;
            $headname   = "WELL DONE!";




        }elseif ($attempts==0) {


            $logo = "fail-logo.png";
            $icon = "error icon";
            $wrapper = "popup-error";
            $message = "You failed but got away";
            $money = "";
            $headname = "ATTEMPT FAILED!";
            $attemp = 2;

        }elseif($attempts==2){


            /**
             * sending the user to prison
             */
            $userdata = Game::Viwedata();

            $user = Characters::find_by_id($userdata->character->id);
            $user->prison = time()+60;
            $user->Update();



            $logo = "fail-logo.png";
            $icon = "error icon";
            $wrapper = "popup-error";
            $message = "You failed and you are Arrested!";
            $money = "";
            $headname = "ATTEMPT FAILED!";
            $attemp = 2;

        }






        $data=array(
            "logo"          => $logo,
            "icon"          => $icon,
            "wrapper"       => $wrapper,
            "message"       => $message,
            "money"         => $money,
            "TypeMessage"   => $attemp,
            "headname"      => $headname,

        );


        $data =  (object) $data;

        return $data;
    }

    public static function CrimesAtempt(){


        /**
         * this is a temporary placeholder
         *
         * @todo
         * this as to be base of chance  that the user ass
         */
        $data =(rand(0, 2));


        return $data;

    }


    public static function PopUp($wrapper=null, $logo=null, $icon=null,$message=null, $crime_time=null, $money=null, $p=null, $headname=null){
        $rondonImg = (rand(1, 4));



        if($p == 2) {
            $classhtml = "popup-container-wrapper";
        }elseif ($p ==3){
            $classhtml="success-wrapper";
        }


        $out     = '<div class="error-wrapper">';


        $out    .= '<div class="'.$classhtml.'">';

        $out    .= '<div class="'.$classhtml.'-head '.$wrapper.' ">';

        $out    .= '<h4>';

        if($p==3){

            $out .='<img src="/assets/omerta/main/layout/assets/img/wrapper/check.png" alt="check-img" class="check">
                    <span>'.$headname.'</span>';

        }else {

            $out .= ' <img src="/assets/omerta/main/layout/assets/img/wrapper/' . $logo . '?>" alt="' . $icon . ' " class="check">
                        <span>'.$headname.'</span>

                        <a href="javascript:void(0);" class="pull-right"
                           title="You failed to steal a car but you are still free.">
                            <img src="/assets/omerta/main/layout/assets/img/wrapper/fail-question.png" alt="question" width="22">
                        </a>';
        }

        $out    .= '</h4>';

        $out    .= '</div>';

        if($p==3){

        $out .='<div class="success-wrapper-contents ">
                <img src="/assets/omerta/modules/Crimes/assets/img/welldone-'.$rondonImg.'.jpg" style="height: 100%, width: 100%" alt="well done">

                <div class="success-wrapper-contents-inner">
                    <p class="crime-txt">You made</p>
                    <p class="crime-txt crime-profit"> $ '.$money.'</p>
                    <p class="crime-txt">From your crime</p>
                </div>
            </div>';

        }else {
            $out .= '<div class="popup-container-wrapper-contents"><img src="/assets/omerta/modules/Crimes/assets/img/failed-'.$rondonImg.'.jpg"
                         alt="Crime failed image">

                    <div class="popup-container-wrapper-contents-inner">
                        <h3>' . $message . '</h3>
                    </div>
                </div>';
        }

        if($p ==2){
            $out   .= self::PopUpcountdown($crime_time);
            }

        $out   .= ' </div>';

        $out   .= ' </div>';
        return $out;

    }


    public static function PopUpcountdown($time=null){


        $out = ' <div class="popup-container-wrapper-footer popup-countdown-footer">
                    <ul>
                        <li data-time-end="'.$time.'" data-timecb="popupButtonNow"></li>
                        <li>
                            <button id="popupButtonNow" class="btn btn-grey btn-bold btn-big"
                                    onclick="$(\'.menu-item-crimes-crimes a\').click()" disabled="disabled"
                                    data-ready="Go for it!">PLEASE WAIT...
                            </button>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>';


        return $out;

    }


    public static function ResettimeToZero($time){


        if($time < 0){
            $time =0;
        }


        return $time;

    }



    public static function Timeleft($time=null){

        /**
         * time left function
         * it will show minuts and seconds on Js
         * but on php it will display day hours minuts and seconds
         * all working
         */

        $time1 = time();
        $time2 = $time;
        $total = $time2-$time1;
        $init = $total;

        $days = "D".floor($init / 86400);

        $hours = " H".floor($init / 3600);

        $minutes = " M".floor(($init / 60) % 60);
        $seconds = " S".$init % 60;

        if($days=="D0"){
            $days = "";
        }

        if($hours==" H0"){
            $hours = "";
        }
        if($minutes===" M0"){
            $minutes = "";
        }
        if($seconds==" S0"){
            $seconds = "";
        }


        if($time <= time()){

            return "Now";

        }else{


            $data2 = "$days$hours$minutes$seconds";
            $data = "<span data-time-end='".$time."' >" .$data2. "</span>";
            return $data;

        }

    }




  public static function makeNiceTime($intTime)
      /**
       * this is a time ago function
       * call function by
       *   echo    makeNiceTime(time()-60);
       * Give you days hours minuts and seconds ago time
       *
       */
    {
        $curTime = time();
        $strTime = '';
        if ( ($curTime-$intTime) <  (60)) //(24*60*60))
        {
            $strTime = sprintf("%d seconds ago", $curTime-$intTime);
        }
        else if ( ($curTime-$intTime) <  (60*60)) //(24*60*60))
        {
            $strTime = sprintf("%d minutes ago", ($curTime-$intTime) / 60 );
        }
        else if ( ($curTime-$intTime) <  (60*60*24)) //(24*60*60))
        {
            $strTime = sprintf("%d hours ago", ($curTime-$intTime) / (60*60) );
        }
        else if ( ($curTime-$intTime) <  (60*60*24*7)) //(24*60*60))
        {
            $strTime = sprintf("%d days ago", ($curTime-$intTime) / (60*60*24) );
        }
        else
        {  // sample: "12.22 am Sat 21-Jul 2012"
            $strTime = date("g.i a D j-M Y", $intTime);
        }
        return $strTime;
    }


    public static function Viwedata(){
        // collect all data to send to viwe asess by array

        $session = new Session();

        if ($session->is_logged_in()) {
            $account = Accounts::find_by_id($session->user_id);
            $character = Characters::find_by_account_id($account->id);
        }else{
            $account="";
            $character="";
        }


        if(!empty($character->cityid)){

            $city = Citys::find_by_id($character->cityid)->name;

        }else{

            $city = "";


        }

            $data = array(

                "server_name"   => $_SERVER ['SERVER_NAME'],
                "Online"        => self::CountOnlineUsers(),
                "Lackeys"       => 0,
                "Total"         => 0,
                "Registered"    => self::CountAccounts(),
                "game"          => Game::GameVersion(),
                "account"       => $account,
                "character"     => $character,
                "city"          => $city


            );

        $data = (object) $data;
        return $data;
    }


    public static function CountAccounts(){


        $sql2 = "SELECT * FROM accounts ";
        $count2 = Accounts::find_by_sql($sql2);
        $t=0;
        foreach ($count2 as $cont):
           $t++;
        endforeach;



        return $t;
    }



    public static function GameVersion(){

        $data = self::find_by_id("1");

        return $data;

    }


    public static function Health($rp=null){

        /**
         * this function is dysplayng the ranck progrese on info page
         *
         */


        if(empty($rp)){

            echo "  <td bgcolor=red width='100%' align='center'><span style='color:black;text-shadow: none;'>$rp%</span></td>";

        }elseif ($rp==100){

            echo "<td bgcolor=green width='100%' align='center'><span style='color:black;text-shadow: none;'>$rp%</span></td>";

        }else{

            if($rp <= 50){

                $cal= 100-$rp;
                echo "<td bgcolor=green width='$rp%'></td>";
                echo "<td bgcolor=red width='$cal%' ><span style='color:black;text-shadow: none;'>$rp%</span></td>";

            }
            if($rp >= 51){

                $cal= 100-$rp;
                echo "<td bgcolor=green width='$rp%' align='center'><span style='color:black;text-shadow: none;'>$rp%</span></td>";
                echo "<td bgcolor=red width='$cal%' ></td>";

            }

        }

    }



    public static function Rank_Progress($rp=null){

        /**
         * this function is dysplayng the ranck progrese on info page
         *
         */


        if(empty($rp)){

            echo "  <td bgcolor=red width='100%' align='center'><span style='color:black;text-shadow: none;'>$rp%</span></td>";

        }elseif ($rp==100){

            echo "<td bgcolor=#EAC137 width='100%' align='center'><span style='color:black;text-shadow: none;'>$rp%</span></td>";

        }else{

            if($rp <= 50){

                $cal= 100-$rp;
                echo "<td bgcolor=#EAC137 width='$rp%'></td>";
                echo "<td bgcolor=red width='$cal%' ><span style='color:black;text-shadow: none;'>$rp%</span></td>";

            }
            if($rp >= 51){

                $cal= 100-$rp;
                echo "<td bgcolor=#EAC137 width='$rp%' align='center'><span style='color:black;text-shadow: none;'>$rp%</span></td>";
                echo "<td bgcolor=red width='$cal%' ></td>";

            }

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