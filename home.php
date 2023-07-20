<?php get_header() ?>

<?= the_title()?>


<?php if (have_posts()) : ?>
            <header class="page-header">
                <h1 class="page-title"><?php single_post_title(); ?></h1>
            </header>

            <?php
            while (have_posts()) :
                the_post();
                ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </header>

                    <div class="entry-content">
                        <?php the_excerpt(); // Affiche un extrait de l'article ?>
                    </div>
                </article>

            <?php endwhile; ?>

            <?php the_posts_navigation(); // Ajoute la pagination pour les articles ?>

        <?php else : ?>
            <p><?php _e('Aucun article trouvé.'); ?></p>
        <?php endif; ?>
      

<?php get_footer() ?>
