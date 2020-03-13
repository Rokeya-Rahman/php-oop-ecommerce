<?php

    require_once 'vendor/autoload.php';

    use App\classes\Application;

    $blogDetailsId      =   $_GET['blog_id'];
    $application        =   new Application();
    $blog               =   $application->selectBlogIdInformation($blogDetailsId);
    $blogDetailsIdInfo  =   mysqli_fetch_assoc($blog);

?>



<div class="men">
    <div class="container">
        <div class="pages">
            <img src="admin/<?php print $blogDetailsIdInfo['blog_image']; ?>"  class="img-responsive" alt="<?php print $blogDetailsIdInfo['blog_name']; ?>"/>
            <p style="margin-top: 50px;"><?php print $blogDetailsIdInfo['blog_long_description']; ?></p>
        </div>
    </div>
</div>
