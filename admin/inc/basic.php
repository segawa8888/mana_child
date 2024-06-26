<?php
/*
 * 基本設定
 */


// Add default values
add_filter( 'before_getting_design_plus_option', 'add_basic_dp_default_options' );


// Add label of basic tab
add_action( 'tcd_tab_labels', 'add_basic_tab_label' );


// Add HTML of basic tab
add_action( 'tcd_tab_panel', 'add_basic_tab_panel' );


// Register sanitize function
add_filter( 'theme_options_validate', 'add_basic_theme_options_validate' );


// タブの名前
function add_basic_tab_label( $tab_labels ) {
	$tab_labels['basic'] = __( 'Site basic setting', 'tcd-w' );
	return $tab_labels;
}


// 初期値
function add_basic_dp_default_options( $dp_default_options ) {

	// 色の設定
	$dp_default_options['main_color'] = '#573312';
	$dp_default_options['sub_color'] = '#999999';
	$dp_default_options['bg_color'] = '#f4f0ec';
	$dp_default_options['content_link_color'] = '#000000';
	$dp_default_options['content_link_hover_color'] = '#999999';

	// フォントの種類
	$dp_default_options['font_type'] = 'type3';
	$dp_default_options['content_font_type'] = 'type3';
	$dp_default_options['headline_font_type'] = 'type3';
	$dp_default_options['widget_headline_font_type'] = 'type3';
	$dp_default_options['button_font_type'] = 'type2';
	$dp_default_options['page_header_font_type'] = 'type3';

	// アニメーションの設定
	$dp_default_options['hover_type'] = 'type1';
	$dp_default_options['hover1_zoom'] = '1.2';
	$dp_default_options['hover2_direct'] = 'type1';
	$dp_default_options['hover2_opacity'] = '0.5';
	$dp_default_options['hover2_bgcolor'] = '#FFFFFF';
	$dp_default_options['hover3_opacity'] = '0.5';
	$dp_default_options['hover3_bgcolor'] = '#FFFFFF';

	// オリジナルスタイルの設定
	$dp_default_options['css_code'] = '';

	// オリジナルスクリプトの設定
	$dp_default_options['script_code'] = '';

	// Facebook OGPの設定
	$dp_default_options['use_ogp'] = 0;
	$dp_default_options['fb_app_id'] = '';
	$dp_default_options['ogp_image'] = '';

	// Twitter Cardsの設定
	$dp_default_options['use_twitter_card'] = 0;
	$dp_default_options['twitter_account_name'] = '';

	// ファビコン
	$dp_default_options['favicon'] = '';

	// ロードアイコンの設定
	$dp_default_options['show_load_screen'] = 'type1';
	$dp_default_options['load_icon'] = 'type1';
	$dp_default_options['load_time'] = 5000;
	$dp_default_options['load_color1'] = '#000000';
	$dp_default_options['load_color2'] = '#999999';
	$dp_default_options['load_bgcolor'] = '#ffffff';
	$dp_default_options['load_type4_image'] = 0;
	$dp_default_options['load_type4_image_retina'] = 0;
	$dp_default_options['load_type4_image_mobile'] = 0;
	$dp_default_options['load_type4_image_retina_mobile'] = 0;
	$dp_default_options['load_type4_catch'] = '';
	$dp_default_options['load_type4_catch_font_size'] = 16;
	$dp_default_options['load_type4_catch_font_size_sp'] = 14;
	$dp_default_options['load_type4_catch_font_type'] = 'type3';
	$dp_default_options['load_type4_catch_color'] = '#000000';

	// Google Map
	$dp_default_options['gmap_api_key'] = '';
	$dp_default_options['gmap_marker_type'] = 'type1';
	$dp_default_options['gmap_custom_marker_type'] = 'type1';
	$dp_default_options['gmap_marker_text'] = '';
	$dp_default_options['gmap_marker_color'] = '#ffffff';
	$dp_default_options['gmap_marker_img'] = '';
	$dp_default_options['gmap_marker_bg'] = '#000000';

	// 高速化の設定
	$dp_default_options['use_lazyload'] = 0;
	$dp_default_options['use_emoji'] = 1;

	// NO IMAGE
	$dp_default_options['no_image1'] = false;
	$dp_default_options['no_image2'] = false;

	// SNSボタン
	$dp_default_options['sns_type_top'] = 'type1';
	$dp_default_options['sns_type_btm'] = 'type1';

	$dp_default_options['show_twitter_top'] = 1;
	$dp_default_options['show_fblike_top'] = 1;
	$dp_default_options['show_fbshare_top'] = 1;
	$dp_default_options['show_hatena_top'] = 1;
	$dp_default_options['show_pocket_top'] = 1;
	$dp_default_options['show_feedly_top'] = 1;
	$dp_default_options['show_rss_top'] = 1;
	$dp_default_options['show_pinterest_top'] = 1;

	$dp_default_options['show_twitter_btm'] = 1;
	$dp_default_options['show_fblike_btm'] = 1;
	$dp_default_options['show_fbshare_btm'] = 1;
	$dp_default_options['show_hatena_btm'] = 1;
	$dp_default_options['show_pocket_btm'] = 1;
	$dp_default_options['show_feedly_btm'] = 1;
	$dp_default_options['show_rss_btm'] = 1;
	$dp_default_options['show_pinterest_btm'] = 1;

	$dp_default_options['twitter_info'] = '';

	return $dp_default_options;

}


// 入力欄の出力　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_basic_tab_panel( $options ) {

  global $dp_default_options, $time_options, $load_screen_options, $load_icon_type, $font_type_options, $post_type_options, $gmap_marker_type_options, $gmap_custom_marker_type_options, $hover_type_options, $hover2_direct_options, $sns_type_options;

  $blog_label = $options['blog_label'] ? esc_html( $options['blog_label'] ) : __( 'Blog', 'tcd-w' );
  $campaign_label = $options['campaign_label'] ? esc_html( $options['campaign_label'] ) : __( 'Achievement', 'tcd-w' );
  $news_label = $options['news_label'] ? esc_html( $options['news_label'] ) : __( 'News', 'tcd-w' );

?>

