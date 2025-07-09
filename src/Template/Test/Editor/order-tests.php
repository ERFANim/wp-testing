<?php
//priceMetaBoxTests($post);
//function priceMetaBoxTests($post){
//    wp_nonce_field( 'cmb-action-name' , 'cmb-nonce-name' );
$post_id = get_the_ID();
    $html = '<label for="test-price">قیمت آزمون :</label>';
    $html .= '<input id="test-price" name="wpt-test-price" type="text" value="'.get_post_meta($post_id,'test_price',true ).'" class="">';
    echo $html;


//}

//
//function testPrice( $post_id ){
//    if (cmb_user_can_save_meta_box_data($post_id , 'cmb-nonce-name')){
//        if (isset($_POST['wpt-test-price'])){
//            $price = $_POST['wpt-test-price'] ;
//            update_post_meta($post_id , 'test_price',$price);
//        }
//    }
//}
//add_action('save_post','testPrice');
//function cmb_user_can_save_meta_box_data($post_id , $nonce){
//    $post_autosave = wp_is_post_autosave($post_id);
//
//    $post_revision = wp_is_post_revision($post_id);
//
//    $nonce_valid = isset($_POST[$nonce]) && wp_verify_nonce($_POST[$nonce],'cmb-action-name');
//
//    return !($post_autosave || $post_revision) && $nonce_valid;
//}
//?>
