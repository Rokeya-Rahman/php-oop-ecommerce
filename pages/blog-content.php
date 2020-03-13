<?php

    require_once 'vendor/autoload.php';

    use App\classes\Application;

    $application = new Application();
    $blogs = $application->selectBlogInformation();
    $blog = mysqli_fetch_assoc($blogs);

?>

<div class="men">
    <div class="container">
        <div class="blog-top">
            <?php foreach ($blogs as $blog) { ?>
                <div class="col-md-6 grid_3">
                    <h3><a href="blog_single.html"><?php print $blog['blog_name']; ?></a></h3>
                    <a href="blog_single.html"><img src="admin/<?php print $blog['blog_image']; ?>" class="img-responsive" alt="<?php print $blog['blog_name']; ?>"/></a>
                    <div class="blog-poast-info">
                        <ul>
                            <li><i class="admin"></i><a class="admin" href="#">GIFTY</a></li>
                            <li><i class="comment"></i><?php print $blog['blog_tag']; ?></li>
                            <li><i class="date"></i><?php print $blog['blog_create_date']; ?></li>
                        </ul>
                    </div>
                    <p><?php print $blog['blog_short_description'] ?></p>
                    <div class="button"><a href="blog-details.php?blog_title=<?php print str_replace(' ', '-', $blog['blog_name']); ?>&blog_tag=<?php print str_replace(' ', '-', $blog['blog_tag']); ?>&blog_id=<?php print $blog['blog_id']; ?>">Read More</a></div>
                </div>
            <?php } ?>
        </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>