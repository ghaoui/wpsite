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
            
            
            <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-92412725-1', 'auto');
            ga('send', 'pageview');

          </script>  
        <?php wp_head(); ?>
          
	 
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <div>
                        <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-header.png" alt=""></a>
                    </div>                    
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6"> 
                     <a class="panier hidden-xs" href="<?php echo bloginfo('url')?>/panier">
                        <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Panier
                        <div class="counter"><?php echo count($_SESSION['myCart']);?></div>
                    </a>
                    <a class="panier -xs visible-xs" href="<?php echo bloginfo('url')?>/panier">
                        <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                        <div class="counter"><?php echo count($_SESSION['myCart']);?></div>
                    </a>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs"></div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
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
            <div class="telheader">
                
                <i class="uk-icon-phone"></i> 71 501 925 / 56 583 888<br>
                <span>Lun - Sam de 09H à 19H</span>
            </div>
        </div>
    </header>
    <section class="sub-header">
        <div class="container">
            <div class="row" >
                
                <div class="col-lg-12">
                    <div class="welcome">
                        <?php 
                            if($user->ID != 0){
                                echo "Bonjour, ".$user->last_name." ".$user->first_name;
                        ?>
                        <a href="<?php echo bloginfo('url')?>/logout">Déconnexion</a>
                        <?php } ?>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <?php wp_nav_menu(array('theme_location' => 'header')); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>