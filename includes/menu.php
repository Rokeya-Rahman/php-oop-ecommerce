<?php

    require_once 'vendor/autoload.php';

    use App\classes\Application;

    $application = new Application();
    $categories = $application->getCategoryInformation();

?>



<div class="menu">
    <div class="container">
        <div class="menu_box">
            <ul class="megamenu skyblue">
                <li class="active grid"><a class="color2" href="index.php">Home</a></li>
                <?php while ($category = mysqli_fetch_assoc($categories)) { ?>
                    <li><a class="color2" href="category.php?category=<?php print $category['category_id'] ?>"><?php print $category['category_name'] ?></a></li>
                <?php } ?>
                <li><a class="color4" href="category.php">Category</a></li>
                <li><a class="color4" href="special.php">Special</a></li>
                <li><a class="color8" href="blog.php">Blog</a></li>
                <li><a class="color2" href="contact.php">Contact</a></li>
                <div class="clearfix"> </div>
            </ul>
        </div>
    </div>
</div>