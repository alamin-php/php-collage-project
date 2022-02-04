<?php 
    include_once "inc/header.php"; 
    include_once "lib/User.php"; 
?>
<?php 
    $user = new User();

?>
<?php 
    if(isset($_GET["action"]) && $_GET["action"] == "delete"){
        $userid = (int) $_GET['id'];
        $deleteUser = $user->deleteUserProfile($userid);
    }
?>
<!-- start area  -->
<div class="main-content clear">
    <?php include_once "inc/sidebar.php"; ?>
    <div class="content-area clear float-right">
        <?php 
            if(isset($deleteUser)){
                echo $deleteUser;
            }
        ?>
        <h2 class="title">All Users</h2>
        <table class="tblone">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <?php
             $result = $user->getAllUser();
            $i=0; 
            if($result) : 
            foreach($result as $value) : 
            $i++; 
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $value["name"] ?></td>
                <td><?php echo $value["username"] ?></td>
                <td><?php echo $value["email"] ?></td>
                <td>
                    <a href="user_view.php?id=<?php echo $value['id']; ?>">View</a> ||
                    <a href="?action=delete&id=<?php echo $value['id']; ?>" onclick=return confirm(Are you sure to delete data? )>Delete</a>
                </td>
            </tr>
            <?php endforeach; endif; ?>

        </table>
    </div>
</div>

<?php include_once "inc/footer.php"; ?>