<div id="tab-content-basic" class="tab-content">


   <?php // 色の設定 ----------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Color setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <ul class="option_list">
      <li class="cf"><span class="label"><?php _e('Main color', 'tcd-w'); ?></span><input type="text" name="dp_options[main_color]" value="<?php echo esc_attr( $options['main_color'] ); ?>" data-default-color="#573312" class="c-color-picker"></li>
      <li class="cf"><span class="label"><?php _e('Sub color', 'tcd-w'); ?></span><input type="text" name="dp_options[sub_color]" value="<?php echo esc_attr( $options['sub_color'] ); ?>" data-default-color="#999999" class="c-color-picker"></li>
      <li class="cf"><span class="label"><?php _e('Background color of sub pages', 'tcd-w'); ?></span><input type="text" name="dp_options[bg_color]" value="<?php echo esc_attr( $options['bg_color'] ); ?>" data-default-color="#f4f0ec" class="c-color-picker"></li>
      <li class="cf"><span class="label"><?php _e('Single page text link color', 'tcd-w'); ?></span><input type="text" name="dp_options[content_link_color]" value="<?php echo esc_attr( $options['content_link_color'] ); ?>" data-default-color="#000000" class="c-color-picker"></li>
      <li class="cf"><span class="label"><?php _e('Text link color on mouse over', 'tcd-w'); ?></span><input type="text" name="dp_options[content_link_hover_color]" value="<?php echo esc_attr( $options['content_link_hover_color'] ); ?>" data-default-color="#999999" class="c-color-picker"></li>
     </ul>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // ファビコン ----------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
  	<h3 class="theme_option_headline"><?php _e( 'Favicon setting', 'tcd-w' ); ?></h3>
    <div class="theme_option_field_ac_content">
     <div class="theme_option_message2">
      <p><?php _e( 'Setting for the favicon displayed at browser address bar or tab.', 'tcd-w' ); ?></p>
      <p><?php _e( 'You can use .ico, .png or .gif file, and we recommed you to use .ico file.', 'tcd-w' ); ?></p>
      <p><?php _e( 'Favicon file', 'tcd-w' ); ?> (<?php printf(__('Recommend image size. Width:%1$spx, Height:%2$spx.', 'tcd-w'), '16', '16'); ?>)</p>
     </div>
     <div class="image_box cf">
      <div class="cf cf_media_field hide-if-no-js favicon">
       <input type="hidden" value="<?php echo esc_attr( $options['favicon'] ); ?>" id="favicon" name="dp_options[favicon]" class="cf_media_id">
       <div class="preview_field"><?php if($options['favicon']){ echo wp_get_attachment_image($options['favicon'], 'full'); }; ?></div>
       <div class="buttton_area">
        <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
        <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['favicon']){ echo 'hidden'; }; ?>">
       </div>
      </div>
     </div>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // フォントの種類 ----------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Font type setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <h4 class="theme_option_headline2"><?php _e('Basic font type', 'tcd-w'); ?></h4>
     <div class="theme_option_message2">
      <p><?php _e('This font type will be the basic font type of this website.', 'tcd-w'); ?></p>
     </div>
     <ul class="design_radio_button">
      <?php
           foreach ( $font_type_options as $option ) {
           if(strtoupper(get_locale()) == 'JA'){
             $label = $option['label'];
           } else {
             $label = $option['label_en'];
           }
      ?>
      <li>
       <input type="radio" id="font_type_<?php esc_attr_e( $option['value'] ); ?>" name="dp_options[font_type]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php checked( $options['font_type'], $option['value'] ); ?> />
       <label for="font_type_<?php esc_attr_e( $option['value'] ); ?>"><?php echo $label; ?></label>
      </li>
      <?php } ?>
     </ul>
     <h4 class="theme_option_headline2"><?php _e('Font type of headline', 'tcd-w'); ?></h4>
     <div class="theme_option_message2">
      <p><?php _e('This font type will be apply to headline and catchphrase.', 'tcd-w'); ?></p>
     </div>
     <ul class="design_radio_button">
      <?php
           foreach ( $font_type_options as $option ) {
           if(strtoupper(get_locale()) == 'JA'){
             $label = $option['label'];
           } else {
             $label = $option['label_en'];
           }
      ?>
      <li>
       <input type="radio" id="headline_font_type_<?php esc_attr_e( $option['value'] ); ?>" name="dp_options[headline_font_type]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php checked( $options['headline_font_type'], $option['value'] ); ?> />
       <label for="headline_font_type_<?php esc_attr_e( $option['value'] ); ?>"><?php echo $label; ?></label>
      </li>
      <?php } ?>
     </ul>
     <h4 class="theme_option_headline2"><?php _e('Font type of content area', 'tcd-w'); ?></h4>
     <div class="theme_option_message2">
      <p><?php _e('This font type will be apply to single page content area.', 'tcd-w'); ?></p>
     </div>
     <ul class="design_radio_button">
      <?php
           foreach ( $font_type_options as $option ) {
           if(strtoupper(get_locale()) == 'JA'){
             $label = $option['label'];
           } else {
             $label = $option['label_en'];
           }
      ?>
      <li>
       <input type="radio" id="content_font_type_<?php esc_attr_e( $option['value'] ); ?>" name="dp_options[content_font_type]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php checked( $options['content_font_type'], $option['value'] ); ?> />
       <label for="content_font_type_<?php esc_attr_e( $option['value'] ); ?>"><?php echo $label; ?></label>
      </li>
      <?php } ?>
     </ul>
     <h4 class="theme_option_headline2"><?php _e('Font type of page header', 'tcd-w'); ?></h4>
     <div class="theme_option_message2">
      <p><?php _e('This font type will be applied to archive and single page header title.', 'tcd-w'); ?></p>
     </div>
     <ul class="design_radio_button">
      <?php
           foreach ( $font_type_options as $option ) {
           if(strtoupper(get_locale()) == 'JA'){
             $label = $option['label'];
           } else {
             $label = $option['label_en'];
           }
      ?>
      <li>
       <input type="radio" id="page_header_font_type_<?php esc_attr_e( $option['value'] ); ?>" name="dp_options[page_header_font_type]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php checked( $options['page_header_font_type'], $option['value'] ); ?> />
       <label for="page_header_font_type_<?php esc_attr_e( $option['value'] ); ?>"><?php echo $label; ?></label>
      </li>
      <?php } ?>
     </ul>
     <h4 class="theme_option_headline2"><?php _e('Font type of widget headline', 'tcd-w'); ?></h4>
     <ul class="design_radio_button">
      <?php
           foreach ( $font_type_options as $option ) {
           if(strtoupper(get_locale()) == 'JA'){
             $label = $option['label'];
           } else {
             $label = $option['label_en'];
           }
      ?>
      <li>
       <input type="radio" id="widget_headline_font_type_<?php esc_attr_e( $option['value'] ); ?>" name="dp_options[widget_headline_font_type]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php checked( $options['widget_headline_font_type'], $option['value'] ); ?> />
       <label for="widget_headline_font_type_<?php esc_attr_e( $option['value'] ); ?>"><?php echo $label; ?></label>
      </li>
      <?php } ?>
     </ul>
     <h4 class="theme_option_headline2"><?php _e('Font type of button', 'tcd-w'); ?></h4>
     <div class="theme_option_message2">
      <p><?php _e('This font type will be apply to all buttons.', 'tcd-w'); ?></p>
     </div>
     <ul class="design_radio_button">
      <?php
           foreach ( $font_type_options as $option ) {
           if(strtoupper(get_locale()) == 'JA'){
             $label = $option['label'];
           } else {
             $label = $option['label_en'];
           }
      ?>
      <li>
       <input type="radio" id="button_font_type_<?php esc_attr_e( $option['value'] ); ?>" name="dp_options[button_font_type]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php checked( $options['button_font_type'], $option['value'] ); ?> />
       <label for="button_font_type_<?php esc_attr_e( $option['value'] ); ?>"><?php echo $label; ?></label>
      </li>
      <?php } ?>
     </ul>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // hover エフェクト ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Hover effect', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <h4 class="theme_option_headline2"><?php _e('Hover effect type', 'tcd-w'); ?></h4>
     <div class="theme_option_message2">
      <p><?php _e('Please set the hover effect for thumbnail images.', 'tcd-w'); ?></p>
     </div>
     <ul class="design_radio_button">
      <?php foreach ( $hover_type_options as $option ) { ?>
      <li>
       <input type="radio" id="hover_type_<?php esc_attr_e( $option['value'] ); ?>" name="dp_options[hover_type]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php checked( $options['hover_type'], $option['value'] ); ?> />
       <label for="hover_type_<?php esc_attr_e( $option['value'] ); ?>"><?php echo esc_html( $option['label'] ); ?></label>
      </li>
      <?php } ?>
     </ul>
     <div id="hover_type1_area" style="<?php if($options['hover_type'] == 'type1'){ echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
      <h4 class="theme_option_headline2"><?php _e('Settings for Zoom effect', 'tcd-w'); ?></h4>
      <p><?php _e('Please set the rate of magnification.', 'tcd-w'); ?></p>
      <input id="dp_options[hover1_zoom]" class="hankaku" style="width:45px;" type="text" name="dp_options[hover1_zoom]" value="<?php esc_attr_e( $options['hover1_zoom'] ); ?>" />
     </div>
     <div id="hover_type2_area" style="<?php if($options['hover_type'] == 'type2'){ echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
      <h4 class="theme_option_headline2"><?php _e('Settings for Slide effect', 'tcd-w'); ?></h4>
      <p><?php _e('Please set the direction of slide.', 'tcd-w'); ?></p>
      <fieldset class="cf select_type2">
       <?php foreach ( $hover2_direct_options as $option ) { ?>
       <label class="description" style="display:inline-block;margin-right:15px;">
        <input type="radio" name="dp_options[hover2_direct]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php checked( $options['hover2_direct'], $option['value'] ); ?> />
        <?php echo $option['label']; ?>
       </label>
       <?php } ?>
      </fieldset>
      <p><?php _e('Please set the opacity. (0 - 1.0, e.g. 0.7)', 'tcd-w'); ?></p>
      <input id="dp_options[hover2_opacity]" class="hankaku" style="width:70px;" type="number" max="1" min="0" step="0.1" name="dp_options[hover2_opacity]" value="<?php esc_attr_e( $options['hover2_opacity'] ); ?>" />
      <p><?php _e('Please set the background color.', 'tcd-w'); ?></p>
      <input type="text" name="dp_options[hover2_bgcolor]" value="<?php echo esc_attr( $options['hover2_bgcolor'] ); ?>" data-default-color="#FFFFFF" class="c-color-picker">
     </div>
     <div id="hover_type3_area" style="<?php if($options['hover_type'] == 'type3'){ echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
      <h4 class="theme_option_headline2"><?php _e('Settings for Fade effect', 'tcd-w'); ?></h4>
      <p><?php _e('Please set the opacity. (0 - 1.0, e.g. 0.7)', 'tcd-w'); ?></p>
      <input id="dp_options[hover3_opacity]" class="hankaku" style="width:70px;" type="number" max="1" min="0" step="0.1" name="dp_options[hover3_opacity]" value="<?php esc_attr_e( $options['hover3_opacity'] ); ?>" />
      <p><?php _e('Please set the background color.', 'tcd-w'); ?></p>
      <input type="text" name="dp_options[hover3_bgcolor]" value="<?php echo esc_attr( $options['hover3_bgcolor'] ); ?>" data-default-color="#FFFFFF" class="c-color-picker">
     </div>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // SNSボタン  ------------------------------------------------------------------ ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Social button setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <div class="theme_option_message2">
      <p><?php _e('You can set share buttons at single page.', 'tcd-w'); ?></p>
      <p><?php _e('Facebook like button is displayed only when you select Button type 5 (Default button).', 'tcd-w'); ?></p>
      <p><?php _e('RSS button is not displayed if you select Button type 5 (Default button).', 'tcd-w'); ?></p>
      <p><?php _e('If you use Button type 5 (Default button) and Button types 1 to 4 together, button design will collapses.', 'tcd-w'); ?></p>
     </div>
     <div class="sub_box cf"> 
      <h3 class="theme_option_subbox_headline"><?php _e('Top social button', 'tcd-w');  ?></h3>
      <div class="sub_box_content">
       <p><?php _e('This button will be displayed under post title area.', 'tcd-w');  ?></p>
       <h4 class="theme_option_headline2"><?php _e('Social button design', 'tcd-w');  ?></h4>
       <ul class="design_radio_button image_radio_button cf">
        <?php foreach ( $sns_type_options as $option ) { ?>
        <li>
         <input type="radio" id="sns_type_top_<?php esc_attr_e( $option['value'] ); ?>" name="dp_options[sns_type_top]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php checked( $options['sns_type_top'], $option['value'] ); ?> />
         <label for="sns_type_top_<?php esc_attr_e( $option['value'] ); ?>">
          <span><?php echo esc_html($option['label']); ?></span>
          <img src="<?php bloginfo('template_url'); ?>/admin/img/<?php echo esc_attr($option['img']); ?>" alt="" title="" />
         </label>
        </li>
        <?php } ?>
       </ul>
       <h4 class="theme_option_headline2"><?php _e('Display setting', 'tcd-w');  ?></h4>
       <ul>
        <li><label><input name="dp_options[show_twitter_top]" type="checkbox" value="1" <?php checked( '1', $options['show_twitter_top'] ); ?> /> <?php _e('Display twitter button', 'tcd-w');  ?></label></li>
        <li><label><input name="dp_options[show_fblike_top]" type="checkbox" value="1" <?php checked( '1', $options['show_fblike_top'] ); ?> /> <?php _e('Display facebook like button -Button type 5 (Default button) only', 'tcd-w');  ?></label></li>
        <li><label><input name="dp_options[show_fbshare_top]" type="checkbox" value="1" <?php checked( '1', $options['show_fbshare_top'] ); ?> /> <?php _e('Display facebook share button', 'tcd-w');  ?></label></li>
        <li><label><input name="dp_options[show_hatena_top]" type="checkbox" value="1" <?php checked( '1', $options['show_hatena_top'] ); ?> /> <?php _e('Display hatena button', 'tcd-w');  ?></label></li>
        <li><label><input name="dp_options[show_pocket_top]" type="checkbox" value="1" <?php checked( '1', $options['show_pocket_top'] ); ?> /> <?php _e('Display pocket button', 'tcd-w');  ?></label></li>
        <li><label><input name="dp_options[show_feedly_top]" type="checkbox" value="1" <?php checked( '1', $options['show_feedly_top'] ); ?> /> <?php _e('Display feedly button', 'tcd-w');  ?></label></li>
        <li><label><input name="dp_options[show_rss_top]" type="checkbox" value="1" <?php checked( '1', $options['show_rss_top'] ); ?> /> <?php _e('Display rss button', 'tcd-w');  ?></label></li>
        <li><label><input name="dp_options[show_pinterest_top]" type="checkbox" value="1" <?php checked( '1', $options['show_pinterest_top'] ); ?> /> <?php _e('Display pinterest button', 'tcd-w');  ?></label></li>
       </ul>
       <input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
      </div><!-- END .sub_box_content -->
     </div><!-- END .sub_box -->

     <div class="sub_box cf"> 
      <h3 class="theme_option_subbox_headline"><?php _e('Bottom social button', 'tcd-w');  ?></h3>
      <div class="sub_box_content">
       <p><?php _e('This button will be displayed under post content.', 'tcd-w');  ?></p>
       <h4 class="theme_option_headline2"><?php _e('Social button design', 'tcd-w');  ?></h4>
       <ul class="design_radio_button image_radio_button cf">
        <?php foreach ( $sns_type_options as $option ) { ?>
        <li>
         <input type="radio" id="sns_type_btm_<?php esc_attr_e( $option['value'] ); ?>" name="dp_options[sns_type_btm]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php checked( $options['sns_type_btm'], $option['value'] ); ?> />
         <label for="sns_type_btm_<?php esc_attr_e( $option['value'] ); ?>">
          <span><?php echo esc_html($option['label']); ?></span>
          <img src="<?php bloginfo('template_url'); ?>/admin/img/<?php echo esc_attr($option['img']); ?>" alt="" title="" />
         </label>
        </li>
        <?php } ?>
       </ul>
       <h4 class="theme_option_headline2"><?php _e('Display setting', 'tcd-w');  ?></h4>
       <ul>
        <li><label><input name="dp_options[show_twitter_btm]" type="checkbox" value="1" <?php checked( '1', $options['show_twitter_btm'] ); ?> /> <?php _e('Display twitter button', 'tcd-w');  ?></label></li>
        <li><label><input name="dp_options[show_fblike_btm]" type="checkbox" value="1" <?php checked( '1', $options['show_fblike_btm'] ); ?> /> <?php _e('Display facebook like button-Button type 5 (Default button) only', 'tcd-w');  ?></label></li>
        <li><label><input name="dp_options[show_fbshare_btm]" type="checkbox" value="1" <?php checked( '1', $options['show_fbshare_btm'] ); ?> /> <?php _e('Display facebook share button', 'tcd-w');  ?></label></li>
        <li><label><input name="dp_options[show_hatena_btm]" type="checkbox" value="1" <?php checked( '1', $options['show_hatena_btm'] ); ?> /> <?php _e('Display hatena button', 'tcd-w');  ?></label></li>
        <li><label><input name="dp_options[show_pocket_btm]" type="checkbox" value="1" <?php checked( '1', $options['show_pocket_btm'] ); ?> /> <?php _e('Display pocket button', 'tcd-w');  ?></label></li>
        <li><label><input name="dp_options[show_feedly_btm]" type="checkbox" value="1" <?php checked( '1', $options['show_feedly_btm'] ); ?> /> <?php _e('Display feedly button', 'tcd-w');  ?></label></li>
        <li><label><input name="dp_options[show_rss_btm]" type="checkbox" value="1" <?php checked( '1', $options['show_rss_btm'] ); ?> /> <?php _e('Display rss button', 'tcd-w');  ?></label></li>
        <li><label><input name="dp_options[show_pinterest_btm]" type="checkbox" value="1" <?php checked( '1', $options['show_pinterest_btm'] ); ?> /> <?php _e('Display pinterest button', 'tcd-w');  ?></label></li>
       </ul>
       <input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
      </div><!-- END .sub_box_content -->
     </div><!-- END .sub_box -->

     <h4 class="theme_option_headline2"><?php _e('Setting for the twitter button', 'tcd-w');  ?></h4>
     <label style="margin-top:20px;"><?php _e('Set of twitter account. (ex.designplus)', 'tcd-w');  ?></label>
     <input style="display:block; margin:.6em 0 1em;" id="dp_options[twitter_info]" class="regular-text" type="text" name="dp_options[twitter_info]" value="<?php esc_attr_e( $options['twitter_info'] ); ?>" />
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // Use OGP tag ----------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Facebook OGP setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <div class="theme_option_message2">
      <p><?php _e('OGP is a mechanism for correctly conveying page information.', 'tcd-w'); ?></p>
     </div>    
     <p><label><input id="dp_options[use_ogp]" name="dp_options[use_ogp]" type="checkbox" value="1" <?php checked( '1', $options['use_ogp'] ); ?> /> <?php _e('Use OGP', 'tcd-w');  ?></label></p>
     <p><?php _e( 'Your app ID', 'tcd-w' );  ?> <input class="regular-text" type="text" name="dp_options[fb_app_id]" value="<?php esc_attr_e( $options['fb_app_id'] ); ?>"></p>
     <p><?php _e( 'In order to use Facebook Insights please set your app ID.', 'tcd-w' ); ?></p>
     <h4 class="theme_option_headline2"><?php _e( 'OGP image', 'tcd-w' ); ?></h4>
     <div class="theme_option_message2">
      <p><?php _e( 'This image is displayed for OGP if the page does not have a thumbnail.', 'tcd-w' ); ?></p>
      <p><?php printf(__('Recommend image size. Width:%1$spx, Height:%2$spx.', 'tcd-w'), '1200', '630'); ?></p>
     </div>
     <div class="image_box cf">
      <div class="cf cf_media_field hide-if-no-js">
       <input type="hidden" value="<?php echo esc_attr( $options['ogp_image'] ); ?>" id="ogp_image" name="dp_options[ogp_image]" class="cf_media_id">
       <div class="preview_field"><?php if ( $options['ogp_image'] ) { echo wp_get_attachment_image( $options['ogp_image'], 'medium'); } ?></div>
       <div class="button_area">
        <input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
        <input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $options['ogp_image'] ) { echo 'hidden'; } ?>">
       </div>
      </div>
     </div>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // Twitter card ----------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Twitter Cards setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <div class="theme_option_message2">
      <p><?php _e('This theme requires Facebook OGP settings to use Twitter cards.', 'tcd-w'); ?></p>
     </div>    
     <p><label><input id="dp_options[use_twitter_card]" name="dp_options[use_twitter_card]" type="checkbox" value="1" <?php checked( '1', $options['use_twitter_card'] ); ?>> <?php _e( 'Use Twitter Cards', 'tcd-w' );  ?></label></p>
     <p><?php _e( 'Your Twitter account name (exclude @ mark)', 'tcd-w' ); ?><input id="dp_options[twitter_account_name]" class="regular-text" type="text" name="dp_options[twitter_account_name]" value="<?php esc_attr_e( $options['twitter_account_name'] ); ?>"></p>
     <p><a href="http://design-plus1.com/tcd-w/2016/11/twitter-cards.html" target="_blank"><?php _e( 'Information about Twitter Cards.', 'tcd-w' ); ?></a></p>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // No Imageの設定 ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Original alternate image for featured image', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <div class="theme_option_message2">
      <p><?php _e('You can register original alternate image for featured image.', 'tcd-w');  ?></p>
     </div>
     <?php for($i = 1; $i <= 2; $i++) : ?>
     <div class="sub_box cf"> 
      <h3 class="theme_option_subbox_headline"><?php printf(__('Alternate image%s setting', 'tcd-w'),$i);  ?></h3>
      <div class="sub_box_content">
       <?php if($i == 1) { ?>
       <h4 class="theme_option_headline2"><?php printf(__('Recommend image size. Width:%1$spx, Height:%2$spx.', 'tcd-w'), '520', '520'); ?></h4>
       <p><?php _e('This image will be used in square shaped thumbnail in widget.', 'tcd-w');  ?></p>
       <?php } elseif($i == 2) { ?>
       <h4 class="theme_option_headline2"><?php printf(__('Recommend image size. Width:%1$spx, Height:%2$spx.', 'tcd-w'), '800', '485'); ?></h4>
       <p><?php printf(__('This image will be used in %s list, blog list, and %s list.', 'tcd-w'), $campaign_label, $news_label);  ?></p>
       <?php }; ?>
       <div class="image_box cf">
        <div class="cf cf_media_field hide-if-no-js no_image<?php echo $i; ?>">
         <input type="hidden" value="<?php echo esc_attr( $options['no_image'.$i] ); ?>" id="no_image<?php echo $i; ?>" name="dp_options[no_image<?php echo $i; ?>]" class="cf_media_id">
         <div class="preview_field"><?php if($options['no_image'.$i]){ echo wp_get_attachment_image($options['no_image'.$i], 'medium'); }; ?></div>
         <div class="buttton_area">
          <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
          <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['no_image'.$i]){ echo 'hidden'; }; ?>">
         </div>
        </div>
       </div>
       <input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
      </div><!-- END .sub_box_content -->
     </div><!-- END .sub_box -->
     <?php endfor; ?>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->

   <?php // ローディング画面の設定 ----------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Loading screen setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <div class="theme_option_message2">
      <p><?php _e('You can set the load screen displayed during page transition.', 'tcd-w');  ?></p>
     </div>
     <h4 class="theme_option_headline2"><?php _e('Display setting', 'tcd-w'); ?></h4>
     <ul class="design_radio_button">
      <?php foreach ( $load_screen_options as $option ) { ?>
      <li>
       <input type="radio" id="show_load_screen_<?php esc_attr_e( $option['value'] ); ?>" name="dp_options[show_load_screen]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php checked( $options['show_load_screen'], $option['value'] ); ?> />
       <label for="show_load_screen_<?php esc_attr_e( $option['value'] ); ?>"><?php echo $option['label']; ?></label>
      </li>
      <?php } ?>
     </ul>
     <h4 class="theme_option_headline2"><?php _e('Type of loader', 'tcd-w');  ?></h4>
     <select id="load_icon_type" name="dp_options[load_icon]">
      <?php foreach ( $load_icon_type as $option ) { ?>
      <option style="padding-right: 10px;" value="<?php echo esc_attr( $option['value'] ); ?>" <?php selected( $options['load_icon'], $option['value'] ); ?>><?php echo esc_html($option['label']); ?></option>
      <?php } ?>
     </select>
     <h4 class="theme_option_headline2"><?php _e('Color setting', 'tcd-w');  ?></h4>
     <ul class="color_field">
      <li class="cf"><span class="label"><?php _e('Primary color', 'tcd-w'); ?></span><input type="text" name="dp_options[load_color1]" value="<?php echo esc_attr( $options['load_color1'] ); ?>" data-default-color="#000000" class="c-color-picker"></li>
      <li class="cf"><span class="label"><?php _e('Secondary color', 'tcd-w'); ?></span><input type="text" name="dp_options[load_color2]" value="<?php echo esc_attr( $options['load_color2'] ); ?>" data-default-color="#999999" class="c-color-picker"></li>
      <li class="cf"><span class="label"><?php _e('Background color', 'tcd-w'); ?></span><input type="text" name="dp_options[load_bgcolor]" value="<?php echo esc_attr( $options['load_bgcolor'] ); ?>" data-default-color="#ffffff" class="c-color-picker"></li>
     </ul>
     <h4 class="theme_option_headline2"><?php _e('Maximum display time', 'tcd-w');  ?></h4>
     <div class="theme_option_message2">
      <p><?php _e('Please set the maximum display time of the loading screen.<br />Even if all the content is not loaded, loading screen will disappear automatically after a lapse of time you have set at follwing.<br />If you select "Logo and Catchphrase" as the type of loader, the loading screen will be displayed for a configured seconds.', 'tcd-w'); ?></p>
     </div>
     <select name="dp_options[load_time]">
      <?php
           $i = 1;
           foreach ( $time_options as $option ):
             if( $i >= 3 && $i <= 10 ){
      ?>
      <option style="padding-right: 10px;" value="<?php echo esc_attr( $option['value'] ); ?>" <?php selected( $options['load_time'], $option['value'] ); ?>><?php echo esc_html($option['label']); ?></option>
      <?php
             }
             $i++;
          endforeach;
      ?>
     </select>
     <div id="load_icon_type4">
      <h4 class="theme_option_headline2"><?php _e( 'Logo', 'tcd-w' ); ?></h4>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js load_type4_image">
        <input type="hidden" value="<?php echo esc_attr( $options['load_type4_image'] ); ?>" id="load_type4_image" name="dp_options[load_type4_image]" class="cf_media_id">
        <div class="preview_field"><?php if ( $options['load_type4_image'] ) { echo wp_get_attachment_image( $options['load_type4_image'], 'full' ); } ?></div>
        <div class="button_area">
         <input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
         <input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $options['load_type4_image'] ) { echo 'hidden'; } ?>">
        </div>
       </div>
      </div>
      <p><label><input name="dp_options[load_type4_image_retina]" type="checkbox" value="1" <?php checked( 1, $options['load_type4_image_retina'] ); ?>><?php _e( 'Use retina display logo image', 'tcd-w' ); ?></label></p>
      <h4 class="theme_option_headline2"><?php _e( 'Logo (mobile)', 'tcd-w' ); ?></h4>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js load_type4_image_mobile">
        <input type="hidden" value="<?php echo esc_attr( $options['load_type4_image_mobile'] ); ?>" id="load_type4_image_mobile" name="dp_options[load_type4_image_mobile]" class="cf_media_id">
        <div class="preview_field"><?php if ( $options['load_type4_image_mobile'] ) { echo wp_get_attachment_image( $options['load_type4_image_mobile'], 'full' ); } ?></div>
        <div class="button_area">
         <input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
         <input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $options['load_type4_image_mobile'] ) { echo 'hidden'; } ?>">
        </div>
       </div>
      </div>
      <p><label><input name="dp_options[load_type4_image_retina_mobile]" type="checkbox" value="1" <?php checked( 1, $options['load_type4_image_retina_mobile'] ); ?>><?php _e( 'Use retina display logo image', 'tcd-w' ); ?></label></p>
      <h4 class="theme_option_headline2"><?php _e( 'Catchphrase', 'tcd-w' ); ?></h4>
      <textarea class="large-text" id="load_type4_catch" name="dp_options[load_type4_catch]" rows="3"><?php echo esc_attr( $options['load_type4_catch'] ); ?></textarea>
      <h4 class="theme_option_headline2"><?php _e( 'Catchphrase font type', 'tcd-w' ); ?></h4>
      <ul class="design_radio_button">
       <?php
            foreach ( $font_type_options as $option ) {
            if(strtoupper(get_locale()) == 'JA'){
              $label = $option['label'];
            } else {
              $label = $option['label_en'];
            }
       ?>
       <li>
        <input type="radio" id="load_type4_catch_font_type_<?php esc_attr_e( $option['value'] ); ?>" name="dp_options[load_type4_catch_font_type]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php checked( $options['load_type4_catch_font_type'], $option['value'] ); ?> />
        <label for="load_type4_catch_font_type_<?php esc_attr_e( $option['value'] ); ?>"><?php echo $label; ?></label>
       </li>
       <?php } ?>
      </ul>
      <h4 class="theme_option_headline2"><?php _e( 'Other setting', 'tcd-w' ); ?></h4>
      <ul class="option_list">
       <li class="cf"><span class="label"><?php _e('Font size of catchphrase', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[load_type4_catch_font_size]" value="<?php esc_attr_e( $options['load_type4_catch_font_size'] ); ?>" /><span>px</span></li>
       <li class="cf"><span class="label"><?php _e('Font size of catchphrase (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[load_type4_catch_font_size_sp]" value="<?php esc_attr_e( $options['load_type4_catch_font_size_sp'] ); ?>" /><span>px</span></li>
       <li class="cf"><span class="label"><?php _e('Font color of catchphrase', 'tcd-w'); ?></span><input type="text" name="dp_options[load_type4_catch_color]" value="<?php echo esc_attr( $options['load_type4_catch_color'] ); ?>" data-default-color="#000000" class="c-color-picker"></li>
      </ul>
     </div>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // Google Map ----------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e( 'Google Maps settings', 'tcd-w' );  ?></h3>
    <div class="theme_option_field_ac_content">
     <div class="theme_option_message2">
      <p><?php _e('You can set styles of marker in Google maps, and select default marker or custom marker.', 'tcd-w');  ?></p>
     </div>
     <h4 class="theme_option_headline2"><?php _e( 'API key', 'tcd-w' ); ?></h4>
     <input type="text" class="regular-text" name="dp_options[gmap_api_key]" value="<?php echo esc_attr( $options['gmap_api_key'] ); ?>">
     <h4 class="theme_option_headline2"><?php _e( 'Marker type', 'tcd-w' ); ?></h4>
     <ul class="design_radio_button image_radio_button cf">
      <?php foreach ( $gmap_marker_type_options as $option ) : ?>
      <li class="gmap_marker_type_button_<?php echo esc_attr( $option['value'] ); ?>">
       <input type="radio" id="gmap_marker_type_button_<?php echo esc_attr( $option['value'] ); ?>" name="dp_options[gmap_marker_type]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php checked( $option['value'], $options['gmap_marker_type'] ); ?>>
       <label for="gmap_marker_type_button_<?php echo esc_attr( $option['value'] ); ?>">
        <span><?php echo esc_html( $option['label'] ); ?></span>
        <img src="<?php bloginfo('template_url'); ?>/admin/img/<?php echo esc_attr($option['img']); ?>" alt="" title="" />
       </label>
      </li>
      <?php endforeach; ?>
     </ul>
     <div class="gmap_marker_type2_area" style="<?php if($options['gmap_marker_type'] == 'type1'){ echo 'display:none;'; } else { echo 'display:block;'; }; ?>">
      <h4 class="theme_option_headline2"><?php _e( 'Custom marker type', 'tcd-w' ); ?></h4>
      <ul class="design_radio_button">
       <?php foreach ( $gmap_custom_marker_type_options as $option ) : ?>
       <li class="gmap_custom_marker_type_button_<?php echo esc_attr( $option['value'] ); ?>">
        <input type="radio" id="gmap_custom_marker_type_button_<?php echo esc_attr( $option['value'] ); ?>" name="dp_options[gmap_custom_marker_type]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php checked( $option['value'], $options['gmap_custom_marker_type'] ); ?>>
        <label for="gmap_custom_marker_type_button_<?php echo esc_attr( $option['value'] ); ?>"><?php echo esc_html_e( $option['label'] ); ?></label>
       </li>
       <?php endforeach; ?>
      </ul>
      <div class="gmap_custom_marker_type1_area" style="<?php if ( $options['gmap_custom_marker_type'] == 'type1') { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
       <h4 class="theme_option_headline2"><?php _e( 'Custom marker text', 'tcd-w' ); ?></h4>
       <ul class="option_list">
        <li class="cf"><span class="label"><?php _e('Text', 'tcd-w'); ?></span><input class="full_width" type="text" name="dp_options[gmap_marker_text]" value="<?php echo esc_attr( $options['gmap_marker_text'] ); ?>"></li>
        <li class="cf"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" class="c-color-picker" name="dp_options[gmap_marker_color]" value="<?php echo esc_attr( $options['gmap_marker_color'] ); ?>" data-default-color="#ffffff"></li>
       </ul>
      </div>
      <div class="gmap_custom_marker_type2_area" style="<?php if ( $options['gmap_custom_marker_type'] == 'type1') { echo 'display:none;'; } else { echo 'display:block;'; }; ?>">
       <h4 class="theme_option_headline2"><?php _e( 'Custom marker image', 'tcd-w' ); ?></h4>
       <p><?php _e( 'Recommended size: width:60px, height:20px', 'tcd-w' ); ?></p>
       <div class="image_box cf">
        <div class="cf cf_media_field hide-if-no-js gmap_marker_img">
         <input type="hidden" value="<?php echo esc_attr( $options['gmap_marker_img'] ); ?>" id="gmap_marker_img" name="dp_options[gmap_marker_img]" class="cf_media_id">
         <div class="preview_field"><?php if ( $options['gmap_marker_img'] ) { echo wp_get_attachment_image($options['gmap_marker_img'], 'medium' ); } ?></div>
         <div class="button_area">
          <input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
          <input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $options['gmap_marker_img'] ) { echo 'hidden'; } ?>">
         </div>
        </div>
       </div>
      </div>
      <h4 class="theme_option_headline2"><?php _e( 'Background color of marker', 'tcd-w' ); ?></h4>
      <p><input type="text" class="c-color-picker" name="dp_options[gmap_marker_bg]" data-default-color="#000000" value="<?php echo esc_attr( $options['gmap_marker_bg'] ); ?>"></p>
     </div>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // 絵文字の設定 ----------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Acceleration setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <h4 class="theme_option_headline2"><?php _e( 'Lazyload setting', 'tcd-w' ); ?></h4>
     <div class="theme_option_message2">
      <p><?php _e('Cannot be used with lazyload plugin.', 'tcd-w');  ?></p>
     </div>
     <p><label><input id="dp_options[use_lazyload]" name="dp_options[use_lazyload]" type="checkbox" value="1" <?php checked( '1', $options['use_lazyload'] ); ?> /> <?php _e('Use lazyload', 'tcd-w');  ?></label></p>

     <h4 class="theme_option_headline2"><?php _e( 'Emoji setting', 'tcd-w' ); ?></h4>
     <div class="theme_option_message2">
      <p><?php _e('We recommend to checkoff this option if you dont use any Emoji in your post content.', 'tcd-w'); ?><br><?php _e("You can only accelarate if your database doesn't support utf8mb4.", 'tcd-w'); ?>
</p>
     </div>
     <p><label><input id="dp_options[use_emoji]" name="dp_options[use_emoji]" type="checkbox" value="1" <?php checked( '1', $options['use_emoji'] ); ?> /> <?php _e('Use emoji', 'tcd-w');  ?></label></p>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // ユーザーCSS用の自由記入欄 ----------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Custom css displayed inside &lt;head&gt; tag', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <div class="theme_option_message2">
      <p><?php _e( 'This css will be displayed inside &lt;head&gt; tag.<br />You don\'t need to enter &lt;style&gt; tag in this field.', 'tcd-w' ); ?></p>
      <p><?php _e('Example:<br><strong>.custom_css { font-size:12px; }</strong>', 'tcd-w');  ?></p>
     </div>
     <textarea id="dp_options[css_code]" class="large-text" cols="50" rows="10" name="dp_options[css_code]"><?php echo esc_textarea( $options['css_code'] ); ?></textarea>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // ユーザースクリプト用の自由記入欄 ----------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Custom script displayed inside &lt;head&gt; tag', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <div class="theme_option_message2">
      <p><?php _e( 'This script will be displayed inside &lt;head&gt; tag.', 'tcd-w' ); ?></p>
     </div>
     <textarea id="dp_options[script_code]" class="large-text" cols="50" rows="10" name="dp_options[script_code]"><?php echo esc_textarea( $options['script_code'] ); ?></textarea>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


</div><!-- END .tab-content -->

<?php
} // END add_basic_tab_panel()


