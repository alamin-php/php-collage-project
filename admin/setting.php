<?php 
    include "inc/header.php"; 
    include "lib/Setting.php"; 
?>
<?php 
    $setting = new Setting();
   if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["update"]){
    $updateSetting = $setting->updateSetting($_POST);
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
            $result = $setting->getSettingData();
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