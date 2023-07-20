<?php

function projetcms_supports()
{
    add_theme_support('title-tag'); // Ajoute automatiquement la balise <title> dans l'en-tête du site.
    add_theme_support( 'post-thumbnails' ); // Ajoute la prise en charge des images mises en avant pour les articles.
    add_theme_support( 'html5' ); // Ajoute la prise en charge des balises HTML5 de base.
    add_theme_support( 'custom-logo' ); // Ajoute la prise en charge des logos personnalisés.
    add_theme_support( 'menus' ); // Ajoute la prise en charge des menus personnalisés.
    add_theme_support( 'automatic-feed-links' ); // Ajoute les liens de flux RSS automatiques dans l'en-tête du site.
}

//charger le style css et bootstrap
function projetcms_register_assets()
{
    // Enregistrement des styles
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css', []);
    wp_register_style('custom-style', get_template_directory_uri() . '/style.css');

    // Enregistrement des scripts
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.3.1.slim.min.js', [], null, true);
    wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js', [], null, true);
    wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js', ['popper', 'jquery'], null, true);
    wp_register_script('jscript', get_template_directory_uri() . '/script.js', [], null, true);
    

    // Localisation des données pour le script
    $scriptData = array(
        'themeDirectoryUri' => esc_html(get_template_directory_uri()),
    );
    wp_localize_script('jscript', 'themeData', $scriptData);


    // Chargement des styles
    wp_enqueue_style('bootstrap');
    wp_enqueue_style('custom-style');

    // Chargement des scripts
    wp_enqueue_script('jquery');
    wp_enqueue_script('popper');
    wp_enqueue_script('bootstrap');
    wp_enqueue_script('jscript');
}

//Remplacer le séparateur pour les titres de page
function projetcms_title_separator()
{
    return '|';
}

//Ajouter des menus
function projetcms_menu()
{
    $locations = array(
        'primary' => "Header Menu",
        'footer' => "Footer Menu"
    );

    register_nav_menus($locations);
}

