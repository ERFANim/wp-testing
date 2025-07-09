<?php

defined( 'WPINC' ) or die( 'Fizzle' );

$current_user = wp_get_current_user();


if(isset($_GET['key'])){
	WPT_Modular::check_pay($_GET['key']);
}else{
	$products = WPT_Modular::list();
?>
<div class="wrap">
    <h1 class="wp-heading-inline">ماژول ها <span class="title-count theme-count"><?php echo count($products);?></span>
    </h1>

    <hr class="wp-header-end" style="margin-bottom: 50px">

    <div class="theme-browser rendered">
        <div class="themes wp-clearfix">
        <?php if($products):?>
            <?php foreach ($products as $product): ?>
            <div class="theme <?php echo (get_option('wpt_test_module_'.$product['id']) == 'purchased') ? 'active' : null;?>">
                <div class="theme-screenshot">
                    <img src="<?php echo $product['img'];?>">
                </div>
	            <a href="<?php echo $product['desc_url'] ?>" target="_blank"><span class="more-details">توضیحات آزمون </span></a>
                <div class="theme-id-container">

                    <h2 class="theme-name" id="twentytwenty-name">
	                    <span> <?php echo (get_option('wpt_test_module_'.$product['id']) == 'purchased') ? '<span>Active:</span>' : null;?> <?php echo $product['title'];?></span>
                    </h2>
                    <p style="text-align: center;margin: 0;color: rgb(251, 76, 36);font-size: 1.6em;"><?php echo number_format($product['price']); ?><span style="color: rgb(112, 112, 112);font-size: .7em;margin: 5px;">تومان</span></p>
                    <div class="theme-actions" style="border: 0;background: none;box-shadow: none;opacity:1">
	                    <form action="<?php echo $product['buy_slug'];?>" method="post">
		                    <input name="site" value="<?php echo get_site_url(); ?>" hidden>
		                    <input name="email" value="<?php echo $current_user->user_email; ?>" hidden>
		                    <input name="product" value="<?php echo $product['id'];?>" hidden>
		                    <input name="callback" value="<?php echo admin_url('edit.php?post_type=wpt_test&page=wpt_modular&module=pay');?>" hidden>
		                    <button type="submit" class="button button-primary">خرید</button>
	                    </form>

                    </div>
                </div>
            </div>
            <?php endforeach; ?>
		<?php else: ?>
			ماژولی وجود ندارد
		<?php endif; ?>
        </div>
    </div>




</div>
<?php
}


