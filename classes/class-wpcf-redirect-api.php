<?php

class WPCF7_redirect_api{

    public $url = 'http://querysol.com/wp-json/contact-form-7-redirect/v1/key';

    public function get_remote_updates(){
        $options = wp_remote_get( $url );

        print_r($options);
        die();
    }
}
