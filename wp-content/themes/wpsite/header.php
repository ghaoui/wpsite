<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php bloginfo('name'); ?><?php wp_title('|'); ?></title>
        <?php if(is_single()):
            $post_thumbnail_id = get_post_thumbnail_id($post->ID);
            $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
        ?>        
            <meta name="Keywords" content="<?php the_title()?>">
            <meta name="og:image" content="<?php echo $post_thumbnail_url;?>">
            <meta name="description" content="<?php echo get_the_excerpt();?>">
	<?php endif;?>
        <?php wp_head(); ?>
	 
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="info-time">
                        <div class="tel"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> 00 000 000</div>
                        <div class="">
                            Lun - Vend : 10h - 19h<br>
                            Samedi : 10h à 16h
                        </div>
                    </div>
                </div>
                <div class="col-lg-3"> 
                    <div class="panier">
                        <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Panier
                        <div class="counter">130</div>
                    </div>
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-4">
                    <div class="connexion">
                        <?php 
                            $user = wp_get_current_user();
                            if($user->ID == 0):
                        ?>
                        <a href="<?php echo bloginfo('url')?>/login">Connexion</a>
                        <a href="<?php echo bloginfo('url')?>/inscription">Inscription</a>
                        <?php else:?>                        
                            <a href="<?php echo bloginfo('url')?>/profile">Profile</a>
                            <a href="<?php echo bloginfo('url')?>/coupons">Mes coupons</a>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="sub-header">
        <div class="container">
            <div class="row" >
                <div class="col-lg-2">
                    <div>
                        <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" alt=""></a>
                    </div>                    
                </div>
                <div class="col-lg-10">
                    <div class="welcome">
                        <?php 
                            if($user->ID != 0){
                                echo "Bonjour, ".$user->last_name." ".$user->first_name;
                        ?>
                        <a href="<?php echo bloginfo('url')?>/logout">Déconnexion</a>
                        <?php } ?>
                    </div>
                    <?php wp_nav_menu(array('theme_location' => 'header')); ?>
                </div>
            </div>
        </div>
    </section>
    