<?php

    require_once 'vendor/autoload.php';

    use App\classes\Application;

    $application = new Application();
    $categories = $application->selectCategoryInformation();
    $category = mysqli_fetch_assoc($categories);

?>



<div class="menu">
    <div class="container">
        <div class="menu_box">
            <ul class="megamenu skyblue">
                <li><a class="color8" href="index.php">Home</a></li>
                <?php foreach ($categories as $category) { ?>
                    <li><a class="color8" href="category.php?category=<?php print $category['category_id']; ?>"><?php print $category['category_name'] ?></a></li>
                <?php } ?>
                <li><a class="color8" href="blog.php">Blog</a></li>
                <li><a class="color8" href="contact.php">Contact</a></li>
                <div class="clearfix"> </div>
            </ul>
        </div>
    </div>
</div>