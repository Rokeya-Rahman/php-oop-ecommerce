<?php
/**
 * Created by PhpStorm.
 * User: Shorna
 * Date: 2/22/2020
 * Time: 10:29 AM
 */

namespace App\classes;

use App\traits\Database;


class Product extends Category
{
    use Database;

    public function selectCategoryInfo()
    {
        $link   =   $this->__construct();
        $sql    =   "SELECT category_id, category_name FROM categories";
        if (mysqli_query($link, $sql))
        {
            $query = mysqli_query($link, $sql);
            return $query;
        }
        else
        {
            die('Query Problem'.mysqli_error($link));
        }
    }

    public function saveProduct()
    {
        $productCategoryId          =   $_POST['product_category_id'];
        $productName                =   $_POST['product_name'];
        $productCode                =   $_POST['product_code'];
        $productPrice               =   $_POST['product_price'];
        $productQuantity            =   $_POST['product_quantity'];
        $productColor               =   $_POST['product_color'];
        $productShortDescription    =   $_POST['product_short_description'];
        $productLongDescription     =   $_POST['product_long_description'];
        $productPublicationStatus   =   $_POST['product_publication_status'];

//        $imageDirectory     =   'assets/product-images/';
//        $imageName          =   $_FILES['product_image']['name'];
//        $productImageUrl    =   $imageDirectory.$imageName;
//        //$fileType           =   pathinfo($imageName, PATHINFO_EXTENSION);
//        //$check              =   getimagesize($_FILES['product_image']['tmp_name']);
//        move_uploaded_file($_FILES['product_image']['tmp_name'], $productImageUrl);

        $imagePath              =   'assets/product-images/';
        $imageName              =   $_FILES['product_image']['name'];
        $fileName               =   pathinfo($imageName, PATHINFO_FILENAME);
        $extension              =   pathinfo($imageName, PATHINFO_EXTENSION);
        $uniqueSaveName         =   time().uniqid(rand()).'.'."$extension";
        $productImageUrl        =   $imagePath.$fileName.'-'.$uniqueSaveName;
        $tmpFileName            =   $_FILES["product_image"]["tmp_name"];
        //list($width, $height)   = getimagesize( $filename );
        move_uploaded_file($tmpFileName,  $productImageUrl);

        $imageName2              =   $_FILES['product_image2']['name'];
        $fileName2               =   pathinfo($imageName2, PATHINFO_FILENAME);
        $extension2              =   pathinfo($imageName2, PATHINFO_EXTENSION);
        $uniqueSaveName2         =   time().uniqid(rand()).'.'."$extension2";
        $productImageUrl2        =   $imagePath.$fileName2.'-'.$uniqueSaveName2;
        $tmpFileName2            =   $_FILES["product_image2"]["tmp_name"];
        move_uploaded_file($tmpFileName2,  $productImageUrl2);

        $imageName3              =   $_FILES['product_image3']['name'];
        $fileName3               =   pathinfo($imageName3, PATHINFO_FILENAME);
        $extension3              =   pathinfo($imageName3, PATHINFO_EXTENSION);
        $uniqueSaveName3         =   time().uniqid(rand()).'.'."$extension3";
        $productImageUrl3        =   $imagePath.$fileName3.'-'.$uniqueSaveName3;
        $tmpFileName3            =   $_FILES["product_image3"]["tmp_name"];
        move_uploaded_file($tmpFileName3,  $productImageUrl3);


//        if ($_FILES['product_image']['tmp_name'] != '')
//        {
//            $check  =   getimagesize($_FILES['product_image']['tmp_name']);
//
//            if ($check)
//            {
//                if (file_exists($productImageUrl))
//                {
//                    die('This file already exist. Please select another one');
//                }
//                else
//                {
//                    if ($_FILES['product_image']['size'] > 1000000)
//                    {
//                        die('Your image size is too large, please select with in 1MB');
//                    }
//                    else
//                    {
//                    if ($fileType != 'jpg' && $fileType != 'png')
//                    {
//                        die('Image type is not supported. Please use jpg or png');
//                    }
//                    else
//                    {
//                        move_uploaded_file($_FILES['product_image']['tmp_name'], $productImageUrl);
//                    }
//                    }
//                }
//            }
//            else
//            {
//                die('Please chose a image file');
//            }
//        }
//        else
//        {
//            die('Invalid Image ! Please choose another image');
//        }

        $link   =   $this->__construct();
        $sql    =   "INSERT INTO products (product_category_id, product_name, product_code, product_price, product_quantity, product_color, product_short_description, product_long_description, product_image, product_image2, product_image3, product_publication_status, product_create_date) VALUES ('$productCategoryId', '".mysqli_real_escape_string($link, $productName)."', '".mysqli_real_escape_string($link, $productCode)."', '".mysqli_real_escape_string($link, $productPrice)."', '".mysqli_real_escape_string($link, $productQuantity)."', '".mysqli_real_escape_string($link, $productColor)."', '".mysqli_real_escape_string($link, $productShortDescription)."', '".mysqli_real_escape_string($link, $productLongDescription)."', '$productImageUrl', '$productImageUrl2', '$productImageUrl3', '$productPublicationStatus', '".date("Y-m-d h:i:sa")."' ) ";

        if (mysqli_query($link, $sql))
        {
            $message = 'Product information save successfully';
            return $message;
        }
        else
        {
            die ('Query Problem.'.mysqli_error($link));
        }
    }

