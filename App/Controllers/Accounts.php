<?php


use Hackzilla\PasswordGenerator\Generator\ComputerPasswordGenerator;




class Accounts
{

    private static $table_name = "accounts";
    public static $db_fields = array();

    public $id;
    public $email;
    public $mailme;
    public $password;


    public function __construct()
    {

        $db = $this->databese();

        $result_set = $db->query("SELECT * FROM " . self::$table_name . " LIMIT 1");
        $num_fields = $result_set->result->field_count;
        foreach ($result_set->result_array() as $key => $value) {
            $stdArray[$key] = (array)$value;
            foreach ($stdArray[0] as $key => $value):
                self::$db_fields[] = $key;
                $name = $this->{$key};
            endforeach;
        }


    }


    function databese()
    {
        // We could simply use `global $db;`, but using globals is bad. Instead we can do this:
        $db = Database::instance();
        return $db;
    }


    public function __get($name)
    {
        echo "Object <b>$name</b> does not exist From <b>" . ucfirst(self::$table_name) . "</b> Class";
        exit();
    }


    public function __set($name, $value)
    {
        echo "Object <b>$name</b> does not exist On <b>" . ucfirst(self::$table_name) . "</b> Database";
        exit();
    }


    public static function hof()
    {
        $title = "";
        $subtitle = "";
        $extension = "com.pt";
        $release_date = date("Y-m-d H:i:s");

        $img = $_SERVER['SERVER_NAME'] . "/uploads/hof/com.pt/5.45/family.png";

        $bestfamaly = array(
            "name" => "Contrabando -Nike",
            "type" => "family",
            "image" => $img,
            "friendlyName" => "Family",
            "itemId" => "f_container"
        );

        $bestranker = array(
            "name" => "Nina",
            "type" => "ranker",
            "image" => $img,
            "friendlyName" => "Ranker",
            "itemId" => "f_ranker"
        );

        $bestkiller = array(
            "name" => "Marshall",
            "type" => "killer",
            "image" => $img,
            "friendlyName" => "Assassino",
            "itemId" => "f_killer"
        );
        $bestbuster = array(
            "name" => "Neeko",
            "type" => "buster",
            "image" => $img,
            "friendlyName" => "Buster",
            "itemId" => "f_buster"
        );

        $hof = array($bestfamaly, $bestranker, $bestkiller, $bestbuster);


        $stats = array(
            "total" => 167699,
            "alive" => 203,
            "dead" => 167496,
            "online" => 11
        );

        $data = array(
            "title" => $title,
            "subtitle" => $subtitle,
            "hof" => $hof,
            "release_date" => $release_date,
            "extension" => $extension,
            "stats" => $stats,
        );

        return $data;
    }

    public static function AliveUserEndpoint()
    {

        $data = array(
            "bLoading" => false,
            "bNewUser" => true
        );
        return $data;
    }

    public static function FooterEndpoint()
    {


        //{"settings":[],"dead":[{"name":"Room","nameClean":"Room","killdate":"15\/04\/2019","rankName":"Bruglione","gender":1,"version":5.13,"hof":false},{"name":"5.12Room","nameClean":"Room","killdate":"01\/01\/1970","rankName":"Empty-suit","gender":1,"version":5.12,"hof":false}],"messages":[]}
        //account setings to be loock at
        $settings = array();

        //History of dead accounts
        $dead = array(
            "name" => "5.25Lml",
            "nameClean" => "Lm",
            "killdate" => "01/01/1970",
            "rankName" => "Empty-suit",
            "gender" => 1,
            "version" => 5.25,
            "hof" => false,
        );

        $data = array(
            "settings" => $settings,
            "dead" => $dead
        );

        return $data;
    }

    public static function autenticate($email, $pass)
    {

        $pass = sha1($pass);


        $sql = "SELECT * FROM " . self::$table_name . " ";
        $sql .= "WHERE email = '{$email}' ";
        $sql .= "AND password = '{$pass}' ";
        $sql .= "LIMIT 1";


        $result_array = self::find_by_sql($sql);

        return !empty($result_array) ? array_shift($result_array) : false;


    }

