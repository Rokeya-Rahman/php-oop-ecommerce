<?php
/**
 * Created by PhpStorm.
 * User: Shorna
 * Date: 3/12/2020
 * Time: 9:13 AM
 */

namespace App\classes;


class Application
{
    public function __construct()
    {
        $connect = mysqli_connect('localhost', 'root', '', 'php_ecommerce');
        return $connect;
    }

    public function selectCategoryInformation()
    {
        $link   =   $this->__construct();
        $sql    =   "SELECT category_id, category_name FROM categories WHERE category_publication_status = 1 AND category_deletion_status = 0";
        if (mysqli_query($link, $sql))
        {
            $query =    mysqli_query($link, $sql);
            return $query;
        }
        else
        {
            die('Query Problem'.mysqli_error($link));
        }
    }

    public function selectNewProductInformation()
    {
        $link   =   $this->__construct();
        $sql    =   "SELECT * FROM products WHERE product_publication_status = 1 AND product_deletion_status = 0 ORDER BY product_id DESC LIMIT 8";
        if (mysqli_query($link, $sql))
        {
            $query =    mysqli_query($link, $sql);
            return $query;
        }
        else
        {
            die('Query Problem'.mysqli_error($link));
        }
    }

    public function selectAllProductInformation()
    {
        $link   =   $this->__construct();
        $sql    =   "SELECT * FROM products WHERE product_publication_status = 1 AND product_deletion_status = 0 ORDER BY product_id ASC LIMIT 7";
        if (mysqli_query($link, $sql))
        {
            $query =    mysqli_query($link, $sql);
            return $query;
        }
        else
        {
            die('Query Problem'.mysqli_error($link));
        }
    }

    public function selectCategoryProductById($categoryProductId)
    {
        $link   =   $this->__construct();
        $sql    =   "SELECT * FROM products WHERE product_category_id = '$categoryProductId' AND product_publication_status = 1 AND product_deletion_status = 0 ORDER BY product_id DESC";
        if (mysqli_query($link, $sql))
        {
            $query =    mysqli_query($link, $sql);
            return $query;
        }
        else
        {
            die('Query Problem'.mysqli_error($link));
        }
    }

    public function selectProductIdInformation($productDetailsId)
    {
        $link   =   $this->__construct();
        $sql    =   "SELECT * FROM products WHERE product_id = '$productDetailsId'";
        if (mysqli_query($link, $sql))
        {
            $query =    mysqli_query($link, $sql);
            return $query;
        }
        else
        {
            die('Query Problem'.mysqli_error($link));
        }
    }

    public function selectBlogInformation()
    {
        $link   =   $this->__construct();
        $sql    =   "SELECT * FROM blogs WHERE blog_publication_status = 1 AND blog_deletion_status = 0 ORDER BY blog_id DESC";
        if (mysqli_query($link, $sql))
        {
            $query =    mysqli_query($link, $sql);
            return $query;
        }
        else
        {
            die('Query Problem'.mysqli_error($link));
        }
    }

    public function selectBlogIdInformation($blogDetailsId)
    {
        $link   =   $this->__construct();
        $sql    =   "SELECT * FROM blogs WHERE blog_id = '$blogDetailsId'";
        if (mysqli_query($link, $sql))
        {
            $query =    mysqli_query($link, $sql);
            return $query;
        }
        else
        {
            die('Query Problem'.mysqli_error($link));
        }
    }

    public function searchProductInfoBySearchText()
    {
        extract($_POST);
        $searchText = $_POST['search_text'];
        $link   =   $this->__construct();
        $sql    =   "SELECT * FROM products WHERE product_name LIKE '%$searchText%' OR product_code LIKE '%$searchText%' OR  product_price LIKE '%$searchText%' OR product_color LIKE '%$searchText%' ";
        if ($query = mysqli_query($link, $sql))
        {
            return $query;
        }
        else
        {
            die('Query Problem').mysqli_error($link);
        }
    }

    public function saveCartProductInfo()
    {
        $link               =   $this->__construct();
        $productId          =   $_POST['product_id'];
        $productQuantity    =   $_POST['product_quantity'];
        $sql                =   "SELECT * FROM products WHERE product_id = '$productId' ";
        $query              =   mysqli_query($link, $sql);
        $productInfo        =   mysqli_fetch_assoc($query);

        session_start();
        $sessionId          =   session_id();

        $sql2               =   "INSERT INTO temporary_carts (product_id, session_id, product_name, product_price, product_quantity, product_image) VALUES ('$productId', '$sessionId', '$productInfo[product_name]', '$productInfo[product_price]', '$productQuantity', '$productInfo[product_image]' )";
        if (mysqli_query($link, $sql2))
        {
            header('Location: cart.php');
        }
        else
        {
            die('Query Problem').mysqli_error($link);
        }
    }

    public function selectCartProductBySessionId($sessionId)
    {
        $link   =   $this->__construct();
        $sql    =   "SELECT * FROM temporary_carts WHERE session_id = '$sessionId'";
        $query  =   mysqli_query($link, $sql);
        return $query;
    }

    public function updateCartProduct()
    {
        $sessionId = session_id();
        $productId          =   $_POST['product_id'];
        $productQuantity    =   $_POST['product_quantity'];

        $link   =   $this->__construct();
        $sql    =   "UPDATE temporary_carts SET product_quantity = '$productQuantity' WHERE session_id = '$sessionId' AND product_id = '$productId' ";
        if (mysqli_query($link, $sql))
        {
            /*$message = 'Cart product quantity update successfully';
            return $message;*/
			header('Location: cart.php');
        }
        else
        {
            die('Query Problem').mysqli_error($link);
        }
    }

