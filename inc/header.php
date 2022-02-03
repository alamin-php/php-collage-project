<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once $filepath.'/../lib/Session.php';
    Session::init();
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
<?php 
    if(isset($_GET["action"]) && $_GET["action"] == "logout"){
        Session::destroy();
    }
?>
<body>
    <?php 
        $id = Session::get('id');
    ?>
    <div class="container clear">
        <!-- start header area  -->
        <div class="header-area clear">
            <h2>Admin Panel</h2>
            <div class="user-nav clear">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="user_view.php?id=<?php echo $id; ?>">Profile</a></li>
                    <li><a href="?action=logout">Logout</a>
                </li>
                </ul>
            </div>
        </div>
        <!-- end header area  -->