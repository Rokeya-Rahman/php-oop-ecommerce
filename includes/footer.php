<?php

    use App\classes\Application;

    $application = new Application();
    $categories = $application->selectCategoryInformation();
    $category = mysqli_fetch_assoc($categories);

?>



<div class="footer">
    <div class="container">
        <img src="assets/images/pay.png" class="img-responsive" alt=""/>
        <ul class="footer_nav">
            <li><a href="index.php">Home</a></li>
            <?php foreach ($categories as $category) { ?>
                <li>
                    <a class="color8" href="category.php?Category_name=<?php print str_replace(' ', '-', $category['category_name']); ?>&category=<?php print $category['category_id']; ?>"><?php print $category['category_name']; ?></a>
                </li>
            <?php } ?>
            <li><a href="blog.php">Blog</a></li>
            <li><a href="contact.php">Contact Us</a></li>
        </ul>
        <p class="copy">Copyright&copy; <?php print date('Y'); ?> Rokeya Rahman </a></p>
    </div>
</div>