    public function selectProductInfo()
    {
        $link   =   $this->__construct();
        //$sql    =   "SELECT * FROM products LEFT JOIN categories ON products.product_category_id = categories.category_id WHERE product_deletion_status = 0";
        $sql    =   "SELECT products.*, categories.category_name FROM products, categories WHERE products.product_category_id = categories.category_id AND product_deletion_status = 0";
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

    /*public function viewProductInfoById($productViewId)
    {
        $link   =   $this->__construct();
        $sql    =   "SELECT * FROM products LEFT JOIN categories ON products.product_category_id = categories.category_id WHERE product_id = '$productViewId' ";
        if (mysqli_query($link, $sql))
        {
            $query =    mysqli_query($link, $sql);
            return $query;
        }
        else
        {
            die('Query Problem'.mysqli_error($link));
        }
    }*/

    public function getProductInfoById($editProductId)
    {
        $link   =   $this->__construct();
        $sql    =   "SELECT * FROM products WHERE product_id = '$editProductId' ";
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

    public function updateProduct()
    {
        $link   =   $this->__construct();

        $productId                  =   $_POST['product_id'];
        $productCategoryId          =   $_POST['product_category_id'];
        $productName                =   $_POST['product_name'];
        $productCode                =   $_POST['product_code'];
        $productPrice               =   $_POST['product_price'];
        $productQuantity            =   $_POST['product_quantity'];
        $productColor               =   $_POST['product_color'];
        $productShortDescription    =   $_POST['product_short_description'];
        $productLongDescription     =   $_POST['product_long_description'];
        $productPublicationStatus   =   $_POST['product_publication_status'];

        $imagePath              =   'assets/product-images/';
        $imageName              =   $_FILES['product_image']['name'];
        $fileName               =   pathinfo($imageName, PATHINFO_FILENAME);
        $extension              =   pathinfo($imageName, PATHINFO_EXTENSION);
        $uniqueSaveName         =   time().uniqid(rand()).'.'."$extension";
        $productImageUrl        =   $imagePath.$fileName.'-'.$uniqueSaveName;
        $tmpFileName            =   $_FILES["product_image"]["tmp_name"];


        $imageName2              =   $_FILES['product_image2']['name'];
        $fileName2               =   pathinfo($imageName2, PATHINFO_FILENAME);
        $extension2              =   pathinfo($imageName2, PATHINFO_EXTENSION);
        $uniqueSaveName2         =   time().uniqid(rand()).'.'."$extension2";
        $productImageUrl2        =   $imagePath.$fileName2.'-'.$uniqueSaveName2;
        $tmpFileName2            =   $_FILES["product_image2"]["tmp_name"];


        $imageName3              =   $_FILES['product_image3']['name'];
        $fileName3               =   pathinfo($imageName3, PATHINFO_FILENAME);
        $extension3              =   pathinfo($imageName3, PATHINFO_EXTENSION);
        $uniqueSaveName3         =   time().uniqid(rand()).'.'."$extension3";
        $productImageUrl3        =   $imagePath.$fileName3.'-'.$uniqueSaveName3;
        $tmpFileName3            =   $_FILES["product_image3"]["tmp_name"];


        if ($tmpFileName != '')
        {
            unlink($_POST['old_product_image']);
            move_uploaded_file($tmpFileName,  $productImageUrl);
        }
        else
        {
            $productImageUrl = $_POST['old_product_image'];
        }

        if ($tmpFileName2 != '')
        {
            unlink($_POST['old_product_image2']);
            move_uploaded_file($tmpFileName2,  $productImageUrl2);
        }
        else
        {
            $productImageUrl2 = $_POST['old_product_image2'];
        }

        if ($tmpFileName3 != '')
        {
            unlink($_POST['old_product_image3']);
            move_uploaded_file($tmpFileName3,  $productImageUrl3);
        }
        else
        {
            $productImageUrl3 = $_POST['old_product_image3'];
        }

        $sql    =   "UPDATE products SET product_category_id = '$productCategoryId', product_name = '".mysqli_real_escape_string($link, $productName)."', product_code = '".mysqli_real_escape_string($link, $productCode)."', product_price = '".mysqli_real_escape_string($link, $productPrice)."', product_quantity = '".mysqli_real_escape_string($link, $productQuantity)."', product_color = '".mysqli_real_escape_string($link, $productColor)."', product_short_description = '".mysqli_real_escape_string($link, $productShortDescription)."', product_long_description = '".mysqli_real_escape_string($link, $productLongDescription)."', product_image = '$productImageUrl', product_image2 = '$productImageUrl2', product_image3 = '$productImageUrl3', product_publication_status = '$productPublicationStatus', product_update_date = '".date("Y-m-d h:i:sa")."' WHERE product_id = '$productId' ";

        if (mysqli_query($link, $sql))
        {
            $_SESSION['message'] = "Product information update successfully";
            header('Location: manage-product.php');

        }
        else
        {
            die('Query Problem'.mysqli_error($link));
        }
    }

    public function deleteProduct($productDeleteId)
    {
        $link   =   $this->__construct();
        $sql    =   "UPDATE products SET product_deletion_status = 1 WHERE product_id = '$productDeleteId' ";
        if (mysqli_query($link, $sql))
        {
            $message = urldecode('Product information delete successfully');
            header('Location: manage-product.php?message='.$message);
        }
        else
        {
            die('Query Problem'.mysqli_error($link));
        }
    }
}