function Wpcf7_redirect_admin(){

	this.banner_selector = '.wpcfr-banner-holder';
	/**
	 * Initialize the class
	 * @return {[type]} [description]
	 */
	this.init = function(){
		//set hooks for handling the redirect settings tab
		this.admin_field_handlers();
		//set hooks
		this.register_action_hooks();
	};


	this.register_action_hooks = function(){
		//connect event handler for close banner button click
		jQuery(document.body).on('click' , this.banner_selector + ' .close-banner' , this.close_banner.bind(this) );

	};

	/**
	 * Close displayed banner
	 * @return {[type]} [description]
	 */
	this.close_banner = function(){
		jQuery( this.banner_selector ).slideUp();

		this.make_ajax_call( 'close_ad_banner' , [] , '' );
	};

	/**
	 * Show/hide fields according to user selections
	 * @return {[type]} [description]
	 */
	this.admin_field_handlers = function(){
		// field - open in a new tab
		jQuery( '#wpcf7-redirect-open-in-new-tab' ).change(function() {
			if ( jQuery( this ).is( ":checked" ) ) {
				jQuery( '.field-notice-alert' ).removeClass( 'field-notice-hidden' );
			} else {
				jQuery( '.field-notice-alert' ).addClass( 'field-notice-hidden' );
			}
		});

		if ( jQuery( '#wpcf7-redirect-open-in-new-tab' ).is( ":checked" ) ) {
			jQuery( '.field-notice-alert' ).removeClass( 'field-notice-hidden' );
		}

		// fields - http build query
		jQuery( '#wpcf7-redirect-http-build-query-selectively' ).change(function() {
			if ( jQuery( this ).is( ":checked" ) ) {
				jQuery( '#wpcf7-redirect-http-build-query-selectively-fields' ).removeClass( 'field-hidden' );
			}
		});

		jQuery( '#wpcf7-redirect-http-build-query' ).change(function() {
			if ( jQuery( this ).is( ":checked" ) ) {
				jQuery( '#wpcf7-redirect-http-build-query-selectively-fields' ).addClass( 'field-hidden' );
			}
		});

		if ( jQuery( '#wpcf7-redirect-http-build-query-selectively' ).is( ":checked" ) ) {
			jQuery( '#wpcf7-redirect-http-build-query-selectively-fields' ).removeClass( 'field-hidden' );
		}

		jQuery('.checkbox-radio-1').change(function() {
			var checked = jQuery(this).is(':checked');
			jQuery('.checkbox-radio-1').prop('checked', false);
			if ( checked ) {
				jQuery(this).prop('checked',true);
			}
		});

		// field - after sent script
		jQuery( '#wpcf7-redirect-after-sent-script' ).keyup(function(event) {
			if ( jQuery(this).val().length != 0 ) {
				jQuery( '.field-warning-alert' ).removeClass( 'field-notice-hidden' );
			} else {
				jQuery( '.field-warning-alert' ).addClass( 'field-notice-hidden' );
			}
		});

		if ( jQuery( '#wpcf7-redirect-after-sent-script' ).val() ) {
			jQuery( '.field-warning-alert' ).removeClass( 'field-notice-hidden' );
		}
	};

	/**
	 * Basic function to make admin ajax calls
	 * @param  {[type]} params [description]
	 * @return {[type]}        [description]
	 */
	this.make_ajax_call = function( action , params ){
		jQuery.ajax({
	         type : "post",
	         dataType : "json",
	         url : ajaxurl,
	         data : {
				 action: action,
				 data : params
			 },
	         success: function(response) {
	        	jQuery(document.body).trigger( 'after_ajax_call' , [ params , response , action ] );
	         }
		 });
	};
	this.init();
}

jQuery(document).ready(function($) {
	var wpcf7_redirect_admin = new Wpcf7_redirect_admin();
});
