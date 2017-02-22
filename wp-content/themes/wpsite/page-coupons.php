<?php 
 $user = wp_get_current_user();
    if($user->ID == 0){
        header('Location: /');
    }
?>
<?php get_header(); ?>
<section class="coupons">
    <div class="container">    
        <h2>Mes coupons</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>numéro de commande</th>
                    <th>Product   |   Qty</th>
                    <th>Total</th>
                    <th>Date de commande</th>
                    <th>Mode de paiement</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    global $wpdb;
                    $query = "select * from deals_coupons where user_id = ". $user->ID ." order by id DESC";
                    $commandes = $wpdb->get_results( $query);
                    foreach ($commandes as $commande){
                ?>
                <tr>
                    <td><?php echo $commande->id ?></td>
                    <td>
                        <table class="table">
                            <tbody>
                        <?php 
                            $sub_query = "select * from deals_coupons_products where id_coupon = ". $commande->id ." order by id";
                            $products = $wpdb->get_results( $sub_query);
                            foreach ($products as $product){
                        ?>
                                <tr>
                                    <td>
                                        <?php echo get_the_title($product->id_product);?>
                                    </td>
                                    <td>
                                        <?php echo $product->qte;?>
                                    </td>
                                </tr>
                        <?php }?>
                            </tbody>
                        </table>
                    </td>
                    <td><?php echo $commande->total ?></td>
                    <td><?php echo $commande->commande_date ?></td>
                    <td><?php echo $commande->payement_mode ?></td>
                    <td><?php echo $commande->status ?></td>
                </tr>
                    <?php } ?>
            </tbody>
          </table>
    </div>
</section>
<?php get_footer(); ?>
