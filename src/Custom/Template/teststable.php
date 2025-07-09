<?php
global $wpdb;
$table = $wpdb->prefix . 't_passings';
$results = $wpdb->get_results('SELECT * FROM ' . $table . '  WHERE respondent_id = '.wp_get_current_user()->ID.' AND passing_status = "publish" ' );
?>
<table class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table">
    <thead>
    <tr>
        <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-number"><span class="nobr">ردیف</span></th>
        <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-date"><span class="nobr">نام آزمون</span></th>
        <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-status"><span class="nobr">تاریخ آزمون</span></th>
        <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-status"><span class="nobr">قیمت</span></th>
        <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-actions"><span class="nobr">نتیجه</span></th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($results as $count => $res) {
        $price = get_post_meta($res->test_id,'test_price',true).' تومان ';
        $post = get_post($res->test_id);
        $slug = $post->post_name;
        $url =  get_site_url().'/test/'.$slug.'/'.base_convert($res->passing_id, 10, 36) . md5(wp_salt('auth') . $res->passing_id);

        if ($price < 100 )
            $price = 'رایگان'
        ?>
        <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-completed order">
            <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="ردیف">
                <?php echo $count+1 ?>
            </td>
            <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="نام آزمون">
                <?php echo get_the_title($res->test_id) ?>
            </td>
            <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="تاریخ آزمون">
                <time datetime="2019-05-31T01:23:08+00:00"> <?php echo $res->passing_modified ?></time>
            </td>
            <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="زمان پاسخگویی">
                <span> <?php echo $price ?>  </span>
            </td>
            <td><a href="<?php echo $url ?>" class="woocommerce-button button view"> مشاهده نتیجه</a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
