<?php

    $sessionId = session_id();
    $temporaryCartSessionIdDetails = $application->selectCartProductBySessionId($sessionId);
    $cartProduct = mysqli_fetch_assoc($temporaryCartSessionIdDetails);

    if (isset($_POST['update_btn']))
    {
        $productDetailsId       =   $_POST['product_id'];
        $product                =   $application->selectProductIdInformation($productDetailsId);
        $productDetailsIdInfo   =   mysqli_fetch_assoc($product);

        $productQuantity = $_POST['product_quantity'];
        if ($productQuantity > 0 && $productQuantity <= $productDetailsIdInfo['product_quantity'])
        {
            $application->updateCartProduct();
        }
        else
        {
            $productAmount = 'You have choosen more than stock amount of this product. Please choose maximum '.$productDetailsIdInfo['product_quantity'].' which are available now.';
        }
    }

    if (isset($_GET['cart']))
    {
        $cartDeleteId = $_GET['product_id'];
        $message = $application->deleteCartProduct($cartDeleteId);

    }

?>



<div class="container-fluid" style="margin: 50px 0;">
    <div class="row">
        <div class="col-md-12">
            <div style="width: 80%; margin: auto;">
                <h2 class="text-warning text-center">Product Cart Table</h2>
                <hr>
<!--                <h3>-->
<!--                    --><?php
//                        if (isset($message))
//                        {
//                            print $message;
//                            unset($message);
//                        }
//                    ?>
<!--                </h3>-->
            </div>
            <hr>
            <table class="table table-bordered text-center" style="width: 80%; margin: auto;">
                <tr class="bg-danger">
                    <th class="text-center" style="padding: 15px 0;">Product Name</th>
                    <th class="text-center" style="padding: 15px 0;">Product Image</th>
                    <th class="text-center" style="padding: 15px 0;">Product Price</th>
                    <th class="text-center" style="padding: 15px 0;">Product Quantity</th>
                    <th class="text-center" style="padding: 15px 0;">Total Price</th>
                    <th class="text-center" style="padding: 15px 0;">Action</th>
                </tr>

                <?php $total = 0; foreach ($temporaryCartSessionIdDetails as $cartProduct) { ?>
                    <tr class="bg-danger">
                        <td style="padding: 30px 0;"><?php print $cartProduct['product_name']; ?></td>
                        <td>
                            <img src="admin/<?php print $cartProduct['product_image']; ?>" alt="" height="60" width="50" style="margin: 10px 0;"/>
                        </td>
                        <td style="padding: 30px 0;">&#2547; <?php print $cartProduct['product_price']; ?></td>
                        <td style="padding: 30px 0;">
                            <form action="" method="post">
                                <div class="input-group">
                                    <input type="number" name="product_quantity" value="<?php print $cartProduct['product_quantity']; ?>" min="1"/>
                                    <input type="hidden" name="product_id" value="<?php print $cartProduct['product_id']; ?>"/>
                                    <button type="submit" name="update_btn" class="btn btn-primary btn-xs" style="margin-left: 20px;">UPDATE</button>
                                    <h5 style="color:red; margin-top: 10px;"><?php if (isset($productAmount)) { print $productAmount; } ?></h5>
                                </div>
                            </form>
                        </td>
                        <td style="padding: 30px 0;">
                            <?php
                                $subTotal = $cartProduct['product_price'] * $cartProduct['product_quantity'];
                                print '&#2547; '.$subTotal;
                            ?>
                        </td>
                        <td style="padding: 30px 0;">
                            <a href="?cart=delete&product_id=<?php print $cartProduct['product_id']; ?>" class="btn btn-danger" title="DELETE">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                        </td>
                    </tr>
                <?php $total = $total + $subTotal; } ?>

            </table>
            <hr>
            <table class="table table-bordered" style="width: 80%; margin: auto;">
                <tr class="bg-danger">
                    <th style="padding: 15px 20px;">Sub Total</th>
                    <td class="pull-right" style="padding: 15px 20px;">&#2547; <?php print $total; ?></td>
                </tr>
                <tr class="bg-danger">
                    <th style="padding: 15px 20px;">Vat Total</th>
                    <td class="pull-right" style="padding: 15px 20px;">
                        <?php
                            $vat = $total*.15;
                            print '&#2547; '.$vat;
                        ?>
                    </td>
                </tr>
                <tr class="bg-danger">
                    <th style="padding: 15px 20px;">Grand Total</th>
                    <td class="pull-right" style="padding: 15px 20px;">
                        <?php
                            $grandTotal = $total+$vat;
                            $_SESSION['order_total'] = $grandTotal;
                            print '&#2547; '.$grandTotal;
                        ?>
                    </td>
                </tr>
            </table>
            <hr>
            <div style="width: 80%; margin: auto;">
                <a href="index.php" class="btn btn-info">Continue Shopping</a>
                <?php if (isset($_SESSION['customer_id'])) { ?>
                    <a href="shipping.php" class="btn btn-info pull-right">Shipping</a>
                <?php } else { ?>
                    <a href="checkout.php" class="btn btn-info pull-right">Checkout</a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
