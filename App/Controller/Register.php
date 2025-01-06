<?php
    include "../Model/user.php";
    include "Connection.php";
    
    Class Register {
        private $fname;
        private $lname;
        private $email;
        private $pass;
        private $rpass;
        private $option;
        function __set($key, $value) {
            if(property_exists($this, $key)) {
                $this->$key=self::sanitize($value);
            }
        }
        function __get($key) {
            if(property_exists($this, $key)) {
              return $this->$key; 
            }
        }
        public static function sanitize($value) {
            $value=trim($value);
            $value=stripslashes($value);
            $value=htmlspecialchars($value);
            return $value;
        }
    }
    
    if($_SERVER["REQUEST_METHOD"]=="POST") {
        $Register=new Register();
        $Register->fname=$_POST["fname"];//setting fname using set magic function
        $fname=$Register->fname;//getting fname

        $Register->lname=$_POST["lname"];//setting lname using set magic function
        $lname=$Register->lname;//getting lname

        $Register->email=$_POST["email"];//setting email using set magic function
        $email=$Register->email;//getting email

        $Register->pass=$_POST["pass"];//setting pass using set magic function
        $pass=$Register->pass;//getting pass

        $Register->rpass=$_POST["rpass"];//setting rpass using set magic function
        $rpass=$Register->rpass;//getting rpass

        $Register->option=$_POST["option"];//setting option using set magic function
        $option=$Register->option;//getting option

        $allowedEmail=["architv18@gmail.com","archit.avology@gmail.com"];//allowed email for admin

        $User=new User\registerUser(); //registerUser class object
        $conn=new Conn\Connect();
       
            if($option==="Admin") {
                if(in_array($email,$allowedEmail)) {
                    if($User->userExists($conn,$email))
                    {
                        echo "user exists";
                    }
                    else
                    {
                        $name=$fname." ".$lname;
                        $User->Register($conn,$option,$name,$email,$pass);
                    }
                }
                else
                {
                    echo "Not a valid email";
                }
            }
            else if($option==="User") {
                if(!in_array($email,$allowedEmail)){
                    if($User->userExists($conn,$email)){
                        echo "user exists";
                    }
                else{
                    $name=$fname." ".$lname;
                    $hash=password_hash($pass,PASSWORD_DEFAULT);
                    $User->Register($conn,$option,$name,$email,$hash);
                }   
            }
            else
            {
                echo "email invalid";
            }
         }
    }
?>