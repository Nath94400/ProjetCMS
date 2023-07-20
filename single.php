<?php get_header(); ?>

<div class="container containerBlogSinglePage bg-white col-12 p-xl-5 p-3">
    <h1 class="mb-5" style="font-size:60px;"><?= the_title()?></h1>

    <?= get_sidebar('1'); ?>

        <div class="cardBlogSinglePage col-11 col-lg-8 bg-white pr-2 pl-md-0 mx-auto">
            <div class="col-12 p-0">
                <?php
                // Récupérer l'ID de l'image mise en avant (featured image) de l'article
                $featured_image_id = get_post_thumbnail_id();
                if ($featured_image_id) {
                    // Récupérer l'URL de l'image en taille "large" (ou une taille spécifique)
                    $image_attributes = wp_get_attachment_image_src($featured_image_id, 'large');
                    $image_url = $image_attributes[0];
                    // Récupérer l'attribut alt de l'image
                    $image_alt = get_post_meta($featured_image_id, '_wp_attachment_image_alt', true);
                ?>
                
                <img src="<?php echo esc_url($image_url); ?>" class="logo mb-5 img-fluid" alt="<?php echo esc_attr($image_alt); ?>">
                
                <?php } ?>
            </div>
            
            <h3 class="mb-4 font-blue">
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
            <div class="bodyCardBlogSinglePage">
                <?php
                    // Obtient le contenu de l'article
                    $content = get_the_content();
                    // Divise le contenu principal en paragraphes
                    $paragraphs = explode('</p>', $content);

                    // Si un premier paragraphe est trouvé, affiche-le avec la classe "font-blue"
                    if ($paragraphs !== false) {
                        // Supprime les balises HTML du contenu
                        $stripped_first_paragraph = strip_tags($paragraphs[0]);
                        echo '<p class="font-blue">' . $stripped_first_paragraph . '</p>';
                    }

                    foreach ($paragraphs as $index => $paragraph) {
                        // Ne traite pas le premier paragraphe, car nous l'avons déjà affiché
                        if ($index === 0) {
                            continue;
                        }

                        $stripped_remaining_paragraph = strip_tags($paragraph);
                        if (trim($stripped_remaining_paragraph) !== '') {
                            // Affiche le paragraphe avec la classe "font-grey"
                            echo '<p class="font-grey">' . $stripped_remaining_paragraph . '</p>';
                        }
                    }
                ?>  
                
                <?php
                    // Obtient les tags associés à l'article
                    $tags = get_the_tags();
                    if ($tags) {
                        // Affiche chaque tag
                        echo '<div class="btn-group mb-5" role="group" aria-label="Basic example">';
                        foreach ($tags as $tag) {
                            $tag_name = $tag->name;
                            echo '<button type="button" class="btn btn-secondary mr-3 bg-grey font-grey" style="background-color: #969696;">' . esc_html($tag_name) . '</button>';
                        }
                        echo '</div>';
                    }
                ?>
            </div>

            <?php
                if (comments_open() || get_comments_number()) {
                    comments_template();
                }

            ?>
        </div>
            <!--
        <div class="cardBlogSinglePage col-11 col-lg-8 bg-white pr-2 pl-md-0 mx-auto">
            
            <h3 class="mb-4 font-blue mt-5">Comments (1)</h3>

            <div class="commentCardBlogSinglePage mt-5 p-5 bg-grey col-12 mx-auto">
                <h1 style="font-size:25px;" class="font-blue">John Ford</h1>

                <p style="font-size:15px;" class="font-grey">Sed sed nulla et mauris cursus rhoncus id id quam. Curabitur at varius ligula. Interdum et 
                    malesuada fames ac ante ipsum primis in faucibus. Maecenas aliquet eros sed nibh finibus.</p>
                
                <p class="font-blue"><img src="assets/image/reply.svg" class="logo img-fluid mr-2" alt="Logo">
                    Reply
                </p>
            </div>

            <div class="creplyCardBlogSinglePage mt-5 p-0 col-12 mx-auto">
                <h1 style="font-size:25px;" class="font-blue mb-4">Leave a reply</h1>
                
                <div class="mb-4">
                    <input type="text" class="form-control bg-inherit  border-0 border-bottom border-secondary" placeholder="Full Name">
                </div>
                
                <div class="">
                    <input type="text" class="form-control bg-inherit border-0" placeholder="Message">
                </div>

                <div class="col-12 border-top border-secondary mt-10 mb-4 pt-3">
                    <a href="#" style="font-style:bold;"class="decoration-none font-blue text-decoration-none">Submit</a>
                </div>

            </div>

        </div>  
-->
</div>


<?php get_footer() ?>