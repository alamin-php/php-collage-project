<?php 
    include "inc/header.php"; 
    include "lib/Homepage.php"; 
?>
<?php 
    $home = new Homepage();
   if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["add"]){
    $addCourse = $home->addCourse($_POST);
   }
?>

<!-- start area  -->
<div class="main-content clear">
    <?php include_once "inc/sidebar.php"; ?>
    <div class="content-area clear float-right">
    <h2 class="title">Add Course <span class="float-right"><a href="course_list.php">Back</a></span></h2>
        <?php 
            if(isset($addCourse)){
                echo $addCourse;
            }
        ?>
        <div class="form-area" style="margin:20px auto 0px;">
            <form action="" method="post">
                <label for="">Title</label>
                <input type="text" name="title">
                <label for="">Details</label>
                <input type="text" name="details">
                <label for="">Button Title</label>
                <input type="text" name="btntitle">
                <label for="">Button Link</label>
                <input type="text" name="btnlink">
                <input type="submit" name="add" value="Add new course">
            </form>
        </div>
    </div>
</div>

<?php include_once "inc/footer.php"; ?>