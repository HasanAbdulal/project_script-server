<?php 
/*
    ./app/views/template/partials/_main.php
*/

?>
<div id="main">
    <div class="container">
        <div class="row">
            <!-- About Me (Left Sidebar) Start -->
            <?php  include_once "../app/views/template/partials/_aside.php";?>
        <!-- About Me (Left Sidebar) End -->

            <!-- Blog Post (Right Sidebar) Start -->
            <div class="col-md-9">
                            <!--========= ZONE DYNAMIQUE =========-->               
                                <?php echo $content; ?>
                            <!--========= / ZONE DYNAMIQUE =========--> 
                <?php  include_once "../app/views/template/partials/_footer.php";?>
            </div>
        <!-- Blog Post (Right Sidebar) End -->
        </div>
    </div>
</div>