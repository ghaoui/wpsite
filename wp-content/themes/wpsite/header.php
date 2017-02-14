<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php bloginfo('name'); ?><?php wp_title('|'); ?></title>
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
                        <a href="#">Connexion</a>
                        <a href="#">Inscription</a>
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
                    <?php wp_nav_menu(array('theme_location' => 'header')); ?>
                </div>
            </div>
        </div>
    </section>
    