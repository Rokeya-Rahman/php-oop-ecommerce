<?php

    use App\classes\Category;

    date_default_timezone_set('Asia/Dhaka');

    $error = '';

    if (isset($_POST['btn']))
    {
        $categoryName               =   $_POST['category_name'];
        $categoryDescription        =   $_POST['category_description'];
        $categoryPublicationStatus  =   $_POST['category_publication_status'];

        if ($categoryName == '')
        {
            $error++;
            $categoryNameError = 'Category name must be required';
        }

        if ($categoryDescription == '')
        {
            $error++;
            $categoryDescriptionError = 'Category description must be required';
        }

        if ($categoryPublicationStatus == 0)
        {
            $error++;
            $categoryPublicationStatusError = 'Category publication status must be required';
        }

        if ($error == 0)
        {
            $category = new Category();
            $message = $category->saveCategory();
            $categoryName               =   '';
            $categoryDescription        =   '';
            $categoryPublicationStatus  =   '';
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
<!--            <h2 style="font-weight: bold; color: green; text-align: center;">--><?php //print $message; ?><!--</h2>-->

            <?php if (isset($message) && $message != '') { ?>

                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong><?php print $message; ?></strong>
                </div>

            <?php } ?>

            <form action="" method="post" class="form-horizontal">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label">Category Name</label>
                        <div class="controls">
                            <input type="text" name="category_name" class="span6 typeahead" value="<?php if (isset($categoryName)) { print $categoryName; } ?>">
                            <span style="font-weight: bold; color: red;"><?php if (isset($categoryNameError)) { print $categoryNameError; } ?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Category Description</label>
                        <div class="controls">
                            <textarea name="category_description" class="cleditor"><?php if (isset($categoryDescription)) { print $categoryDescription; } ?></textarea>
                            <span style="font-weight: bold; color: red;"><?php if (isset($categoryDescriptionError)) { print $categoryDescriptionError; } ?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Category Publication Status</label>
                        <div class="controls">
                            <select name="category_publication_status">
                                <option>--- Select Publication Status ---</option>

                                <?php if ($categoryPublicationStatus == 1) { ?>
                                    <option value="1" selected>Published</option>
                                    <option value="2">Unpublished</option>
                                <?php } elseif ($categoryPublicationStatus == 2) { ?>
                                    <option value="1">Published</option>
                                    <option value="2" selected>Unpublished</option>
                                <?php } else { ?>
                                    <option value="1">Published</option>
                                    <option value="2">Unpublished</option>
                                <?php } ?>

                            </select>
                            <span style="font-weight: bold; color: red;"><?php if (isset($categoryPublicationStatusError)) { print $categoryPublicationStatusError; } ?></span>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="btn" class="btn btn-primary">Save Category</button>
                        <a href="manage-category.php" class="btn">Cancel</a>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->