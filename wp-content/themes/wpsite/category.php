<?php get_header(); ?>
<section class="all-article">
    <div class="container">
        <div class="row" data-uk-grid-match="target: '.item'">
            <?php 
            

                if ( have_posts() ) :
                    while ( have_posts() ) : the_post(); 
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
                                    Réduction de 61%
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
                        <span class="apres">119.00 DT</span>
                        <span class="avant">300.00 DT</span>
                    </div>
                    <div class="dejaacheter">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> 0
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