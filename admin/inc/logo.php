<?php
/*
 * ロゴの設定
 */


// Add default values
add_filter( 'before_getting_design_plus_option', 'add_logo_dp_default_options' );


// Add label of logo tab
add_action( 'tcd_tab_labels', 'add_logo_tab_label' );


// Add HTML of logo tab
add_action( 'tcd_tab_panel', 'add_logo_tab_panel' );


// Register sanitize function
add_filter( 'theme_options_validate', 'add_logo_theme_options_validate' );


// タブの名前
function add_logo_tab_label( $tab_labels ) {
	$tab_labels['logo'] = __( 'Logo', 'tcd-w' );
	return $tab_labels;
}


// 初期値
function add_logo_dp_default_options( $dp_default_options ) {

  //ヘッダーロゴ
	$dp_default_options['use_logo_image'] = 'no';
	$dp_default_options['logo_font_size'] = '32';
	$dp_default_options['header_logo_image'] = false;
	$dp_default_options['header_logo_retina'] = '';

	$dp_default_options['use_logo_image_mobile'] = 'no';
	$dp_default_options['logo_font_size_mobile'] = '24';
	$dp_default_options['header_logo_image_mobile'] = false;
	$dp_default_options['header_logo_retina_mobile'] = '';

  //フッターロゴ
	$dp_default_options['use_logo_image_footer'] = 'no';
	$dp_default_options['logo_font_size_footer'] = '32';
	$dp_default_options['footer_logo_image'] = false;
	$dp_default_options['footer_logo_retina'] = '';

	$dp_default_options['use_logo_image_footer_mobile'] = 'no';
	$dp_default_options['logo_font_size_footer_mobile'] = '24';
	$dp_default_options['footer_logo_image_mobile'] = false;
	$dp_default_options['footer_logo_retina_mobile'] = '';

	return $dp_default_options;

}


// 入力欄の出力　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_logo_tab_panel( $options ) {

  global $dp_default_options, $logo_type_options, $site_desc_options;

?>

