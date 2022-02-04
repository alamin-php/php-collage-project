<?php 
    include "inc/header.php"; 
    include "lib/Homepage.php"; 
?>
<?php 
    $home = new Homepage();
   if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["update"]){
    $updateSetting = $home->updateSetting($_POST);
   }
?>

<!-- start area  -->
<div class="main-content clear">
    <?php include_once "inc/sidebar.php"; ?>
    <div class="content-area clear float-right">
        <h2 class="title">Theme Setting</h2>
        <?php 
            if(isset($updateSetting)){
                echo $updateSetting;
            }
        ?>
        <div class="form-area" style="margin:20px auto 0px;">
        <?php 
            $result = $home->getSettingData();
            if($result){
        ?>
            <form action="" method="post">
                <label for="">Header Title</label>
                <input type="text" name="htitle" value="<?php echo $result->htitle; ?>">
                <label for="">Footer Title</label>
                <input type="text" name="ftitle" value="<?php echo $result->ftitle; ?>">
                <input type="submit" name="update" value="Change">
            </form>
            <?php } ?>
        </div>
    </div>
</div>

<?php include_once "inc/footer.php"; ?>