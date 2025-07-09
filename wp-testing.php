<?php
/**
 * Plugin Name: آزمون ساز
 * Plugin URI: http://sourcecity.ir/
 * Description: Helps to create psychological tests.
 * Version: 2.0.2
 * Author:  edit : jaber sabzali
 * Author URI: http://sourcecity.ir
 * License: GPL3
 * Text Domain: wp-testing
 * Domain Path: /languages
 */

require_once dirname(__FILE__) . '/src/bootstrap.php';

$WpTesting_Facade = new WpTesting_Facade(new WpTesting_WordPressFacade(__FILE__));