//Fonction pour enregistrer les zones de widgets
function register_my_widgets(){
    register_sidebar( array(
        'name' => esc_html__('Barre latérale', 'projetcms'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Ajouter vos widgets ici', 'projetcms'),
        'before_sidebar' => '<div class="row pt-5 sidebar"><div class="postSearchContainer col-12 col-lg-4 ">',
        'after_sidebar' => '</div></div>',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title mb-4">',
        'after_title' => '</h2>',
    ));

    //Ajouter ici d'autres zones de widgets si nécessaire
}

//recuperer la recherche de l'utilisateur
function projetcms_get_search_query() {
    if (is_search()) {
        $search_query = get_search_query();
        return $search_query;
    }
    return '';
}

// Autoriser le téléchargement de fichiers SVG dans la bibliothèque des médias
function allow_svg_upload($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

// ajout menu de personnalisation pour les svg
function projetcms_customizer_svg_section($wp_customize) {
    $wp_customize->add_section('svg_section', array(
        'title'    => __('SVG Images', 'projetcms'),
        'priority' => 120,
    ));
}


// ajout des controls pour télécharger les svg
function projetcms_customizer_svg_controls($wp_customize) {
    // Répétez cette boucle pour ajouter 6 contrôles pour les images SVG
    for ($i = 1; $i <= 6; $i++) {
        $wp_customize->add_setting('svg_image_' . $i, array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'svg_image_' . $i, array(
            'label' => __('Upload SVG Image ' . $i, 'projetcms'),
            'section' => 'svg_section',
            'settings' => 'svg_image_' . $i,
        )));
    }
}

// Fonction pour enregistrer les réglages et contrôles dans le Customizer pour les cartes
function projetcms_customizer_card_section($wp_customize) {
    // Section pour les cartes personnalisées
    $wp_customize->add_section('card_section', array(
        'title' => __('Cartes avec Image et Texte', 'projetcms'),
        'priority' => 120,
    ));

    // Appel de la fonction pour ajouter les contrôles personnalisés pour les cartes
    projetcms_customizer_card_controls($wp_customize);
}

// Fonction pour ajouter les contrôles personnalisés pour les cartes
function projetcms_customizer_card_controls($wp_customize) {
    // Répéter la boucle pour ajouter 4 cartes
    for ($i = 1; $i <= 4; $i++) {
        // Réglage pour l'image de la carte
        $wp_customize->add_setting('card_image_' . $i, array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw',
        ));

        // Contrôle pour télécharger l'image de la carte
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'card_image_' . $i, array(
            'label' => __('Image de la carte ' . $i, 'projetcms'),
            'section' => 'card_section',
            'settings' => 'card_image_' . $i,
        )));

        // Réglage pour le champ de texte 1 de la carte
        $wp_customize->add_setting('card_text_1_' . $i, array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        // Contrôle pour le champ de texte 1 de la carte
        $wp_customize->add_control('card_text_1_' . $i, array(
            'label' => __('Profession', 'projetcms'),
            'section' => 'card_section',
            'type' => 'text',
        ));

        // Réglage pour le champ de texte 2 de la carte
        $wp_customize->add_setting('card_text_2_' . $i, array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        // Contrôle pour le champ de texte 2 de la carte
        $wp_customize->add_control('card_text_2_' . $i, array(
            'label' => __('Phone', 'projetcms'),
            'section' => 'card_section',
            'type' => 'text',
        ));

        // Réglage pour le champ de texte 3 de la carte
        $wp_customize->add_setting('card_text_3_' . $i, array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        // Contrôle pour le champ de texte 3 de la carte
        $wp_customize->add_control('card_text_3_' . $i, array(
            'label' => __('E-mail', 'projetcms'),
            'section' => 'card_section',
            'type' => 'text',
        ));
    }
}

// Fonction pour enregistrer les réglages et contrôles dans le Customizer pour la bannière
function projetcms_customizer_about_banner_section($wp_customize) {
    // Section pour les éléments personnalisés
    $wp_customize->add_section('about_banner_section', array(
        'title' => __('Bannière About', 'projetcms'),
        'priority' => 121, // Vous pouvez ajuster la priorité pour changer l'ordre d'affichage des sections
    ));

    // Appel de la fonction pour ajouter les contrôles personnalisés pour la bannière
    projetcms_customizer_about_banner_controls($wp_customize);
}

// Fonction pour ajouter les contrôles personnalisés pour la bannière
function projetcms_customizer_about_banner_controls($wp_customize) {
    // Réglage pour l'image
    $wp_customize->add_setting('custom_image_about_banner', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Contrôle pour télécharger l'image
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_image_about_banner', array(
        'label' => __('Image personnalisée', 'projetcms'),
        'section' => 'about_banner_section',
        'settings' => 'custom_image_about_banner',
    )));

    // Réglage pour le titre
    $wp_customize->add_setting('custom_title_about_banner', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Contrôle pour le titre
    $wp_customize->add_control('custom_title_about_banner', array(
        'label' => __('Titre personnalisé', 'projetcms'),
        'section' => 'about_banner_section',
        'type' => 'text',
    ));

    // Réglage pour le texte
    $wp_customize->add_setting('custom_text_about_banner', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_kses_post',
    ));

    // Contrôle pour le texte
    $wp_customize->add_control('custom_text_about_banner', array(
        'label' => __('Texte personnalisé', 'projetcms'),
        'section' => 'about_banner_section',
        'type' => 'textarea',
    ));
}




// Fonction pour enregistrer les réglages et contrôles dans le Customizer pour la bannière
function projetcms_customizer_home_banner_section($wp_customize) {
    // Section pour les éléments personnalisés
    $wp_customize->add_section('home_banner_section', array(
        'title' => __('Bannière home', 'projetcms'),
        'priority' => 121, // Vous pouvez ajuster la priorité pour changer l'ordre d'affichage des sections
    ));

    // Appel de la fonction pour ajouter les contrôles personnalisés pour la bannière
    projetcms_customizer_home_banner_controls($wp_customize);
}

// Fonction pour ajouter les contrôles personnalisés pour la bannière
function projetcms_customizer_home_banner_controls($wp_customize) {
    // Réglage pour l'image
    $wp_customize->add_setting('custom_image_home_banner', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Contrôle pour télécharger l'image
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_image_home_banner', array(
        'label' => __('Bannière home', 'projetcms'),
        'section' => 'home_banner_section',
        'settings' => 'custom_image_home_banner',
    )));

    // Réglage pour le titre
    $wp_customize->add_setting('custom_title_home_banner', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Contrôle pour le titre
    $wp_customize->add_control('custom_title_home_banner', array(
        'label' => __('Titre personnalisé', 'projetcms'),
        'section' => 'home_banner_section',
        'type' => 'text',
    ));

    // Réglage pour le texte
    $wp_customize->add_setting('custom_text_home_banner', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_kses_post',
    ));

    // Contrôle pour le texte
    $wp_customize->add_control('custom_text_home_banner', array(
        'label' => __('Texte personnalisé', 'projetcms'),
        'section' => 'home_banner_section',
        'type' => 'textarea',
    ));
}




