<?php 
    include_once "inc/header.php"; 
    include_once "lib/User.php"; 
?>
<?php 
    $user = new User();
    $result = $user->getAllUser();
?>

<?php 
    if(isset($_GET['id'])){
        $userid = $_GET['id'];
        $result = $user->getUserById($userid);
    }
?>
<!-- start area  -->
<div class="main-content clear">
    <?php include_once "inc/sidebar.php"; ?>
    <div class="content-area clear float-right">
        <h2 class="title">User Details <span class="float-right"><a href="user_list.php">Back</a></span></h2>
        <div class="form-area" style="max-width:500px; margin:20px auto 0px;">
            <form action="" method="post">
                <label for="">Name</label>
                <input type="text" name="name" value="<?php echo $result->name; ?>">
                <label for="">Username</label>
                <input type="text" name="username" value="<?php echo $result->username; ?>">
                <label for="">Email</label>
                <input type="text" name="email" value="<?php echo $result->email; ?>">

                <input type="submit" name="update" value="Update">
            </form>
        </div>

    </div>
</div>

<?php include_once "inc/footer.php"; ?>