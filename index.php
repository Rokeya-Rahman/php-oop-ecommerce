<?php

    ob_start();
    session_start();
    require_once 'vendor/autoload.php';
    use App\classes\Application;
    $application = new Application();

    if (isset($_GET['customer']))
    {
        $application = new Application();
        $application->customerLogout();
    }
?>



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
        <link href="assets/css/flexslider.css" rel='stylesheet' type='text/css'/>
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
                if ($pages == 'product-details-content')
                {
                    include './pages/product-details-content.php';
                }
                if ($pages == 'blog-details-content')
                {
                    include './pages/blog-details-content.php';
                }
                if ($pages == 'contact-content')
                {
                    include './pages/contact-content.php';
                }
                if ($pages == 'cart-content')
                {
                    include './pages/cart-content.php';
                }
                if ($pages == 'checkout-content')
                {
                    include './pages/checkout-content.php';
                }
                if ($pages == 'customer-signup-content')
                {
                    include './pages/customer-signup-content.php';
                }
                if ($pages == 'customer-login-content')
                {
                    include './pages/customer-login-content.php';
                }
                if ($pages == 'confirmed-registration-content')
                {
                    include './pages/confirmed-registration-content.php';
                }
                if ($pages == 'shipping-content')
                {
                    include './pages/shipping-content.php';
                }
                if ($pages == 'payment-content')
                {
                    include './pages/payment-content.php';
                }
                if ($pages == 'customer-home-content')
                {
                    include './pages/customer-home-content.php';
                }
            }
            else
            {
                include './pages/home-content.php';
            }

        ?>

        <?php include './includes/footer.php'; ?>


        <script defer src="assets/js/jquery.flexslider.js"></script>
        <script type="text/javascript">
            $(function(){
                SyntaxHighlighter.all();
            });
            $(window).load(function(){
                $('.flexslider').flexslider({
                    animation: "slide",
                    start: function(slider){
                        $('body').removeClass('loading');
                    }
                });
            });
        </script

    </body>
    </html>