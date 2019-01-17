<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main WPCF7_Redirect Class
 */
class WPCF7_Redirect_Utils{

    public $banner_version = 1.01;

    public function __construct(){

    }
    /**
     * Get the banner template
     * @return [type] [description]
     */
    public function get_banner(){
        if( $this->get_option( 'last_banner_displayed' ) == $this->banner_version ){
            return;
        }
        ob_start();

        include( WPCF7_REDIRECT_TEMPLATE_PATH . 'banner.php' );

        $banner_html = ob_get_clean();

        echo $banner_html;
    }

    /**
     * [close_banner description]
     * @return [type] [description]
     */
    public function close_banner(){
        $this->update_option( 'last_banner_displayed' , $this->banner_version );
    }

    /**
     * Get specific option by key
     * @return [type] [description]
     */
    public function get_option($key){
        $options = $this->get_wpcf7_options();

        return isset( $options[$key] ) ? $options[$key] : '';
    }
    /**
     * Update a specific option
     * @param  [type] $key   [description]
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    public function update_option( $key , $value ){
        $options = $this->get_wpcf7_options();

        $options[$key] = $value;

        $this->save_wpcf7_options( $options );

    }
    /**
     * Get the plugin options
     * @return [type] [description]
     */
    public function get_wpcf7_options(){
        return get_option( 'wpcf_redirect_options' );
    }
    /**
     * Save the plugin options
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    public function save_wpcf7_options( $options ){
        update_option( 'wpcf_redirect_options', $options );
    }
}
