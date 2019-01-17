<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main WPCF7_Redirect Class
 */
class WPCF7_Redirect_Base{

    public function __construct(){

        $this->load_dependencies();

        $this->wpcf7_redirect = new WPCF7_Redirect();

        $this->wpcf7_utils = new WPCF7_Redirect_Utils();

        $this->add_action_hooks();

        $this->add_ajax_hooks();
    }
    /**
     * Some general plugin hooks
     */
    public function add_action_hooks(){
        //display banner on the redirect settings page
        //the banner will be used to the premium version
        add_action( 'before_redirect_settings_tab_title' , array( $this->wpcf7_utils , 'get_banner' ) , 10 );
    }
    /**
     * Register plugins ajax hooks
     */
    public function add_ajax_hooks(){
        add_action( 'wp_ajax_close_ad_banner' , array( $this->wpcf7_utils , 'close_banner' ) );
    }
    /**
     * Get files required to run the plugin
     * @return [type] [description]
     */
    public function load_dependencies(){
        require_once( WPCF7_REDIRECT_CLASSES_PATH . 'class-wpcf-utils.php' );
        require_once( WPCF7_REDIRECT_CLASSES_PATH . 'class-wpcf-redirect.php' );
    }
}
