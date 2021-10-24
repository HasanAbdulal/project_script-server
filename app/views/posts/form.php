<?php 
/*
    ./app/views/posts/form.php
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
                <!-- Post Headline Start -->
                <div class="post-title">
                    <h1>Post Form</h1>
                </div>
                <!-- Post Headline End -->

                <!-- Form Start -->
                <form action="posts/add/insert.html" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title"
                            class="form-control" placeholder="Enter your title here"
                            required/>
                    </div>
                    <div class="form-group">
                        <label for="text">Text</label>
                        <textarea id="text" name="text"
                            class="form-control" rows="5"
                            placeholder="Enter your text here" 
                            >
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="image"> Image</label>
                        
                        <input type="file" name="image" class="form-control-file btn btn-primary" id="image">
                    </div>
                    <div class="form-group">
                        <label for="quote">Quote</label>
                        <textarea id="quote" name="quote"
                            class="form-control" rows="5"
                            placeholder="Enter your quote here"
                            >
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="text">Category</label>
                        <select required id="category" name="category_id" class="form-control" >
                            <option value="" disabled selected>Select your category</option>
                            <?php
                                // Je demande toutes les catégories et je les mets dans $categories
                                include_once '../app/models/categoriesModel.php';
                                $categories = \App\Models\CategoriesModel\findAllCat($conn);
                                /*
                                    Variables disponibles:
                                        - $categories ARRAY(ARRAY(id, name, created_at))
                                */
                            ?>
                                <?php foreach($categories as $category): ?>
                                    <option value="<?php echo $category['id']; ?>">
                                        <?php echo $category['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <input class="btn btn-primary"  type="submit" value="submit"/>
                        <input class="btn btn-secondary" type="reset" value="reset"/>
                    </div>
                </form>
                <!-- Form End -->
            </div>
        </div>
    </div>
</div>
