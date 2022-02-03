<?php 
  include_once "lib/User.php";
  Session::init();
  Session::loginSession();
?>
<?php 
  $user = new User();
  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])){
    $userRegister = $user->userRegister($_POST);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/responsive.css">
</head>
<body>
    <div class="container clear">
      <div class="login-area">
        <?php 
          if(isset($userRegister)){
            echo $userRegister;
          }
        ?>
        <h2>Registration</h2>
        <div class="form-area">
            <form action="" method="post">
                <label for="">Name</label>
                <input type="text" name="name">
                <label for="">Username</label>
                <input type="text" name="username">
                <label for="">Email</label>
                <input type="text" name="email">
                <label for="">Password</label>
                <input type="password" name="password">
                <input type="submit" name="register" value="Register">
            </form>
            <span>I am already registerd <a href="login.php">Login</a></span>
        </div>
      </div>
    </div>    

</body>
</html>