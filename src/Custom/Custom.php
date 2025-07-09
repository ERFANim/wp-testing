<?php

add_action('save_post','testAddPrice');

function testAddPrice(){
    if (isset($_POST['wpt-test-price'])){
        $price = $_POST['wpt-test-price'] ;
        update_post_meta(get_the_ID() , 'test_price',$price);
    }
}
add_action('init', 'anew_rewrite_rule');
function anew_rewrite_rule(){
    flush_rewrite_rules();
    add_rewrite_rule('^test\\/[a-z]\\/','index.php?wpt_payment_page','top');
}

add_action('query_vars','controller_set_query_var');
function controller_set_query_var($vars) {
    array_push($vars, 'wpt_payment_page'); // ref url redirected to in add rewrite rule

    return $vars;
}


//we'll call it a template but point to your controller
add_filter('template_include', 'include_controller');
function include_controller($template){


    // see above 2 functions..
    if(get_query_var('wpt_payment_page')){
        $action = $_GET['wpt_payment_page'];
        if ($action == 1){
            require 'Payment/create.php';
        }else{
            //path to your template file
            $new_template = dirname(__FILE__) .'/Payment/result.php';
//            die($new_template);
            if(file_exists($new_template)){
//                die($new_template);
                $template = $new_template;
            }
        }
    }

    return $template;

}

//if (class_exists('WooCommerce')) {
//    // code that requires WooCommerce
//    add_filter( 'woocommerce_account_menu_items', 'iconic_account_menu_items', 10, 1 );
//}
//
//function iconic_account_menu_items(){
//
//}
function bbloomer_add_premium_support_endpoint() {
    add_rewrite_endpoint( 'premium-support', EP_ROOT | EP_PAGES );
}

add_action( 'init', 'bbloomer_add_premium_support_endpoint' );


// ------------------
// 2. Add new query var

function bbloomer_premium_support_query_vars( $vars ) {
    $vars[] = 'premium-support';
    return $vars;
}

add_filter( 'query_vars', 'bbloomer_premium_support_query_vars', 0 );


// ------------------
// 3. Insert the new endpoint into the My Account menu

function bbloomer_add_premium_support_link_my_account( $items ) {
    $items['premium-support'] = 'آزمون های انجام شده';
    return $items;
}

add_filter( 'woocommerce_account_menu_items', 'bbloomer_add_premium_support_link_my_account' ,5);

// ------------------
// 4. Add content to the new endpoint

function bbloomer_premium_support_content() {
    require 'Template/teststable.php';
}

add_action( 'woocommerce_account_premium-support_endpoint', 'bbloomer_premium_support_content' );

add_action( 'wp_head', 'customstyle' ,99999);

function customstyle(){
    echo '<style>li.woocommerce-MyAccount-navigation-link--premium-support a:before {content: "\f005";font-family: FontAwesome;color: #ec406a;margin-left: 2px}</style>';
}