// Fonction pour enregistrer les réglages et contrôles dans le Customizer pour le contenu "About"
function projetcms_customizer_about_content_section($wp_customize) {
    // Section pour les éléments personnalisés
    $wp_customize->add_section('about_content_section', array(
        'title' => __('About Content', 'projetcms'),
        'priority' => 122, // Vous pouvez ajuster la priorité pour changer l'ordre d'affichage des sections
    ));

    // Appel de la fonction pour ajouter les contrôles personnalisés pour le contenu "About"
    projetcms_customizer_about_content_controls($wp_customize);
}

// Fonction pour ajouter les contrôles personnalisés pour le contenu "About"
function projetcms_customizer_about_content_controls($wp_customize) {
    // Réglage pour l'image
    $wp_customize->add_setting('custom_image_about', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Contrôle pour télécharger l'image
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_image_about', array(
        'label' => __('Image personnalisée "About"', 'projetcms'),
        'section' => 'about_content_section',
        'settings' => 'custom_image_about',
    )));

    // Boucle pour ajouter 3 titres et 3 textes
    for ($i = 1; $i <= 3; $i++) {
        // Réglage pour le titre
        $wp_customize->add_setting('custom_title_about_' . $i, array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        // Contrôle pour le titre
        $wp_customize->add_control('custom_title_about_' . $i, array(
            'label' => __('Titre ' . $i, 'projetcms'),
            'section' => 'about_content_section',
            'type' => 'text',
        ));

        // Réglage pour le texte
        $wp_customize->add_setting('custom_text_about_' . $i, array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'wp_kses_post',
        ));

        // Contrôle pour le texte
        $wp_customize->add_control('custom_text_about_' . $i, array(
            'label' => __('Texte ' . $i, 'projetcms'),
            'section' => 'about_content_section',
            'type' => 'textarea',
        ));
    }
}

// Fonction pour enregistrer les réglages et contrôles dans le Customizer pour la bannière "Service"
function projetcms_customizer_service_banner_section($wp_customize) {
    $wp_customize->add_section('service_banner_section', array(
        'title' => __('Bannière Service', 'projetcms'),
        'priority' => 120,
    ));
}

// Fonction pour ajouter les contrôles personnalisés pour la bannière "Service"
function projetcms_customizer_service_banner_controls($wp_customize) {
    // Réglage pour l'image 1
    $wp_customize->add_setting('custom_image_1_service_banner', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Contrôle pour télécharger l'image 1
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_image_1_service_banner', array(
        'label' => __('Image 1', 'projetcms'),
        'section' => 'service_banner_section',
        'settings' => 'custom_image_1_service_banner',
    )));

    // Réglage pour l'image 2
    $wp_customize->add_setting('custom_image_2_service_banner', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Contrôle pour télécharger l'image 2
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_image_2_service_banner', array(
        'label' => __('Image 2', 'projetcms'),
        'section' => 'service_banner_section',
        'settings' => 'custom_image_2_service_banner',
    )));

    // Réglage pour l'image 3
    $wp_customize->add_setting('custom_image_3_service_banner', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Contrôle pour télécharger l'image 3
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_image_3_service_banner', array(
        'label' => __('Image 3', 'projetcms'),
        'section' => 'service_banner_section',
        'settings' => 'custom_image_3_service_banner',
    )));

    // Réglage pour le titre
    $wp_customize->add_setting('custom_title_service_banner', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Contrôle pour le titre
    $wp_customize->add_control('custom_title_service_banner', array(
        'label' => __('Titre du Menu', 'projetcms'),
        'section' => 'service_banner_section',
        'type' => 'text',
    ));
}