<div id="tab-content-logo" class="tab-content">


   <?php // ヘッダーのロゴの設定 ----------------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Header logo setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <h4 class="theme_option_headline2"><?php _e('Type of logo', 'tcd-w');  ?></h4>
     <ul class="design_radio_button" id="logo_type_select">
      <?php foreach ( $logo_type_options as $option ) { ?>
      <li>
       <input type="radio" id="use_logo_image_<?php esc_attr_e( $option['value'] ); ?>" name="dp_options[use_logo_image]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php checked( $options['use_logo_image'], $option['value'] ); ?> />
       <label for="use_logo_image_<?php esc_attr_e( $option['value'] ); ?>"><?php echo $option['label']; ?></label>
      </li>
      <?php } ?>
     </ul>
     <div class="logo_text_area" style="<?php if( $options['use_logo_image'] != 'yes' ) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
      <h4 class="theme_option_headline2"><?php _e('Font size setting', 'tcd-w');  ?></h4>
      <p><input id="dp_options[logo_font_size]" class="font_size hankaku" type="text" name="dp_options[logo_font_size]" value="<?php esc_attr_e( $options['logo_font_size'] ); ?>" /><span>px</span></p>
     </div>
     <div class="logo_image_area" style="<?php if( $options['use_logo_image'] == 'yes' ) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
      <h4 class="theme_option_headline2"><?php _e('Image', 'tcd-w');  ?></h4>
      <div class="theme_option_message2">
       <p>
        <?php printf(__('Maximum height is %s. We recommend to use the background transparent PNG image.', 'tcd-w'), '100'); ?><br />
        <?php _e('If you upload a logo image for retina display, please check the following check boxes','tcd-w'); ?>
       </p>
      </div>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js header_logo_image">
        <input type="hidden" value="<?php echo esc_attr( $options['header_logo_image'] ); ?>" id="header_logo_image" name="dp_options[header_logo_image]" class="cf_media_id">
        <div class="preview_field"><?php if($options['header_logo_image']){ echo wp_get_attachment_image($options['header_logo_image'], 'full'); }; ?></div>
        <div class="buttton_area">
         <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
         <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['header_logo_image']){ echo 'hidden'; }; ?>">
        </div>
       </div>
      </div>
      <p><label><input id="dp_options[header_logo_retina]" name="dp_options[header_logo_retina]" type="checkbox" value="1" <?php checked( '1', $options['header_logo_retina'] ); ?> /> <?php _e('Use retina display logo image', 'tcd-w');  ?></label></p>
     </div>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->



   <?php // ヘッダーのロゴの設定（スマホ用） ----------------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Header logo setting (mobile)', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <h4 class="theme_option_headline2"><?php _e('Type of logo', 'tcd-w');  ?></h4>
     <ul class="design_radio_button" id="logo_type_select_mobile">
      <?php foreach ( $logo_type_options as $option ) { ?>
      <li>
       <input type="radio" id="use_logo_image_mobile_<?php esc_attr_e( $option['value'] ); ?>" name="dp_options[use_logo_image_mobile]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php checked( $options['use_logo_image_mobile'], $option['value'] ); ?> />
       <label for="use_logo_image_mobile_<?php esc_attr_e( $option['value'] ); ?>"><?php echo $option['label']; ?></label>
      </li>
      <?php } ?>
     </ul>
     <div class="logo_text_area_mobile" style="<?php if( $options['use_logo_image_mobile'] != 'yes' ) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
      <h4 class="theme_option_headline2"><?php _e('Font size setting', 'tcd-w');  ?></h4>
      <p><input id="dp_options[logo_font_size_mobile]" class="font_size hankaku" type="text" name="dp_options[logo_font_size_mobile]" value="<?php esc_attr_e( $options['logo_font_size_mobile'] ); ?>" /><span>px</span></p>
     </div>
     <div class="logo_image_area_mobile" style="<?php if( $options['use_logo_image_mobile'] == 'yes' ) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
      <h4 class="theme_option_headline2"><?php _e('Image', 'tcd-w');  ?></h4>
      <div class="theme_option_message2">
       <p>
        <?php printf(__('Maximum height is %s. We recommend to use the background transparent PNG image.', 'tcd-w'), '50'); ?><br />
        <?php _e('If you upload a logo image for retina display, please check the following check boxes','tcd-w'); ?>
       </p>
      </div>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js header_logo_image_mobile">
        <input type="hidden" value="<?php echo esc_attr( $options['header_logo_image_mobile'] ); ?>" id="header_logo_image_mobile" name="dp_options[header_logo_image_mobile]" class="cf_media_id">
        <div class="preview_field"><?php if($options['header_logo_image_mobile']){ echo wp_get_attachment_image($options['header_logo_image_mobile'], 'full'); }; ?></div>
        <div class="buttton_area">
         <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
         <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['header_logo_image_mobile']){ echo 'hidden'; }; ?>">
        </div>
       </div>
      </div>
      <p><label><input id="dp_options[header_logo_retina_mobile]" name="dp_options[header_logo_retina_mobile]" type="checkbox" value="1" <?php checked( '1', $options['header_logo_retina_mobile'] ); ?> /> <?php _e('Use retina display logo image', 'tcd-w');  ?></label></p>
     </div>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // フッターのロゴのタイプ ----------------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Footer logo setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <h4 class="theme_option_headline2"><?php _e('Type of logo', 'tcd-w');  ?></h4>
     <ul class="design_radio_button" id="logo_type_select_footer">
      <?php foreach ( $logo_type_options as $option ) { ?>
      <li>
       <input type="radio" id="use_logo_image_footer_<?php esc_attr_e( $option['value'] ); ?>" name="dp_options[use_logo_image_footer]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php checked( $options['use_logo_image_footer'], $option['value'] ); ?> />
       <label for="use_logo_image_footer_<?php esc_attr_e( $option['value'] ); ?>"><?php echo $option['label']; ?></label>
      </li>
      <?php } ?>
     </ul>
     <div class="logo_text_area_footer" style="<?php if( $options['use_logo_image_footer'] != 'yes' ) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
      <h4 class="theme_option_headline2"><?php _e('Font size setting', 'tcd-w');  ?></h4>
      <p><input id="dp_options[logo_font_size_footer]" class="font_size hankaku" type="text" name="dp_options[logo_font_size_footer]" value="<?php esc_attr_e( $options['logo_font_size_footer'] ); ?>" /><span>px</span></p>
     </div>
     <div class="logo_image_area_footer" style="<?php if( $options['use_logo_image_footer'] == 'yes' ) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
      <h4 class="theme_option_headline2"><?php _e('Image', 'tcd-w');  ?></h4>
      <div class="theme_option_message2">
       <p>
        <?php printf(__('Maximum height is %s. We recommend to use the background transparent PNG image.', 'tcd-w'), '140'); ?><br />
        <?php _e('If you upload a logo image for retina display, please check the following check boxes','tcd-w'); ?>
       </p>
      </div>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js footer_logo_image">
        <input type="hidden" value="<?php echo esc_attr( $options['footer_logo_image'] ); ?>" id="footer_logo_image" name="dp_options[footer_logo_image]" class="cf_media_id">
        <div class="preview_field"><?php if($options['footer_logo_image']){ echo wp_get_attachment_image($options['footer_logo_image'], 'full'); }; ?></div>
        <div class="buttton_area">
         <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
         <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['footer_logo_image']){ echo 'hidden'; }; ?>">
        </div>
       </div>
      </div>
      <p><label><input id="dp_options[footer_logo_retina]" name="dp_options[footer_logo_retina]" type="checkbox" value="1" <?php checked( '1', $options['footer_logo_retina'] ); ?> /> <?php _e('Use retina display logo image', 'tcd-w');  ?></label></p>
     </div>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // フッターのロゴのタイプ（スマホ用） ----------------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Footer logo setting (mobile)', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <h4 class="theme_option_headline2"><?php _e('Type of logo', 'tcd-w');  ?></h4>
     <ul class="design_radio_button" id="logo_type_select_footer_mobile">
      <?php foreach ( $logo_type_options as $option ) { ?>
      <li>
       <input type="radio" id="use_logo_image_footer_mobile_<?php esc_attr_e( $option['value'] ); ?>" name="dp_options[use_logo_image_footer_mobile]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php checked( $options['use_logo_image_footer_mobile'], $option['value'] ); ?> />
       <label for="use_logo_image_footer_mobile_<?php esc_attr_e( $option['value'] ); ?>"><?php echo $option['label']; ?></label>
      </li>
      <?php } ?>
     </ul>
     <div class="logo_text_area_footer_mobile" style="<?php if( $options['use_logo_image_footer_mobile'] != 'yes' ) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
      <h4 class="theme_option_headline2"><?php _e('Font size setting', 'tcd-w');  ?></h4>
      <p><input id="dp_options[logo_font_size_footer]" class="font_size hankaku" type="text" name="dp_options[logo_font_size_footer_mobile]" value="<?php esc_attr_e( $options['logo_font_size_footer_mobile'] ); ?>" /><span>px</span></p>
     </div>
     <div class="logo_image_area_footer_mobile" style="<?php if( $options['use_logo_image_footer_mobile'] == 'yes' ) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
      <h4 class="theme_option_headline2"><?php _e('Image', 'tcd-w');  ?></h4>
      <div class="theme_option_message2">
       <p>
        <?php printf(__('Maximum height is %s. We recommend to use the background transparent PNG image.', 'tcd-w'), '50'); ?><br />
        <?php _e('If you upload a logo image for retina display, please check the following check boxes','tcd-w'); ?>
       </p>
      </div>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js footer_logo_image_mobile">
        <input type="hidden" value="<?php echo esc_attr( $options['footer_logo_image_mobile'] ); ?>" id="footer_logo_image_mobile" name="dp_options[footer_logo_image_mobile]" class="cf_media_id">
        <div class="preview_field"><?php if($options['footer_logo_image_mobile']){ echo wp_get_attachment_image($options['footer_logo_image_mobile'], 'full'); }; ?></div>
        <div class="buttton_area">
         <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
         <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['footer_logo_image_mobile']){ echo 'hidden'; }; ?>">
        </div>
       </div>
      </div>
      <p><label><input id="dp_options[footer_logo_retina_mobile]" name="dp_options[footer_logo_retina_mobile]" type="checkbox" value="1" <?php checked( '1', $options['footer_logo_retina_mobile'] ); ?> /> <?php _e('Use retina display logo image', 'tcd-w');  ?></label></p>
     </div>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


