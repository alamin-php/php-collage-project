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

        // Bannar 

        public function updateBanner($data){
            $title    = $data["title"];
            $subtitle = $data["subtitle"];
            $btntitle = $data["btntitle"];
            $btnlink  = $data["btnlink"];

            if($title == "" OR  $subtitle == "" OR  $btntitle == "" OR $btnlink == ""){
                $msg = "<div class='error-msg' style='margin-top: 20px;'><strong>Error! </strong> Field must not be empty.</div>";
                return $msg;
            }

            $sql = "UPDATE tbl_banner SET title=:title, subtitle=:subtitle, btntitle=:btntitle, btnlink=:btnlink WHERE id=:id";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindValue(':title', $title);
            $stmt->bindValue(':subtitle', $subtitle);
            $stmt->bindValue(':btntitle', $btntitle);
            $stmt->bindValue(':btnlink', $btnlink);
            $stmt->bindValue(':id', 1);
            $result = $stmt->execute();
            if($result){
                $msg = "<div class='success-msg' style='margin:20px auto 0px;'><strong>Success! </strong> Banner Changed successfully.</div>";
                return $msg;
            }
        }

        public function getBannerData(){
            $sql = "SELECT * FROM tbl_banner WHERE id = 1";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            return $result;
        }
    }