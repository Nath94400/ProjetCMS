<?php
/**
 * Template Name: Page à propos
 * Template Post Type : page
 */
?>

<?php get_header() ?>
<div class="container-fluid col-12 mb-5 p-0 mt-3 bg-white justify-content-center" style="width:100vw;">
    <h1 class="mb-5 col-12 p-0" style="font-size:60px;"><?= esc_html(get_the_title())?></h1>
    <div class="row p-0 m-0 col-12">
      
            <div class="col-lg-3 col-0 m-0 p-0">
                
            </div>
    
            <div class="col-lg-9 col-12 m-0 p-0 mt-2 mb-2 mb-md-5">
                <?php
                // Afficher les réglages personnalisés pour la section "Bannière"
                $custom_image = get_theme_mod('custom_image_about_banner', '');
                $custom_title = get_theme_mod('custom_title_about_banner', '');
                $custom_text = get_theme_mod('custom_text_about_banner', '');

                if (!empty($custom_image)) : ?>
                    <div class="imgHeaderAboutUs col-lg-12 p-0">
                        <img src="<?= esc_url($custom_image); ?>" class="card-img-top" alt="Custom Image">
                    </div>
                <?php endif; ?>

                <?php if (!empty($custom_title)) : ?>
                    <h1 class="mb-2 col-12 p-0 mt-5" style="font-size:45px;"><?= esc_html($custom_title); ?></h1>
                <?php endif; ?>

                <?php if (!empty($custom_text)) : ?>
                    <p class="card-textBlog font-grey col-12 col-md-7 p-0" style="font-size:15px"><?= wp_kses_post($custom_text); ?></p>
                <?php endif; ?>
            </div>

            <div class="row col-12 m-0 p-0 mt-md-3 mt-1">
                <?php
                // Afficher les réglages personnalisés pour la section "About Content"
                $custom_image_about = get_theme_mod('custom_image_about', '');

                if (!empty($custom_image_about)) : ?>
                    <div class="imgBodyAboutUs col-12 col-md-4 p-0">
                        <img src="<?= esc_url($custom_image_about); ?>" class="card-img-top" alt="Custom Image About">
                    </div>
                <?php endif; ?>
                <div class="textBodyAboutUs pl-md-5 pl-1 pt-5 col-md-6 col-12 p-0 mt-5">
                    <?php
                    // Boucle pour afficher les 3 titres et les 3 textes de la section "About Content"
                    for ($i = 1; $i <= 3; $i++) {
                        $custom_title_about = get_theme_mod('custom_title_about_' . $i, '');
                        $custom_text_about = get_theme_mod('custom_text_about_' . $i, '');

                        if (!empty($custom_title_about) || !empty($custom_text_about)) :
                            ?>
                            <h2 class="mb-2 col-12 p-0 mt-5" style="font-size:30px;"><?= esc_html($custom_title_about); ?></h2>
                            <p class="card-textBlog font-grey col-12 p-0" style="font-size:15px"><?= wp_kses_post($custom_text_about); ?></p>
                        <?php endif;
                    } ?>
                </div>

                <h2 class="mb-2 col-12 p-0 mb-5 mt-5 ml-5" style="font-size:45px;">Our Team</h2>
                <div class="cardTeamsAboutUs d-flex justify-content-between row mx-auto col-11 p-0 mb-5 pb-5">

                    <?php
                    // Afficher les réglages personnalisés pour les cartes
                    for ($i = 1; $i <= 4; $i++) {
                        $card_image = get_theme_mod('card_image_' . $i, '');
                        $card_text_1 = get_theme_mod('card_text_1_' . $i, '');
                        $card_text_2 = get_theme_mod('card_text_2_' . $i, '');
                        $card_text_3 = get_theme_mod('card_text_3_' . $i, '');
                    ?>
                        <div class="imgHeaderAboutUs col-md-2 col-12 p-0">
                        <?php if (!empty($card_image)) : ?>
                            <img src="<?= esc_url($card_image); ?>" style="width: 100%; height: 100%;" class="card-img-top" alt="Card Image <?= $i; ?>">
                        <?php endif; ?>

                        <?php if (!empty($card_text_1)) : ?>
                            <h3 class="mb-2 col-12 p-0 mt-3" style="font-size:25px;"><?= esc_html($card_text_1); ?></h3>
                        <?php endif; ?>

                        <?php if (!empty($card_text_2)) : ?>
                            <p class="card-textBlog font-grey col-12 p-0 mt-4 mb-1" style="font-size:15px"><?=esc_html($card_text_2); ?></p>
                        <?php endif; ?>

                        <?php if (!empty($card_text_3)) : ?>
                            <p class="card-textBlog font-grey col-12 p-0" style="font-size:15px"><?= esc_html($card_text_3); ?></p>
                        <?php endif; ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="d-none d-md-block mt-5 pt-5">
    </div>
<?php get_footer() ?>