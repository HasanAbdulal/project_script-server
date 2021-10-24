<?php
/*
    ./app/views/categories/index.php
    Variables disponibles:
        - $categories ARRAY(ARRAY(id, name, created_at))
*/

// Je demande toutes les catégories et je les mets dans $categories
    include_once '../app/models/categoriesModel.php';
    $categories = App\Models\CategoriesModel\findAllCat($conn);
?>

<ul class="menu-link">
    <?php foreach($categories as $category): ?>
        <li>
            <a href="categories/<?php echo $category['id']; ?>/<?php echo Core\Functions\slugify($category['name']); ?>.html">
                <?php echo $category['name']; ?> 
                    [<?php echo $category['nb_post'] ;?>]
            </a>
        </li>
    <?php endforeach;?>
</ul>