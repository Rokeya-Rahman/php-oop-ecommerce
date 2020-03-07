<?php

    ob_start();
    session_start();
    if (!isset($_SESSION['id']))
    {
        header('Location: index.php');
        exit();
    }

    require_once 'vendor/autoload.php';
    use App\classes\Admin;

    if (isset($_GET['status']))
    {
        $admin = new Admin();
        $admin->adminLogout();
    }

?>



<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- start: Meta -->
        <meta charset="utf-8">
        <title>Ecommerce Dashbord</title>
        <meta name="description" content="Bootstrap Metro Dashboard">
        <meta name="author" content="Dennis Ji">
        <meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <!-- end: Meta -->

        <!-- start: Mobile Specific -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- end: Mobile Specific -->

        <!-- start: CSS -->
        <link id="bootstrap-style" href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link id="base-style" href="assets/css/style.css" rel="stylesheet">
        <link id="base-style-responsive" href="assets/css/style-responsive.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
        <!-- end: CSS -->


        <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <link id="ie-style" href="assets/css/ie.css" rel="stylesheet">
        <![endif]-->

        <!--[if IE 9]>
        <link id="ie9style" href="assets/css/ie9.css" rel="stylesheet">
        <![endif]-->

        <!-- start: Favicon -->
        <link rel="shortcut icon" href="assets/img/favicon.ico">
        <!-- end: Favicon -->




    </head>

    <body>

        <?php include './includes/header.php'; ?>

        <div class="container-fluid-full">
            <div class="row-fluid">

                <?php include './includes/menu.php'; ?>

                <noscript>
                    <div class="alert alert-block span10">
                        <h4 class="alert-heading">Warning!</h4>
                        <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
                    </div>
                </noscript>

                <!-- start: Content -->
                <div id="content" class="span10">


                    <?php

                        if (isset($pages))
                        {
                            if ($pages == 'add-category-content')
                            {
                                include './pages/add-category-content.php';
                            }

                            if ($pages == 'manage-category-content')
                            {
                                include './pages/manage-category-content.php';
                            }

                            if ($pages == 'edit-category-content')
                            {
                                include './pages/edit-category-content.php';
                            }

                            if ($pages == 'add-product-content')
                            {
                                include './pages/add-product-content.php';
                            }

                            if ($pages == 'manage-product-content')
                            {
                                include './pages/manage-product-content.php';
                            }

                            /*if ($pages = 'view-product-content')
                            {
                                include './pages/view-product-content.php';
                            }*/

                            if ($pages == 'edit-product-content')
                            {
                                include './pages/edit-product-content.php';
                            }
                        }
                        else
                        {
                            include './pages/admin-home.php';
                        }

                    ?>



                </div><!--/.fluid-container-->

                <!-- end: Content -->
            </div><!--/#content.span10-->
        </div><!--/fluid-row-->

        <div class="modal hide fade" id="myModal">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Settings</h3>
            </div>
            <div class="modal-body">
                <p>Here settings can be configured...</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn" data-dismiss="modal">Close</a>
                <a href="#" class="btn btn-primary">Save changes</a>
            </div>
        </div>

        <div class="clearfix"></div>

        <?php include './includes/footer.php'; ?>

        <!-- start: JavaScript-->

        <script src="assets/js/jquery-1.9.1.min.js"></script>
        <script src="assets/js/jquery-migrate-1.0.0.min.js"></script>

        <script src="assets/js/jquery-ui-1.10.0.custom.min.js"></script>

        <script src="assets/js/jquery.ui.touch-punch.js"></script>

        <script src="assets/js/modernizr.js"></script>

        <script src="assets/js/bootstrap.min.js"></script>

        <script src="assets/js/jquery.cookie.js"></script>

        <script src='assets/js/fullcalendar.min.js'></script>

        <script src='assets/js/jquery.dataTables.min.js'></script>

        <script src="assets/js/excanvas.js"></script>
        <script src="assets/js/jquery.flot.js"></script>
        <script src="assets/js/jquery.flot.pie.js"></script>
        <script src="assets/js/jquery.flot.stack.js"></script>
        <script src="assets/js/jquery.flot.resize.min.js"></script>

        <script src="assets/js/jquery.chosen.min.js"></script>

        <script src="assets/js/jquery.uniform.min.js"></script>

        <script src="assets/js/jquery.cleditor.min.js"></script>

        <script src="assets/js/jquery.noty.js"></script>

        <script src="assets/js/jquery.elfinder.min.js"></script>

        <script src="assets/js/jquery.raty.min.js"></script>

        <script src="assets/js/jquery.iphone.toggle.js"></script>

        <script src="assets/js/jquery.uploadify-3.1.min.js"></script>

        <script src="assets/js/jquery.gritter.min.js"></script>

        <script src="assets/js/jquery.imagesloaded.js"></script>

        <script src="assets/js/jquery.masonry.min.js"></script>

        <script src="assets/js/jquery.knob.modified.js"></script>

        <script src="assets/js/jquery.sparkline.min.js"></script>

        <script src="assets/js/counter.js"></script>

        <script src="assets/js/retina.js"></script>

        <script src="assets/js/custom.js"></script>
        <!-- end: JavaScript-->

    </body>
</html>