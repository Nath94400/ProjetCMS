<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php wp_head() ?>
    </head>
  <?php
  if(is_404())
  {
    echo '<body class="body404">';
  } else{
    echo '<body class="bg-white">';
  }
  ?>
    
      <header>
      <?php
      if(is_404())
      {
        echo '<nav class="navbar navbar-expand-lg navbar pl-5 d-flex align-items-start pr-2 bg-blue">';
      } else{
        echo '<nav class="navbar navbar-expand-lg navbar pl-5 d-flex align-items-start pr-2">';
      }
      ?>
        
          <img src="<?php
          if(is_404())
          {
            echo get_template_directory_uri() . '/assets/image/logo2.svg';
          } else{
            echo get_template_directory_uri() . '/assets/image/logo.svg';
          }
          
           ?>" class="logo" alt="Logo">
          <ul class="navbar-nav ml-auto mt-2">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle ml-5 text-md-end" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php
                  if(is_404())
                  {
                    echo '<img class="text-md-end" src="' . get_template_directory_uri() . '/assets/image/menuLogo.svg'.'" alt="Image" style="filter: brightness(100);">';
                  } else{
                    echo '<img class="text-md-end" src="' . get_template_directory_uri() . '/assets/image/menuLogo.svg'.'" alt="Image">';
                  }
                ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right border-0 font-white" aria-labelledby="navbarDropdownMenuLink">
                <?php if (has_nav_menu('primary')) 
                {
                  // Afficher le menu principal si un menu a été défini dans l'interface d'administration
                  wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class' => 'ulNav font-white',
                  ));
                } else {
                  // Contenu par défaut du menu si aucun menu n'a été défini
                ?>
                  <ul class="ulNav font-white">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Partners</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contacts</a></li>
                  </ul>
                <?php
                }
                ?>
              </div>
            </li>
          </ul>
        </nav>
      </header>

    