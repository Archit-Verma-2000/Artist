<?php
    namespace User;
    Class registerUser {
        private static $sql;
        private static $stmt;
        public function Register($conn,...$args){
            $role=$args[0];
            $name=$args[1];
            $email=$args[2];
            $pass=$args[3];
            self::$sql="INSERT INTO users(role,name,email,password) VALUES(:role,:name,:email,:pass)";
            self::$stmt=$conn->conn->prepare(self::$sql);
            self::$stmt->bindParam(':role',$role);
            self::$stmt->bindParam(':name',$name);
            self::$stmt->bindParam(':email',$email);
            self::$stmt->bindParam(':pass',$pass);
            // Execute the statement
            self::$stmt->execute();
            return true;
        } 
        Public function userExists($conn,$email) {
            self::$sql="SELECT email FROM users where email=:email";
            self::$stmt=$conn->conn->prepare(self::$sql);
            self::$stmt->bindParam(':email',$email);
            // Execute the statement
            self::$stmt->execute();
            //fetching associative array
            $res=self::$stmt->fetch(\PDO::FETCH_ASSOC);
            return($res);
        }
        public function userInfo($email) {
            self::$sql="SELECT * FROM users where email=:email";
            self::$stmt=$conn->conn->prepare(self::$sql);
            self::$stmt->bindParam(':email',$email);
            // Execute the statement
            self::$stmt->execute();
            //fetching associative array
            $res=self::$stmt->fetch(\PDO::FETCH_ASSOC);
            return($res); 
        }
    }
?>