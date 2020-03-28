<?php

    use App\classes\Order;

    $order = new Order();
    $orders = $order->selectAllOrderInfo();
    /*while ($order = mysqli_fetch_assoc($orders))
    {
        print '<pre>';
        print_r($order);
    }
    exit();*/

?>



<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="admin-master.php">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Manage Order</a></li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Order Manage</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                <tr>
                    <th>Order Id</th>
                    <th>Customer Name</th>
                    <th>Order Total</th>
                    <th>Order Date</th>
                    <th>Order Status</th>
                    <th>Payment Type</th>
                    <th>Payment Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                <?php while ($order = mysqli_fetch_assoc($orders)) { ?>
                    <tr>
                        <th><?php print $order['order_id']; ?></th>
                        <th><?php print htmlentities($order['first_name'].' '.$order['last_name']); ?></th>
                        <th><?php print htmlentities($order['order_total']); ?></th>
                        <th><?php print $order['order_date']; ?></th>
                        <th><?php print htmlentities($order['order_status']); ?></th>
                        <th><?php print htmlentities($order['payment_type']); ?></th>
                        <th><?php print htmlentities($order['payment_status']); ?></th>

                        <td class="center">
                            <a class="btn btn-warning" href="view-order-details.php?order_id=<?php print $order['order_id']; ?>" title="View Order">
                                <i class="halflings-icon white zoom-in"></i>
                            </a>
                            <a class="btn btn-primary" href="" title="View Invoice">
                                <i class="halflings-icon white zoom-out"></i>
                            </a>
                            <a class="btn btn-success" href="" title="Download Invoice">
                                <i class="halflings-icon white download"></i>
                            </a>
                            <a class="btn btn-info" href="">
                                <i class="halflings-icon white edit"></i>
                            </a>
                            <a class="btn btn-danger" href="">
                                <i class="halflings-icon white trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>

                </tbody>
            </table>
        </div>
    </div><!--/span-->

</div><!--/row-->