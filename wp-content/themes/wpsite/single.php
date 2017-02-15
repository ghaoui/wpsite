<?php get_header(); ?>
<section class="single-poste">
    <div class="container">
        <div class="intro">
            <?php echo get_the_excerpt() ;?>
        </div>
        <div class="row" data-uk-grid-match>
            <div class="col-lg-6">
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
            <div class="col-lg-6">
                
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>