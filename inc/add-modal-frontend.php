<?php
$modal_html = '';

add_action( 'wp_footer', 
    function(){
        ob_start();
            echo "<div id='sit-wishlist-modal-placeholder'>";
                sit_wishlist_template("sit-my-wishlist-modal.php"); 
            echo "</div>";

            $modal_html = ob_get_contents();
        ob_end_clean();
        echo $modal_html;
    }
);
