<?php
    require "../../vendor/autoload.php";
    $dotenv=Dotenv\Dotenv::createImmutable(__DIR__ . "/../../");
    $dotenv->load();
    Class Connect{
        private static $dsn;
        private static $db_user;
        private static $db_pass;
        private static $pass;
        public $conn;
        public function __construct()
        {
            self::$dsn="mysql:host=".$_ENV["Db_host"] . ";dbname=" .$_ENV["Db_name"];
            self::$db_user=$_ENV["Db_user"];
            self::$db_pass=$_ENV["Db_password"];
            try{
                $conn=new PDO(self::$dsn,self::$db_user,self::$db_pass);
               
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
       
    }
   
?>