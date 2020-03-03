<?php

    require_once 'vendor/autoload.php';
    use App\classes\Product;
    use App\classes\SubImage;

    $product = new Product();
    $categories = $product->selectCategoryInfo();

    date_default_timezone_set('Asia/Dhaka');

    $error = 0;

    if (isset($_POST['btn']))
    {
        $categoryId                 =   $_POST['category_id'];
        $productName                =   $_POST['product_name'];
        $productCode                =   $_POST['product_code'];
        $productPrice               =   $_POST['product_price'];
        $productQuantity            =   $_POST['product_quantity'];
        $productColor               =   $_POST['product_color'];
        $productShortDescription    =   $_POST['product_short_description'];
        $productLongDescription     =   $_POST['product_long_description'];
        $productImage               =   $_FILES['product_image'];
        $productImage2              =   $_FILES['product_image2'];
        $productImage3              =   $_FILES['product_image3'];
        $publicationStatus          =   $_POST['publication_status'];

        if ($categoryId == 0)
        {
            $error++;
            $categoryIdError = 'Category name must be required';
        }

        if ($productName == '')
        {
            $error++;
            $productNameError = 'Product name must be required';
        }

        if ($productCode == '')
        {
            $error++;
            $productCodeError = 'Product code must be required';
        }

        if ($productPrice == '')
        {
            $error++;
            $productPriceError = 'Product price must be required';
        }

        if ($productQuantity == '')
        {
            $error++;
            $productQuantityError = 'Product quantity must be required';
        }

        if ($productColor == '')
        {
            $error++;
            $productColorError = 'Product color must be required';
        }

        if ($productShortDescription == '')
        {
            $error++;
            $productShortDescriptionError = 'Product short description must be required';
        }

        if ($productLongDescription == '')
        {
            $error++;
            $productLongDescriptionError = 'Product long description must be required';
        }

        if ($productImage['name'] != '')
        {
            if ($productImage['tmp_name'] != '')
            {
                if ($productImage['size'] > (2 * 1024 * 1024))
                {
                    $error++;
                    $productImageError = 'Your image size is too large, please select with in 2 MB';
                }
            }
            else
            {
                $error++;
                $productImageError = 'Invalid Image ! Please choose a valid image';
            }
        }
        else
        {
            $error++;
            $productImageError = 'Product image must be required';
        }

        if ($productImage2['name'] != '')
        {
            if ($productImage2['tmp_name'] != '')
            {
                if ($productImage2['size'] > (2 * 1024 * 1024))
                {
                    $error++;
                    $productImage2Error = 'Your image size is too large, please select with in 2 MB';
                }
            }
            else
            {
                $error++;
                $productImage2Error = 'Invalid Image ! Please choose a valid image';
            }
        }
        else
        {
            $error++;
            $productImage2Error = 'Product image must be required';
        }

        if ($productImage3['name'] != '')
        {
            if ($productImage3['tmp_name'] != '')
            {
                if ($productImage3['size'] > (2 * 1024 * 1024))
                {
                    $error++;
                    $productImage3Error = 'Your image size is too large, please select with in 2 MB';
                }
            }
            else
            {
                $error++;
                $productImage3Error = 'Invalid Image ! Please choose a valid image';
            }
        }
        else
        {
            $error++;
            $productImage3Error = 'Product image must be required';
        }

        if ($publicationStatus == 0)
        {
            $error++;
            $publicationStatusError = 'Publication status must be required';
        }

        if ($error == 0)
        {
            $message = $product->saveProduct();
            $categoryId                 =   '';
            $productName                =   '';
            $productCode                =   '';
            $productPrice               =   '';
            $productQuantity            =   '';
            $productColor               =   '';
            $productShortDescription    =   '';
            $productLongDescription     =   '';
            $productImage               =   '';
            $publicationStatus          =   '';
        }
    }

?>