// Fonction pour enregistrer les réglages et contrôles dans le Customizer pour la bannière
function projetcms_customizer_service_content_section($wp_customize) {
    // Section pour les éléments personnalisés
    $wp_customize->add_section('service_content_section', array(
        'title' => __('Service Content', 'projetcms'),
        'priority' => 121, // Vous pouvez ajuster la priorité pour changer l'ordre d'affichage des sections
    ));

    // Appel de la fonction pour ajouter les contrôles personnalisés pour la bannière
    projetcms_customizer_service_content_controls($wp_customize);
}

// Fonction pour ajouter les contrôles personnalisés pour la bannière
function projetcms_customizer_service_content_controls($wp_customize) {
    // Réglage pour l'image
    $wp_customize->add_setting('custom_image_service_content', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Contrôle pour télécharger l'image
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_image_service_content', array(
        'label' => __('Image personnalisée', 'projetcms'),
        'section' => 'service_content_section',
        'settings' => 'custom_image_service_content',
    )));

    // Réglage pour le titre
    $wp_customize->add_setting('custom_title_service_content', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Contrôle pour le titre
    $wp_customize->add_control('custom_title_service_content', array(
        'label' => __('Titre personnalisé', 'projetcms'),
        'section' => 'service_content_section',
        'type' => 'text',
    ));

    // Réglage pour le texte
    $wp_customize->add_setting('custom_text_service_content', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_kses_post',
    ));

    // Contrôle pour le texte
    $wp_customize->add_control('custom_text_service_content', array(
        'label' => __('Texte personnalisé', 'projetcms'),
        'section' => 'service_content_section',
        'type' => 'textarea',
    ));
}


// Fonction pour enregistrer les réglages et contrôles dans le Customizer pour le contenu "About"
function projetcms_customizer_contact_content_section($wp_customize) {
    // Section pour les éléments personnalisés
    $wp_customize->add_section('contact_content_section', array(
        'title' => __('contact Content', 'projetcms'),
        'priority' => 122, // Vous pouvez ajuster la priorité pour changer l'ordre d'affichage des sections
    ));

    // Appel de la fonction pour ajouter les contrôles personnalisés pour le contenu "contact"
    projetcms_customizer_contact_content_controls($wp_customize);
}

