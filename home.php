<?php get_header() ?>
<div class="container containerBlogSinglePage bg-white col-12 p-xl-5 p-3">

<h1 class="mb-5" style="font-size:60px;"><?= single_post_title();?></h1>


<?php if (have_posts()) : ?>

            <?php  ?>
            <div class="cardBlogSinglePage row col-12 col-lg-8 pr-2 pl-md-0 justify-content-center">
            <?php
            while (have_posts()) :
                the_post();
                ?>

                <article class="col-md-5 col-12 card border-0 mb-4" style="background-color: inherit;" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="position-relative">
                        <?php 
                            if(has_post_thumbnail())
                            {
                                echo '<img src="' . esc_html(get_the_post_thumbnail_url()) .'" class="card-img-top" style="width: 100%; height: 90%;">';
                            }
                        ?>
                        <h3 class="position-absolute font-white top-0 end-0" style="font-size:12px">
                            
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

                        </h3>
                    </div>

                    <div class="entry-content">
                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p class="card-textBlog font-grey" style="font-size:15px"><?php the_excerpt(); ?></p>
                    </div>
                </article>

            <?php endwhile; ?>

            <?php the_posts_navigation(); // Ajoute la pagination pour les articles ?>

        <?php else : ?>
            <p><?php _e('Aucun article trouvé.'); ?></p>
        <?php endif; ?>

        <div class="col-12 ml-5 pl-5" style="font-size: 20px;">
                    <a class="mr-1 font-blue text-decoration-none" href="#">1</a>
                    <a class="mr-1 font-blue text-decoration-none" href="#">2</a>
                    <a class="mr-1 font-blue text-decoration-none" href="#">3</a>
                    <a class="mr-1 font-blue text-decoration-none" href="#">4</a>
                    <a class="mr-1 font-blue text-decoration-none" href="#">5</a>
                    <a class="mr-1 font-blue text-decoration-none" href="#">...</a>
                    <a class="mr-1 font-blue text-decoration-none" href="#">10</a>
                    <a class="mr-1 font-blue text-decoration-none" href="#">11</a>
                </div>
            </div>
</div>
<?php get_footer() ?>
