<?php

    use App\classes\Application;
    $application = new Application();

    if (isset($_POST['search']))
    {
        $query = $application->searchProductInfoBySearchText();
    }

?>



<div class="header_top">
    <div class="container">
        <div class="header_top-box">
            <div class="cssmenu" style="color:white;">
                <ul>
                    <?php if (isset($_SESSION['customer_id'])) { ?>
                        <?php print $_SESSION['customer_name']; ?>
                        <li><a href="?customer=logout">Log Out</a></li>
                    <?php } else { ?>
                        <li><a href="customer-login.php">Log In</a></li>
                        <li><a href="customer-signup.php">Sign Up</a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="header_bottom">
    <div class="container">
        <div class="header_bottom-box">
            <div class="header_bottom_left">
                <div class="logo">
                    <a href="index.php"><img src="assets/images/logo.png" alt=""/></a>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="header_bottom_right">

                <form action="" method="post">
                    <div class="search">
                        <input type="text" name="search_text">
                        <input type="submit" name="search" value="">
                    </div>
                </form>

                <ul class="bag">
                    <a href="cart.php"><i class="bag_left"></i></a>
                    <div class="clearfix"></div>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>