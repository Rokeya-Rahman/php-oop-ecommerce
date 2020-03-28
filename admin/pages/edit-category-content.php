<?php

    use App\classes\Category;

    $categoryEditId =   $_GET['category_id'];
    $category       =   new Category();
    $result         =   $category->getCategoryInfoById($categoryEditId);
    $categoryIdInfo =   mysqli_fetch_assoc($result);

    date_default_timezone_set('Asia/Dhaka');

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
            $category->updateCategory();
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
        <a href="#">Edit Category</a>
    </li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit category</h2>
        </div>
        <div class="box-content">



            <form action="" method="post" class="form-horizontal">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label">Category Name</label>
                        <div class="controls">
                            <input type="text" name="category_name" class="span6 typeahead" value="<?php print $categoryIdInfo['category_name']; ?>">
                            <input type="hidden" name="category_id" class="span6 typeahead" value="<?php print $categoryIdInfo['category_id']; ?>">
                            <span style="font-weight: bold; color: red;"><?php if (isset($categoryNameError)) { print $categoryNameError; } ?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Category Description</label>
                        <div class="controls">
                            <textarea name="category_description" class="cleditor"><?php print $categoryIdInfo['category_description']; ?></textarea>
                            <span style="font-weight: bold; color: red;"><?php if (isset($categoryDescriptionError)) { print $categoryDescriptionError; } ?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Category Publication Status</label>
                        <div class="controls">
                            <select name="publication_status">
                                <option>--- Select Publication Status ---</option>

                                <?php if ($categoryIdInfo['category_publication_status'] == 1) { ?>

                                    <option value="1" selected>Published</option>
                                    <option value="2">Unpublished</option>

                                <?php } elseif ($categoryIdInfo['category_publication_status'] == 2) { ?>

                                    <option value="1">Published</option>
                                    <option value="2" selected>Unpublished</option>

                                <?php } ?>

                            </select>
                            <span style="font-weight: bold; color: red;"><?php if (isset($publicationStatusError)) { print $publicationStatusError; } ?></span>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="btn" class="btn btn-primary">Update Category</button>
                        <a href="manage-category.php" class="btn">Cancel</a>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->