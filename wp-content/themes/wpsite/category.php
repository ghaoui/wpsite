<?php get_header(); ?>
<section class="all-article">
    <div class="container">
        <div class="row" data-uk-grid-match="target: '.item'">
            <?php 
            

                if ( have_posts() ) :
                    while ( have_posts() ) : the_post(); 
            ?>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <a href="<?php the_permalink();?>" class="link-item">
                    <div class="item">
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
                                    <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Tunis
                                </div>
                            </figcaption>
                        </figure>
                        
                    </div>
                </a>
                <div class="actions">
                    <div class="montant">
                        <span class="apres"><?php the_field('apres_prix')?> DT</span>
                        <span class="avant"><?php the_field('avant_prix')?> DT</span>
                    </div>
                    <?php if(get_field('nombre_deal')!=""):?>
                    <div class="nombre_deal">
                        <img src="<?php bloginfo('stylesheet_directory'); ?>/images/marker.png" alt=""> <?php the_field('nombre_deal')?>
                    </div>
                    <?php endif;?>
                    <div class="dejaacheter">
                       <?php if(get_field('counter')==0):?>
                            Soyer<br>le 1er<br>a en profiter
                        <?php else:?>
                             <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php the_field('counter')?>
                        <?php endif;?> 
                    </div>
                    
                    <a href="<?php the_permalink();?>" class="link-voir">
                        Voir Deal
                    </a>
                </div>
            </div>
            <?php
                    endwhile;
                    wp_reset_postdata(); 
                endif; 
            ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>