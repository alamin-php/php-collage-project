<?php 
    $filepath = realpath(dirname(__FILE__));
    include $filepath."/admin/lib/Setting.php";
?>
<?php 
    $setting = new Setting();
    $result = $setting->getSettingData();
    $banner = $setting->getBannerData();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $result->htitle;?></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <header class="header-area">
            <div class="head-title">
                <h1>
                    <?php 
                        echo $result->htitle;
                    ?>
                </h1>
            </div>
            <nav class="main-menu">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
        </header>
        <main class="main-content clearfix">
            <?php 
            if($banner){
            ?>
            <div class="banner-area">
                <div class="banner-info">
                    <h2><?php echo $banner->title; ?></h2>
                    <p><?php echo $banner->subtitle; ?></p>
                    <a href="<?php echo $banner->btnlink; ?>" class="read-more"><?php echo $banner->btntitle; ?></a>
                </div>
            </div>
            <?php } ?>
            <div class="content-image-area clearfix">
                <img src="images/admission-image.jpg" alt="">
            </div>
            <div class="content-text-area clearfix">
                <h2>50% OFF</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Perferendis dicta neque optio voluptatum,
                    qui vel eaque consequatur tenetur vero quo nisi necessitatibus. Illo temporibus quidem consectetur,
                    accusantium officia ullam atque?</p>
                <a href="#" class="read-more">Admission Here</a>
            </div>
        </main>
        <section class="course-area clearfix">
            <h2>Our courses</h2>
            <div class="course-wrapper clearfix">
                <div class="course">
                    <h4>Computer Technology</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, exercitationem.</p>
                    <a href="" class="read-more">Show details</a>
                </div>
                <div class="course">
                    <h4>Electrical Technology</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, exercitationem.</p>
                    <a href="" class="read-more">Show details</a>
                </div>
                <div class="course">
                    <h4>Agricalture Technology</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, exercitationem.</p>
                    <a href="" class="read-more">Show details</a>
                </div>
                <div class="course mr-0">
                    <h4>Fishing Technology</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, exercitationem.</p>
                    <a href="" class="read-more">Show details</a>
                </div>
                <div class="course">
                    <h4>Civil- Technology</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, exercitationem.</p>
                    <a href="" class="read-more">Show details</a>
                </div>
                <div class="course">
                    <h4>Architech Technology</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, exercitationem.</p>
                    <a href="" class="read-more">Show details</a>
                </div>
                <div class="course">
                    <h4>Power Technology</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, exercitationem.</p>
                    <a href="" class="read-more">Show details</a>
                </div>
                <div class="course mr-0">
                    <h4>Mechanic Technology</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, exercitationem.</p>
                    <a href="" class="read-more">Show details</a>
                </div>
            </div>
        </section>
        <footer class="footer-area clearfix">
            <h2><?php echo $result->ftitle; ?></h2>
        </footer>
    </div>
</body>

</html>