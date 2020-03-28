<?php

    use App\classes\Order;
    $order = new Order();

    $viewOrderId = $_GET['order_id'];
    $orderQuery = $order->selectOrderTableInfo($viewOrderId);
    $orderTable = mysqli_fetch_assoc($orderQuery);

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
            </div>
        </div>
    </div><!--/span-->

</div><!--/row-->
