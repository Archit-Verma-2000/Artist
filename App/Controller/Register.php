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
        public $msg;
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
        public function msg($type,$msg) {
            $this->msg=
            '<div class="alert alert-'. $type .' alert-dismissable fade-show">
                <button type="btn">&times<button><span>'. $msg .'<span>
            </div>';
            return $msg;
        }
    }
    
    if($_SERVER["REQUEST_METHOD"]=="POST") {

        $Register=new Register();
        $User=new User\registerUser(); //registerUser class object
        $conn=new Conn\Connect();
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
       
            if($option==="Admin") {
                if(in_array($email,$allowedEmail)) {
                    if($User->userExists($conn,$email))
                    {
                        $msg="user exists";
                    }
                    else
                    {
                        $msg="succesfully registered";
                        $res=$User->userInfo($conn,$email);
                        $_SESSION["Admin"]=$res;
                        setcookie("Admin",$email,time()+60*60*24*30,"/");
                        echo json_encode(["status"=>"success","msg"=>$Register->msg("success",$msg),"role"=>$option]);
                    }
                }
                else
                {
                        $msg="Not a valid email";
                        echo json_encode(["status"=>"failed","msg"=>$Register->msg("success",$msg)]);
                }
            }
            else if($option==="User") {
                if(!in_array($email,$allowedEmail)){
                    if($User->userExists($conn,$email)) {

                        $msg="User Already exists";
                        echo json_encode(["status"=>"failed","msg"=>$Register->msg("danger",$msg)]);
                    }
                else{
                    $name=$fname." ".$lname;
                    $hash=password_hash($pass,PASSWORD_DEFAULT);
                    if($User->Register($conn,$option,$name,$email,$hash))
                    {
                        $msg="succesfully registered";
                        $res=$User->userInfo($conn,$email);
                        $_SESSION["User"]=$res;
                        setcookie("user",$email,time()+60*60*24*30,"/");
                        echo json_encode(["status"=>"success","msg"=>$Register->msg("success",$msg),"role"=>$option]);
                    }
                    else
                    {
                        $msg="Error occured try again";
                        echo json_encode(["status"=>"failed","msg"=>$Register->msg("danger",$msg)]);
                    }
                }   
            }
            else
            {
                        $msg="Not a valid email";
                        echo json_encode(["status"=>"failed","msg"=>$Register->msg("danger",$msg)]);
            }
         }
    }
?>