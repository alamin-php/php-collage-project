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
        <!-- start header area  -->
        <div class="header-area clear">
            <h2>Admin Panel</h2>
            <div class="user-nav clear">
                <ul>
                    <li><a href="index">Home</a></li>
                    <li><a href="index">User</a></li>
                    <li><a href="index">Logout</a></li>
                </ul>
            </div>
        </div>
        <!-- end header area  -->

        <!-- start area  -->
        <div class="main-content clear">
            <div class="sidebar-area clear float-left">
                <div class="sidebar">
                    <h2>Theme Option</h2>
                    <ul>
                        <li><a href="#">Social Option</a></li>
                        <li><a href="#">Header Option</a></li>
                        <li><a href="#">Footer Option</a></li>
                    </ul>
                </div>
                <div class="sidebar">
                    <h2>Category Option</h2>
                    <ul>
                        <li><a href="#">Add Category</a></li>
                        <li><a href="#">Category List</a></li>
                    </ul>
                </div>
                <div class="sidebar">
                    <h2>Tag Option</h2>
                    <ul>
                        <li><a href="#">Add Tag</a></li>
                        <li><a href="#">Tag List</a></li>
                    </ul>
                </div>
                <div class="sidebar">
                    <h2>Post Option</h2>
                    <ul>
                        <li><a href="#">Add Post</a></li>
                        <li><a href="#">Post List</a></li>
                    </ul>
                </div>
                <div class="sidebar">
                    <h2>Footer Option</h2>
                    <ul>
                        <li><a href="#">Top Footer Option</a></li>
                        <li><a href="#">Copyright Option</a></li>
                    </ul>
                </div>
                <div class="sidebar mb-0">
                    <h2>Administive Option</h2>
                    <ul>
                        <li><a href="#">User List</a></li>
                        <li><a href="#">User Role</a></li>
                        <li><a href="#">Change password</a></li>
                    </ul>
                </div>
            </div>
            <div class="content-area clear float-left">
                <h2 class="title">Content Heading</h2>
                <p class="subtitle">Lorem ipsum dolor sit amet.</p>
            </div>
        </div>
        <div class="footer-area clear">
            <h3>&copy; <?php echo date('Y'); ?> All right revared <span clsss="float-right">Development by Al Amin</span></h3>
        </div>
    </div>    

</body>
</html>