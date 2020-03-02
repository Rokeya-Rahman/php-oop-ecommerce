<?php

    require_once 'vendor/autoload.php';
    use App\classes\Category;

    $error = '';

    if (isset($_POST['btn']))
    {
        $categoryName           =   $_POST['category_name'];
        $categoryDescription    =   $_POST['category_description'];
        $publicationStatus      =   $_POST['publication_status'];

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
        if ($publicationStatus == 0)
        {
            $error++;
            $publicationStatusError = 'Publication status must be required';
        }

        if ($error == 0)
        {
            $category = new Category();
            $message = $category->saveCategory();
            $categoryName           =   '';
            $categoryDescription    =   '';
            $publicationStatus      =   '';
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
                        <button type="submit" name="btn" class="btn btn-primary">Save Category</button>
                        <button type="reset" class="btn">Cancel</button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->