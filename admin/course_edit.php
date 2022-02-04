<?php 
    include "inc/header.php"; 
    include "lib/Homepage.php"; 
?>
<?php 
    $home = new Homepage();
?>

<?php 
    if(isset($_GET['id'])){
        $userid = $_GET['id'];
    }

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])){
        $updateCourse = $home->updateCourse($userid, $_POST);
       }
?>

<!-- start area  -->
<div class="main-content clear">
    <?php include_once "inc/sidebar.php"; ?>
    <div class="content-area clear float-right">
    <h2 class="title">Update Course <span class="float-right"><a href="course_list.php">Back</a></span></h2>
        <?php 
            if(isset($updateCourse)){
                echo $updateCourse;
            }
        ?>
        <?php
            $result = $home->getCourseById($userid);
            if($result){
        ?>
        <div class="form-area" style="margin:20px auto 0px;">
            <form action="" method="post">
                <label for="">Title</label>
                <input type="text" name="title" value="<?php echo $result->title; ?>">
                <label for="">Details</label>
                <input type="text" name="details" value="<?php echo $result->details; ?>">
                <label for="">Button Title</label>
                <input type="text" name="btntitle" value="<?php echo $result->btntitle; ?>">
                <label for="">Button Link</label>
                <input type="text" name="btnlink" value="<?php echo $result->btnlink; ?>">
                <label for="">Status</label>
                <input type="radio" name="status" value="0" <?php if($result->status == false ){ echo "checked"; }?>> Disabled
                <input type="radio" name="status" value="1" <?php if($result->status == true ){ echo "checked"; }?>> Enable <br/>
                <input type="submit" name="update" value="Update">
            </form>
        </div>
        <?php } ?>
    </div>
</div>

<?php include_once "inc/footer.php"; ?>