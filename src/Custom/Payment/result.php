<?php

if (isset($_GET['Status']) && $_GET['Status'] == 'OK') {
    $MerchantID = get_option('wpt_merchant_code_zarinpall');
    $Authority = $_GET['Authority'];

    global $wpdb;
    $table = $wpdb->prefix . 't_payments';
    $Amount = $wpdb->get_var("SELECT `amount` FROM `$table` WHERE `authority` = '$Authority' ORDER BY `id` DESC LIMIT 1");
    $post_id = $wpdb->get_var("SELECT `post_id` FROM `$table` WHERE `authority` = '$Authority'  ORDER BY `id` DESC LIMIT 1");

    $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

    $result = $client->PaymentVerification(
        [
            'MerchantID' => $MerchantID,
            'Authority' => $Authority,
            'Amount' => $Amount,
        ]
    );
    if ($result->Status == 100) {
        $wpdb->update($table, array('status' => 1, 'date' => current_time('mysql', 1), 'ref_id' => $result->RefID), array('authority' => $Authority));
        $message = '<h2 style="color: forestgreen">تراکنش موفق</h2><br>';
        $message .= '<h4 style="color: rgb(48,48,48)">کد رهگیری : '.$result->RefID.'</h4>';
        $buttonhref = get_post_permalink($post_id);
        $button = 'بازگشت به آزمون';
    } else {
//        echo 'Transaction failed. Status:' . $result->Status;
        $message = '<h2 style="color: rgba(223,72,102,1)">تراکنش با خطای رو به رو مواجه شد : '.$result->Status.' </h2>';
        $buttonhref = get_site_url().'/test';
        $button = 'بازگشت';
    }
} else {
    $message = '<h2 style="color: rgba(223,72,102,1)">تراکنش نامعتبر</h2>';
    $buttonhref = get_site_url().'/test';
    $button = 'بازگشت';
}

get_header();
?>
<style>
    .page-title{
        display: none;
    }
</style>

<div class="main-page-content" id="content" style="padding: 50px 0 70px 0">

    <div class="site-content-inner vc-container" role="main">

        <article  class=" page type-page status-publish hentry">

            <div class="entry-content">
                <div data-vc-full-width="true" data-vc-full-width-init="true"
                     class="vc_row wpb_row vc_row-fluid vc_custom_1528275222620 vc_row-has-fill">
                    <div class="wpb_column vc_column_container vc_col-sm-4">
                        <div class="vc_column-inner">
                            <div class="wpb_wrapper">
                                <div class="pricing-table">
                                    <div class="pricing-table-inner">
                                        <div class="pricing-content" style="text-align: center">
                                            <?php echo $message ?>
                                        </div>
                                        <div class="pricing-button ">
                                            <a href="<?php echo $buttonhref ?>" class="btn btn-border btn-success"  title="">
                                                <span><?php echo $button ?></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vc_row-full-width vc_clearfix"></div>
            </div>
        </article><!-- #post -->
    </div>
</div>

<?php
get_footer();
?>
