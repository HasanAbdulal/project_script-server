<?php 
/*
    ./app/views/posts/show.php
    Variables disponibles :
        - $post ARRAY(id, title, category, text, quote )
*/
?>
<div class="col-md-12 page-body">
    <div class="row">
        <div class="sub-title">
            <a href="index.html" title="Go to Home Page">
                <h2>Back Home</h2>
            </a>
            <a href="#comment" class="smoth-scroll">
                <i class="icon-bubbles"></i>
            </a>
        </div>
        <div class="col-md-12 content-page">
            <div class="col-md-12 blog-post">
                <div>
                    <img src="/assets/images/blog/<?php echo $post['image']; ?>" alt="">
                </div>
                <!-- Post Headline Start -->
                <div class="post-title">
                    <h1><?php echo $post['title']; ?></h1>
                </div>
                <!-- Post Headline End -->

                <!-- Post Detail Start -->
                <div class="post-info">
                    <span>
                        <?php echo Core\Functions\formater_date($post['created_at'], 'd-F-Y'); ?>
                    </span> | 
                    <?php 
                            include_once '../app/models/categoriesModel.php';
                            $categories = \App\Models\CategoriesModel\findOneByCatId($conn, $post['id']);
                        ?>
                        <?php foreach($categories as $category): ?>
                        <span><?php echo $category['name']; ?></span>
                        <?php endforeach;?>
                </div>
                <!-- Post Detail End -->
                <p><?php echo $post['text']; ?></p>

                <!-- Post Blockquote (Italic Style) Start -->
                <blockquote class="margin-top-40 margin-bottom-40">
                    <p><?php echo $post['quote']; ?></p>
                </blockquote>
                <!-- Post Blockquote (Italic Style) End -->

                <!-- Post Buttons -->
                <div>
                    <a href="posts/<?php echo $post['id']; ?>/<?php echo Core\Functions\slugify($post['title']); ?>/edit/form.html"
                            type="button" class="btn btn-primary">Edit Post
                    </a>
                    <a href="posts/<?php echo $post['id']; ?>/<?php echo Core\Functions\slugify($post['title']); ?>/delete.html"
                            type="button" style="color: red;" class="btn btn-secondary" role="button">Delete Post
                    </a>
                </div>
                <!-- Post Buttons End -->
            </div>
        </div>
    </div>
</div>


<!-- Endpage Box (Popup When Scroll Down) Start -->
<div id="scroll-down-popup" class="endpage-box">
    <h4>Read Also</h4>
    <a href="#">How to make your company website based on bootstrap framework...</a>
</div>
<!-- Endpage Box (Popup When Scroll Down) End -->