    public static function find_by_id($id = 0)
    {
        $result_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE id={$id} LIMIT 1");
        return !empty($result_array) ? array_shift($result_array) : false;
    }

    public static function find_by_sql($sql = "")
    {
        $database = new Database();
        $result_set = $database->query($sql);
        $data = $result_set->result_array();

        $object_array = array();
        $i = 0;
        foreach ($row = $result_set->result_array() as $key => $value) {

            $object_array[] = self::instantiate($row[$i++]);
        }
        return $object_array;
    }

    public function Save()
    {
        return isset($this->id) ? $this->Update() : $this->Create();
    }

    public function Create()
    {

        $data = (array)$this;

        $db = $this->databese();
        $db->insert(self::$table_name, $data);
        return $db->id();
    }


    public function Update()
    {
        $attributes = $this->sanitized_attributes();
        $attribute_pairs = array();
        foreach ($attributes as $key => $value) {
            $attribute_pairs[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE " . self::$table_name . " SET ";
        $sql .= join(", ", $attribute_pairs);
        $sql .= " WHERE id=" . $this->id;
        $db = $this->databese();
        $db->query($sql);
        return ($db->affected() == 1) ? true : false;
    }


    protected function sanitized_attributes()
    {

        $clean_attributes = array();
        // sanitize the values before submitting
        // Note: does not alter the actual value of each attribute
        foreach ($this->attributes() as $key => $value) {
            $clean_attributes[$key] = $value;
        }
        return $clean_attributes;
    }


    public static function instantiate($record)
    {
        $object = new self;
        foreach ($record as $attribute => $value) {
            if ($object->has_attribute($attribute)) {
                $object->$attribute = $value;
            }
        }
        return $object;
    }

    private function has_attribute($attribute)
    {
        return array_key_exists($attribute, $this->attributes());
    }

    protected function attributes()
    {
        $attributes = array();
        foreach (self::$db_fields as $field) {
            if (property_exists($this, $field)) {
                $attributes[$field] = $this->$field;
            }
        }
        return $attributes;
    }

    public static function EmailSobjectPasswordToUser($email = null, $password = null)
    {

        $msgsubject = "Congratulations! You have just registered your Omerta account and you can already enter the <a href=\"{$_SERVER['SERVER_NAME']}\">{$_SERVER['SERVER_NAME']}</a> with your credentials.<br/><br/>";
        $msgsubject .= "Login ({$email}) Password: {$password}<br/><br/>";
        $msgsubject .= "Note: Password is case sensitive)<br/><br/>";
        $msgsubject .= "Check out the game start guide here:Wiki<br/><br/>";
        $msgsubject .= "To communicate with other players of Omerta you can use the Chat within the game or IRC - Here you have a link to enter IRC directly with 'Mibbit':Wiki<br/><br/>";
        $msgsubject .= "If you prefer to install an IRC program, we recommend mIRC. You can find more information about IRC and its definitions in the following link:Wiki<br/><br/>";
        $msgsubject .= "For now, that's all you need to know - Visit the {$_SERVER['SERVER_NAME']} to play and become the best gangster in the mafia world!<br/><br/>";
        $msgsubject .= "hanks for signing up and we hope you have fun playing Omerta!<br/><br/>";
        $msgsubject .= "Best regards,<br/>The Omerta team<br/>Live for the Game, Die for the Game.<br/><br/>";
        $msgsubject .= "P.S. If you have received this email in error or do not want to receive more emails from Omerta, <br/>please click on the following link:";

        return $msgsubject;
    }


    public static function PasswordGenerator()
    {

        $generator = new ComputerPasswordGenerator();

        $generator
            ->setUppercase()
            ->setLowercase()
            ->setNumbers()
            ->setSymbols(false)
            ->setLength(8);

        $password = $generator->generatePassword();

        return $password;
    }
}