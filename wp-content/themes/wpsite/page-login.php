<?php 
$error = false;
if(!empty($_POST)){
    $user = wp_signon($_POST);
    if(is_wp_error($user)){
        $error = $user->get_error_message();
    }else{
        if(isset($_SESSION['addToCart'])){
            header('Location: /panier');
        }else {
            header('Location: /');
        }
    }   
}
else{
    $user = wp_get_current_user();
    if($user->ID != 0){
        header('Location: /profile');
    }
}
    
?>
<?php get_header(); ?>
<section class="login">
    <div class="container">
        <div class="row" style="margin-top:20px">
            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                <?php if($error):?>
                <div class="error">
                    <?php echo $error;?>
                </div>
                <?php endif;?>
                <form role="form" action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post">
                                <fieldset>
                                        <h2>Please Sign In</h2>
                                        <hr class="colorgraph">
                                        <div class="form-group">
                                            <input type="text" name="user_login" id="user_login" class="form-control input-lg" placeholder="Identifiant">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="user_password" id="user_password" class="form-control input-lg" placeholder="Mot de passe">
                                        </div>
                                        <span class="button-checkbox">
                                                <button type="button" class="btn" data-color="info">Se souvenir de moi</button>
                                                    <input type="checkbox" name="remember" id="remember" value="1" class="hidden">
                                                <a href="" class="btn btn-link pull-rig  ht">Forgot Password?</a>
                                        </span>
                                        <hr class="colorgraph">
                                        <div class="row">
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Se connecter">
                                                </div>
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                        <a href="<?php echo bloginfo('url')?>/inscription" class="btn btn-lg btn-primary btn-block">Inscription</a>
                                                </div>
                                        </div>
                                </fieldset>
                        </form>
                </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>