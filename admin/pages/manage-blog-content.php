<?php

    require_once 'vendor/autoload.php';

    use App\classes\Blog;

    $blog = new Blog();
    $blogs = $blog->selectBlogInfo();

    $i = 1;

    if (isset($_GET['b_status']))
    {
        $blogDeleteId = $_GET['blog_id'];
        $blog->deleteBlog($blogDeleteId);
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
                        <th>Blog Name</th>
                        <th>Blog Tag</th>
                        <th>Blog Short Description</th>
                        <th>Blog Long Description</th>
                        <th>Blog Image</th>
                        <th>Blog Publication Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php while ($blog = mysqli_fetch_assoc($blogs)) { ?>
                        <tr>
                            <td><?php print $i++; ?></td>
                            <td><?php print htmlentities($blog['blog_name']); ?></td>
                            <td><?php print htmlentities($blog['blog_tag']); ?></td>
                            <td><?php print htmlentities($blog['blog_short_description']); ?></td>
                            <td><?php print htmlentities($blog['blog_long_description']); ?></td>
                            <td><img src="<?php print $blog['blog_image']; ?>" alt="<?php $blog['blog_name']; ?>" height="200" width="200"/></td>

                            <td class="center">
                                <?php
                                if ($blog['blog_publication_status'] == 1)
                                {
                                    print '<span class="label label-success">Published</span>';
                                }
                                elseif ($blog['blog_publication_status'] == 2)
                                {
                                    print '<span class="label label-warning">Unpublished</span>';
                                }
                                ?>
                            </td>
                            <td class="center">
                                <a class="btn btn-info" href="edit-blog.php?blog_id=<?php print $blog['blog_id']; ?>">
                                    <i class="halflings-icon white edit"></i>
                                </a>
                                <a class="btn btn-danger" href="?b_status=delete&blog_id=<?php print $blog['blog_id']; ?>" onclick="return confirm('Are you sure to delete this product information !!!')">
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
