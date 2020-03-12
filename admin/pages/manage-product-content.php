<?php

    require_once 'vendor/autoload.php';

    use App\classes\Product;

    $product = new Product();
    $products = $product->selectProductInfo();

    $i = 1;

    if (isset($_GET['p_status']))
    {
        $productDeleteId = $_GET['product_id'];
        $product->deleteProduct($productDeleteId);
    }

?>

<style>
    .table-responsive {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        -ms-overflow-style: -ms-autohiding-scrollbar;
    }
</style>

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="admin-master.php">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Manage Product</a></li>
</ul>

<?php if (isset($_SESSION['message'])) { ?>

    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong>
            <?php print $_SESSION['message']; ?>
            <?php unset($_SESSION['message']); ?>
        </strong>
    </div>

<?php } ?>

<?php if (isset($_GET['message'])) { ?>

    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong>
            <?php print $_GET['message']; ?>
        </strong>
    </div>

<?php } ?>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Product Manage</h2>
        </div>
        <div class="box-content">
            <div class="table-responsive">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Category Name</th>
                        <th>Product Name</th>
                        <th>Product Code</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Product Color</th>
                        <th>Product Short Description</th>
                        <th>Product Long Description</th>
                        <th>Product Image</th>
                        <th>Product Image 2</th>
                        <th>Product Image 3</th>
                        <th>Product Publication Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php while ($product = mysqli_fetch_assoc($products)) { ?>
                        <tr>
                            <td><?php print $i++; ?></td>
                            <td><?php print htmlentities($product['category_name']); ?></td>
                            <td><?php print htmlentities($product['product_name']); ?></td>
                            <td><?php print htmlentities($product['product_code']); ?></td>
                            <td><?php print htmlentities($product['product_price']); ?></td>
                            <td><?php print htmlentities($product['product_quantity']); ?></td>
                            <td><?php print htmlentities($product['product_color']); ?></td>
                            <td><?php print htmlentities($product['product_short_description']); ?></td>
                            <td><?php print htmlentities($product['product_long_description']); ?></td>
                            <td><img src="<?php print $product['product_image']; ?>" alt="<?php $product['product_name']; ?>"/></td>
                            <td><img src="<?php print $product['product_image2']; ?>" alt="<?php $product['product_name']; ?>"/></td>
                            <td><img src="<?php print $product['product_image3']; ?>" alt="<?php $product['product_name']; ?>"/></td>

                            <td class="center">
                                <?php
                                if ($product['product_publication_status'] == 1)
                                {
                                    print '<span class="label label-success">Published</span>';
                                }
                                elseif ($product['product_publication_status'] == 2)
                                {
                                    print '<span class="label label-warning">Unpublished</span>';
                                }
                                ?>
                            </td>
                            <td class="center">
                                <!--<a class="btn btn-warning" href="view-product.php?view=view_product&product_id=--><?php //print $product['product_id']; ?><!--">-->
                                <!--<i class="halflings-icon white zoom-in"></i>-->
                                <!--</a>-->
                                <a class="btn btn-info" href="edit-product.php?product_id=<?php print $product['product_id']; ?>">
                                    <i class="halflings-icon white edit"></i>
                                </a>
                                <a class="btn btn-danger" href="?p_status=delete&product_id=<?php print $product['product_id']; ?>" onclick="return confirm('Are you sure to delete this product information !!!')">
                                    <i class="halflings-icon white trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div><!--/span-->

</div><!--/row-->
