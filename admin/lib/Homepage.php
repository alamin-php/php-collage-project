<?php 
include_once "Session.php";
include "Database.php";
    class Homepage{
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
        // Add Course 

        public function addCourse($data){
            $title    = $data["title"];
            $details = $data["details"];
            $btntitle = $data["btntitle"];
            $btnlink  = $data["btnlink"];
            $status  = true;

            if($title == "" OR  $details == "" OR  $btntitle == "" OR $btnlink == ""){
                $msg = "<div class='error-msg' style='margin-top: 20px;'><strong>Error! </strong> Field must not be empty.</div>";
                return $msg;
            }


            $sql = "INSERT INTO tbl_course (title, details, btntitle, btnlink, status) VALUES(:title, :details, :btntitle, :btnlink, :status)";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindValue(':title', $title);
            $stmt->bindValue(':details', $details);
            $stmt->bindValue(':btntitle', $btntitle);
            $stmt->bindValue(':btnlink', $btnlink);
            $stmt->bindValue(':status', $status);
            $result = $stmt->execute();
            if($result){
                $msg = "<div class='success-msg' style='margin:20px auto 0px;'><strong>Success! </strong> Course added successfully.</div>";
                return $msg;
            }
        }

        public function getCourseData(){
            $sql = "SELECT * FROM tbl_course";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }
        
        // Update Course 

        public function updateCourse($id, $data){
            $title    = $data["title"];
            $details  = $data["details"];
            $btntitle = $data["btntitle"];
            $btnlink  = $data["btnlink"];
            $status   = $data["status"];

            if($title == "" OR $details == "" OR $btntitle == "" OR $btnlink == ""){
                $msg = "<div class='error-msg' style='margin-top: 20px;'><strong>Error! </strong> Field must not be empty.</div>";
                return $msg;
            }else{
                $sql = "UPDATE tbl_course SET
                        title    = :title,
                        details  = :details,
                        btntitle = :btntitle,
                        btnlink  = :btnlink,
                        status   = :status WHERE
                        id = :id
                ";
                $stmt = $this->db->pdo->prepare($sql);
                $stmt->bindValue(':title', $title);
                $stmt->bindValue(':details', $details);
                $stmt->bindValue(':btntitle', $btntitle);
                $stmt->bindValue(':btnlink', $btnlink);
                $stmt->bindValue(':status', $status);
                $stmt->bindValue(':id', $id);
                $result = $stmt->execute();
                if($result){
                    $msg = "<div class='success-msg' style='margin:20px auto 0px;'><strong>Success! </strong> Course update successfully.</div>";
                    return $msg;
                }
            }
        }

        public function deleteCourse($id){
            $result = $this->delete($id);
            if($result){
                $msg = "<div class='success-msg' style='margin:20px auto 0px;'><strong>Success! </strong> Course deleted successfully.</div>";
                return $msg;
            }
        }
        
        public function getCourseById($id){
            $sql = "SELECT * FROM tbl_course WHERE id=:id";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            return $result;
        }

        public function delete($id){
            $sql = "DELETE FROM tbl_course WHERE id=:id";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindValue(':id',$id);
            $result = $stmt->execute();
            return $result;
        }
    }