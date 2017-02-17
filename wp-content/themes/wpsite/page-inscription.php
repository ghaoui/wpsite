<?php 
$error = false;
if(!empty($_POST)){
    $d = $_POST;
    if($d['user_pass'] != $d['user_pass2']){
        $error = "Les 2 mots de passes ne correspondent pas";
    }else{
        if(!is_email($d['user_email'])){
            $error = "Veuillez entrer un E-mail valide";
        }else{
            $userdata = array(
              'first_name' => $d['first_name'],
              'last_name' => $d['last_name'], 
              'user_email' => $d['user_email'], 
              'user_login' => $d['user_login'],
              'user_pass' => $d['user_pass'], 
              'user_registered' => date('Y-m-d H:i:s')
            );
            $user = wp_insert_user($userdata);
            if(is_wp_error($user)){
                $error = $user->get_error_message();
            }else{
                update_user_meta($user, 'addr1', $d['addr1']);
                update_user_meta($user, 'city', $d['city']);
                update_user_meta($user, 'thestate', $d['thestate']);
                update_user_meta($user, 'pays', $d['pays']);
                update_user_meta($user, 'zip', $d['zip']);
                update_user_meta($user, 'phone1', $d['phone1']);
                update_user_meta($user, 'naissance', $d['naissance']);
                $message = 'Vous étes maintenant inscrit';
                $headers = 'From : '.get_option('admin_email')."\r\n";
                //wp_mail($d['user_email'], 'Inscription réussie', $message, $headers);
                wp_mail("ghaoui.hamdi@gmail.com", 'Inscription réussie', $message, $headers);
                $d = array();                
               // wp_signon($_POST);                
                header('Location: /wpsite/login');
            }
        }
    }
}
?>
<?php get_header(); ?>
<section class="inscription">
    <div class="container">
        <div class="row" style="margin-top:20px">
            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
              <?php if($error):?>
                <div class="error">
                    <?php echo $error;?>
                </div>
                <?php endif;?>
                <form role="form" action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post" id="inscription">
                                <fieldset>
                                        <h2>Inscription</h2> 
                                        <hr class="colorgraph">
                                        <div class="form-group">
                                            <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="Nom " value="<?php echo (isset($d['first_name']))? $d['first_name']: '';?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Prénom " value="<?php echo (isset($d['last_name']))? $d['last_name']: '';?>">
                                        </div>                                        
                                        <div class="form-group">
                                            <input type="text" name="user_login" id="user_login" class="form-control input-lg" placeholder="Identifiant" value="<?php echo (isset($d['user_login']))? $d['user_login']: '';?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="user_pass" id="user_pass" class="form-control input-lg" placeholder="Mot de passe">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="user_pass2" id="user_pass2" class="form-control input-lg" placeholder="Confirmer votre mot de passe">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="user_email" id="user_email" class="form-control input-lg" placeholder="E-mail " value="<?php echo (isset($d['user_email']))? $d['user_email']: '';?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="addr1" id="addr1" class="form-control input-lg" placeholder="Adresse " value="<?php echo (isset($d['addr1']))? $d['addr1']: '';?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="city" id="city" class="form-control input-lg" placeholder="Ville " value="<?php echo (isset($d['city']))? $d['city']: '';?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="thestate" id="thestate" class="form-control input-lg" placeholder="Régionl " value="<?php echo (isset($d['thestate']))? $d['thestate']: '';?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="pays" id="pays" class="form-control input-lg" placeholder="Pays " value="<?php echo (isset($d['pays']))? $d['pays']: '';?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="zip" id="zip" class="form-control input-lg" placeholder="Code postal " value="<?php echo (isset($d['zip']))? $d['zip']: '';?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="phone1" id="phone1" class="form-control input-lg" placeholder="Téléphone " value="<?php echo (isset($d['phone1']))? $d['phone1']: '';?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="naissance" id="naissance" class="form-control input-lg" placeholder="Date de Naissance " value="<?php echo (isset($d['naissance']))? $d['naissance']: '';?>">
                                        </div>
                                        <hr class="colorgraph">
                                        <div class="row">
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Inscription">
                                                </div>
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                        <a href="<?php echo bloginfo('url')?>/login" class="btn btn-lg btn-primary btn-block">Connexion</a>
                                                </div>
                                        </div>
                                </fieldset>
                        </form>
                </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>