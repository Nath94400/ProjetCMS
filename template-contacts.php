<?php
/**
 * Template Name: Page contact
 * Template Post Type : page
 */
?>

<?php get_header() ?>

<div class="container-fluid col-12 mb-5 p-0 mt-3 bg-white justify-content-center" style="width:100vw;">

    <h1 class="mb-5 col-12 p-0 ml-4 ml-md-5" style="font-size:60px;"><?= esc_html(get_the_title()) ?></h1>

<?php
// Afficher les réglages personnalisés pour la section "About Content"
$custom_image_contact = get_theme_mod('custom_image_contact', '');
$custom_text_contact_content = get_theme_mod('custom_text_contact_content', '');
?>

<?php if (!empty($custom_text_contact_content)) : ?>
        <p class="card-textBlog font-grey col-12 col-md-7 p-0 ml-4 ml-md-5" style="font-size:15px"><?php echo esc_html($custom_text_contact_content); ?></p>
<?php endif; ?>

<div class="row p-0 m-0 col-12">
      
    <div class="row col-lg-3 col-0 m-0 p-0">
                
    </div>

        <div class="col-12 row align-item-md-end ml-md-0 ml-4">
            <div class="imgHeaderContact col-md-6 col-12 p-0">

            </div>

<?php
// Boucle pour afficher les 3 titres et les 3 textes de la section "contact Content"
for ($i = 1; $i <= 3; $i++) {
    $custom_title_contact = get_theme_mod('custom_title_contact_' . $i, '');
    $custom_text_contact_1 = get_theme_mod('custom_text_contact_1_' . $i, '');
    $custom_text_contact_2 = get_theme_mod('custom_text_contact_2_' . $i, '');

    if (!empty($custom_title_contact) || !empty($custom_text_contact_1) || !empty($custom_text_contact_2)) :
        ?>
        <div class="imgHeaderContact col-md-2 col-12 p-0">
            <h3 class="mb-2 col-12 p-0 mt-3" style="font-size:25px;"><?php echo esc_html($custom_title_contact); ?></h3>
            <p class="card-textBlog font-grey col-12 p-0 mt-4 mb-1" style="font-size:15px"><?php echo wp_kses_post($custom_text_contact_1); ?></p>
            <p class="card-textBlog font-grey col-12 p-0" style="font-size:15px"><?php echo wp_kses_post($custom_text_contact_2); ?></p>
        </div>
    <?php endif;
} ?>

</div>

            <div class="imgHeaderContact col-md-3 col-12 p-0">
            </div>

<?php
if (!empty($custom_image_contact)) : ?>
        <div class="col-lg-9 col-12 m-0 p-0 mt-2 mb-2 mt-5 mb-md-5">
            <div class="imgHeaderAboutUs col-lg-12 p-0">
                <img class="card-img-top" src="<?php echo esc_url($custom_image_contact); ?>" alt="Custom Image contact">
            </div>
        </div>
        <?php endif; ?>

        <div class="footerContact col-8 mb-5 ml-5 mt-5">
                <h1 class="mb-4 col-12 p-0 " style="font-size:40px;">Write us here</h1>
                <p class="card-textBlog font-grey col-12 col-md-7 p-0 mb-5" style="font-size:15px">Go! Fon't be shy.</p>
            
                <form>
                    <div class="mb-3">
                        <input type="text" class="form-control border-0 border-bottom border-secondary bg-transparent py-2" id="subject" placeholder="Subject" style="font-size: 15px;">
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <input type="email" class="form-control border-0 border-bottom border-secondary bg-transparent py-2" id="email" placeholder="Email" style="font-size: 15px;">
                        </div>
                        <div class="col-6 mb-3">
                            <input type="tel" class="form-control border-0 border-bottom border-secondary bg-transparent py-2" id="phone" placeholder="Phone no" style="font-size: 15px;">
                        </div>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control border-0 border-bottom border-secondary bg-transparent py-2" id="message" rows="5" placeholder="Message" style="font-size: 15px;"></textarea>
                    </div>
                    <input type="submit" value="Submit" class="btn btn-link">
                </form>
            </div>
            
        
    </div>

<?php get_footer() ?>