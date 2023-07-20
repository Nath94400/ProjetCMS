<?php get_header() ?>

<!-- Contenu principal -->
<div class="header-404 body404">
    <div class="col-12 col-lg-8 mt-5 pt-5">
        <div class="card border-0">
            <div class="card-body bg-blue">
                <h1 class="card-title" style="font-size: 84px;">404 Error.</h1>
                <p class="card-text" style="font-size: 26px;">The page you were looking for couldn't be found. <br>Maybe try a search?</p>
                <?= get_search_form() ?>
            </div>
        </div>
    </div>
</div>


<style type="text/css">
/* Styles personnalisés pour le header sur la page 404 */
.header-404 .navbar {
    background-color: #050A3A; /* Remplacez #050A3A par la couleur de votre choix */
}
</style>

<?php get_footer() ?>