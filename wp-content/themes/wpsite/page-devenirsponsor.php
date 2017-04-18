<?php get_header(); ?>
<section class="single-poste">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="description">
                     <?php  
                        if ( have_posts() ) :
                            while ( have_posts() ) : the_post(); 
                    ?>
                    <?php the_content();?>
                    <?php
                            endwhile;
                            wp_reset_postdata(); 
                        endif; 
                    ?>
                <div class="row">
                    <div class="col-lg-12">
                        <?php echo do_shortcode('[contact-form-7 id="726" title="devenir sponsor"]');?>
                    </div>
                </div>
                </div>

            </div>
            <div class="col-lg-3">
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