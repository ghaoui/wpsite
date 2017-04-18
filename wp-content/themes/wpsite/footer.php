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
            <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs">
                <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" alt=""></a>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <h2>NOUS CONNAITRE</h2>
                        <ul>
                            <li><a style="color: #fff;" href="#" data-toggle="modal" data-target="#quisommesnous">Qui sommes nous ?</a></li>
                            <li><a style="color: #fff;" href="#" data-toggle="modal" data-target="#commentcamarche">Comment ça marche?</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <h2>CONTACTEZ NOUS</h2>
                        <p>Address: 56 Rue Habib Bourguiba Rosa center -le bardo -  E-mail: <a href="mailto:contact@dealtounsi.com">contact@dealtounsi.com</a><br> Service Client<br> +216 56 583 888 <br> +216 71 501 925</p>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <h2>NOS SERVICES</h2>
                        <ul>
                            <li><a style="color: #fff;" href="#" data-toggle="modal" data-target="#conditiongenerale">Conditions générales</a></li>
                            <?php 
                            $user = wp_get_current_user();
                                if($user->ID == 0){
                                    $link = "login?profile=true";
                                }else{
                                    $link = "profile";
                                }
                            ?>
                            <li><a style="color: #fff;" href="/<?php echo $link;?>">Espace client</a></li>
                            <li><a style="color: #fff;" href="/devenirsponsor">Devenir sponsor</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <h2>SUIVEZ NOUS</h2>
                        <ul class="social">
                            <li><a  href="https://www.facebook.com/Deal-tounsi-995253207242803/" target="_blank"><i class="uk-icon-facebook"></i></a></li>
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
    Copyright © 2017 Dealtounsi. Tous droits réservés. - <a target="_blank" href="https://www.linkedin.com/in/hamdi-ghaoui-68210250/">DEVGH</a>
</section>
<a href="#" class="back-top uk-icon-chevron-up"></a>
<div class="modal fade" tabindex="-1" role="dialog" id="quisommesnous">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">QUI SOMME NOUS ?</h4>
      </div>
      <div class="modal-body">
          <?php 
                $args  = array(
                    'post_type' => 'page',
                    'p' => 186
                );
                $the_query = new WP_Query( $args ); 
                if ( $the_query->have_posts() ) :
                    while ( $the_query->have_posts() ) : $the_query->the_post(); 
            the_content();
                    endwhile;
                    wp_reset_postdata(); 
                endif; 
            ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="commentcamarche">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">COMMENT ÇA MARCHE?</h4>
      </div>
      <div class="modal-body">
          <?php 
                $args  = array(
                    'post_type' => 'page',
                    'p' => 190
                );
                $the_query = new WP_Query( $args ); 
                if ( $the_query->have_posts() ) :
                    while ( $the_query->have_posts() ) : $the_query->the_post(); 
            the_content();
                    endwhile;
                    wp_reset_postdata(); 
                endif; 
            ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="conditiongenerale">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">CONDITIONS GÉNÉRALES D'UTILISATION</h4>
      </div>
      <div class="modal-body">
          <?php 
                $args  = array(
                    'post_type' => 'page',
                    'p' => 194
                );
                $the_query = new WP_Query( $args ); 
                if ( $the_query->have_posts() ) :
                    while ( $the_query->have_posts() ) : $the_query->the_post(); 
            the_content();
                    endwhile;
                    wp_reset_postdata(); 
                endif; 
            ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php wp_footer(); ?>
</body>
</html>

