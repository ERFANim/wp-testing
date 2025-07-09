<?php

class WpTesting_Doer_PassingBrowser_User extends WpTesting_Doer_PassingBrowser
{

    protected $passingTableClass = 'WpTesting_Widget_PassingTable_User';

    protected function addMenuPages()
    {
        $mainTitle      = 'آزمون ها';
        $resultsTitle   = 'نتایج آزمون من';
        $capability     = 'read';
        $submenuSlug    = 'wpt_test_user_results';
        $callback       = array($this, 'renderPassingsPage');
        $menuIcon       = $this->isWordPressAlready('3.8') ? 'dashicons-editor-paste-text' : null;
        $isSubscriber   = !$this->wp->isCurrentUserCan('edit_posts');

        $this->passingsPageTitle = 'نتایج آزمون من';
        if ($isSubscriber) {
            $this->wp->addObjectPage($mainTitle, $mainTitle, $capability, $submenuSlug, $callback, $menuIcon);
            $mainSlug = $submenuSlug;
        } else {
            $mainSlug = 'edit.php?post_type=wpt_test';
        }
        $this->setScreenHook($this->wp->addSubmenuPage($mainSlug, $resultsTitle, $resultsTitle, $capability, $submenuSlug, $callback));

        return $this;
    }
}