<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="admin-master.php">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li>
        <i class="icon-edit"></i>
        <a href="#">Add Product</a>
    </li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add product</h2>
        </div>
        <div class="box-content">

            <?php if (isset($message) && $message != '') { ?>

                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong><?php print $message; ?></strong>
                </div>

            <?php } ?>

            <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label">Category Name</label>
                        <div class="controls">
                            <select name="category_id">
                                <option>--- Select Category Name ---</option>

                                <?php while ($category = mysqli_fetch_assoc($categories)) { ?>

                                    <?php if ($categoryId == $category['id']) { ?>

                                        <option value="<?php print $category['id']; ?>" selected><?php print $category['category_name']; ?></option>

                                    <?php } else { ?>

                                        <option value="<?php print $category['id'];  ?>"><?php print $category['category_name']; ?></option>

                                    <?php } ?>

                                <?php } ?>

                            </select>
                            <span style="font-weight: bold; color: red;"><?php if (isset($categoryIdError)) { print $categoryIdError; } ?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Name</label>
                        <div class="controls">
                            <input type="text" name="product_name" class="span6 typeahead" value="<?php if (isset($productName)) { print $productName; } ?>">
                            <span style="font-weight: bold; color: red;"><?php if (isset($productNameError)) { print $productNameError; } ?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Code</label>
                        <div class="controls">
                            <input type="text" name="product_code" class="span6 typeahead" value="<?php if (isset($productCode)) { print $productCode; } ?>">
                            <span style="font-weight: bold; color: red;"><?php if (isset($productCodeError)) { print $productCodeError; } ?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Price</label>
                        <div class="controls">
                            <input type="text" name="product_price" class="span6 typeahead" value="<?php if (isset($productPrice)) { print $productPrice; } ?>">
                            <span style="font-weight: bold; color: red;"><?php if (isset($productPriceError)) { print $productPriceError; } ?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Quantity</label>
                        <div class="controls">
                            <input type="text" name="product_quantity" class="span6 typeahead" value="<?php if (isset($productQuantity)) { print $productQuantity; } ?>">
                            <span style="font-weight: bold; color: red;"><?php if (isset($productQuantityError)) { print $productQuantityError; } ?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Color</label>
                        <div class="controls">
                            <input type="text" name="product_color" class="span6 typeahead" value="<?php if (isset($productColor)) { print $productColor; } ?>">
                            <span style="font-weight: bold; color: red;"><?php if (isset($productColorError)) { print $productColorError; } ?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Short Description</label>
                        <div class="controls">
                            <textarea name="product_short_description" rows="3" class="span6 typeahead"><?php if (isset($productShortDescription)) { print $productShortDescription; } ?></textarea>
                            <span style="font-weight: bold; color: red;"><?php if (isset($productShortDescriptionError)) { print $productShortDescriptionError; } ?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Long Description</label>
                        <div class="controls">
                            <textarea name="product_long_description" class="cleditor"><?php if (isset($productLongDescription)) { print $productLongDescription; } ?></textarea>
                            <span style="font-weight: bold; color: red;"><?php if (isset($productLongDescriptionError)) { print $productLongDescriptionError; } ?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Image</label>
                        <div class="controls">
                            <input type="file" name="product_image" accept="image/*" class="span6 typeahead">
                            <span style="font-weight: bold; color: red;">
                                <?php if (isset($productImageError)) { print $productImageError; } ?>
                            </span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Image 2</label>
                        <div class="controls">
                            <input type="file" name="product_image2" accept="image/*" class="span6 typeahead">
                            <span style="font-weight: bold; color: red;">
                                <?php if (isset($productImage2Error)) { print $productImage2Error; } ?>
                            </span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Image 3</label>
                        <div class="controls">
                            <input type="file" name="product_image3" accept="image/*" class="span6 typeahead">
                            <span style="font-weight: bold; color: red;">
                                <?php if (isset($productImage3Error)) { print $productImage3Error; } ?>
                            </span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Publication Status</label>
                        <div class="controls">
                            <select name="publication_status">
                                <option>--- Select Publication Status ---</option>

                                <?php if ($publicationStatus == 1) { ?>
                                    <option value="1" selected>Published</option>
                                    <option value="2">Unpublished</option>
                                <?php } elseif ($publicationStatus == 2) { ?>
                                    <option value="1">Published</option>
                                    <option value="2" selected>Unpublished</option>
                                <?php } else { ?>
                                    <option value="1">Published</option>
                                    <option value="2">Unpublished</option>
                                <?php } ?>

                            </select>
                            <span style="font-weight: bold; color: red;"><?php if (isset($publicationStatusError)) { print $publicationStatusError; } ?></span>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="btn" class="btn btn-primary">Save Product</button>
                        <button type="reset" class="btn">Cancel</button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->