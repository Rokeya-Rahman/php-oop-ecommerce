<?php
/**
 * Created by PhpStorm.
 * User: Shorna
 * Date: 2/6/2020
 * Time: 8:26 PM
 */

namespace App\classes;


class Admin
{
    public function adminLogin()
    {
        $emailAddress   =   $_POST['email_address'];
        $password       =   md5($_POST['password']);

        $connection =   mysqli_connect('localhost', 'root', '', 'php_ecommerce');
        $sql        =   " SELECT * FROM admin_login WHERE email_address = '$emailAddress' AND password = '$password' ";
        if (mysqli_query($connection, $sql))
        {
            $queryResult = mysqli_query($connection, $sql);
            $adminInfo = mysqli_fetch_assoc($queryResult);
            if ($adminInfo)
            {
                session_start();
                $_SESSION['id']         =   $adminInfo['id'];
                $_SESSION['admin_name'] =   $adminInfo['admin_name'];
                header('Location: admin-master.php');
            }
            else
            {
                $message = 'Please use valid email address and password';
                return $message;
            }
        }
        else
        {
            die('Query Problem').mysqli_error($connection);
        }
    }

    public function adminLogout()
    {
        unset($_SESSION['id']);
        unset($_SESSION['admin_name']);
        header('Location: index.php');
    }
}