</div><!-- END .tab-content -->

<?php
} // END add_logo_tab_panel()


// バリデーション　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_logo_theme_options_validate( $input ) {

  global $dp_default_options, $logo_type_options;

  // ヘッダーロゴ
  if ( ! isset( $input['use_logo_image'] ) )
    $input['use_logo_image'] = null;
  if ( ! array_key_exists( $input['use_logo_image'], $logo_type_options ) )
    $input['use_logo_image'] = null;
  $input['logo_font_size'] = wp_filter_nohtml_kses( $input['logo_font_size'] );
  $input['header_logo_image'] = wp_filter_nohtml_kses( $input['header_logo_image'] );
  $input['header_logo_retina'] = ! empty( $input['header_logo_retina'] ) ? 1 : 0;


  // ヘッダーロゴ（スマホ用）
  if ( ! isset( $input['use_logo_image_mobile'] ) )
    $input['use_logo_image_mobile'] = null;
  if ( ! array_key_exists( $input['use_logo_image_mobile'], $logo_type_options ) )
    $input['use_logo_image_mobile'] = null;
  $input['logo_font_size_mobile'] = wp_filter_nohtml_kses( $input['logo_font_size_mobile'] );
  $input['header_logo_image_mobile'] = wp_filter_nohtml_kses( $input['header_logo_image_mobile'] );
  $input['header_logo_retina_mobile'] = ! empty( $input['header_logo_retina_mobile'] ) ? 1 : 0;


  // フッターロゴ
  if ( ! isset( $input['use_logo_image_footer'] ) )
    $input['use_logo_image_footer'] = null;
  if ( ! array_key_exists( $input['use_logo_image_footer'], $logo_type_options ) )
    $input['use_logo_image_footer'] = null;
  $input['logo_font_size_footer'] = wp_filter_nohtml_kses( $input['logo_font_size_footer'] );
  $input['footer_logo_image'] = wp_filter_nohtml_kses( $input['footer_logo_image'] );
  $input['footer_logo_retina'] = ! empty( $input['footer_logo_retina'] ) ? 1 : 0;


  // フッターロゴ（スマホ用）
  if ( ! isset( $input['use_logo_image_footer_mobile'] ) )
    $input['use_logo_image_footer_mobile'] = null;
  if ( ! array_key_exists( $input['use_logo_image_footer_mobile'], $logo_type_options ) )
    $input['use_logo_image_footer_mobile'] = null;
  $input['logo_font_size_footer_mobile'] = wp_filter_nohtml_kses( $input['logo_font_size_footer_mobile'] );
  $input['footer_logo_image_mobile'] = wp_filter_nohtml_kses( $input['footer_logo_image_mobile'] );
  $input['footer_logo_retina_mobile'] = ! empty( $input['footer_logo_retina_mobile'] ) ? 1 : 0;


	return $input;

};


?>