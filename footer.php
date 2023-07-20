        <footer class="text-white mt-3 pt-5 pb-4 pl-4 position-relative">
            <div class="container-fluid text-center text-md-left">
                <div class="row">
                    <div class="col-4 col-xl-3 mt-3">

                        <?php

                            if(is_404())
                            {
                            
                            } else {
                                echo '<img src="'. get_template_directory_uri() . '/assets/image/logo3.svg'.'" class="logo mb-5" alt="Logo">';
                            }

                        ?>
                        <p class="text-white mt-5 pb-3">2022 Figma Template by ESGI</p>
                    </div>

                    <div class="col-8 col-xl-9 mt-3 pr-2 pr-md-5 d-flex justify-content-end">
                        <div>
                            <h5 class="text-uppercase mb-4 font-weight-bold text-white">Manager</h5>
                            <p>+33 1 53 31 25 23</p>
                            <p>info@company.com</p>
                        </div>

                        <div class="ml-3">
                            <h5 class="text-uppercase mb-4 font-weight-bold text-white">CEO</h5>
                            <p>+33 1 53 31 25 25</p>
                            <p>ceo@company.com</p>
                        </div>
                    </div>

                    <div class="containerSocialMedia position-absolute bottom-0 right-0 mr-4 mb-4">
                        <a href="https://www.linkedin.com" target="_blank">
                            <img src="<?= get_template_directory_uri() . '/assets/image/linkedin.svg'?>" alt="linkedin" class="mr-2">
                        </a>
                        <a href="https://www.facebook.com" target="_blank">
                            <img src="<?= get_template_directory_uri() . '/assets/image/facebook.svg'?>" alt="facebook" class="mr-2">
                        </a>
                    </div>
                </div>
            </div>
        </footer>

        <?php wp_footer(); ?>

    </body>
</html>