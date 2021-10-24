<?php
/*
    ./app/views/posts/index.php
    Variables disponibles:
        - $posts ARRAY(ARRAY(id, title, text, created_at, quote))
*/
?>
<div class="col-md-12 page-body">
    <div class="row">
        <div class="col-md-12 content-page">
            <div>
                <a href="posts/add/form.html" type="button" class="btn btn-primary">Add a Post</a>
            </div>

            <?php foreach($posts as $post): ?>
                <div class="col-md-12 blog-post row">
                    <div class="post-title">
                        <a href="posts/<?php echo $post['id'];?>/<?php echo Core\Functions\slugify($post['title']); ?>.html">
                            <h1><?php echo $post['title']; ?></h1>
                        </a>
                    </div>
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
                    <p>
                        <?php echo Core\Functions\truncate($post['text']); ?>
                    </p>
                    <a href="posts/<?php echo $post['id'];?>/<?php echo Core\Functions\slugify($post['title']); ?>.html" 
                        class="button button-style button-anim fa fa-long-arrow-right">
                        <span>Read More</span>
                    </a>
                </div>
            <?php endforeach; ?>

            <nav aria-label="Page navigation example" style="text-align: center;">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>