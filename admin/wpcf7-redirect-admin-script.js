jQuery(document).ready(function($) {

    // field - open in a new tab
	$( '#wpcf7-redirect-open-in-new-tab' ).change(function() {
        if ( $( this ).is( ":checked" ) ) {
            $( '.field-notice-alert' ).removeClass( 'field-notice-hidden' );
        } else {
        	$( '.field-notice-alert' ).addClass( 'field-notice-hidden' );
        }
    });

    if ( $( '#wpcf7-redirect-open-in-new-tab' ).is( ":checked" ) ) {
    	$( '.field-notice-alert' ).removeClass( 'field-notice-hidden' );
    }

    // fields - http build query
    $( '#wpcf7-redirect-http-build-query-selectively' ).change(function() {
        if ( $( this ).is( ":checked" ) ) {
            $( '#wpcf7-redirect-http-build-query-selectively-fields' ).removeClass( 'field-hidden' );
        }
    });

    $( '#wpcf7-redirect-http-build-query' ).change(function() {
        if ( $( this ).is( ":checked" ) ) {
            $( '#wpcf7-redirect-http-build-query-selectively-fields' ).addClass( 'field-hidden' );
        }
    });

    if ( $( '#wpcf7-redirect-http-build-query-selectively' ).is( ":checked" ) ) {
        $( '#wpcf7-redirect-http-build-query-selectively-fields' ).removeClass( 'field-hidden' );
    }

    $('.checkbox-radio-1').change(function() {
        var checked = $(this).is(':checked');
        $('.checkbox-radio-1').prop('checked', false);
        if ( checked ) {
            $(this).prop('checked',true);
        } 
    });

    // field - after sent script
    $( '#wpcf7-redirect-after-sent-script' ).keyup(function() {
        if ( $(this).val().length != 0 ) {
            $( '.field-warning-alert' ).removeClass( 'field-notice-hidden' );
        } else {
            $( '.field-warning-alert' ).addClass( 'field-notice-hidden' );
        }
    });

    if ( $( '#wpcf7-redirect-after-sent-script' ).val() ) {
        $( '.field-warning-alert' ).removeClass( 'field-notice-hidden' );
    }


    // dismiss admin notice
    $('.wpcf7-redirect-pro-admin-notice .notice-dismiss').click(function(e) {
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajaxurl,
            data: {
                action: 'wpcf7_redirect_admin_notice_dismiss'
            }
        });
    });
    
    // dismiss banner notice
    $('#redirect-panel .banner-wrap .notice-dismiss').click(function(e) {
        $('.banner-wrap').fadeOut(200);

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajaxurl,
            data: {
                action: 'wpcf7_redirect_banner_dismiss'
            }
        });
    });
});
