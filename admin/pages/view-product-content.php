<?php
//
//    require_once 'vendor/autoload.php';
//
//    use App\classes\Product;
//
//    $productViewId = $_GET['product_id'];
//    $product = new Product();
//    $value = $product->viewProductInfoById($productViewId);
//    $productIdInfo = mysqli_fetch_assoc($value);
//
//?>
<!---->
<!---->
<!---->
<!--<ul class="breadcrumb">-->
<!--    <li>-->
<!--        <i class="icon-home"></i>-->
<!--        <a href="admin-master.php">Home</a>-->
<!--        <i class="icon-angle-right"></i>-->
<!--    </li>-->
<!--    <li><a href="#">View Product</a></li>-->
<!--</ul>-->
<!---->
<!--<div class="row-fluid sortable">-->
<!--    <div class="box span12">-->
<!--        <div class="box-header" data-original-title>-->
<!--            <h2><i class="halflings-icon user"></i><span class="break"></span>Product View</h2>-->
<!--        </div>-->
<!--        <div class="box-content">-->
<!--            <div class="container">-->
<!--                <div class="table-responsive">-->
<!--                    <table class="table table-striped table-bordered bootstrap-datatable datatable">-->
<!---->
<!--                        <tr>-->
<!--                            <th>Category Name</th>-->
<!--                            <td>--><?php //print htmlentities($productIdInfo['category_name']); ?><!--</td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <th>Product Name</th>-->
<!--                            <td>--><?php //print htmlentities($productIdInfo['product_name']); ?><!--</td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <th>Product Code</th>-->
<!--                            <td>--><?php //print htmlentities($productIdInfo['product_code']); ?><!--</td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <th>Product Price</th>-->
<!--                            <td>--><?php //print htmlentities($productIdInfo['product_price']); ?><!--</td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <th>Product Quantity</th>-->
<!--                            <td>--><?php //print htmlentities($productIdInfo['product_quantity']); ?><!--</td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <th>Product Color</th>-->
<!--                            <td>--><?php //print htmlentities($productIdInfo['product_color']); ?><!--</td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <th>Product Short Description</th>-->
<!--                            <td>--><?php //print htmlentities($productIdInfo['product_short_description']); ?><!--</td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <th>Product Long Description</th>-->
<!--                            <td>--><?php //print htmlentities($productIdInfo['product_long_description']); ?><!--</td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <th>Product Image</th>-->
<!--                            <td>-->
<!--                                <img src="--><?php //print $productIdInfo['product_image']; ?><!--" alt="--><?php //$productIdInfo['product_name']; ?><!--">-->
<!--                            </td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <th>Product Image 2</th>-->
<!--                            <td>-->
<!--                                <img src="--><?php //print $productIdInfo['product_image2']; ?><!--" alt="--><?php //$productIdInfo['product_name']; ?><!--">-->
<!--                            </td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <th>Product Image 3</th>-->
<!--                            <td>-->
<!--                                <img src="--><?php //print $productIdInfo['product_image3']; ?><!--" alt="--><?php //$productIdInfo['product_name']; ?><!--">-->
<!--                            </td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <th>Product Publication Status</th>-->
<!--                            <td>-->
<!--                                --><?php
//                                if ($productIdInfo['product_publication_status'] == 1)
//                                {
//                                    print 'Published';
//                                }
//                                elseif ($productIdInfo['product_publication_status'] == 2)
//                                {
//                                    print 'Unpublished';
//                                }
//                                ?>
<!--                            </td>-->
<!--                        </tr>-->
<!---->
<!--                    </table>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div><!--/span-->-->
<!---->
<!--</div><!--/row-->-->