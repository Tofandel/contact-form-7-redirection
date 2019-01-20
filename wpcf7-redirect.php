<?php
/**
 * Plugin Name:  Contact Form 7 Redirection
 * Plugin URI:   http://querysol.com/blog/product/contact-form-7-redirection/
 * Description:  Contact Form 7 Add-on - Redirect after mail sent.
 * Version:      1.2.9
 * Author:       Query Solutions
 * Author URI:   http://querysol.com
 * Contributors: querysolutions, yuvalsabar
 * Requires at least: 4.7.0
 *
 * Text Domain: wpcf7-redirect
 * Domain Path: /lang
 *
 * @package Contact Form 7 Redirection
 * @category Contact Form 7 Addon
 * @author Query Solutions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( defined('WPCF7_REDIRECT_BASE_PATH') ){
	return;
}

define( 'WPCF7_REDIRECT_BASE_PATH' , plugin_dir_path( __FILE__ ) );
define( 'WPCF7_REDIRECT_BASE_URL' , plugin_dir_url( __FILE__ ) );
define( 'WPCF7_REDIRECT_CLASSES_PATH' , WPCF7_REDIRECT_BASE_PATH.'/classes/' );
define( 'WPCF7_REDIRECT_PLUGINS_PATH' , plugin_dir_path( dirname( __FILE__ ) ) );
define( 'WPCF7_REDIRECT_TEMPLATE_PATH' , WPCF7_REDIRECT_BASE_PATH.'/templates/' );

require_once( WPCF7_REDIRECT_BASE_PATH . 'wpcf-redirect-functions.php' );
require_once( WPCF7_REDIRECT_CLASSES_PATH . 'class-wpcf-redirect-base.php' );

$cf7_redirect_base = new WPCF7_Redirect_Base();
