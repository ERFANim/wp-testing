<?php
$MerchantID = get_option('wpt_merchant_code_zarinpall');
$post_id = $_GET['post_id'];
$post = get_post($post_id);
$CallbackURL = get_site_url().'/?wpt_payment_page=2'; // Required

if (!empty($MerchantID) && isset($post) && is_user_logged_in() && get_post_meta($post_id,'test_price',true) >= 100 ) {

    $Amount = get_post_meta($post_id,'test_price',true);//Amount will be based on Toman - Required
    $Description =  ' خرید ' .' '. $post->post_title ; // Required
    $Email = wp_get_current_user()->user_email; // Optional
    $Mobile = get_user_meta(wp_get_current_user()->ID,'billing_phone',true); // Optional
    $ip = $_SERVER['REMOTE_ADDR'];

    $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

    $result = $client->PaymentRequest(
        [
            'MerchantID' => $MerchantID,
            'Amount' => $Amount,
            'Description' => $Description,
            'Email' => $Email,
            'Mobile' => $Mobile,
            'CallbackURL' => $CallbackURL,
        ]
    );

    //Redirect to URL You can do it also by creating a form
    if ($result->Status == 100) {
        global $wpdb;
        $table = $wpdb->prefix.'t_payments';
        $lastid = $wpdb->get_var( 'SELECT transaction_id FROM ' . $wpdb->prefix . 't_payments' . ' ORDER BY id DESC LIMIT 1');
        if ( $lastid < 1 )
            $lastid = 10000;
        $data = array(
            'transaction_id' => $lastid+1,
            'user_id' => wp_get_current_user()->ID,
            'post_id' => $post_id ,
            'amount' => $Amount,
            'gateway' => 'ZarinPall',
            'status' => 0,
            'used' => 0,
            'date' => current_time('mysql',1),
            'authority' => $result->Authority,
            'ip' => $ip,
        );
        $format = array('%s','%d');
        $wpdb->insert($table,$data,$format);
        $my_id = $wpdb->insert_id;

        header('Location: https://www.zarinpal.com/pg/StartPay/'.$result->Authority);
        //برای استفاده از زرین گیت باید ادرس به صورت زیر تغییر کند:
        //Header('Location: https://www.zarinpal.com/pg/StartPay/'.$result->Authority.'/ZarinGate');
    } else {
//        echo 'ERR: ' . $result->Status;
        header('Location: '. $CallbackURL);
    }
}else{
    header('Location: '. $CallbackURL);
}




















