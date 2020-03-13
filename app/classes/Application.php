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
        $query  =   mysqli_query($link, $sql);
        return $query;
    }

    public function selectBlogInformation()
    {
        $link   =   $this->__construct();
        $sql    =   "SELECT * FROM blogs WHERE blog_publication_status = 1 AND blog_deletion_status = 0 ORDER BY blog_id DESC";
        $query  =   mysqli_query($link, $sql);
        return $query;
    }

    public function selectBlogIdInformation($blogDetailsId)
    {
        $link   =   $this->__construct();
        $sql    =   "SELECT * FROM blogs WHERE blog_id = '$blogDetailsId'";
        $query  =   mysqli_query($link, $sql);
        return $query;
    }
}