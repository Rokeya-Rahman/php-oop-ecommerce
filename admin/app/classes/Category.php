<?php
/**
 * Created by PhpStorm.
 * User: Shorna
 * Date: 2/10/2020
 * Time: 8:50 AM
 */

namespace App\classes;

use App\traits\Database;


class Category
{
    use Database;

    public function saveCategory()
    {
        $categoryName               =   $_POST['category_name'];
        $categoryDescription        =   $_POST['category_description'];
        $categoryPublicationStatus  =   $_POST['category_publication_status'];

        $link = $this->__construct();
        $sql  = "INSERT INTO categories (category_name, category_description, category_publication_status, category_create_date) VALUES ('".mysqli_real_escape_string($link, $categoryName)."', '".mysqli_real_escape_string($link, $categoryDescription)."', '$categoryPublicationStatus', '".date("Y-m-d h:i:sa")."')";
        if (mysqli_query($link, $sql))
        {
            $message = 'Category information save successfully';
            return $message;
        }
        else
        {
            die('Query Problem'.mysqli_error($link));
        }
    }


    public function selectCategoryInfo()
    {
        $link  =    $this->__construct();
        //$sql   =    "SELECT * FROM categories";
        $sql   =    "SELECT * FROM categories WHERE category_deletion_status = 0";
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


    public function getCategoryInfoById($categoryEditId)
    {
        $link   =   $this->__construct();
        $sql    =   "SELECT * FROM categories WHERE category_id = '$categoryEditId' ";
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


    public function updateCategory()
    {
        $categoryId                 =   $_POST['category_id'];
        $categoryName               =   $_POST['category_name'];
        $categoryDescription        =   $_POST['category_description'];
        $categoryPublicationStatus  =   $_POST['category_publication_status'];

        $link   =   $this->__construct();
        $sql    =   "UPDATE categories SET category_name = '".mysqli_real_escape_string($link, $categoryName)."', category_description = '".mysqli_real_escape_string($link, $categoryDescription)."', category_publication_status = '$categoryPublicationStatus', category_update_date = '".date("Y-m-d h:i:sa")."' WHERE category_id = '$categoryId'";

        if (mysqli_query($link, $sql))
        {
            $_SESSION['message'] = "Category information update successfully";
            header('Location: manage-category.php');

        }
        else
        {
            die('Query Problem'.mysqli_error($link));
        }
    }


    public function deleteCategory($categoryDeleteId)
    {
        $link   =   $this->__construct();
        //$sql    =   "DELETE FROM categories WHERE product_id = '$categoryDeleteId' ";
        $sql    =   "UPDATE categories SET category_deletion_status = 1 WHERE category_id = '$categoryDeleteId' ";

        if (mysqli_query($link, $sql))
        {
            $message = urldecode('Category information delete successfully');
            header('Location: manage-category.php?message='.$message);

            //$message = 'Category information delete successfully';
            //header("Location: manage-men-fashion.php?message={$message}");
        }
        else
        {
            die('Query Problem'.mysqli_error($link));
        }
    }
}