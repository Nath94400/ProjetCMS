<?php
    $count = absint(get_comments_number());

    if($count > 0 ): 
?>

<h3 class="mb-4 font-blue mt-5">Comment<?= $count > 1 ? 's' : '' ?> <?= '(' . $count . ')' ?> </h3>

<?php else: ?>

    <h1 style="font-size:25px;" class="font-blue mb-4">Leave a reply</h1>
<?php endif ?>


<?php
if ( have_comments() ) {
    // Définir les variables $args et $depth
    $args = array(
        'depth'      => 1,       // Niveau de profondeur pour les commentaires imbriqués
        'max_depth'  => get_option( 'thread_comments_depth' ), // Niveau de profondeur maximal des commentaires (prend la valeur de la configuration WordPress)
        'before'     => '',      // Élément HTML à insérer avant le lien (facultatif)
        'after'      => '',      // Élément HTML à insérer après le lien (facultatif)
    );
    // Boucle pour afficher chaque commentaire
    foreach ( $comments as $comment ) :
        ?>
        <div class="creplyCardBlogSinglePage mt-5 p-0 col-12 mx-auto">
            <h1 style="font-size:25px;" class="font-blue"><?php comment_author(); ?> </h1>
            <p style="font-size:15px;" class="font-grey">
                <?php comment_text(); // Affiche le contenu du commentaire ?>
            </p>
            <?php comment_reply_link($args) ?>
        </div>
        <?php
    endforeach;
}
?>

<?php
    if (comments_open())
    {
        comment_form();
    }


?>