    public function deleteCartProduct($cartDeleteId)
    {
        $link   =   $this->__construct();
        $sessionId = session_id();
        $sql    =   "DELETE FROM temporary_carts WHERE session_id = '$sessionId' AND product_id = '$cartDeleteId' ";
        if (mysqli_query($link, $sql))
        {
            //$message = 'Cart product quantity update successfully';
            //return $message;
            header('Location: cart.php');
        }
        else
        {
            die('Query Problem').mysqli_error($link);
        }
    }

    public function saveCustomerSingUp()
    {
        $firstName      =   $_POST['first_name'];
        $lastName       =   $_POST['last_name'];
        $emailAddress   =   $_POST['email_address'];
        $password       =   md5($_POST['password']);
        $address        =   $_POST['address'];
        $phoneNumber    =   $_POST['phone_number'];
        $city           =   $_POST['city'];
        $country        =   $_POST['country'];
        $zipCode        =   $_POST['zip_code'];

        $link       =   $this->__construct();
        $sql        =   "INSERT INTO customers(first_name, last_name, email_address, password, address, phone_number, city, country, zip_code) VALUES ('$firstName', '$lastName', '$emailAddress', '$password', '$address', '$phoneNumber', '$city', '$country', '$zipCode')";
        if (mysqli_query($link, $sql))
        {
            $customerId = mysqli_insert_id($link);
            $_SESSION['customer_id']    = $customerId;
            $_SESSION['customer_name']  = $firstName.' '.$lastName;
            header('Location: confirmed-registration.php');
        }
        else
        {
            die('Query Problem').mysqli_error($link);
        }
    }

    public function customerLogin()
    {
        $emailAddress   =   $_POST['email_address'];
        $password       =   md5($_POST['password']);

        $link   =   $this->__construct();
        $sql    =   "SELECT * FROM customers WHERE email_address = '$emailAddress' and password = '$password' ";
        if (mysqli_query($link, $sql))
        {
            $queryResult = mysqli_query($link, $sql);
            $customerInfo = mysqli_fetch_assoc($queryResult);
            if ($customerInfo)
            {
                $_SESSION['customer_id']    =   $customerInfo['customer_id'];
                $_SESSION['customer_name']  =   $customerInfo['first_name'].' '.$customerInfo['last_name'];
                header('Location: confirmed-registration.php');
            }
            else
            {
                $message = 'Please use valid email address and password';
                return $message;
            }
        }
        else
        {
            die('Query Problem').mysqli_error($link);
        }
    }

    public function customerLogout()
    {
        unset($_SESSION['customer_id']);
        unset($_SESSION['customer_name']);
        header('Location: index.php');
    }

    public function saveShippingInfo()
    {
        $fullName       =   $_POST['full_name'];
        $emailAddress   =   $_POST['email_address'];
        $address        =   $_POST['address'];
        $phoneNumber    =   $_POST['phone_number'];
        $city           =   $_POST['city'];
        $country        =   $_POST['country'];
        $zipCode        =   $_POST['zip_code'];

        $link   =   $this->__construct();
        $sql    =   "INSERT INTO shippings(full_name, email_address, address, phone_number, city, country, zip_code) VALUES ('$fullName', '$emailAddress', '$address', '$phoneNumber', '$city', '$country', '$zipCode')";
        if (mysqli_query($link, $sql))
        {
            $shippingId = mysqli_insert_id($link);
            $_SESSION['shipping_id'] = $shippingId;
            header('Location: payment.php');
        }
        else
        {
            die('Query Problem').mysqli_error($link);
        }
    }

    public function saveOrderInfo()
    {
        $paymentType = $_POST['payment_type'];
        //print $paymentType;
        //exit();
        $link   =   $this->__construct();
        if ($paymentType == 'cash_on_delivery')
        {
            $sql = "INSERT INTO payments(payment_type) VALUES ('$paymentType')";

            if (mysqli_query($link, $sql))
            {
                $paymentId  =   mysqli_insert_id($link);
                $sqlOrder   =   "INSERT INTO orders(customer_id, shipping_id, payment_id, order_total) VALUES ('$_SESSION[customer_id]', '$_SESSION[shipping_id]', '$paymentId', '$_SESSION[order_total]')";

                if (mysqli_query($link, $sqlOrder))
                {
                    $orderId    =   mysqli_insert_id($link);
                    $sessionId  =   session_id();
                    $sqlSession =   "SELECT * FROM temporary_carts WHERE session_id = '$sessionId' ";
                    $query      =   mysqli_query($link, $sqlSession);
                    while ($cardProduct = mysqli_fetch_assoc($query))
                    {
                        $sqlOrderDetails = "INSERT INTO order_details(order_id, product_id, product_name, product_price, product_quantity) VALUES ('$orderId', '$cardProduct[product_id]', '$cardProduct[product_name]', '$cardProduct[product_price]', '$cardProduct[product_quantity]' )";
                        mysqli_query($link, $sqlOrderDetails);
                    }
                    $sqlTemporaryCart = "DELETE FROM temporary_carts WHERE session_id = '$sessionId' ";
                    mysqli_query($link, $sqlTemporaryCart);
                    header('Location: customer-home.php');
                }
                else
                {
                    die('Query Problem').mysqli_error($link);
                }
            }
            else
            {
                die('Query Problem').mysqli_error($link);
            }
        }
        elseif ($paymentType == 'paypal')
        {

        }
    }
}