<?php

    use App\classes\Application;

    $productDetailsId       =   $_GET['product'];
    $application            =   new Application();
    $product                =   $application->selectProductIdInformation($productDetailsId);
    $productDetailsIdInfo   =   mysqli_fetch_assoc($product);

    //$sessionId = session_id();
    //$temporaryCartSessionIdDetails = $application->selectCartProductBySessionId($sessionId);
    //$cartProduct = mysqli_fetch_assoc($temporaryCartSessionIdDetails);

    if (isset($_POST['btn']))
    {
        $productQuantity = $_POST['product_quantity'];
        //$productId = $_POST['product_id'];
//        if ($productQuantity > 0 && $productQuantity <= $productDetailsIdInfo['product_quantity'])
//        {
//            if ($cartProduct['product_id'] != $productId)
//            {
//                $application->saveCartProductInfo();
//            }
//            else
//            {
//                $application->updateCartProduct();
//            }
//        }
//        else
//        {
//            $productAmount = 'You have choosen more than stock amount of this product. Please choose maximum '.$productDetailsIdInfo['product_quantity'].' which are available now.';
//        }

        if ($productQuantity > 0 && $productQuantity <= $productDetailsIdInfo['product_quantity'])
        {
            $application->saveCartProductInfo();
        }
        else
        {
            $productAmount = 'You have choosen more than stock amount of this product. Please choose maximum '.$productDetailsIdInfo['product_quantity'].' which are available now.';
        }
    }

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
                    <h4 style="margin-bottom: 20px;">Product Code : <?php print $productDetailsIdInfo['product_code']; ?></h4>
                    <h4 style="margin-bottom: 20px;">Product Color : <?php print $productDetailsIdInfo['product_color']; ?></h4>
                    <h4>Stock Amount : <?php print $productDetailsIdInfo['product_quantity']; ?></h4>
                    <div class="btn_form">
                        <form action="" method="post">
                            <input type="number" name="product_quantity" value="1">
                            <h5 style="color:red; margin-top: 10px;"><?php if (isset($productAmount)) { print $productAmount; } ?></h5>
                            <input type="hidden" name="product_id" value="<?php print $productDetailsIdInfo['product_id']; ?>"
                            <hr>
                            <input type="submit" name="btn" value="buy">
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