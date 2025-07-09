<?php
$option_name = 'wpt_merchant_code_zarinpall' ;
if (isset($_POST['submit'])){
    $new_value = $_POST['wpt_merchant_code'];
    if ( get_option( $option_name ) !== false ) {
        // The option already exists, so update it.
        update_option( $option_name, $new_value );
    } else {
        // The option hasn't been created yet, so add it with $autoload set to 'no'.
        $deprecated = null;
        $autoload = 'yes';
        add_option( $option_name, $new_value, $deprecated, $autoload );
    }
}
if ( get_option( $option_name ) !== false ) {
    $value_merchant_code_zarinpall = get_option( $option_name );
}else{
    $value_merchant_code_zarinpall = '';
}
?>
<div id="wpbody" role="main">
    <div id="wpbody-content">
        <div id="screen-meta" class="metabox-prefs">
            <div id="contextual-help-wrap" class="hidden no-sidebar" tabindex="-1" aria-label="زبانه راهنمای مفهومی">
                <div id="contextual-help-back"></div>
                <div id="contextual-help-columns">
                    <div class="contextual-help-tabs">
                        <ul>
                        </ul>
                    </div>
                    <div class="contextual-help-tabs-wrap">
                    </div>
                </div>
            </div>
        </div>

        <div class="wrap">
            <h1>تنظیمات</h1><div id="yith-system-alert" class="notice notice-error is-dismissible" style="position: relative;">

                <h2 class="nav-tab-wrapper">
                    <a href="?post_type=wpt_test&page=wpt_feedback_paid_addons&amp;tab=general" class="nav-tab nav-tab-active">پرداخت ها </a>
                </h2>


                <style>
                    form#dup-settings-form input[type=text] {width: 400px; }
                    div.dup-feature-found {padding:3px; border:1px solid silver; background: #f7fcfe; border-radius: 3px; width:400px; font-size: 12px}
                    div.dup-feature-notfound {padding:5px; border:1px solid silver; background: #fcf3ef; border-radius: 3px; width:500px; font-size: 13px; line-height: 18px}
                </style>

                <form id="dup-settings-form" action="?post_type=wpt_test&page=wpt_feedback_paid_addons&amp;" method="post">

                    <input type="hidden" name="submit" value="save">

                    <h3 class="title">افزونه </h3>
                    <hr size="1">
                    <table class="form-table">
                        <tbody>
                        <tr valign="top">
                            <th scope="row"><label>ورژن</label></th>
                            <td>
                                2.0.2
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><label>مرچندکد زرین پال</label></th>
                            <td>
                                <input type="text" name="wpt_merchant_code" value="<?php echo $value_merchant_code_zarinpall; ?>" placeholder="مرچندکد زرین پال را وارد کنید">
                            </td>
                        </tr>

                        </tbody></table>
                    <input type="submit" name="submit" id="submit" class="button-primary" value="ذخیره تنظیمات" style="display: inline-block;">

                </form>

                <div class="clear"></div></div><!-- wpbody-content -->
            <div class="clear"></div></div>

