<?php 
 $user = wp_get_current_user();
    if($user->ID == 0){
        if(isset($_GET['addToCart'])){
            $_SESSION['addToCart']= true;
        }
        header('Location: /login');
    }else if(isset($_SESSION['addToCart']) ||isset($_GET['addToCart']) ){
        if(isset($_SESSION['myCart'])) {
            $myCart = $_SESSION['myCart'];
            
        }
        else {$myCart = array();}
        if(!in_array($_SESSION['postId'],$myCart ) && isset($_SESSION['postId'])){
            $myCart[] = $_SESSION['postId'];
        }
        $_SESSION['myCart'] = $myCart;
        unset($_SESSION['postId']);
        unset($_SESSION['addToCart']);
    }
?>
<?php get_header(); ?>
<section class="panier">
    <div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <?php 
                $myCart = $_SESSION['myCart'];
                if(!empty($myCart)):
            ?>
            <form method="post" action="<?php echo bloginfo('url')?>/checkout">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Deal</th>
                        <th>Quantité</th>
                        <th class="text-center">Prix</th>
                        <th class="text-center">Totale</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <?php   
                    $prix_tot = 0;
                        foreach ($myCart as $key => $cart):
                        $prix_tot = $prix_tot + get_field('apres_prix', $cart);   
                    ?>
                    <tr>
                        <td class="col-sm-6 col-md-6"> 
                        <div class="media">
                            <a class="pull-left" href="#"> <?php echo get_the_post_thumbnail($cart, array(72, 72), array('class' => 'media-object'))?> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#"> <?php echo get_the_title($cart)?></a></h4>
                                
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                            <input type="text" class="form-control quantite"  value="1" name="qte[]">
                        </td>
                        <td class="col-sm-2 col-md-2 text-center"><strong class="prix_uni"><?php echo get_field('apres_prix', $cart)?></strong> <strong>DT</strong></td>
                        <td class="col-sm-2 col-md-2 text-center"><strong class="prix_tot"><?php echo get_field('apres_prix', $cart)?></strong> <strong>DT</strong></td>
                        <td class="col-sm-1 col-md-1 text-right">
                        <button type="button" class="btn btn-danger removeCart" data-id="<?php echo $key;?>">
                            <span class="glyphicon glyphicon-remove"></span> Remove
                        </button></td>
                    </tr>
                <?php 
                endforeach;
                ?>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong class="total"><?php echo $prix_tot;?></strong> <strong>DT</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        </td>
                        <td class="">
                        <a type="button" class="btn btn-default" href="<?php echo bloginfo('url')?>">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continuer vos achats
                        </a></td>
                    </tr>
                </tbody>
            </table>
            
            
                <div class="row other-check" >
                    <div class="col-lg-3">
                         <div class="radio">
                            <label>
                              <input type="radio" name="payGtyId" id="optionsRadios1" value="Payer au bureau" checked>
                              Payer au bureau
                            </label>
                          </div>
                    </div>
                    <div class="col-lg-3">
                         <div class="radio">
                            <label>
                              <input type="radio" name="payGtyId" id="optionsRadios2" value="E-dinar ou born interactif" checked>
                              E-dinar ou born interactif
                            </label>
                          </div>
                    </div>
                    <div class="col-lg-3">
                         <div class="radio">
                            <label>
                              <input type="radio" name="payGtyId" id="optionsRadios3" value="Paiement par carte bancaire" checked>
                               Paiement par carte bancaire
                            </label>
                          </div>
                    </div>
                    <div class="col-lg-3">
                        <button type="submit" class="btn btn-success">
                            Payez votre commande <span class="glyphicon glyphicon-play"></span>
                        </button>
                    </div>
                </div>
            </form>
            <?php else :?>
            <div class="panier-vide">           
                Panier Vide
            </div>
            <?php 
                endif;
            ?>
            <div class="panier-vide" id="panier-vide">           
                Panier Vide
            </div>
        </div>
    </div>
</div>
</section>
<?php get_footer(); ?>