<?php get_header(); ?>
<section class="slider">
        <div class="container">
            <div class="uk-slidenav-position" data-uk-slideshow="animation:'random-fx', autoplay: true">
                <ul class="uk-slideshow">
                        <?php 
                            $args  = array(
                                'post_type' => 'slider',
                                'order' => 'DESC',
                                'posts_per_page'=> -1
                            );
                            $the_query = new WP_Query( $args ); 
                            if ( $the_query->have_posts() ) :
                                while ( $the_query->have_posts() ) : $the_query->the_post(); 
                        ?>
                        <li><?php the_post_thumbnail(); ?></li>
                            <?php
                                endwhile;
                                wp_reset_postdata(); 
                            endif; 
                            ?>
		    </ul>
                <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
                <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
            </div>
        </div>
    </section>
<section class="all-article">
    <div class="container">
        <div class="row" data-uk-grid-match="target: '.item'">
            <?php 
                $args  = array(
                    'post_type' => 'post',
                    'order' => 'DESC',
                    'posts_per_page'=> -1
                );
                $the_query = new WP_Query( $args ); 
                if ( $the_query->have_posts() ) :
                    while ( $the_query->have_posts() ) : $the_query->the_post(); 
            ?>
            <div class="col-lg-6">
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
                                    <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <?php the_field('emplacement')?>
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
                    <div class="dejaacheter">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php the_field('counter')?>
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