// Fonction pour ajouter les contrôles personnalisés pour le contenu "contact"
function projetcms_customizer_contact_content_controls($wp_customize) {
    // Réglage pour l'image
    $wp_customize->add_setting('custom_image_contact', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Contrôle pour télécharger l'image
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_image_contact', array(
        'label' => __('Image personnalisée "contact"', 'projetcms'),
        'section' => 'contact_content_section',
        'settings' => 'custom_image_contact',
    )));

    // Réglage pour le texte
    $wp_customize->add_setting('custom_text_contact_content', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_kses_post',
    ));

    // Contrôle pour le texte
    $wp_customize->add_control('custom_text_contact_content', array(
        'label' => __('Texte personnalisé', 'projetcms'),
        'section' => 'contact_content_section',
        'type' => 'textarea',
    ));

    // Boucle pour ajouter 3 titres et 3 textes
    for ($i = 1; $i <= 3; $i++) {
        // Réglage pour le titre
        $wp_customize->add_setting('custom_title_contact_' . $i, array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        // Contrôle pour le titre
        $wp_customize->add_control('custom_title_contact_' . $i, array(
            'label' => __('Titre ' . $i, 'projetcms'),
            'section' => 'contact_content_section',
            'type' => 'text',
        ));

        // Réglage pour le champ de texte 1 de la carte
        $wp_customize->add_setting('custom_text_contact_1_' . $i, array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        // Contrôle pour le champ de texte 1 de la carte
        $wp_customize->add_control('custom_text_contact_1_' . $i, array(
            'label' => __('Text 1', 'projetcms'),
            'section' => 'contact_content_section',
            'type' => 'text',
        ));

        // Réglage pour le champ de texte 2 de la carte
        $wp_customize->add_setting('custom_text_contact_2_' . $i, array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        // Contrôle pour le champ de texte 2 de la carte
        $wp_customize->add_control('custom_text_contact_2_' . $i, array(
            'label' => __('Text 2', 'projetcms'),
            'section' => 'contact_content_section',
            'type' => 'text',
        ));
    }
}




//Customiser le button submit du formulaire de commentaire
function custom_comment_submit_button($button_html) {
    // Personnalisez le bouton en utilisant le HTML
    $button_html = esc_html($button_html);
    $button_html = sprintf(
        
        '<div class="col-12 border-top border-secondary mt-10 mb-4 pt-3"><button name="%1$s" type="submit" id="%2$s" class="%3$s"> Submit </button></div>',
        esc_attr('submit'),
        esc_attr('submit'),
        esc_attr('decoration-none font-blue text-decoration-none'), // Vous pouvez modifier les classes CSS ici si nécessaire
    );

    return $button_html;
}


//custom du titre du formulaire de reponse
function custom_comment_form_defaults($defaults) {
    // Modifiez le texte de l'élément title_reply comme vous le souhaitez
    $defaults['title_reply'] = '<h1 style="font-size:25px;" class="font-blue mb-4">Leave a reply</h1>';

    return $defaults;
}


//custom du boutton de reponse d'un commentaire
function custom_comment_reply_link($link, $args, $comment, $post) {
    $reply_button = '<p class="font-blue"><img src="' . get_template_directory_uri() . '/assets/image/reply.svg" class="logo img-fluid mr-2" alt="Logo"> Reply </p>';
    $link = $args['before'] . sprintf('<a rel="nofollow" class="comment-reply-link" href="%s" data-commentid="%s" data-postid="%s" aria-label="%s">%s</a>',
        esc_url(add_query_arg('replytocom', $comment->comment_ID, get_permalink($post->ID))),
        $comment->comment_ID,
        $post->ID,
        esc_attr(sprintf($args['reply_to_text'], $comment->comment_author)),
        $reply_button
    ) . $args['after'];

    return $link;
}


add_action('after_setup_theme', 'projetcms_supports');
add_action('wp_enqueue_scripts', 'projetcms_register_assets');

add_filter('document_title_separator', 'projetcms_title_separator');

// custom du formulaire de commentaire
add_filter('comment_form_fields', function ($fields)
{

    // Modifier le champ auteur
    $fields['author'] = <<<HTML
    <div class="mb-4">
        <input type="text" name="author" id="author" class="form-control bg-inherit  border-0 border-bottom border-secondary" placeholder="Full Name">
    </div>
    HTML;

    // Stocker le champ "Auteur" dans une variable
    $author_field = $fields['author'];

    // Supprimer le champ "Auteur" du tableau
    unset($fields['author']);

    // Ajouter le champ "Auteur" en premier
    $fields = array('author' => $author_field) + $fields;

    // Modifier le champ commentaire
    $fields['comment'] = <<<HTML
    <div class="">
        <input type="text" name="comment" id="comment" class="form-control bg-inherit border-0" placeholder="Message">
    </div>
    HTML;

    // Pour supprimer le champ "E-mail"
    unset($fields['email']);

    // Ajouter un champ e-mail facultatif
    $fields['email'] = '';

    // Pour supprimer le champ "Site web"
    unset($fields['url']);

    // Supprimer la checkbox 'cookies' du formulaire de commentaire
    unset($fields['cookies']);

    return $fields;
});



add_filter('comment_form_submit_button', 'custom_comment_submit_button');
add_filter('comment_form_defaults', 'custom_comment_form_defaults');
add_filter('comment_reply_link', 'custom_comment_reply_link', 10, 4);

add_action('init', 'projetcms_menu');

add_action('widgets_init', 'register_my_widgets');

add_action('customize_register', 'projetcms_customizer_svg_section');
add_action('customize_register', 'projetcms_customizer_svg_controls');
add_filter('upload_mimes', 'allow_svg_upload');

add_action('customize_register', 'projetcms_customizer_card_section');
add_action('customize_register', 'projetcms_customizer_card_controls');

add_action('customize_register', 'projetcms_customizer_about_banner_section');
add_action('customize_register', 'projetcms_customizer_about_banner_controls');

add_action('customize_register', 'projetcms_customizer_about_content_section');
add_action('customize_register', 'projetcms_customizer_about_content_controls');

add_action('customize_register', 'projetcms_customizer_home_banner_section');
add_action('customize_register', 'projetcms_customizer_home_banner_controls');

add_action('customize_register', 'projetcms_customizer_service_banner_section');
add_action('customize_register', 'projetcms_customizer_service_banner_controls');

add_action('customize_register', 'projetcms_customizer_service_content_section');
add_action('customize_register', 'projetcms_customizer_service_content_controls');

add_action('customize_register', 'projetcms_customizer_contact_content_section');
add_action('customize_register', 'projetcms_customizer_contact_content_controls');

