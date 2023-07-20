<?php get_header();
$search_query = projetcms_get_search_query();
?>


<div class="containerSearch col-12 mt-5 pb-5">
    <!-- Boucle pour afficher les post, customiser l'affichage avec les valeurs wordpress et les class css -->
    <?php if (have_posts()): ?>
        <h1 style="font-size: 60px;" class="mb-4">Search results for: <?= esc_html($search_query) ?></h1>
        <div class="row pt-5">
            <?php while(have_posts()): the_post();?>
            <div class="col-12 col-xl-4">
                <div class="card card-search ">
                    <div class="card-body">
                        <a href="<?php the_permalink() ?>">
                            <h1 class="card-title font-blue"><?= esc_html(get_the_title()) ?></h1>
                        </a>
                        <h2 class="card-subtitle mb-2 text-muted font-blue"> 
                        <?php
                            $categories = get_the_category();
                            
                            if(!empty($categories))
                            {
                                $category_list = array();
                                foreach($categories as $category)
                                {
                                    $category_list[] = esc_html($category -> name);
                                }
                                echo implode(', ', $category_list) . ', ' . get_the_date();
                            } else {
                                echo esc_html(get_the_date());
                            }
                        ?>
                        
                        </h2>
                        <p class="card-text text-secondary"><?= esc_html(get_the_excerpt()) ?></p>
                    </div>
                </div>
            </div>
            <?php endwhile ?>
        </div>
    <?php else: ?>
        <h1 style="font-size: 60px;" class="mb-4"> No result for: <?= esc_html($search_query) ?></h1>;
        
    <?php endif;?>
</div>    

<?php get_footer() ?>