// バリデーション　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_basic_theme_options_validate( $input ) {

  global $dp_default_options, $sns_type_options, $time_options, $load_screen_options, $load_icon_type, $font_type_options, $post_type_options, $gmap_marker_type_options, $gmap_custom_marker_type_options, $hover_type_options, $hover2_direct_options;


  // 色の設定
  $input['main_color'] = wp_filter_nohtml_kses( $input['main_color'] );
  $input['sub_color'] = wp_filter_nohtml_kses( $input['sub_color'] );
  $input['bg_color'] = wp_filter_nohtml_kses( $input['bg_color'] );
  $input['content_link_color'] = wp_filter_nohtml_kses( $input['content_link_color'] );
  $input['content_link_hover_color'] = wp_filter_nohtml_kses( $input['content_link_hover_color'] );


  // フォントの種類
  if ( ! isset( $input['font_type'] ) )
    $input['font_type'] = null;
  if ( ! array_key_exists( $input['font_type'], $font_type_options ) )
    $input['font_type'] = null;
  if ( ! isset( $input['headline_font_type'] ) )
    $input['headline_font_type'] = null;
  if ( ! array_key_exists( $input['headline_font_type'], $font_type_options ) )
    $input['headline_font_type'] = null;
  if ( ! isset( $input['content_font_type'] ) )
    $input['content_font_type'] = null;
  if ( ! array_key_exists( $input['content_font_type'], $font_type_options ) )
    $input['content_font_type'] = null;
  if ( ! isset( $input['widget_headline_font_type'] ) )
    $input['widget_headline_font_type'] = null;
  if ( ! array_key_exists( $input['widget_headline_font_type'], $font_type_options ) )
    $input['widget_headline_font_type'] = null;
  if ( ! isset( $input['button_font_type'] ) )
    $input['button_font_type'] = null;
  if ( ! array_key_exists( $input['button_font_type'], $font_type_options ) )
    $input['button_font_type'] = null;
  if ( ! isset( $input['page_header_font_type'] ) )
    $input['page_header_font_type'] = null;
  if ( ! array_key_exists( $input['page_header_font_type'], $font_type_options ) )
    $input['page_header_font_type'] = null;


  // アニメーションの設定
  if ( ! isset( $input['hover_type'] ) )
    $input['hover_type'] = null;
  if ( ! array_key_exists( $input['hover_type'], $hover_type_options ) )
    $input['hover_type'] = null;
  $input['hover1_zoom'] = wp_filter_nohtml_kses( $input['hover1_zoom'] );
  if ( ! isset( $input['hover2_direct'] ) )
    $input['hover2_direct'] = null;
  if ( ! array_key_exists( $input['hover2_direct'], $hover2_direct_options ) )
    $input['hover2_direct'] = null;
  $input['hover2_opacity'] = wp_filter_nohtml_kses( $input['hover2_opacity'] );
  $input['hover2_bgcolor'] = wp_filter_nohtml_kses( $input['hover2_bgcolor'] );
  $input['hover3_opacity'] = wp_filter_nohtml_kses( $input['hover3_opacity'] );
  $input['hover3_bgcolor'] = wp_filter_nohtml_kses( $input['hover3_bgcolor'] );


  // ファビコン
  $input['favicon'] = wp_filter_nohtml_kses( $input['favicon'] );


  // Facebook OGPの設定
  if ( ! isset( $input['use_ogp'] ) )
    $input['use_ogp'] = null;
    $input['use_ogp'] = ( $input['use_ogp'] == 1 ? 1 : 0 );
  $input['ogp_image'] = wp_filter_nohtml_kses( $input['ogp_image'] );
 	$input['fb_app_id'] = wp_filter_nohtml_kses( $input['fb_app_id'] );


  // Twitter Cardsの設定
  if ( ! isset( $input['use_twitter_card'] ) )
    $input['use_twitter_card'] = null;
    $input['use_twitter_card'] = ( $input['use_twitter_card'] == 1 ? 1 : 0 );
  $input['twitter_account_name'] = wp_filter_nohtml_kses( $input['twitter_account_name'] );


  // オリジナルスタイルの設定
  $input['css_code'] = $input['css_code'];


  // オリジナルスクリプトの設定
  $input['script_code'] = $input['script_code'];


  // ロードアイコンの設定
  if ( ! isset( $input['show_load_screen'] ) )
    $input['show_load_screen'] = null;
  if ( ! array_key_exists( $input['show_load_screen'], $load_screen_options ) )
    $input['show_load_screen'] = null;
  if ( ! isset( $input['load_icon'] ) || ! array_key_exists( $input['load_icon'], $load_icon_type ) )
    $input['load_icon'] = $dp_default_options['load_icon'];
  if ( ! isset( $input['load_time'] ) || ! array_key_exists( $input['load_time'], $time_options ) )
    $input['load_time'] = $dp_default_options['load_time'];
  $input['load_color1'] = sanitize_hex_color( $input['load_color1'] );
  $input['load_color2'] = sanitize_hex_color( $input['load_color2'] );
  $input['load_type4_image'] = absint( $input['load_type4_image'] );
  $input['load_type4_image_retina'] = ! empty( $input['load_type4_image_retina'] ) ? 1 : 0;
  $input['load_type4_image_mobile'] = absint( $input['load_type4_image_mobile'] );
  $input['load_type4_image_retina_mobile'] = ! empty( $input['load_type4_image_retina_mobile'] ) ? 1 : 0;
  $input['load_type4_catch'] = sanitize_textarea_field( $input['load_type4_catch'] );
  $input['load_type4_catch_font_size'] = absint( $input['load_type4_catch_font_size'] );
  $input['load_type4_catch_font_size_sp'] = absint( $input['load_type4_catch_font_size_sp'] );
  if ( ! isset( $input['load_type4_catch_font_type'] ) || ! array_key_exists( $input['load_type4_catch_font_type'], $font_type_options ) )
    $input['load_type4_catch_font_type'] = $dp_default_options['load_type4_catch_font_type'];
  $input['load_type4_catch_color'] = sanitize_hex_color( $input['load_type4_catch_color'] );


  // NO IMAGE
  $input['no_image1'] = wp_filter_nohtml_kses( $input['no_image1'] );
  $input['no_image2'] = wp_filter_nohtml_kses( $input['no_image2'] );


  // Google Maps 
 	$input['gmap_api_key'] = wp_filter_nohtml_kses( $input['gmap_api_key'] );
 	if ( ! isset( $input['gmap_marker_type'] ) ) $input['gmap_marker_type'] = null;
 	if ( ! array_key_exists( $input['gmap_marker_type'], $gmap_marker_type_options ) ) $input['gmap_marker_type'] = null;
 	if ( ! isset( $input['gmap_custom_marker_type'] ) ) $input['gmap_custom_marker_type'] = null;
 	if ( ! array_key_exists( $input['gmap_custom_marker_type'], $gmap_custom_marker_type_options ) ) $input['gmap_custom_marker_type'] = null;
 	$input['gmap_marker_text'] = wp_filter_nohtml_kses( $input['gmap_marker_text'] );
 	$input['gmap_marker_color'] = wp_filter_nohtml_kses( $input['gmap_marker_color'] );
 	$input['gmap_marker_img'] = wp_filter_nohtml_kses( $input['gmap_marker_img'] );


  // 高速化の設定
  $input['use_lazyload'] = ! empty( $input['use_lazyload'] ) ? 1 : 0;
  $input['use_emoji'] = ! empty( $input['use_emoji'] ) ? 1 : 0;


  // SNSルボタン　上部
  if ( ! isset( $input['sns_type_top'] ) )
    $input['sns_type_top'] = null;
  if ( ! array_key_exists( $input['sns_type_top'], $sns_type_options ) )
    $input['sns_type_top'] = null;
  if ( ! isset( $input['show_twitter_top'] ) )
    $input['show_twitter_top'] = null;
    $input['show_twitter_top'] = ( $input['show_twitter_top'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_fblike_top'] ) )
    $input['show_fblike_top'] = null;
    $input['show_fblike_top'] = ( $input['show_fblike_top'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_fbshare_top'] ) )
    $input['show_fbshare_top'] = null;
    $input['show_fbshare_top'] = ( $input['show_fbshare_top'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_hatena_top'] ) )
    $input['show_hatena_top'] = null;
    $input['show_hatena_top'] = ( $input['show_hatena_top'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_pocket_top'] ) )
    $input['show_pocket_top'] = null;
    $input['show_pocket_top'] = ( $input['show_pocket_top'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_feedly_top'] ) )
    $input['show_feedly_top'] = null;
    $input['show_feedly_top'] = ( $input['show_feedly_top'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_rss_top'] ) )
    $input['show_rss_top'] = null;
    $input['show_rss_top'] = ( $input['show_rss_top'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_pinterest_top'] ) )
    $input['show_pinterest_top'] = null;
    $input['show_pinterest_top'] = ( $input['show_pinterest_top'] == 1 ? 1 : 0 );


  // SNSボタン　下部
  if ( ! isset( $input['sns_type_btm'] ) )
    $input['sns_type_btm'] = null;
  if ( ! array_key_exists( $input['sns_type_btm'], $sns_type_options ) )
    $input['sns_type_btm'] = null;
  if ( ! isset( $input['show_twitter_btm'] ) )
    $input['show_twitter_btm'] = null;
    $input['show_twitter_btm'] = ( $input['show_twitter_btm'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_fblike_btm'] ) )
    $input['show_fblike_btm'] = null;
    $input['show_fblike_btm'] = ( $input['show_fblike_btm'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_fbshare_btm'] ) )
    $input['show_fbshare_btm'] = null;
    $input['show_fbshare_btm'] = ( $input['show_fbshare_btm'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_hatena_btm'] ) )
    $input['show_hatena_btm'] = null;
    $input['show_hatena_btm'] = ( $input['show_hatena_btm'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_pocket_btm'] ) )
    $input['show_pocket_btm'] = null;
    $input['show_pocket_btm'] = ( $input['show_pocket_btm'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_feedly_btm'] ) )
    $input['show_feedly_btm'] = null;
    $input['show_feedly_btm'] = ( $input['show_feedly_btm'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_rss_btm'] ) )
    $input['show_rss_btm'] = null;
    $input['show_rss_btm'] = ( $input['show_rss_btm'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_pinterest_btm'] ) )
    $input['show_pinterest_btm'] = null;
    $input['show_pinterest_btm'] = ( $input['show_pinterest_btm'] == 1 ? 1 : 0 );

  // SNSボタン　Twitterボタン
 	$input['twitter_info'] = wp_filter_nohtml_kses( $input['twitter_info'] );


	return $input;

};


?>