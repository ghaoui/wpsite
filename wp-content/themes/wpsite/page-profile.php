<?php 
 $user = wp_get_current_user();
    if($user->ID == 0){
        header('Location: /wpsite/login');
    }
?>
<?php get_header(); ?>
<section class="profile">
    <div class="container">
        <div class="row" style="margin-top:20px">
            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">              
                <div class="profil-content">
                    <h2>Mon Profile</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Nom</td>
                                <td><?php echo $user->last_name;?></td>
                            </tr>
                            <tr>
                                <td>Prénom</td>
                                <td><?php echo $user->first_name;?></td>
                            </tr>
                            <tr>
                                <td>Login</td>
                                <td><?php echo $user->user_login;?></td>
                            </tr>
                            <tr>
                                <td>E-mail</td>
                                <td><?php echo $user->user_email;?></td>
                            </tr>
                            <tr>
                                <td>Adresse</td>
                                <td><?php echo get_user_meta($user->ID, 'addr1',true);?></td>
                            </tr>
                            <tr>
                                <td>Ville</td>
                                <td><?php echo get_user_meta($user->ID, 'city',true);?></td>
                            </tr>
                            <tr>
                                <td>Région</td>
                                <td><?php echo get_user_meta($user->ID, 'thestate',true);?></td>
                            </tr>
                            <tr>
                                <td>Pays</td>
                                <td><?php echo get_user_meta($user->ID, 'pays',true);?></td>
                            </tr>
                            <tr>
                                <td>Code postale</td>
                                <td><?php echo get_user_meta($user->ID, 'zip',true);?></td>
                            </tr>
                            <tr>
                                <td>Téléphone</td>
                                <td><?php echo get_user_meta($user->ID, 'phone1',true);?></td>
                            </tr>
                            <tr>
                                <td>Date de naissance</td>
                                <td><?php echo get_user_meta($user->ID, 'naissance',true);?></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td class="text-right"><a href="<?php echo bloginfo('url')?>/editprofile">Edit profile</a></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>