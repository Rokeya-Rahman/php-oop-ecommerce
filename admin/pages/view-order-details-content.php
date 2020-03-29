<?php

    use App\classes\Order;
    $order = new Order();

    $viewOrderId = $_GET['order_id'];
    $orderQuery = $order->selectOrderTableInfo($viewOrderId);
    $orderTable = mysqli_fetch_assoc($orderQuery);

    $productDetailsQuery = $order->productDetailsByOrderId();

?>



<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="admin-master.php">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">View Order Details</a></li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Order Details View</h2>
        </div>
        <div class="box-content">
            <div class="container">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                        <h1 class="text-center">Order Details Info For This Order</h1>
<!--                        <tr>-->
<!--                            <th>Order Id</th>-->
<!--                            <td>--><?php //print htmlentities($productIdInfo['category_name']); ?><!--</td>-->
<!--                        </tr>-->
                        <tr>
                            <th>Order Id</th>
                            <td><?php print $orderTable['order_id']; ?></td>
                        </tr>
                        <tr>
                            <th>Order Total</th>
                            <td><?php print $orderTable['order_total']; ?></td>
                        </tr>
                        <tr>
                            <th>Order Status</th>
                            <td><?php print $orderTable['order_status']; ?></td>
                        </tr>
                        <tr>
                            <th>Order Date</th>
                            <td><?php print $orderTable['order_date']; ?></td>
                        </tr>
                    </table>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                        <h1 class="text-center">Customer Details Info For This Order</h1>
                        <tr>
                            <th>Customer Name</th>
                            <td><?php print $orderTable['first_name'].' '.$orderTable['last_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td><?php print $orderTable['phone_number']; ?></td>
                        </tr>
                        <tr>
                            <th>Email Address</th>
                            <td><?php print $orderTable['email_address']; ?></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td><?php print $orderTable['address']; ?></td>
                        </tr>
                    </table>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                        <h1 class="text-center">Shipping Details Info For This Order</h1>
                        <tr>
                            <th>Customer Name</th>
                            <td><?php print $orderTable['shipping_full_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td><?php print $orderTable['shipping_phone_number']; ?></td>
                        </tr>
                        <tr>
                            <th>Email Address</th>
                            <td><?php print $orderTable['shipping_email_address']; ?></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td><?php print $orderTable['shipping_address']; ?></td>
                        </tr>
                    </table>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                        <h1 class="text-center">Payment Details Info For This Order</h1>
                        <tr>
                            <th>Payment Type</th>
                            <td><?php print $orderTable['payment_type']; ?></td>
                        </tr>
                        <tr>
                            <th>Payment Status</th>
                            <td><?php print $orderTable['payment_status']; ?></td>
                        </tr>
                    </table>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                        <h1 class="text-center">Product Details Info For This Order</h1>
                        <tr>
                            <th>Product Id</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Total Price</th>
                        </tr>
                        <?php while ($orderProductDetails = mysqli_fetch_assoc($productDetailsQuery)) { ?>
                            <?php if ($orderProductDetails['order_id'] == $viewOrderId) { ?>
                                <tr>
                                    <td><?php print $orderProductDetails['product_id']; ?></td>
                                    <td><?php print $orderProductDetails['product_name']; ?></td>
                                    <td><?php print $orderProductDetails['product_price']; ?></td>
                                    <td><?php print $orderProductDetails['product_quantity']; ?></td>
                                    <td><?php print $orderProductDetails['product_price'] * $orderProductDetails['product_quantity']; ?></td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div><!--/span-->

</div><!--/row-->
