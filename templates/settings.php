<?php

wp_nonce_field( 'wpcf7_redirect_page_metaboxes', 'wpcf7_redirect_page_metaboxes_nonce' );

$fields = $this->get_fields_values( $post->id() );
?>

<h2>
    <?php esc_html_e( 'Redirect Settings', 'wpcf7-redirect' );?>
</h2>
<?php
    /**
     * get_redirect_plugin_url - 10
     * @var [type]
     */
    do_action( 'before_redirect_settings_tab_title' , $post );
?>

<fieldset>
    <div class="field-wrap field-wrap-page-id">
        <label for="wpcf7-redirect-page-id">
            <?php esc_html_e( 'Redirect type.', 'wpcf7-redirect' );?>
        </label>
        <select class="wpcf7-redirect-type" name="wpcf7-redirect[redirect_type]">
            <option value="simple"><?php _e( 'Simple' , 'wpcf7-redirect');?></option>
            <option value="conditional" disabled="disabled"><?php _e( 'Conditional(PRO)' , 'wpcf7-redirect');?></option>
        </select>
    </div>
    <div class="field-wrap field-wrap-page-id">
            <label for="wpcf7-redirect-page-id">
                <?php esc_html_e( 'Select a page to redirect to on successful form submission.', 'wpcf7-redirect' );?>
            </label>
            <?php
            echo wp_dropdown_pages( array(
                    'echo'              => 0,
                    'name'              => 'wpcf7-redirect[page_id]',
                    'show_option_none'  => __( 'Choose Page', 'wpcf7-redirect' ),
                    'option_none_value' => '0',
                    'selected'          => $fields['page_id'],
                    'id'                => 'wpcf7-redirect-page-id',
                )
            );
        ?>
    </div>

<div class="field-wrap field-wrap-external-url">
    <input type="url" id="wpcf7-redirect-external-url" placeholder="<?php esc_html_e( 'External URL', 'wpcf7-redirect' );?>" name="wpcf7-redirect[external_url]" value="<?php echo $fields['external_url'];?>">
</div>

<div class="field-wrap field-wrap-use-external-url">
    <input type="checkbox" id="wpcf7-redirect-use-external-url" name="wpcf7-redirect[use_external_url]" <?php checked( $fields['use_external_url'], 'on', true ); ?>/>
    <label for="wpcf7-redirect-use-external-url">
        <?php esc_html_e( 'Use external URL', 'wpcf7-redirect' );?>
    </label>
</div>


<div class="field-wrap field-wrap-open-in-new-tab">
    <input type="checkbox" id="wpcf7-redirect-open-in-new-tab" name="wpcf7-redirect[open_in_new_tab]" <?php checked( $fields['open_in_new_tab'], 'on', true ); ?>/>
    <label for="wpcf7-redirect-open-in-new-tab"><?php esc_html_e( 'Open page in a new tab', 'wpcf7-redirect' );?></label>
    <div class="field-notice field-notice-alert field-notice-hidden">
        <strong>
            <?php esc_html_e( 'Notice!', 'wpcf7-redirect' );?>
        </strong>
        <?php esc_html_e( 'This option might not work as expected, since browsers often block popup windows. This option depends on the browser settings.', 'wpcf7-redirect' );?>
    </div>
</div>

<div class="field-wrap field-wrap-http-build-query">
    <input type="checkbox" id="wpcf7-redirect-http-build-query" class="checkbox-radio-1" name="wpcf7-redirect[http_build_query]" <?php checked( $fields['http_build_query'], 'on', true ); ?>/>
    <label for="wpcf7-redirect-http-build-query">
        <?php esc_html_e( 'Pass all the fields from the form as URL query parameters', 'wpcf7-redirect' );?>
    </label>
</div>

<div class="field-wrap field-wrap-http-build-query-selectively">
    <input type="checkbox" id="wpcf7-redirect-http-build-query-selectively" class="checkbox-radio-1" name="wpcf7-redirect[http_build_query_selectively]" <?php checked( $fields['http_build_query_selectively'], 'on', true ); ?>/>
    <label for="wpcf7-redirect-http-build-query-selectively">
        <?php esc_html_e( 'Pass specific fields from the form as URL query parameters', 'wpcf7-redirect' );?>
    </label>
    <input type="text" id="wpcf7-redirect-http-build-query-selectively-fields" class="field-hidden" placeholder="<?php esc_html_e( 'Fields to pass, separated by commas', 'wpcf7-redirect' );?>" name="wpcf7-redirect[http_build_query_selectively_fields]" value="<?php echo $fields['http_build_query_selectively_fields'];?>">
</div>

<hr />

<div class="field-wrap field-wrap-after-sent-script">
    <label for="wpcf7-redirect-after-sent-script">
        <?php esc_html_e( 'Here you can add scripts to run after form sent successfully.', 'wpcf7-redirect' );?>
    </label>
    <div class="field-message">
        <?php esc_html_e( 'Do not include <script> tags.', 'wpcf7-redirect' );?>
        </div>
        <textarea id="wpcf7-redirect-after-sent-script" name="wpcf7-redirect[after_sent_script]" rows="8" cols="100"><?php echo $fields['after_sent_script'];?></textarea>
    </div>
    <div class="field-notice field-warning-alert field-notice-hidden">
        <strong>
            <?php esc_html_e( 'Warning!', 'wpcf7-redirect' );?>
        </strong>
        <?php esc_html_e( 'This option is for developers only - use with caution. If the plugin does not redirect after you have added scripts, it means you have a problem with your script. Either fix the script, or remove it.', 'wpcf7-redirect' );?>
    </div>
</fieldset>

<?php

do_action('after_redirect_settings_tab_form' , $post );
