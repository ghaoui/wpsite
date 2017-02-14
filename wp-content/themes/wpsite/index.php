<?php get_header(); ?>
<section class="slider">
        <div class="container">
            <div class="uk-slidenav-position" data-uk-slideshow="animation: 'swipe', autoplay: true">
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
                <ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center">
                    <li data-uk-slideshow-item="0"><a href=""></a></li>
                    <li data-uk-slideshow-item="1"><a href=""></a></li>
                </ul>
            </div>
        </div>
    </section>
<?php get_footer(); ?>