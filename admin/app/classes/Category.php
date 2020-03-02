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
        $categoryName           =   $_POST['category_name'];
        $categoryDescription    =   $_POST['category_description'];
        $publicationStatus      =   $_POST['publication_status'];

        $link = $this->__construct();
        $sql  = "INSERT INTO categories (category_name, category_description, publication_status) VALUES ('".mysqli_real_escape_string($link, $categoryName)."', '".mysqli_real_escape_string($link, $categoryDescription)."', '$publicationStatus')";
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
        $sql   =    "SELECT * FROM categories WHERE deletion_status = 0";
        $query =    mysqli_query($link, $sql);
        return $query;
    }


    public function getCategoryInfoById($categoryEditId)
    {
        $link   =   $this->__construct();
        $sql    =   "SELECT * FROM categories WHERE id = '$categoryEditId' ";
        $query  =   mysqli_query($link, $sql);
        return $query;
    }


    public function updateCategory()
    {
        $categoryId             =   $_POST['id'];
        $categoryName           =   $_POST['category_name'];
        $categoryDescription    =   $_POST['category_description'];
        $publicationStatus      =   $_POST['publication_status'];

        $link   =   $this->__construct();
        $sql    =   "UPDATE categories SET category_name = '".mysqli_real_escape_string($link, $categoryName)."', category_description = '".mysqli_real_escape_string($link, $categoryDescription)."', publication_status = '$publicationStatus' WHERE id = '$categoryId' ";

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
        $sql    =   "UPDATE categories SET deletion_status = 1 WHERE id = '$categoryDeleteId' ";

        if (mysqli_query($link, $sql))
        {
            $message = urldecode('Category information delete successfully');
            header('Location: manage-category.php?message='.$message);

            //$message = 'Category information delete successfully';
            //header("Location: manage-category.php?message={$message}");
        }
        else
        {
            die('Query Problem'.mysqli_error($link));
        }
    }
}