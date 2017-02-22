<?php 
 $user = wp_get_current_user();
    if($user->ID == 0 || count($_SESSION['myCart']) == 0){
        header('Location: /');
    }else{
        if(isset($_POST['payGtyId'])){
            $myCart = $_SESSION['myCart'];
            $tot = 0;
            global $wpdb;
            $wpdb->insert('deals_coupons', array(
               'commande_date' => date('Y-m-d'),
               'payement_mode' => $_POST['payGtyId'],
                'status' => 'traitement en cours',
                'user_id' => $user->ID
            ));
            $coupon_id = $wpdb->insert_id;
            foreach ($myCart as $key => $cart){
                $prix = get_field('apres_prix', $cart) * $_POST['qte'][$key];
                $tot = $tot + $prix;
                $wpdb->insert('deals_coupons_products', array(
                'id_coupon' => $coupon_id,
                'id_product' => $cart,
                'qte' => $_POST['qte'][$key],
                'montant' => $prix
             ));
            }
            $wpdb->update('deals_coupons', array(
                'status' => 'Payement en attente',
                'total' => $tot
            ), array(
                'id' => $coupon_id
            ));
            unset($_SESSION['myCart']);
            //if($_POST['']){}
        }
        
    }
?>
<?php get_header(); ?>
<section class="checkout">
    <div class="container">    
        <?php if($_POST['payGtyId']== "Payer au bureau"){?>
        <p>
            Votre commande <?php echo $coupon_id;?> a été enregistrée avec succèss.<br>
Vous pouvez récupérer votre coupon dans notre Store
        </p>
        <?php }?>
</div>
</section>
<?php get_footer(); ?>