<?php
// Can be overriden in your theme as entry-content-wpt-test-fill-form.php

/* @var $answerIdName string */
/* @var $answerIndex integer */
/* @var $isShowContent boolean */
/* @var $formAttributes array */
/* @var $content string */
/* @var $subTitle string */
/* @var $shortDescription string */
/* @var $test WpTesting_Model_Test */
/* @var $questions WpTesting_Model_Question[] */
/* @var $isFinal boolean */
/* @var $isMultipleAnswers boolean */
/* @var $isUserLoginForQuestions boolean */
/* @var $TestPrice integer */
/* @var $submitButtonCaption string */
/* @var $stepsCounter string */
/* @var $wp WpTesting_WordPressFacade */
/* @var $hiddens array */
$check = true;
if ( $TestPrice >= 100 ){
    $check = false;
    global $wpdb;
    $table = $wpdb->prefix . 't_payments';
    $check_id = $wpdb->get_var('SELECT user_id FROM ' . $table . ' WHERE post_id = '.get_the_ID().' AND user_id = '.wp_get_current_user()->ID.' AND used = 0 AND status = 1  ORDER BY id DESC LIMIT 1');
    if (!empty($check_id) && $check_id == wp_get_current_user()->ID ){
        $check = true;
    }
}
?>
<div class="wpt_test fill_form">

<?php if ($isShowContent): ?>
<div class="content" style="margin-bottom: 40px">
    <?php echo $content ?>
</div>
<?php endif ?>

<div class="content"><form
<?php foreach ($formAttributes as $key => $value):?>
    <?php echo $key ?>="<?php echo htmlspecialchars(is_array($value) ? json_encode($value) : $value) ?>"
<?php endforeach ?>>
<?php if ($subTitle): ?><h2 class="subtitle"><?php echo $subTitle ?></h2><?php endif ?>
<?php if ($shortDescription): ?><div class="short-description"><?php echo $wp->autoParagraphise($shortDescription) ?></div><?php endif ?>
<?php $wp->doAction('wp_testing_template_fill_form_questions_before') ?>

