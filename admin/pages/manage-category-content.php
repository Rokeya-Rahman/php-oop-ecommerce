<?php

    require_once 'vendor/autoload.php';
    use App\classes\Category;

    $i = 1;
    $category = new Category();
    $categories = $category->selectCategoryInfo();

    if (isset($_GET['p_status']))
    {
        $categoryDeleteId = $_GET['category_id'];
        //$message = $category->deleteCategory($categoryDeleteId);
        $category->deleteCategory($categoryDeleteId);
    }

?>



<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="admin-master.php">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Manage Category</a></li>
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

<?php
//    if( !empty( $_REQUEST['message'] ) )
//    {
//        echo sprintf( '<p>%s</p>', $_REQUEST['message'] );
//    }
//?>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Category Manage</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                <tr>
                    <th>Serial No.</th>
                    <th>Category Name</th>
                    <th>Category Description</th>
                    <th>Category Publication Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                <?php while ($category = mysqli_fetch_assoc($categories)) { ?>
                    <tr>
                        <td><?php print $i++; ?></td>
                        <td><?php print htmlentities($category['category_name']); ?></td>
                        <td><?php print htmlentities($category['category_description']); ?></td>

                        <td class="center">
                            <?php
                                if ($category['category_publication_status'] == 1)
                                {
                                    print '<span class="label label-success">Published</span>';
                                }
                                elseif ($category['category_publication_status'] == 2)
                                {
                                    print '<span class="label label-warning">Unpublished</span>';
                                }
                            ?>
                        </td>
                        <td class="center">
<!--                            <a class="btn btn-success" href="#">-->
<!--                                <i class="halflings-icon white zoom-in"></i>-->
<!--                            </a>-->
                            <a class="btn btn-info" href="edit-category.php?category_id=<?php print $category['category_id']; ?>">
                                <i class="halflings-icon white edit"></i>
                            </a>
                            <a class="btn btn-danger" href="?p_status=delete&category_id=<?php print $category['category_id']; ?>" onclick="return confirm('Are you sure to delete this category information !!!')">
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