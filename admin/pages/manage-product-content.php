<?php

    require_once 'vendor/autoload.php';

    use App\classes\Product;

    $product = new Product();
    $products = $product->selectProductInfo();

    $i = 1;

?>



<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="admin-master.php">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Manage Product</a></li>
</ul>

<?php //if (isset($_SESSION['message'])) { ?>
<!---->
<!--    <div class="alert alert-success">-->
<!--        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>-->
<!--        <strong>-->
<!--            --><?php //print $_SESSION['message']; ?>
<!--            --><?php //unset($_SESSION['message']); ?>
<!--        </strong>-->
<!--    </div>-->
<!---->
<?php //} ?>
<!---->
<?php //if (isset($_GET['message'])) { ?>
<!---->
<!--    <div class="alert alert-success">-->
<!--        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>-->
<!--        <strong>-->
<!--            --><?php //print $_GET['message']; ?>
<!--        </strong>-->
<!--    </div>-->
<!---->
<?php //} ?>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Product View</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                <tr>
                    <th>Serial No.</th>
                    <th>Category Name</th>
                    <th>Product Name</th>
                    <th>Product Code</th>
                    <th>Product Price</th>
                    <th>Product Quantity</th>
<!--                    <th>Product Color</th>-->
<!--                    <th>Category Short Description</th>-->
<!--                    <th>Category Long Description</th>-->
<!--                    <th>Category Image</th>-->
<!--                    <th>Category Image 2</th>-->
<!--                    <th>Category Image 3</th>-->
                    <th>Publication Status</th>
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
<!--                        <td>--><?php //print htmlentities($product['product_color']); ?><!--</td>-->
<!--                        <td>--><?php //print htmlentities($product['product_short_description']); ?><!--</td>-->
<!--                        <td>--><?php //print htmlentities($product['product_long_description']); ?><!--</td>-->
<!--                        <td>--><?php //print htmlentities($product['product_image']); ?><!--</td>-->
<!--                        <td>--><?php //print htmlentities($product['product_image2']); ?><!--</td>-->
<!--                        <td>--><?php //print htmlentities($product['product_image3']); ?><!--</td>-->

                        <td class="center">
                            <?php
                            if ($product['publication_status'] == 1)
                            {
                                print '<span class="label label-success">Published</span>';
                            }
                            else
                            {
                                print '<span class="label label-warning">Unpublished</span>';
                            }
                            ?>
                        </td>
                        <td class="center">
                            <!--                            <a class="btn btn-success" href="#">-->
                            <!--                                <i class="halflings-icon white zoom-in"></i>-->
                            <!--                            </a>-->
                            <a class="btn btn-info" href="edit-category.php?category_id=<?php print $category['id']; ?>">
                                <i class="halflings-icon white edit"></i>
                            </a>
                            <a class="btn btn-danger" href="?p_status=delete&category_id=<?php print $category['id']; ?>" onclick="return confirm('Are you sure to delete this category information !!!')">
                                <i class="halflings-icon white trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>

                </tbody>
            </table>
        </div>
    </div><!--/span-->

</div><!--/row-->
