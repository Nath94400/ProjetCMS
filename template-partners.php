<?php
/**
 * Template Name: Page partenaire
 * Template Post Type : page
 */
?>

<?php get_header() ?>

<div class="bg-white">
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

    <div class="mt-5 mb-5 pt-5"></div>
</div>

<?php get_footer() ?>