<?php if ( !$isUserLoginForQuestions ||  is_user_logged_in() ) { ?>
    <?php if ( $check ){ ?>
        <?php foreach($questions as $q => $question): /* @var $question WpTesting_Model_Question */ ?>
                <?php $wp->doAction('wp_testing_template_fill_form_question_before', $question, $q) ?>
                <div class="question">
                    <div class="title">
                        <span class="number"><?php echo $q+1 ?>.</span><span class="title"><?php echo $question->getTitle() ?>
                        <?php $wp->doAction('wp_testing_template_fill_form_label_end', array('required' => true)) ?></span>
                    <?php if (!$isMultipleAnswers): ?>
                        <input type="hidden" name="<?php echo $answerIdName ?>[<?php echo $answerIndex ?>]" value="" />
                    <?php endif ?>
                    </div>

                <?php foreach($question->buildAnswers() as $a => $answer): /* @var $answer WpTesting_Model_Answer */ ?>
                    <?php $answerId = 'wpt-test-question-' . $question->getId() . '-answer-' . $answer->getId() ?>

                    <div class="answer">

                        <label for="<?php echo $answerId ?>">
                            <input style="margin-left: 5px" type="<?php echo $isMultipleAnswers ? 'checkbox' : 'radio' ?>" id="<?php echo $answerId ?>"
                                data-errormessage="<?php echo $isMultipleAnswers
                                    ? __('Please select at least one answer.', 'wp-testing')
                                    : __('Please choose only one answer.', 'wp-testing') ?>"
            <?php if (0 == $a): ?>
                                required="required" aria-required="true"
            <?php endif ?>
                                name="<?php echo $answerIdName ?>[<?php echo $answerIndex ?>]" value="<?php echo $answer->getId() ?>" />
                            <?php echo $answer->getTitleOnce() . "\n" ?>
                        </label>

                    </div>
                    <?php if ($isMultipleAnswers) {$answerIndex++;} ?>
                <?php endforeach ?>

                </div>
                <?php $wp->doAction('wp_testing_template_fill_form_question_after', $question, $q) ?>
                <?php if (!$isMultipleAnswers) {$answerIndex++;} ?>
            <?php endforeach ?>
        <?php $wp->doAction('wp_testing_template_fill_form_questions_after') ?>

        <?php if($isFinal): ?>
            <p>
                <input type="submit" class="button button-submit" value="<?php echo $submitButtonCaption ?>" />
                <?php if($stepsCounter): ?><span class="steps-counter"><?php echo $stepsCounter ?></span><?php endif ?>
            </p>
        <?php else: ?>
            <div class="wpt_warning">
                <h4>این آزمون در حال توسعه است</h4>
                <p><?php echo __('You can not get any results from it yet.', 'wp-testing') ?></p>
            </div>
        <?php endif ?>
    <?php }elseif(is_user_logged_in()){ ?>
        <div style="text-align: center;background: #f6f4f4;border-radius: 5px;padding: 20px 0;border: 1px solid grey ; margin-top: 25px" >
            <h3>قیمت : <?php echo number_format($TestPrice) ?> تومان</h3>
            <a id="wpt_login_btn" href="<?php echo  get_site_url().'/?wpt_payment_page=1&post_id='.get_the_id() ?>" class="button btn-success" style="color: white"><i class=""></i>پرداخت و انجام آزمون</a>
        </div>
    <?php }else{
        if (is_plugin_active('woocommerce/woocommerce.php')){
            $myaccount_page = get_option( 'woocommerce_myaccount_page_id' );
            if ( $myaccount_page ) {
                $myaccount_page_url = get_permalink( $myaccount_page );
            }else{
                $myaccount_page_url = wp_login_url();
            }
        }else{
            $myaccount_page_url = wp_login_url();
        }
        $theme = wp_get_theme();
        $Studiare_btn_login_class = '';
        if ( 'Studiare' == $theme->name || 'Studiare' == $theme->parent_theme ) {
            $Studiare_btn_login_class = 'register-modal-opener login-button btn btn-filled';
        }
        ?>
        <div style="text-align: center;background: #f6f4f4;border-radius: 5px;padding: 20px 0;border: 1px solid grey ; margin-top: 25px" >
            <h3>لطفا برای انجام این آزمون ابتدا وارد سایت شوید</h3>
            <a id="wpt_login_btn" href="<?php echo $myaccount_page_url ?>" class="button <?php echo $Studiare_btn_login_class; ?>" style="color: white"><i class="fal fa-user-lock"></i>ورود و ثبت نام</a>
            <h3>قیمت : <?php echo number_format($TestPrice) ?> تومان</h3>
        </div>
    <?php } ?>
<?php } else{
    if (is_plugin_active('woocommerce/woocommerce.php')){
        $myaccount_page = get_option( 'woocommerce_myaccount_page_id' );
        if ( $myaccount_page ) {
            $myaccount_page_url = get_permalink( $myaccount_page );
        }else{
            $myaccount_page_url = wp_login_url();
        }
    }else{
        $myaccount_page_url = wp_login_url();
    }

    $theme = wp_get_theme();
    $Studiare_btn_login_class = '';
    if ( 'Studiare' == $theme->name || 'Studiare' == $theme->parent_theme ) {
        $Studiare_btn_login_class = 'register-modal-opener login-button btn btn-filled';
    }
    ?>
    <div style="text-align: center;background: #f6f4f4;border-radius: 5px;padding: 20px 0;border: 1px solid grey ; margin-top: 25px" >
        <h3>لطفا برای انجام این آزمون ابتدا وارد سایت شوید</h3>
        <a id="wpt_login_btn" href="<?php echo $myaccount_page_url ?>" class="button <?php echo $Studiare_btn_login_class; ?>" style="color: white"><i class="fal fa-user-lock"></i>ورود و ثبت نام</a>
    </div>
<?php } ?>

<?php foreach($hiddens as $name => $value): ?><input type="hidden" name="<?php echo htmlspecialchars($name) ?>" value="<?php echo htmlspecialchars($value) ?>" /><?php endforeach ?>
</form></div>

</div>
