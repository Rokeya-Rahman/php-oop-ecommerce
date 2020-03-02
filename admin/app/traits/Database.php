<?php
/**
 * Created by PhpStorm.
 * User: Shorna
 * Date: 2/22/2020
 * Time: 8:43 PM
 */

namespace App\traits;


trait Database
{
    public function __construct()
    {
        $connect = mysqli_connect('localhost', 'root', '', 'php_ecommerce');
        return $connect;
    }
}