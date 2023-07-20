<?php
/*
Template Name: Services Template
*/
?>

<?php get_header(); ?>


<div class="container col-12 mb-5 p-0 mt-3 bg-white" style="width:100vw;">
    <h1 class="mb-5 col-12 p-0" style="font-size:60px;"><?= the_title()?></h1>
    
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
                <img src="<?php echo esc_url($menu_image_1); ?>" class="card-img-top" alt="Menu Image 1">
            </div>
            <?php endif; ?>

        <?php if (!empty($menu_image_2)) : ?>
            <div class="col-lg-3 col-6 m-0 p-0">
                <img src="<?php echo esc_url($menu_image_2); ?>" class="card-img-top" alt="Menu Image 2">
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
                <img src="<?php echo esc_url($menu_image_3); ?>" class="card-img-top" alt="Menu Image 3">
            </div>
        <?php endif; ?>


        <?php
        // Afficher les réglages personnalisés pour la section "Bannière"
        $custom_image = get_theme_mod('custom_image_service_content', '');
        $custom_title = get_theme_mod('custom_title_service_content', '');
        $custom_text = get_theme_mod('custom_text_service_content', '');
        ?>

        <?php if (!empty($custom_title)) : ?>
            <h1 class="mb-2 mt-5 col-12" style="font-size:50px;"><?php echo esc_html($custom_title); ?></h1>
        <?php endif; ?>

        <?php if (!empty($custom_text)) : ?>
            <p class="ml-1 col-lg-6 col-12 font-grey" style="font-size:20px;"><?php echo wp_kses_post($custom_text); ?></p>
        <?php endif; ?>
    </div>
    
    <?php if (!empty($custom_image)) : ?>
        <div class="col-12 mt-3 m-0 p-0">
            <img src="<?php echo esc_url($custom_image); ?>" alt="Custom Image">
        </div>
    <?php endif; ?>

<?php get_footer(); ?>