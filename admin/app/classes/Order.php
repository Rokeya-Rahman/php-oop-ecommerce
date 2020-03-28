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
        $sql    =   "SELECT order_id, order_total, order_status, order_date FROM orders WHERE order_id = '$viewOrderId' ";
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
}