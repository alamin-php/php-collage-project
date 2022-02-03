<?php
include_once "Session.php";
include "Database.php";
    class User{
        public $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function userRegister($data){
            $name = $data["name"];
            $username = $data["username"];
            $email = $data["email"];
            $password = $data["password"];

            $check_username = $this->checkUsername($username);
            $check_email = $this->checkEmail($email);

            if($name == "" OR  $username == "" OR  $email == "" OR $password == ""){
                $msg = "<div class='error-msg'><strong>Error! </strong> Field must not be empty.</div>";
                return $msg;
            }
            if(strlen($username) < 4 ){
                $msg = "<div class='error-msg'><strong>Error! </strong> Username too Short.</div>";
                return $msg;
            }elseif(preg_match("/[^a-z0-9_-]+/i", $username)){
                $msg = "<div class='error-msg'><strong>Error! </strong> Username must only content alphanmerical, dashes and underscores!</div>";
                return $msg;
            }elseif($check_username == true){
                $msg = "<div class='error-msg'><strong>Error! </strong> Username already Exist.</div>";
                return $msg;
            }
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $msg = "<div class='error-msg'><strong>Error! </strong> Invalid email address.</div>";
                return $msg;
            }
            if(strlen($password) < 6 ){
                $msg = "<div class='error-msg'><strong>Error! </strong> Password should be gatter then 6 digit.</div>";
                return $msg;
            }
            if($check_email == true){
                $msg = "<div class='error-msg'><strong>Error! </strong> Email address already Exist.</div>";
                return $msg;
            }

            $sql = "INSERT INTO tbl_user (name, username, email, password) VALUES(:name, :username, :email, :password)";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindValue(':name', ucfirst($name));
            $stmt->bindValue(':username', $username);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', md5($password));
            $result = $stmt->execute();
            if($result){
                $msg = "<div class='success-msg'><strong>Thank you! </strong> You are register successfully.</div>";
                return $msg;
            }
        }
        public function userLogin($data){
            $email = $data["email"];
            $password = md5($data["password"]);
            $check_email = $this->checkEmail($email);

            if($email == "" OR $password == ""){
                $msg = "<div class='error-msg'><strong>Error! </strong> Field must not be empty.</div>";
                return $msg;
            }

            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $msg = "<div class='error-msg'><strong>Error! </strong> Invalid email address.</div>";
                return $msg;
            }
            if($check_email == false){
                $msg = "<div class='error-msg'><strong>Error! </strong> Email address not Exist.</div>";
                return $msg;
            }

           $result = $this->getUserLogin($email, $password);
           if($result){
            Session::init();
            Session::set("login", true);
            Session::set("id", $result->id);
            Session::set("name", $result->name);
            Session::set("username", $result->username);
            Session::set("email", $result->email);
            Session::set("loginmsg", "<div class='success-msg'><strong>Thank you! </strong> You are LoggedIn.</div>");
            header("Location:index.php");
           }else{
            $msg = "<div class='error-msg'><strong>Error! </strong> User data not Exist.</div>";
            return $msg;
           }
        }

        public function getUserLogin($email, $password){
            $sql = "SELECT * FROM tbl_user WHERE email = :email AND password = :password LIMIT 1";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', $password);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            return $result;
        }

        public function checkEmail($email){
            $sql = "SELECT email FROM tbl_user WHERE email = :email";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindValue(':email', $email);
            $stmt->execute();
            $result = $stmt->rowCount();
            if($result > 0){
                return true;
            }else{
                return false;
            }
        }

        public function checkUsername($username){
            $sql = "SELECT username FROM tbl_user WHERE username = :username";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindValue(':username', $username);
            $stmt->execute();
            $result = $stmt->rowCount();
            if($result > 0){
                return true;
            }else{
                return false;
            }
        }

        public function getAllUser(){
            $sql = "SELECT * FROM tbl_user ORDER BY id DESC";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }

        public function getUserById($id){
            $sql = "SELECT * FROM tbl_user WHERE id = :id";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            return $result;
        }
    }