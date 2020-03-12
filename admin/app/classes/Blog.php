<?php
/**
 * Created by PhpStorm.
 * User: Shorna
 * Date: 3/9/2020
 * Time: 8:30 PM
 */

namespace App\classes;


use App\traits\Database;

class Blog
{
    use Database;

    public function saveBlog()
    {
        $blogName               =   $_POST['blog_name'];
        $blogTag                =   $_POST['blog_tag'];
        $blogShortDescription   =   $_POST['blog_short_description'];
        $blogLongDescription    =   $_POST['blog_long_description'];
        $blogPublicationStatus  =   $_POST['blog_publication_status'];

        $imagePath              =   'assets/blog-images/';
        $imageName              =   $_FILES['blog_image']['name'];
        $fileName               =   pathinfo($imageName, PATHINFO_FILENAME);
        $extension              =   pathinfo($imageName, PATHINFO_EXTENSION);
        $uniqueSaveName         =   time().uniqid(rand()).'.'."$extension";
        $blogImageUrl           =   $imagePath.$fileName.'-'.$uniqueSaveName;
        $tmpFileName            =   $_FILES["blog_image"]["tmp_name"];
        move_uploaded_file($tmpFileName,  $blogImageUrl);

        $link   =   $this->__construct();
        $sql    =   "INSERT INTO blogs (blog_name, blog_tag, blog_short_description, blog_long_description, blog_image, blog_publication_status, blog_create_date) VALUES ('".mysqli_real_escape_string($link, $blogName)."', '".mysqli_real_escape_string($link, $blogTag)."', '".mysqli_real_escape_string($link, $blogShortDescription)."', '".mysqli_real_escape_string($link, $blogLongDescription)."', '$blogImageUrl', '$blogPublicationStatus', '".date("Y-m-d h:i:sa")."' )";

        if (mysqli_query($link, $sql))
        {
            $message = 'Product information save successfully';
            return $message;
        }
        else
        {
            die('Query Problem'.mysqli_error($link));
        }
    }

    public function selectBlogInfo()
    {
        $link   =   $this->__construct();
        $sql    =   "SELECT * FROM blogs WHERE blog_deletion_status = 0";
        $query  =   mysqli_query($link, $sql);
        return $query;
    }

    public function getBlogInfoById($editBlogId)
    {
        $link   =   $this->__construct();
        $sql    =   "SELECT * FROM blogs WHERE blog_id = '$editBlogId' ";
        $query  =   mysqli_query($link, $sql);
        return $query;
    }

    public function updateBlog()
    {
        $blogId                 =   $_POST['blog_id'];
        $blogName               =   $_POST['blog_name'];
        $blogTag                =   $_POST['blog_tag'];
        $blogShortDescription   =   $_POST['blog_short_description'];
        $blogLongDescription    =   $_POST['blog_long_description'];
        $blogPublicationStatus  =   $_POST['blog_publication_status'];

        $imagePath              =   'assets/blog-images/';
        $imageName              =   $_FILES['blog_image']['name'];
        $fileName               =   pathinfo($imageName, PATHINFO_FILENAME);
        $extension              =   pathinfo($imageName, PATHINFO_EXTENSION);
        $uniqueSaveName         =   time().uniqid(rand()).'.'."$extension";
        $blogImageUrl           =   $imagePath.$fileName.'-'.$uniqueSaveName;
        $tmpFileName            =   $_FILES["blog_image"]["tmp_name"];

        if ($tmpFileName != '')
        {
            unlink($_POST['blog_old_image']);
            move_uploaded_file($tmpFileName,  $blogImageUrl);
        }
        else
        {
            $blogImageUrl = $_POST['blog_old_image'];
        }

        $link   =   $this->__construct();
        $sql    =   "UPDATE blogs SET blog_name = '".mysqli_real_escape_string($link, $blogName)."', blog_tag = '".mysqli_real_escape_string($link, $blogTag)."', blog_short_description = '".mysqli_real_escape_string($link, $blogShortDescription)."', blog_long_description = '".mysqli_real_escape_string($link, $blogLongDescription)."', blog_image = '$blogImageUrl', blog_publication_status = '$blogPublicationStatus', blog_update_date = '".date("Y-m-d h:i:sa")."' WHERE blog_id = '$blogId' ";
        if (mysqli_query($link, $sql))
        {
            $_SESSION['message'] = "Blog information update successfully";
            header('Location: manage-blog.php');
        }
        else
        {
            die('Query Problem'.mysqli_error($link));
        }
    }

    public function deleteBlog($blogDeleteId)
    {
        $link   =   $this->__construct();
        $sql    =   "UPDATE blogs SET blog_deletion_status = 1 WHERE blog_id = '$blogDeleteId' ";
        if (mysqli_query($link, $sql))
        {
            $message = urldecode('Blog information delete successfully');
            header('Location: manage-blog.php?message='.$message);
        }
        else
        {
            die('Query Problem'.mysqli_error($link));
        }
    }
}