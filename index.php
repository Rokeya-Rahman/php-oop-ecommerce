<!DOCTYPE HTML>
<html>
    <head>
        <title>E-Commerce online Shopping Category</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Gifty Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <link href="assets/css/bootstrap.css" rel='stylesheet' type='text/css' />
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <!-- Custom Theme files -->
        <link href="assets/css/style.css" rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="assets/css/jquery.countdown.css" />
        <!-- Custom Theme files -->
        <!--webfont-->
        <link href='http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="assets/js/jquery-1.11.1.min.js"></script>
        <!-- dropdown -->
        <script src="assets/js/jquery.easydropdown.js"></script>
        <!-- start menu -->
        <link href="assets/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
        <script type="text/javascript" src="assets/js/megamenu.js"></script>
        <script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
        <script src="assets/js/responsiveslides.min.js"></script>
        <script>
            $(function () {
                $("#slider").responsiveSlides({
                    auto: true,
                    nav: false,
                    speed: 500,
                    namespace: "callbacks",
                    pager: true,
                });
            });
        </script>
        <script src="assets/js/jquery.countdown.js"></script>
        <script src="assets/js/script.js"></script>
    </head>
    <body>

        <?php include './includes/header.php'; ?>

        <?php include './includes/menu.php'; ?>

        <?php

            if (isset($pages))
            {
                if ($pages == 'category-content')
                {
                    include './pages/category-content.php';
                }
                if ($pages == 'blog-content')
                {
                    include './pages/blog-content.php';
                }
                if ($pages == 'blog-details-content')
                {
                    include './pages/blog-details-content.php';
                }
                if ($pages == 'contact-content')
                {
                    include './pages/contact-content.php';
                }
            }
            else
            {
                include './pages/home-content.php';
            }

        ?>

        <?php include './includes/footer.php'; ?>

    </body>
    </html>