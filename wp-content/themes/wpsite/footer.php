<section class="sponsors">
    <div class="container">
        <div data-uk-slider="{autoplay: true}">

    <div class="uk-slider-container">
        <ul class="uk-slider uk-grid uk-grid-width-medium-1-5" data-uk-grid-match>
            <?php 
                $args  = array(
                    'post_type' => 'sponsors',
                    'order' => 'DESC',
                    'posts_per_page'=> -1
                );
                $the_query = new WP_Query( $args ); 
                if ( $the_query->have_posts() ) :
                    while ( $the_query->have_posts() ) : $the_query->the_post(); 
            ?>
            <li>
                <?php the_post_thumbnail();?>
            </li>
            <?php
                    endwhile;
                    wp_reset_postdata(); 
                endif; 
            ?>
        </ul>
    </div>
            <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
            <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>
</div>
    </div>
</section>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/footerlogo.png" alt=""></a>
            </div>
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-lg-3">
                        <h2>NOUS CONNAITRE</h2>
                        <ul>
                            <li><a style="color: #fff;" href="#">Qui sommes nous ?</a></li>
                            <li><a style="color: #fff;" href="#">Comment ça marche?</a></li>
                            <li><a style="color: #fff;" href="#">CrazyDeal recrute</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <h2>CONTACTEZ NOUS</h2>
                        <p>Address: Résidance Essalem, 3 Etage Bloc B, Rue Lamine Echebbi Naser 2 E-mail: <a href="mailto:contact@crazydeal.tn">contact@crazydeal.tn </a><br> Service Client<br> +216 31 13 11 11 // 50 720 991 // 58 139 308</p>
                    </div>
                    <div class="col-lg-3">
                        <h2>NOS SERVICES</h2>
                        <ul>
                            <li><a style="color: #fff;" href="#">Conditions générales</a></li>
                            <li><a style="color: #fff;" href="#">Espace client</a></li>
                            <li>Faire un deal</li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <h2>SUIVEZ NOUS</h2>
                        <ul class="social">
                            <li><a  href="#"><i class="uk-icon-facebook"></i></a></li>
                            <li><a  href="#"><i class="uk-icon-instagram"></i></a></li>
                            <li><a  href="#"><i class="uk-icon-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<section class="subfooter">
    Copyright © 2017 CrazyDeal. Tous droits réservés.
</section>
<a href="#" class="back-top uk-icon-chevron-up"></a>
<?php wp_footer(); ?>
</body>
</html>

