<?php 
include_once "Session.php";
include "Database.php";
    class Setting{
        public $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function updateSetting($data){
            $headerTitle = $data['htitle'];
            $footerTitle = $data['ftitle'];

            if($headerTitle == "" OR $footerTitle == ""){
                $msg = "<div class='error-msg' style='margin:20px auto 0px;'><strong>Error! </strong> Field must not be empty.</div>";
                return $msg;
            }

            $sql = "UPDATE tbl_setting SET htitle = :htitle, ftitle = :ftitle WHERE id = :id";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindValue(':htitle', $headerTitle);
            $stmt->bindValue(':ftitle', $footerTitle);
            $stmt->bindValue(':id', 1);
            $result = $stmt->execute();
            if($result){
                $msg = "<div class='success-msg' style='margin:20px auto 0px;'><strong>Success! </strong> Setting Changed successfully.</div>";
                return $msg;
            }
        }

        public function getSettingData(){
            $sql = "SELECT * FROM tbl_setting WHERE id = 1";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            return $result;
        }
    }