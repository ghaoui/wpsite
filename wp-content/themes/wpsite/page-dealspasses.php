<?php get_header(); ?>

<section class="deals-passes">
    <div class="container">
        <h2>Deals passés</h2>
        <div class="row" data-uk-grid-match="target: '.item'">
            <?php 
                $args  = array(
                    'post_type' => 'post',
                    'order' => 'DESC',
                    'posts_per_page'=> -1,
                    'meta_key'		=> 'deals_terminer',
                    'meta_value'	=> 'oui'
                );
                $the_query = new WP_Query( $args ); 
                if ( $the_query->have_posts() ) :
                    while ( $the_query->have_posts() ) : $the_query->the_post(); 
            ?>
            <div class="col-lg-4 col-md-4 col-md-6">
                    <div class="item">                        
                        <figure class="uk-overlay uk-overlay-hover">
                            <?php the_post_thumbnail('post-thumbnail', array('class' => 'uk-overlay-spin'));?>
                            <figcaption class="uk-overlay-panel uk-overlay-slide-bottom">
                                <div class="excerpt">
                                    <?php echo excerpt(20);?><br>
                                    <span><?php the_field('apres_prix');?> DT</span> au lieu de <span><?php the_field('avant_prix');?> DT</span>
                                </div>
                            </figcaption>
                        </figure>
                        
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