<?php

    require_once 'vendor/autoload.php';
    use App\classes\Blog;

    $editBlogId =   $_GET['blog_id'];
    $blog       =   new Blog();
    $query      =   $blog->getBlogInfoById($editBlogId);
    $blogIdInfo =   mysqli_fetch_assoc($query);

    date_default_timezone_set('Asia/Dhaka');

    $error = '';

    if (isset($_POST['btn']))
    {
        $blogName               =   $_POST['blog_name'];
        $blogTag                =   $_POST['blog_tag'];
        $blogShortDescription   =   $_POST['blog_short_description'];
        $blogLongDescription    =   $_POST['blog_long_description'];
        $blogImage              =   $_FILES['blog_image'];
        $blogPublicationStatus  =   $_POST['blog_publication_status'];

        if ($blogName == '')
        {
            $error++;
            $blogNameError = 'Blog name must be required';
        }

        if ($blogTag == '')
        {
            $error++;
            $blogTagError = 'Blog tag must be required';
        }

        if ($blogShortDescription == '')
        {
            $error++;
            $blogShortDescriptionError = 'Blog short description must be required';
        }

        if ($blogLongDescription == '')
        {
            $error++;
            $blogLongDescriptionError = 'Blog long description must be required';
        }

        if ($blogImage['name'] != '')
        {
            if ($blogImage['tmp_name'] != '')
            {
                if ($blogImage['size'] > (2 * 1024 * 1024))
                {
                    $error++;
                    $blogImageError = 'Your image size is too large, please select with in 2 MB';
                }
            }
            else
            {
                $error++;
                $blogImageError = 'Invalid Image ! Please choose a valid image';
            }
        }

        if ($blogPublicationStatus == 0)
        {
            $error++;
            $blogPublicationStatusError = 'Blog publication status must be required';
        }

        if ($error == 0)
        {
            $blog->updateBlog();
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
        <a href="#">Add Category</a>
    </li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add category</h2>
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
                        <label class="control-label">Blog Name</label>
                        <div class="controls">
                            <input type="text" name="blog_name" class="span6 typeahead" value="<?php print $blogIdInfo['blog_name']; ?>">
                            <input type="hidden" name="blog_id" class="span6 typeahead" value="<?php print $blogIdInfo['blog_id']; ?>">
                            <span style="font-weight: bold; color: red;"><?php if (isset($blogNameError)) { print $blogNameError; } ?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Blog Tag</label>
                        <div class="controls">
                            <input type="text" name="blog_tag" class="span6 typeahead" value="<?php print $blogIdInfo['blog_tag']; ?>">
                            <span style="font-weight: bold; color: red;"><?php if (isset($blogTagError)) { print $blogTagError; } ?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Blog Short Description</label>
                        <div class="controls">
                            <textarea name="blog_short_description" rows="3" class="span6 typeahead"><?php print $blogIdInfo['blog_short_description']; ?></textarea>
                            <span style="font-weight: bold; color: red;"><?php if (isset($blogShortDescriptionError)) { print $blogShortDescriptionError; } ?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Blog Long Description</label>
                        <div class="controls">
                            <textarea name="blog_long_description" class="cleditor"><?php print $blogIdInfo['blog_long_description']; ?></textarea>
                            <span style="font-weight: bold; color: red;"><?php if (isset($blogLongDescriptionError)) { print $blogLongDescriptionError; } ?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Blog Image</label>
                        <div class="controls">
                            <input type="file" name="blog_image" accept="image/*" class="span6 typeahead">
                            <input type="hidden" name="blog_old_image" value="<?php print $blogIdInfo['blog_image']; ?>">
                            <span style="font-weight: bold; color: red;">
                                <?php if (isset($blogImageError)) { print $blogImageError; } ?>
                            </span>
                            <br>
                            <img src="<?php print $blogIdInfo['blog_image']; ?>" alt="<?php print $blogIdInfo['blog_name']; ?>" height="200" width="200"/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Category Publication Status</label>
                        <div class="controls">
                            <select name="blog_publication_status">
                                <option>--- Select Publication Status ---</option>

                                <?php if ($blogIdInfo['blog_publication_status'] == 1) { ?>
                                    <option value="1" selected>Published</option>
                                    <option value="2">Unpublished</option>
                                <?php } elseif ($blogIdInfo['blog_publication_status'] == 2) { ?>
                                    <option value="1">Published</option>
                                    <option value="2" selected>Unpublished</option>
                                <?php } ?>

                            </select>
                            <span style="font-weight: bold; color: red;"><?php if (isset($blogPublicationStatusError)) { print $blogPublicationStatusError; } ?></span>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="btn" class="btn btn-primary">Update Blog</button>
                        <a href="manage-blog.php" class="btn">Cancel</a>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->