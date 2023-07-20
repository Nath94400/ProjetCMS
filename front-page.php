<?php get_header(); ?>

        <!-- Contenu principal -->
        <div class="container-fluid col-12 mb-5 p-0 mt-3 bg-white justify-content-center" style="width:100vw;">

            <h1 class="mb-5 col-6 p-0 ml-4" style="font-size:50px;"><?= esc_html(get_the_title()) ?></h1>

            <div class="row p-0 m-0 col-12">

                <div class="col-lg-3 col-0 m-0 p-0">
                    
                </div>

                <div class="col-lg-9 col-12 m-0 p-0 mt-2 mb-2 mt-5 mb-md-5">

                    <?php
                    // Afficher les réglages personnalisés pour la section "Bannière"
                    $custom_image = get_theme_mod('custom_image_home_banner', '');
                    $custom_title = get_theme_mod('custom_title_home_banner', '');
                    $custom_text = get_theme_mod('custom_text_home_banner', '');

                    if (!empty($custom_image)) :?>
                        <div class="imgHeaderAboutUs col-lg-12 p-0">
                            <img class="card-img-top" src="<?php echo esc_url($custom_image); ?>" alt="Custom Image">
                        </div>
                        <?php endif; ?>
                        
                        <?php if (!empty($custom_title)) : ?>
                            <h1 class="mb-2 col-12 p-0 mt-5" style="font-size:45px;"><?php echo esc_html($custom_title); ?></h1>
                        <?php endif; ?>

                        <?php if (!empty($custom_text)) : ?>
                            <p class="card-textBlog font-grey col-12 col-md-7 p-0" style="font-size:15px; line-height: 2;"><?php echo wp_kses_post($custom_text); ?></p>
                        <?php endif; ?>
                </div>
        
        <div class="row col-12 m-0 p-0 mt-md-3 mt-1">e
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
            
            <h2 class="mb-2 col-12 p-0 mb-5 mt-5 ml-5" style="font-size:45px;">Our Services</h2>

            
<?php
// Récupération des valeurs des réglages personnalisés
$menu_image_1 = get_theme_mod('custom_image_1_service_banner', '');
$menu_image_2 = get_theme_mod('custom_image_2_service_banner', '');
$menu_image_3 = get_theme_mod('custom_image_3_service_banner', '');
$menu_title = get_theme_mod('custom_title_service_banner', '');
?>
<div class="row col-12 p-0 m-0">
<!-- Afficher les images -->
<?php if (!empty($menu_image_1)) : ?>
    <div class="col-lg-3 col-6 m-0 p-0">
    <img class="card-img-top" alt="Menu Image 1" src="<?php echo esc_url($menu_image_1); ?>" alt="Menu Image 1">
    </div>
    <?php endif; ?>

<?php if (!empty($menu_image_2)) : ?>
    <div class="col-lg-3 col-6 m-0 p-0">
    <img class="card-img-top" alt="Menu Image 1" src="<?php echo esc_url($menu_image_2); ?>" alt="Menu Image 2">
    </div>
    <?php endif; ?>

<!-- Afficher le titre -->
<?php if (!empty($menu_title)) : ?>
    <div class="col-lg-3 col-6 m-0 p-0 justify-content-center d-flex align-items-center">
    <h1 style="font-size:20px;"><span class="h1GradientUnderline"><?php echo esc_html($menu_title); ?></span></h1>
    </div>
<?php endif; ?>

<?php if (!empty($menu_image_3)) : ?>
    <div class="col-lg-3 col-6 m-0 p-0">
    <img class="card-img-top" src="<?php echo esc_url($menu_image_3); ?>" alt="Menu Image 3">
    </div>
    <?php endif; ?>
    </div>
</div>
</div>
</div>
    <div class="container row col-12 pl-1 pl-lg-5 pr-lg-5 mt-3 bg-white">
        <h1 class="mb-5 col-12" style="font-size:60px;">Our Partners.</h1>
        <?php
            // Récupère l'ID de la page actuelle
            $page_id = get_the_ID(); // Récupère l'ID de la page actuelle
            // Récupère l'URL de l'image SVG téléchargée via le Customizer
            $svg_url = get_theme_mod('svg_image', '');
            // Récupère l'attribut alt de l'image SVG
            $svg_alt = 'Alternative text for SVG image'; // Vous pouvez personnaliser le texte alternatif ici.
            
        
            for ($i = 1; $i <= 6; $i++) {
                // Récupère l'URL de l'image SVG téléchargée via le Customizer
                $svg_url = get_theme_mod('svg_image_' . $i, '');
                // Récupère l'attribut alt de l'image SVG
                $svg_alt = 'Alternative text for SVG image ' . $i; // Vous pouvez personnaliser le texte alternatif ici.
    
                if (!empty($svg_url)) {
                    echo '<div class="partner-image logosPartners mt-lg-5 mt-0 col-12 col-lg-2 d-flex justify-content-center mb-5">';
                    // Affichage de l'image SVG
                    echo '<img src="' . esc_url($svg_url) . '" alt="' . esc_attr($svg_alt) . '">';
                    echo '</div>';
                }
            }
            
        ?>


    </div>
</div>

<?php get_footer() ?>