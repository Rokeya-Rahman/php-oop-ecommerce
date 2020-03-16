<?php

    require_once 'vendor/autoload.php';

    use App\classes\Application;

    $productDetailsId       =   $_GET['product'];
    $application            =   new Application();
    $product                =   $application->selectProductIdInformation($productDetailsId);
    $productDetailsIdInfo   =   mysqli_fetch_assoc($product);

?>



<div class="men">
    <div class="container">
        <div class="single_top">
            <div class="col-md-12 single_right">
                <div class="grid images_3_of_2">
                    <!-- FlexSlider -->
                    <section class="slider_flex">
                        <div class="flexslider">
                            <ul class="slides">
                                <li><img src="admin/<?php print $productDetailsIdInfo['product_image']; ?>" class="img-responsive" alt=""/></li>
                                <li><img src="admin/<?php print $productDetailsIdInfo['product_image2']; ?>" class="img-responsive" alt=""/></li>
                                <li><img src="admin/<?php print $productDetailsIdInfo['product_image3']; ?>" class="img-responsive" alt=""/></li>
                            </ul>
                        </div>
                    </section>
                    <!-- FlexSlider -->
                    <div class="clearfix"></div>
                </div>
                <div class="desc1 span_3_of_2">
                    <h1><?php print $productDetailsIdInfo['product_name']; ?></h1>
                    <p class="m_5" style="margin: 8px 0; color: red;">&#2547; <?php print $productDetailsIdInfo['product_price']; ?></p>
                    <h4>Product Code : <?php print $productDetailsIdInfo['product_code']; ?></h4>
                    <h4>Product Color : <?php print $productDetailsIdInfo['product_color']; ?></h4>
                    <div class="btn_form">
                        <form>
                            <input type="submit" value="buy" title="">
                        </form>
                    </div>
                    <h4>Product Summary : </h4>
                    <p class="m_text2"><?php print $productDetailsIdInfo['product_short_description']; ?></p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="toogle">
            <h2>Product More Details Information : </h2>
            <p class="m_text2"><?php print $productDetailsIdInfo['product_long_description']; ?></p>
        </div>
    </div>
</div>