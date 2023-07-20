<?php get_header(); ?>

<div class="bg-white">
    

        <?php
        // Afficher les réglages personnalisés pour la section "Bannière"
        $custom_image = get_theme_mod('custom_image_home_banner', '');
        $custom_title = get_theme_mod('custom_title_home_banner', '');
        $custom_text = get_theme_mod('custom_text_home_banner', '');

        if (!empty($custom_image)) :
            ?>
            <img src="<?php echo esc_url($custom_image); ?>" alt="Custom Image">
        <?php endif; ?>

        <?php if (!empty($custom_title)) : ?>
            <h1><?php echo esc_html($custom_title); ?></h1>
        <?php endif; ?>

        <?php if (!empty($custom_text)) : ?>
            <p><?php echo wp_kses_post($custom_text); ?></p>
        <?php endif; ?>

        <?php
        // Afficher les réglages personnalisés pour la section "About Content"
        $custom_image_about = get_theme_mod('custom_image_about', '');

        if (!empty($custom_image_about)) :
            ?>
            <img src="<?php echo esc_url($custom_image_about); ?>" alt="Custom Image About">
        <?php endif; ?>

        <?php
        // Boucle pour afficher les 3 titres et les 3 textes de la section "About Content"
        for ($i = 1; $i <= 3; $i++) {
            $custom_title_about = get_theme_mod('custom_title_about_' . $i, '');
            $custom_text_about = get_theme_mod('custom_text_about_' . $i, '');

            if (!empty($custom_title_about) || !empty($custom_text_about)) :
                ?>
                <h2><?php echo esc_html($custom_title_about); ?></h2>
                <p><?php echo wp_kses_post($custom_text_about); ?></p>
            <?php endif;
        } ?>

<?php
// Récupération des valeurs des réglages personnalisés
$menu_image_1 = get_theme_mod('custom_image_1_service_banner', '');
$menu_image_2 = get_theme_mod('custom_image_2_service_banner', '');
$menu_image_3 = get_theme_mod('custom_image_3_service_banner', '');
$menu_title = get_theme_mod('custom_title_service_banner', '');
?>

<!-- Afficher les images -->
<?php if (!empty($menu_image_1)) : ?>
    <img src="<?php echo esc_url($menu_image_1); ?>" alt="Menu Image 1">
<?php endif; ?>

<?php if (!empty($menu_image_2)) : ?>
    <img src="<?php echo esc_url($menu_image_2); ?>" alt="Menu Image 2">
<?php endif; ?>

<!-- Afficher le titre -->
<?php if (!empty($menu_title)) : ?>
    <h2><?php echo esc_html($menu_title); ?></h2>
<?php endif; ?>

<?php if (!empty($menu_image_3)) : ?>
    <img src="<?php echo esc_url($menu_image_3); ?>" alt="Menu Image 3">
<?php endif; ?>

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