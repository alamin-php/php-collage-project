<?php 
    include "inc/header.php"; 
    include "lib/Banner.php"; 
?>
<?php 
    $banner = new Banner();
   if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["update"]){
    $updateBanner = $banner->updateBanner($_POST);
   }
?>

<!-- start area  -->
<div class="main-content clear">
    <?php include_once "inc/sidebar.php"; ?>
    <div class="content-area clear float-right">
        <h2 class="title">Banner Setting</h2>
        <?php 
            if(isset($updateBanner)){
                echo $updateBanner;
            }
        ?>
        <?php 
            $value = $banner->getBannerData();
            if($value){
        ?>
        <div class="form-area" style="margin:20px auto 0px;">
            <form action="" method="post">
                <label for="">Title</label>
                <input type="text" name="title" value="<?php echo $value->title; ?>">
                <label for="">Subtitle</label>
                <input type="text" name="subtitle" value="<?php echo $value->subtitle; ?>">
                <label for="">Button Title</label>
                <input type="text" name="btntitle" value="<?php echo $value->btntitle; ?>">
                <label for="">Button Link</label>
                <input type="text" name="btnlink" value="<?php echo $value->btnlink; ?>">
                <input type="submit" name="update" value="Change">
            </form>
        </div>
        <?php } ?>
    </div>
</div>

<?php include_once "inc/footer.php"; ?>