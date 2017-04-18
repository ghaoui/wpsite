<?php    
    $_SESSION['postId'] = get_the_ID();
?>
<?php get_header(); ?>
<section class="single-poste">
    <div class="container">
        <div class="intro">
            <?php echo get_the_excerpt() ;?>
        </div>
        <div class="row uk-margin-bottom" data-uk-grid-match="target:'.item-single'">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="uk-slidenav-position item-single" data-uk-slideshow="animation:'random-fx', autoplay: true, autoplayInterval: 4000">
                    <ul class="uk-slideshow">
                            <?php 
                                
                                if( have_rows('galerie') ):
                                    while ( have_rows('galerie') ) : the_row(); 
                            ?>
                        <li><a href="<?php the_sub_field('image'); ?>" data-uk-lightbox><img src="<?php the_sub_field('image'); ?>"></a></li>
                                <?php
                                    endwhile;
                                endif; 
                                ?>
                        </ul>
                    <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
                    <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
                    <div class=" hidden-xs uk-slidenav-position thumbnails" data-uk-slider="infinite:false">

                        <div class="uk-slider-container">
                            <ul class="uk-slider uk-grid-width-medium-1-5">
                                <?php 
                                $i = 0;
                                if( have_rows('galerie') ):
                                    while ( have_rows('galerie') ) : the_row(); 
                            ?>
                                <li><a data-uk-slideshow-item="<?php echo $i;?>"><img src="<?php the_sub_field('image'); ?>"></a></li>
                                <?php
                                $i++;
                                    endwhile;
                                endif; 
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="item-single flex-item">
                    <div class="montant">
                        <div class="apres"><?php the_field('apres_prix')?> DT</div>
                        <div class="avant">Au lieu de <span><?php the_field('avant_prix')?> DT</span></div>
                    </div>
                    <div class="compteur">
                        <?php if(get_field('vente_illimite')[0] == 'oui'): ?>
                        <i class="uk-icon-clock-o"></i> Vente illimité !
                        <?php  else:?>
                        <i class="uk-icon-clock-o"></i> <span id="countDown" data-dat="<?php the_field('date_fin_deal')?> "></span>
                        <?php endif;?>
                    </div>
                    <div class="actions">
                        <div class="dejaacheter">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php the_field('counter')?>
                        </div>
                        <a onclick="window.open(this.href, '', 'height=500, width=500, top=100, left=500'); return false;" class="partager" href="https://www.facebook.com/sharer.php?u=<?php the_permalink();?>">
                           <img src="<?php bloginfo('stylesheet_directory'); ?>/images/fb-sahre.jpg" alt="">
                        </a>                    
                        <a href="<?php echo bloginfo('url')?>/panier?addToCart=true" class="link-voir">
                            J'achéte
                        </a>
                    </div>
                </div>   
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-9">
                <?php while(have_posts()): the_post();?>
                <div class="description">
                    <?php the_content();?>
                </div>
                <?php if(get_field('fond_description')):?>
                <div class="text-center image-description">
                    <img src="<?php the_field('image_description');?>">
                </div> 
                <?php endif;?>
                <div class="condition">
                    <h2>Les conditions</h2>
                    <?php the_field('condition')?>
                </div>
                <div class="row">
                    <?php $maps = get_field('maps');?>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="adresse">
                            où utiliser ce bon plan?<br>
                            <span><?php echo $maps['address']?></span><br>
                            <a class="itineraire" href="https://maps.google.com/maps?f=d&daddr=<?php echo $maps['address']?>" target="_blank">Itinéraire</a>
                        </div>                        
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8">                        
                        <div id="map" data-lat="<?php echo $maps['lat']?>" data-long="<?php echo $maps['lng']?>"></div>
                    </div>
                </div>
                <?php endwhile;?>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <?php 
                $args  = array(
                    'post_type' => 'post',
                    'order' => 'DESC',
                    'posts_per_page'=> 4,
                    'meta_key'		=> 'deals_terminer',
                    'meta_value'	=> 'non'
                );
                $the_query = new WP_Query( $args ); 
                if ( $the_query->have_posts() ) :
                    while ( $the_query->have_posts() ) : $the_query->the_post(); 
            ?>
                
                    <div class="item item-pub">
                        <a href="<?php the_permalink();?>" class="link-item">
                        <div class="excerpt">
                            <?php echo excerpt(20);?>
                        </div>
                        <figure class="uk-overlay uk-overlay-hover">
                            <?php the_post_thumbnail('post-thumbnail', array('class' => 'uk-overlay-spin'));?>
                            <figcaption class="uk-overlay-panel uk-ignore uk-overlay-bottom">
                                <div class="reduction">
                                    Réduction de <?php the_field('reduction')?>%
                                </div>
                                <div class="position">
                                    <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <?php the_field('emplacement')?>
                                </div>
                            </figcaption>
                        </figure>
                        </a>
                   
                    
                    <div class="actions">
                        <div class="montant">
                            <span class="apres"><?php the_field('apres_prix')?> DT</span>
                            <span class="avant"><?php the_field('avant_prix')?> DT</span>
                        </div>

                        <a href="<?php the_permalink();?>" class="link-voir">
                            Voir Deal
                        </a>
                    </div>
                 </div>
                <?php
                    endwhile;
                endif; 
            ?>
        </div>
    </div>
    </div>
</section>

<?php get_footer(); ?>