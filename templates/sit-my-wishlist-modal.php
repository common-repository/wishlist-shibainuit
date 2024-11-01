<?php 
$sit_wishlist_items = sit_get_wishlist_array();

?>
<div class="sit-wishlist-modal-wrapper" style="display:none" id="sit-wishlist-modal-wrapper">
    <div class="sit-modal-inner">

        <div class="sit-modal-content">

            <button class="btn btn sit-wishlist-modal-close-btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M23.954 21.03l-9.184-9.095 9.092-9.174-2.832-2.807-9.09 9.179-9.176-9.088-2.81 2.81 9.186 9.105-9.095 9.184 2.81 2.81 9.112-9.192 9.18 9.1z"/></svg></button>
            <div class="sit-modal-title">My wishlist</div>

            <div class="sit-modal-wishlist-items">

                <?php if($sit_wishlist_items): ?>

                    <?php foreach($sit_wishlist_items as $id): ?>
                    <div class="sit-modal-wishlist-item">
                        <a href="<?php echo get_the_permalink( $id ) ?>"><?php echo get_the_title( $id ) ?></a>
                        <button  class="btn sit-remove-wishlist-btn-from-modal" data-nonce="<?php echo esc_attr(wp_create_nonce('sit-wishlist')) ?>" data-post-id="<?php echo esc_attr($id) ?>" data-action="remove" data-admin-url="<?php echo admin_url( 'admin-ajax.php' ) ?>" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6 13h-12v-2h12v2z"/></svg>    
                        </button>
                    </div>
                    <?php endforeach ?>

                <?php else: ?>
                    <div class="sit-modal-no-item-wrapper">
                        <div class="sit-modal-no-title">No item found</div>
                        <div class="sit-modal-no-detail">Your wishlist is empty!</div>
                    </div>
                <?php endif; ?>
            </div>

        </div>



    </div>



</div>