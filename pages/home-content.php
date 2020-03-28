<?php

    use App\classes\Application;

    $application = new Application();

    $newProducts = $application->selectNewProductInformation();
    $newProduct = mysqli_fetch_assoc($newProducts);

    $allProducts = $application->selectAllProductInformation();
    $allProduct = mysqli_fetch_assoc($allProducts);

    $blogs = $application->selectBlogInformation();
    $blog = mysqli_fetch_assoc($blogs);

?>



<div class="index_slider">
    <div class="container">
        <div class="callbacks_container">
            <ul class="rslides" id="slider">
                <li><img src="assets/images/slider2.jpg" class="img-responsive" alt=""/></li>
                <li><img src="assets/images/2.jpg" class="img-responsive" alt=""/></li>
                <li><img src="assets/images/3.jpg" class="img-responsive" alt=""/></li>
                <li><img src="assets/images/slider3.jpg" class="img-responsive" alt=""/></li>
            </ul>
        </div>
    </div>
</div>
<div class="content_top">
    <div class="container">
        <div class="grid_1">
            <div class="col-md-3">
                <div class="box2">
                    <ul class="list1">
                        <i class="lock"> </i>
                        <li class="list1_right"><p>Upto 5% Reward on your shipping</p></li>
                        <div class="clearfix"> </div>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box3">
                    <ul class="list1">
                        <i class="clock1"> </i>
                        <li class="list1_right"><p>Easy Extended Returned</p></li>
                        <div class="clearfix"> </div>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box4">
                    <ul class="list1">
                        <i class="vehicle"> </i>
                        <li class="list1_right"><p>Free Shipping on order over 99 $</p></li>
                        <div class="clearfix"> </div>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box5">
                    <ul class="list1">
                        <i class="dollar"> </i>
                        <li class="list1_right"><p>Delivery Schedule Spread Cheer Time</p></li>
                        <div class="clearfix"> </div>
                    </ul>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="column_center">
            <h1>1 of the most Beautiful online store </h1>
            <h2>Clothes is one of the word'd leading E-commerce companies that designs and develops online stores</h2>
        </div>
        <div class="sellers_grid">
            <ul class="sellers">
                <i class="star"></i>
                <li class="sellers_desc"><h2>New Product</h2></li>
                <div class="clearfix"> </div>
            </ul>
        </div>
        <div class="grid_2">
            <?php foreach ($newProducts as $newProduct) { ?>
                <div class="col-md-3 span_6" style="margin-bottom: 30px;">
                    <div class="box_inner">
                        <img src="admin/<?php print $newProduct['product_image']; ?>" class="img-responsive" alt=""/>
                        <div class="desc">
                            <h3><?php print $newProduct['product_name']; ?></h3>
                            <h4>&#2547; <?php print $newProduct['product_price']; ?></h4>
                            <h5>Product Code : <?php print $newProduct['product_code']; ?></h5>
                            <ul class="list2">
                                <li class="text-center" style="margin-bottom: 10px;"><span class="m_2"><a href="product.php?product_name=<?php print str_replace(' ', '-', $newProduct['product_name']); ?>&product=<?php print $newProduct['product_id']; ?>" class="link1">See More</a></span></li>
                                <div class="clearfix"> </div>
                            </ul>
                            <div class="heart"></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="content_middle">
    <div class="container">
        <ul class="promote">
            <i class="promote_icon"> </i>
            <li class="promote_head"><h3>Product Zone</h3></li>
        </ul>
        <ul id="flexiselDemo3">
            <?php foreach ($allProducts as $allProduct) { ?>
                <li>
                    <img src="admin/<?php print $allProduct['product_image']; ?>" class="img-responsive" alt=""/>
                    <div class="grid-flex">
                        <h4><?php print $allProduct['product_name']; ?></h4>
                        <p>&#2547; <?php print $allProduct['product_price']; ?></p>
                        <div class="m_3"><a href="product.php?product_name=<?php print str_replace(' ', '-', $allProduct['product_name']); ?>&product=<?php print $allProduct['product_id']; ?>" class="link1">See More</a></div>
                        <div class="ticket"> </div>
                    </div>
                </li>
            <?php } ?>
        </ul>
        <script type="text/javascript">
            $(window).load(function() {
                $("#flexiselDemo3").flexisel({
                    visibleItems: 6,
                    animationSpeed: 1000,
                    autoPlay:true,
                    autoPlaySpeed: 3000,
                    pauseOnHover: true,
                    enableResponsiveBreakpoints: true,
                    responsiveBreakpoints: {
                        portrait: {
                            changePoint:480,
                            visibleItems: 1
                        },
                        landscape: {
                            changePoint:640,
                            visibleItems: 2
                        },
                        tablet: {
                            changePoint:768,
                            visibleItems: 3
                        }
                    }
                });

            });
        </script>
        <script type="text/javascript" src="assets/js/jquery.flexisel.js"></script>
    </div>
</div>
<div class="container">
    <div class="content_middle_bottom">
        <div class="col-md-12">
            <ul class="spinner">
                <i class="paperclip"></i>
                <li class="spinner_head"><h3>From the Blog</h3></li>
                <div class="clearfix"> </div>
            </ul>
            <?php foreach ($blogs as $blog) { ?>
                <div class="a-top">
                    <div class="left-grid">
                        <img src="admin/<?php print $blog['blog_image']; ?>" class="img-responsive" alt="<?php print $blog['blog_name']; ?>"/>
                    </div>
                    <div class="right-grid">
                        <h4><?php print $blog['blog_name']; ?></a></h4>
                        <p><?php print $blog['blog_short_description']; ?></a></p>
                    </div>
                    <div class="but">
                        <a class="arrow" href="blog-details.php?blog_title=<?php print str_replace(' ', '-', $blog['blog_name']); ?>&blog_tag=<?php print str_replace(' ', '-', $blog['blog_tag']); ?>&blog=<?php print $blog['blog_id']; ?>"> </a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            <?php } ?>
        <div class="clearfix"></div>
    </div>
    <div class="content_bottom">
        <div class="col-md-3 span_1">
            <ul class="spinner">
                <i class="box_icon"> </i>
                <li class="spinner_head"><h3>Our Shop</h3></li>
                <div class="clearfix"> </div>
            </ul>
            <img src="assets/images/b1.jpg" class="img-responsive" alt=""/>
        </div>
        <div class="col-md-3 span_1">
            <ul class="spinner">
                <i class="bubble"> </i>
                <li class="spinner_head"><h3>About Us</h3></li>
                <div class="clearfix"> </div>
            </ul>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat</p>
        </div>
        <div class="col-md-3 span_1">
            <ul class="spinner">
                <i class="mail"> </i>
                <li class="spinner_head"><h3>Follow Us</h3></li>
                <div class="clearfix"> </div>
            </ul>
            <ul class="social">
                <li><a href=""> <i class="fb"> </i> </a></li>
                <li><a href=""><i class="tw"> </i> </a></li>
                <li><a href=""><i class="google"> </i> </a></li>
                <li><a href=""><i class="linkedin"> </i> </a></li>
                <li><a href=""><i class="skype"> </i> </a></li>
            </ul>
        </div>
        <div class="col-md-3 span_1">
            <ul class="spinner">
                <i class="mail"> </i>
                <li class="spinner_head"><h3>Contact Us</h3></li>
                <div class="clearfix"> </div>
            </ul>
            <p>500 Lorem Ipsum Dolor Sit,</p>
            <p>22-56-2-9 Sit Amet, Lorem,</p>
            <p>Phone:(00) 222 666 444</p>
            <p><a href="mailto:info@demo.com"> info(at)gifty.com</a></p>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>