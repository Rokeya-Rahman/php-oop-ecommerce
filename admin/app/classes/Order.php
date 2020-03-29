<?php
/**
 * Created by PhpStorm.
 * User: Shorna
 * Date: 3/27/2020
 * Time: 4:41 PM
 */

namespace App\classes;


use App\traits\Database;

class Order
{
    use Database;

    public function selectAllOrderInfo()
    {
        $link   =   $this->__construct();
        $sql    =   "SELECT orders.order_id, orders.order_total, orders.order_date, orders.order_status, orders.customer_id, orders.payment_id, customers.first_name, customers.last_name, payments.payment_type, payments.payment_status FROM orders, customers, payments WHERE orders.customer_id = customers.customer_id AND orders.payment_id = payments.payment_id ";
        if (mysqli_query($link, $sql))
        {
            $query = mysqli_query($link, $sql);
            return $query;
        }
        else
        {
            die('Query Problem').mysqli_error($link);
        }
    }

    public function selectOrderTableInfo($viewOrderId)
    {
        $link   =   $this->__construct();
        $sql    =   "SELECT orders.order_id, orders.order_total, orders.order_status, orders.order_date, customers.first_name, customers.last_name, customers.phone_number, customers.email_address, customers.address, shippings.shipping_full_name, shippings.shipping_phone_number, shippings.shipping_email_address, shippings.shipping_address, payments.payment_type, payments.payment_status FROM orders, customers, shippings, payments WHERE orders.customer_id = customers.customer_id AND orders.shipping_id = shippings.shipping_id AND orders.payment_id = payments.payment_id AND order_id = '$viewOrderId' ";
        if (mysqli_query($link, $sql))
        {
            $query = mysqli_query($link, $sql);
            return $query;
        }
        else
        {
            die('Query Problem').mysqli_error($link);
        }
    }

    public function productDetailsByOrderId()
    {
        $link   =   $this->__construct();
        $sql    =   "SELECT order_details.product_id, order_details.product_name, order_details.product_price, order_details.product_quantity, orders.order_id FROM order_details, orders WHERE order_details.order_id = orders.order_id ";
        if (mysqli_query($link, $sql))
        {
            $query = mysqli_query($link, $sql);
            return $query;
        }
        else
        {
            die('Query Problem').mysqli_error($link);
        }
    }

    public function deleteOrder($deleteOrderId)
    {
        $link   =   $this->__construct();
        $sql    =   "DELETE FROM orders WHERE order_id = '$deleteOrderId' ";
        if (mysqli_query($link, $sql))
        {
            $message = urldecode('Order information delete successfully');
            header('Location: manage-order.php?message='.$message);
        }
        else
        {
            die('Query Problem'.mysqli_error($link));
        }
    }
}