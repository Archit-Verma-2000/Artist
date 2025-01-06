<?php    
    namespace Conn;
    require "../../vendor/autoload.php";
    use Dotenv\Dotenv;
    $dotenv=Dotenv::createImmutable(__DIR__ . "/../../");
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
                $this->conn=new \PDO(self::$dsn,self::$db_user,self::$db_pass);
            }
            catch(\PDOException $e)
            {
                echo $e->getMessage();
            }
        }
       
    }
   
?>