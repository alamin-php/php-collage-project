<?php 
    class Database{
        public $db_host = "localhost";
        public $db_name = "db_collage";
        public $db_user = "root";
        public $db_pass = "mysql";
        public $pdo;

        public function __construct(){
            if(!isset($this->pdo)){
                try{
                    $link = new PDO("mysql:dbname=".$this->db_host."; dbname=".$this->db_name, $this->db_user, $this->db_pass);
                }catch(PDOExecprion $e){
                    die("Connection Fail".$e->getMessage());
                }
                return $this->pdo = $link;
            }
        }
    }