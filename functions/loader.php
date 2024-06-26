<?php
     $options = get_design_plus_option();
     if($options['show_load_screen'] != 'type1'){ 
       $hex_color1 = implode(',', hex2rgb($options['load_color1']));
       $hex_color2 = implode(',', hex2rgb($options['load_color2']));
?>
#site_wrap { display:none; }
#site_loader_overlay {
  background:<?php echo esc_attr($options['load_bgcolor']); ?>;
  opacity: 1;
  position: fixed;
  top: 0px;
  left: 0px;
  width: 100%;
  height: 100%;
  width: 100vw;
  height: 100vh;
  z-index: 99999;
}
<?php if($options['load_icon'] == 'type4'){ ?>
#site_loader_logo {
  position:relative; width:100%; height:100%; opacity:0;
}
#site_loader_logo.active {
  -webkit-animation: opacityAnimation 1.0s ease forwards 1.0s;
  animation: opacityAnimation 1.0s ease forwards 1.0s;
}
#site_loader_logo_inner {
  position:absolute; text-align:center; width:100%;
  top:50%; -ms-transform: translateY(-50%); -webkit-transform: translateY(-50%); transform: translateY(-50%);
}
#site_loader_logo img.mobile { display:none; }
#site_loader_logo_inner p { margin-top:20px; line-height:2; }
@media screen and (max-width:750px) {
  #site_loader_logo.has_mobile_logo img.pc { display:none; }
  #site_loader_logo.has_mobile_logo img.mobile { display:inline; }
}
<?php }; ?>
<?php if($options['load_icon'] == 'type2'){ ?>
#site_loader_animation {
  width: 44px;
  height: 44px;
  position: fixed;
  top: 0;
  left: 0;
	right: 0;
	bottom: 0;
	margin: auto;
}
#site_loader_animation:before {
  position: absolute;
  bottom: 0;
  left: 0;
  display: block;
  width: 12px;
  height: 12px;
  content: '';
  box-shadow: 20px 0 0 rgba(<?php echo $hex_color1; ?>, 1), 40px 0 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -20px 0 rgba(<?php echo $hex_color1; ?>, 1), 20px -20px 0 rgba(<?php echo $hex_color1; ?>, 1), 40px -20px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -40px rgba(<?php echo $hex_color1; ?>, 1), 20px -40px rgba(<?php echo $hex_color1; ?>, 1), 40px -40px rgba(<?php echo $hex_color2; ?>, 0);
  animation: loading-square-loader 5.4s linear forwards infinite;
}
#site_loader_animation:after {
  position: absolute;
  bottom: 10px;
  left: 0;
  display: block;
  width: 12px;
  height: 12px;
  background-color: rgba(<?php echo $hex_color2; ?>, 1);
  opacity: 0;
  content: '';
  animation: loading-square-base 5.4s linear forwards infinite;
}
@-webkit-keyframes loading-square-base {
  0% { bottom: 10px; opacity: 0; }
  5%, 50% { bottom: 0; opacity: 1; }
  55%, 100% { bottom: -10px; opacity: 0; }
}
@keyframes loading-square-base {
  0% { bottom: 10px; opacity: 0; }
  5%, 50% { bottom: 0; opacity: 1; }
  55%, 100% { bottom: -10px; opacity: 0; }
}
@-webkit-keyframes loading-square-loader {
  0% { box-shadow: 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 40px 0 rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(<?php echo $hex_color1; ?>, 0), 40px -20px rgba(<?php echo $hex_color1; ?>, 0), 0 -40px rgba(<?php echo $hex_color1; ?>, 0), 20px -40px rgba(<?php echo $hex_color1; ?>, 0), 40px -40px rgba(242, 205, 123, 0); }
  5% { box-shadow: 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 40px 0 rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(<?php echo $hex_color1; ?>, 0), 40px -20px rgba(<?php echo $hex_color1; ?>, 0), 0 -40px rgba(<?php echo $hex_color1; ?>, 0), 20px -40px rgba(<?php echo $hex_color1; ?>, 0), 40px -40px rgba(242, 205, 123, 0); }
  10% { box-shadow: 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 40px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(<?php echo $hex_color1; ?>, 0), 40px -20px rgba(<?php echo $hex_color1; ?>, 0), 0 -40px rgba(<?php echo $hex_color1; ?>, 0), 20px -40px rgba(<?php echo $hex_color1; ?>, 0), 40px -40px rgba(242, 205, 123, 0); }
  15% { box-shadow: 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 40px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -30px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(<?php echo $hex_color1; ?>, 0), 40px -20px rgba(<?php echo $hex_color1; ?>, 0), 0 -40px rgba(<?php echo $hex_color1; ?>, 0), 20px -40px rgba(<?php echo $hex_color1; ?>, 0), 40px -40px rgba(242, 205, 123, 0); }
  20% { box-shadow: 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 40px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -30px rgba(<?php echo $hex_color1; ?>, 0), 40px -20px rgba(<?php echo $hex_color1; ?>, 0), 0 -40px rgba(<?php echo $hex_color1; ?>, 0), 20px -40px rgba(<?php echo $hex_color1; ?>, 0), 40px -40px rgba(242, 205, 123, 0); }
  25% { box-shadow: 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 40px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color1; ?>, 1), 40px -30px rgba(<?php echo $hex_color1; ?>, 0), 0 -40px rgba(<?php echo $hex_color1; ?>, 0), 20px -40px rgba(<?php echo $hex_color1; ?>, 0), 40px -40px rgba(242, 205, 123, 0); }
  30% { box-shadow: 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 40px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color1; ?>, 1), 40px -20px rgba(<?php echo $hex_color1; ?>, 1), 0 -50px rgba(<?php echo $hex_color1; ?>, 0), 20px -40px rgba(<?php echo $hex_color1; ?>, 0), 40px -40px rgba(242, 205, 123, 0); }
  35% { box-shadow: 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 40px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color1; ?>, 1), 40px -20px rgba(<?php echo $hex_color1; ?>, 1), 0 -40px rgba(<?php echo $hex_color1; ?>, 1), 20px -50px rgba(<?php echo $hex_color1; ?>, 0), 40px -40px rgba(242, 205, 123, 0); }
  40% { box-shadow: 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 40px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color1; ?>, 1), 40px -20px rgba(<?php echo $hex_color1; ?>, 1), 0 -40px rgba(<?php echo $hex_color1; ?>, 1), 20px -40px rgba(<?php echo $hex_color1; ?>, 1), 40px -50px rgba(242, 205, 123, 0); }
  45%, 55% { box-shadow: 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 40px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color1; ?>, 1), 40px -20px rgba(<?php echo $hex_color1; ?>, 1), 0 -40px rgba(<?php echo $hex_color1; ?>, 1), 20px -40px rgba(<?php echo $hex_color1; ?>, 1), 40px -40px rgba(<?php echo $hex_color2; ?>, 1); }
  60% { box-shadow: 20px 10px rgba(<?php echo $hex_color1; ?>, 0), 40px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color1; ?>, 1), 40px -20px rgba(<?php echo $hex_color1; ?>, 1), 0 -40px rgba(<?php echo $hex_color1; ?>, 1), 20px -40px rgba(<?php echo $hex_color1; ?>, 1), 40px -40px rgba(<?php echo $hex_color2; ?>, 1); }
  65% { box-shadow: 20px 10px rgba(<?php echo $hex_color1; ?>, 0), 40px 10px rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color1; ?>, 1), 40px -20px rgba(<?php echo $hex_color1; ?>, 1), 0 -40px rgba(<?php echo $hex_color1; ?>, 1), 20px -40px rgba(<?php echo $hex_color1; ?>, 1), 40px -40px rgba(<?php echo $hex_color2; ?>, 1); }
  70% { box-shadow: 20px 10px rgba(<?php echo $hex_color1; ?>, 0), 40px 10px rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(<?php echo $hex_color1; ?>, 1), 40px -20px rgba(<?php echo $hex_color1; ?>, 1), 0 -40px rgba(<?php echo $hex_color1; ?>, 1), 20px -40px rgba(<?php echo $hex_color1; ?>, 1), 40px -40px rgba(<?php echo $hex_color2; ?>, 1); }
  75% { box-shadow: 20px 10px rgba(<?php echo $hex_color1; ?>, 0), 40px 10px rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 40px -20px rgba(<?php echo $hex_color1; ?>, 1), 0 -40px rgba(<?php echo $hex_color1; ?>, 1), 20px -40px rgba(<?php echo $hex_color1; ?>, 1), 40px -40px rgba(<?php echo $hex_color2; ?>, 1); }
  80% { box-shadow: 20px 10px rgba(<?php echo $hex_color1; ?>, 0), 40px 10px rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 40px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -40px rgba(<?php echo $hex_color1; ?>, 1), 20px -40px rgba(<?php echo $hex_color1; ?>, 1), 40px -40px rgba(<?php echo $hex_color2; ?>, 1); }
  85% { box-shadow: 20px 10px rgba(<?php echo $hex_color1; ?>, 0), 40px 10px rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 40px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -30px rgba(<?php echo $hex_color1; ?>, 0), 20px -40px rgba(<?php echo $hex_color1; ?>, 1), 40px -40px rgba(<?php echo $hex_color2; ?>, 1); }
  90% { box-shadow: 20px 10px rgba(<?php echo $hex_color1; ?>, 0), 40px 10px rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 40px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -30px rgba(<?php echo $hex_color1; ?>, 0), 20px -30px rgba(<?php echo $hex_color1; ?>, 0), 40px -40px rgba(<?php echo $hex_color2; ?>, 1); }
  95%, 100% { box-shadow: 20px 10px rgba(<?php echo $hex_color1; ?>, 0), 40px 10px rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 40px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -30px rgba(<?php echo $hex_color1; ?>, 0), 20px -30px rgba(<?php echo $hex_color1; ?>, 0), 40px -30px rgba(<?php echo $hex_color2; ?>, 0); }
}
@keyframes loading-square-loader {
  0% { box-shadow: 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 40px 0 rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(<?php echo $hex_color1; ?>, 0), 40px -20px rgba(<?php echo $hex_color1; ?>, 0), 0 -40px rgba(<?php echo $hex_color1; ?>, 0), 20px -40px rgba(<?php echo $hex_color1; ?>, 0), 40px -40px rgba(242, 205, 123, 0); }
  5% { box-shadow: 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 40px 0 rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(<?php echo $hex_color1; ?>, 0), 40px -20px rgba(<?php echo $hex_color1; ?>, 0), 0 -40px rgba(<?php echo $hex_color1; ?>, 0), 20px -40px rgba(<?php echo $hex_color1; ?>, 0), 40px -40px rgba(242, 205, 123, 0); }
  10% { box-shadow: 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 40px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(<?php echo $hex_color1; ?>, 0), 40px -20px rgba(<?php echo $hex_color1; ?>, 0), 0 -40px rgba(<?php echo $hex_color1; ?>, 0), 20px -40px rgba(<?php echo $hex_color1; ?>, 0), 40px -40px rgba(242, 205, 123, 0); }
  15% { box-shadow: 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 40px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -30px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(<?php echo $hex_color1; ?>, 0), 40px -20px rgba(<?php echo $hex_color1; ?>, 0), 0 -40px rgba(<?php echo $hex_color1; ?>, 0), 20px -40px rgba(<?php echo $hex_color1; ?>, 0), 40px -40px rgba(242, 205, 123, 0); }
  20% { box-shadow: 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 40px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -30px rgba(<?php echo $hex_color1; ?>, 0), 40px -20px rgba(<?php echo $hex_color1; ?>, 0), 0 -40px rgba(<?php echo $hex_color1; ?>, 0), 20px -40px rgba(<?php echo $hex_color1; ?>, 0), 40px -40px rgba(242, 205, 123, 0); }
  25% { box-shadow: 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 40px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color1; ?>, 1), 40px -30px rgba(<?php echo $hex_color1; ?>, 0), 0 -40px rgba(<?php echo $hex_color1; ?>, 0), 20px -40px rgba(<?php echo $hex_color1; ?>, 0), 40px -40px rgba(242, 205, 123, 0); }
  30% { box-shadow: 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 40px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color1; ?>, 1), 40px -20px rgba(<?php echo $hex_color1; ?>, 1), 0 -50px rgba(<?php echo $hex_color1; ?>, 0), 20px -40px rgba(<?php echo $hex_color1; ?>, 0), 40px -40px rgba(242, 205, 123, 0); }
  35% { box-shadow: 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 40px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color1; ?>, 1), 40px -20px rgba(<?php echo $hex_color1; ?>, 1), 0 -40px rgba(<?php echo $hex_color1; ?>, 1), 20px -50px rgba(<?php echo $hex_color1; ?>, 0), 40px -40px rgba(242, 205, 123, 0); }
  40% { box-shadow: 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 40px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color1; ?>, 1), 40px -20px rgba(<?php echo $hex_color1; ?>, 1), 0 -40px rgba(<?php echo $hex_color1; ?>, 1), 20px -40px rgba(<?php echo $hex_color1; ?>, 1), 40px -50px rgba(242, 205, 123, 0); }
  45%, 55% { box-shadow: 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 40px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color1; ?>, 1), 40px -20px rgba(<?php echo $hex_color1; ?>, 1), 0 -40px rgba(<?php echo $hex_color1; ?>, 1), 20px -40px rgba(<?php echo $hex_color1; ?>, 1), 40px -40px rgba(<?php echo $hex_color2; ?>, 1); }
  60% { box-shadow: 20px 10px rgba(<?php echo $hex_color1; ?>, 0), 40px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color1; ?>, 1), 40px -20px rgba(<?php echo $hex_color1; ?>, 1), 0 -40px rgba(<?php echo $hex_color1; ?>, 1), 20px -40px rgba(<?php echo $hex_color1; ?>, 1), 40px -40px rgba(<?php echo $hex_color2; ?>, 1); }
  65% { box-shadow: 20px 10px rgba(<?php echo $hex_color1; ?>, 0), 40px 10px rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color1; ?>, 1), 40px -20px rgba(<?php echo $hex_color1; ?>, 1), 0 -40px rgba(<?php echo $hex_color1; ?>, 1), 20px -40px rgba(<?php echo $hex_color1; ?>, 1), 40px -40px rgba(<?php echo $hex_color2; ?>, 1); }
  70% { box-shadow: 20px 10px rgba(<?php echo $hex_color1; ?>, 0), 40px 10px rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(<?php echo $hex_color1; ?>, 1), 40px -20px rgba(<?php echo $hex_color1; ?>, 1), 0 -40px rgba(<?php echo $hex_color1; ?>, 1), 20px -40px rgba(<?php echo $hex_color1; ?>, 1), 40px -40px rgba(<?php echo $hex_color2; ?>, 1); }
  75% { box-shadow: 20px 10px rgba(<?php echo $hex_color1; ?>, 0), 40px 10px rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 40px -20px rgba(<?php echo $hex_color1; ?>, 1), 0 -40px rgba(<?php echo $hex_color1; ?>, 1), 20px -40px rgba(<?php echo $hex_color1; ?>, 1), 40px -40px rgba(<?php echo $hex_color2; ?>, 1); }
  80% { box-shadow: 20px 10px rgba(<?php echo $hex_color1; ?>, 0), 40px 10px rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 40px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -40px rgba(<?php echo $hex_color1; ?>, 1), 20px -40px rgba(<?php echo $hex_color1; ?>, 1), 40px -40px rgba(<?php echo $hex_color2; ?>, 1); }
  85% { box-shadow: 20px 10px rgba(<?php echo $hex_color1; ?>, 0), 40px 10px rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 40px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -30px rgba(<?php echo $hex_color1; ?>, 0), 20px -40px rgba(<?php echo $hex_color1; ?>, 1), 40px -40px rgba(<?php echo $hex_color2; ?>, 1); }
  90% { box-shadow: 20px 10px rgba(<?php echo $hex_color1; ?>, 0), 40px 10px rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 40px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -30px rgba(<?php echo $hex_color1; ?>, 0), 20px -30px rgba(<?php echo $hex_color1; ?>, 0), 40px -40px rgba(<?php echo $hex_color2; ?>, 1); }
  95%, 100% { box-shadow: 20px 10px rgba(<?php echo $hex_color1; ?>, 0), 40px 10px rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 40px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -30px rgba(<?php echo $hex_color1; ?>, 0), 20px -30px rgba(<?php echo $hex_color1; ?>, 0), 40px -30px rgba(<?php echo $hex_color2; ?>, 0); }
}
@media only screen and (max-width: 767px) {
	@-webkit-keyframes loading-square-loader { 
	0% { box-shadow: 10px -5px rgba(<?php echo $hex_color1; ?>, 0), 20px 0 rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 0), 10px -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 0), 10px -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
  5% { box-shadow: 10px -5px rgba(<?php echo $hex_color1; ?>, 0), 20px 0 rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 0), 10px -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 0), 10px -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
  10% { box-shadow: 10px 0 rgba(<?php echo $hex_color1; ?>, 1), 20px -5px rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 0), 10px -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 0), 10px -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
  15% { box-shadow: 10px 0 rgba(<?php echo $hex_color1; ?>, 1), 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -15px rgba(<?php echo $hex_color1; ?>, 0), 10px -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 0), 10px -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
  20% { box-shadow: 10px 0 rgba(<?php echo $hex_color1; ?>, 1), 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -10px rgba(<?php echo $hex_color1; ?>, 1), 10px -15px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 0), 10px -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
  25% { box-shadow: 10px 0 rgba(<?php echo $hex_color1; ?>, 1), 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -10px rgba(<?php echo $hex_color1; ?>, 1), 10px -10px rgba(<?php echo $hex_color1; ?>, 1), 20px -15px rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 0), 10px -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
  30% { box-shadow: 10px 0 rgba(<?php echo $hex_color1; ?>, 1), 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -10px rgba(<?php echo $hex_color1; ?>, 1), 10px -10px rgba(<?php echo $hex_color1; ?>, 1), 20px -10px rgba(<?php echo $hex_color1; ?>, 1), 0 -50px rgba(<?php echo $hex_color1; ?>, 0), 10px -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
  35% { box-shadow: 10px 0 rgba(<?php echo $hex_color1; ?>, 1), 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -10px rgba(<?php echo $hex_color1; ?>, 1), 10px -10px rgba(<?php echo $hex_color1; ?>, 1), 20px -10px rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 10px -50px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
  40% { box-shadow: 10px 0 rgba(<?php echo $hex_color1; ?>, 1), 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -10px rgba(<?php echo $hex_color1; ?>, 1), 10px -10px rgba(<?php echo $hex_color1; ?>, 1), 20px -10px rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 10px -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -50px rgba(242, 205, 123, 0); }
  45%, 55% { box-shadow: 10px 0 rgba(<?php echo $hex_color1; ?>, 1), 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -10px rgba(<?php echo $hex_color1; ?>, 1), 10px -10px rgba(<?php echo $hex_color1; ?>, 1), 20px -10px rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 10px -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color2; ?>, 1); }
  60% { box-shadow: 10px 5px rgba(<?php echo $hex_color1; ?>, 0), 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -10px rgba(<?php echo $hex_color1; ?>, 1), 10px -10px rgba(<?php echo $hex_color1; ?>, 1), 20px -10px rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 10px -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color2; ?>, 1); }
  65% { box-shadow: 10px 5px rgba(<?php echo $hex_color1; ?>, 0), 20px 5px rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 1), 10px -10px rgba(<?php echo $hex_color1; ?>, 1), 20px -10px rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 10px -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color2; ?>, 1); }
  70% { box-shadow: 10px 5px rgba(<?php echo $hex_color1; ?>, 0), 20px 5px rgba(<?php echo $hex_color1; ?>, 0), 0 -5px rgba(<?php echo $hex_color1; ?>, 0), 10px -10px rgba(<?php echo $hex_color1; ?>, 1), 20px -10px rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 10px -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color2; ?>, 1); }
  75% { box-shadow: 10px 5px rgba(<?php echo $hex_color1; ?>, 0), 20px 5px rgba(<?php echo $hex_color1; ?>, 0), 0 -5px rgba(<?php echo $hex_color1; ?>, 0), 10px -5px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 10px -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color2; ?>, 1); }
  80% { box-shadow: 10px 5px rgba(<?php echo $hex_color1; ?>, 0), 20px 5px rgba(<?php echo $hex_color1; ?>, 0), 0 -5px rgba(<?php echo $hex_color1; ?>, 0), 10px -5px rgba(<?php echo $hex_color1; ?>, 0), 20px -5px rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 10px -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color2; ?>, 1); }
  85% { box-shadow: 10px 5px rgba(<?php echo $hex_color1; ?>, 0), 20px 5px rgba(<?php echo $hex_color1; ?>, 0), 0 -5px rgba(<?php echo $hex_color1; ?>, 0), 10px -5px rgba(<?php echo $hex_color1; ?>, 0), 20px -5px rgba(<?php echo $hex_color1; ?>, 0), 0 -15px rgba(<?php echo $hex_color1; ?>, 0), 10px -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color2; ?>, 1); }
  90% { box-shadow: 10px 5px rgba(<?php echo $hex_color1; ?>, 0), 20px 5px rgba(<?php echo $hex_color1; ?>, 0), 0 -5px rgba(<?php echo $hex_color1; ?>, 0), 10px -5px rgba(<?php echo $hex_color1; ?>, 0), 20px -5px rgba(<?php echo $hex_color1; ?>, 0), 0 -15px rgba(<?php echo $hex_color1; ?>, 0), 10px -15px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(<?php echo $hex_color2; ?>, 1); }
  95%, 100% { box-shadow: 10px 5px rgba(<?php echo $hex_color1; ?>, 0), 20px 5px rgba(<?php echo $hex_color1; ?>, 0), 0 -5px rgba(<?php echo $hex_color1; ?>, 0), 10px -5px rgba(<?php echo $hex_color1; ?>, 0), 20px -5px rgba(<?php echo $hex_color1; ?>, 0), 0 -15px rgba(<?php echo $hex_color1; ?>, 0), 10px -15px rgba(<?php echo $hex_color1; ?>, 0), 20px -15px rgba(<?php echo $hex_color2; ?>, 0); }
}
@keyframes loading-square-loader {
  0% { box-shadow: 10px -5px rgba(<?php echo $hex_color1; ?>, 0), 20px 0 rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 0), 10px -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 0), 10px -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
  5% { box-shadow: 10px -5px rgba(<?php echo $hex_color1; ?>, 0), 20px 0 rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 0), 10px -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 0), 10px -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
  10% { box-shadow: 10px 0 rgba(<?php echo $hex_color1; ?>, 1), 20px -5px rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 0), 10px -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 0), 10px -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
  15% { box-shadow: 10px 0 rgba(<?php echo $hex_color1; ?>, 1), 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -15px rgba(<?php echo $hex_color1; ?>, 0), 10px -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 0), 10px -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
  20% { box-shadow: 10px 0 rgba(<?php echo $hex_color1; ?>, 1), 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -10px rgba(<?php echo $hex_color1; ?>, 1), 10px -15px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 0), 10px -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
  25% { box-shadow: 10px 0 rgba(<?php echo $hex_color1; ?>, 1), 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -10px rgba(<?php echo $hex_color1; ?>, 1), 10px -10px rgba(<?php echo $hex_color1; ?>, 1), 20px -15px rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 0), 10px -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
  30% { box-shadow: 10px 0 rgba(<?php echo $hex_color1; ?>, 1), 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -10px rgba(<?php echo $hex_color1; ?>, 1), 10px -10px rgba(<?php echo $hex_color1; ?>, 1), 20px -10px rgba(<?php echo $hex_color1; ?>, 1), 0 -50px rgba(<?php echo $hex_color1; ?>, 0), 10px -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
  35% { box-shadow: 10px 0 rgba(<?php echo $hex_color1; ?>, 1), 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -10px rgba(<?php echo $hex_color1; ?>, 1), 10px -10px rgba(<?php echo $hex_color1; ?>, 1), 20px -10px rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 10px -50px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
  40% { box-shadow: 10px 0 rgba(<?php echo $hex_color1; ?>, 1), 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -10px rgba(<?php echo $hex_color1; ?>, 1), 10px -10px rgba(<?php echo $hex_color1; ?>, 1), 20px -10px rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 10px -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -50px rgba(242, 205, 123, 0); }
  45%, 55% { box-shadow: 10px 0 rgba(<?php echo $hex_color1; ?>, 1), 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -10px rgba(<?php echo $hex_color1; ?>, 1), 10px -10px rgba(<?php echo $hex_color1; ?>, 1), 20px -10px rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 10px -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color2; ?>, 1); }
  60% { box-shadow: 10px 5px rgba(<?php echo $hex_color1; ?>, 0), 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -10px rgba(<?php echo $hex_color1; ?>, 1), 10px -10px rgba(<?php echo $hex_color1; ?>, 1), 20px -10px rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 10px -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color2; ?>, 1); }
  65% { box-shadow: 10px 5px rgba(<?php echo $hex_color1; ?>, 0), 20px 5px rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 1), 10px -10px rgba(<?php echo $hex_color1; ?>, 1), 20px -10px rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 10px -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color2; ?>, 1); }
  70% { box-shadow: 10px 5px rgba(<?php echo $hex_color1; ?>, 0), 20px 5px rgba(<?php echo $hex_color1; ?>, 0), 0 -5px rgba(<?php echo $hex_color1; ?>, 0), 10px -10px rgba(<?php echo $hex_color1; ?>, 1), 20px -10px rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 10px -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color2; ?>, 1); }
  75% { box-shadow: 10px 5px rgba(<?php echo $hex_color1; ?>, 0), 20px 5px rgba(<?php echo $hex_color1; ?>, 0), 0 -5px rgba(<?php echo $hex_color1; ?>, 0), 10px -5px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 10px -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color2; ?>, 1); }
  80% { box-shadow: 10px 5px rgba(<?php echo $hex_color1; ?>, 0), 20px 5px rgba(<?php echo $hex_color1; ?>, 0), 0 -5px rgba(<?php echo $hex_color1; ?>, 0), 10px -5px rgba(<?php echo $hex_color1; ?>, 0), 20px -5px rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 10px -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color2; ?>, 1); }
  85% { box-shadow: 10px 5px rgba(<?php echo $hex_color1; ?>, 0), 20px 5px rgba(<?php echo $hex_color1; ?>, 0), 0 -5px rgba(<?php echo $hex_color1; ?>, 0), 10px -5px rgba(<?php echo $hex_color1; ?>, 0), 20px -5px rgba(<?php echo $hex_color1; ?>, 0), 0 -15px rgba(<?php echo $hex_color1; ?>, 0), 10px -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color2; ?>, 1); }
  90% { box-shadow: 10px 5px rgba(<?php echo $hex_color1; ?>, 0), 20px 5px rgba(<?php echo $hex_color1; ?>, 0), 0 -5px rgba(<?php echo $hex_color1; ?>, 0), 10px -5px rgba(<?php echo $hex_color1; ?>, 0), 20px -5px rgba(<?php echo $hex_color1; ?>, 0), 0 -15px rgba(<?php echo $hex_color1; ?>, 0), 10px -15px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(<?php echo $hex_color2; ?>, 1); }
  95%, 100% { box-shadow: 10px 5px rgba(<?php echo $hex_color1; ?>, 0), 20px 5px rgba(<?php echo $hex_color1; ?>, 0), 0 -5px rgba(<?php echo $hex_color1; ?>, 0), 10px -5px rgba(<?php echo $hex_color1; ?>, 0), 20px -5px rgba(<?php echo $hex_color1; ?>, 0), 0 -15px rgba(<?php echo $hex_color1; ?>, 0), 10px -15px rgba(<?php echo $hex_color1; ?>, 0), 20px -15px rgba(<?php echo $hex_color2; ?>, 0); }
}
	#site_loader_animation:before { width: 8px; height: 8px; box-shadow: 10px 0 0 rgba(<?php echo $hex_color1; ?>, 1), 20px 0 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -10px 0 rgba(<?php echo $hex_color1; ?>, 1), 10px -10px 0 rgba(<?php echo $hex_color1; ?>, 1), 20px -10px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 10px -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color2; ?>, 0); }
  #site_loader_animation::after { width: 8px; height: 8px; }   
}
<?php } elseif($options['load_icon'] == 'type3'){ ?>
#site_loader_animation {
  width: 100%;
  min-width: 160px;
  font-size: 16px;
  text-align: center;
  position: fixed;
  top: 50%;
  left: 0;
  opacity: 0;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
  filter: alpha(opacity=0);
  -webkit-animation: loading-dots-fadein .5s linear forwards;
  -moz-animation: loading-dots-fadein .5s linear forwards;
  -o-animation: loading-dots-fadein .5s linear forwards;
  -ms-animation: loading-dots-fadein .5s linear forwards;
  animation: loading-dots-fadein .5s linear forwards;
}
#site_loader_animation i {
  width: .5em;
  height: .5em;
  display: inline-block;
  vertical-align: middle;
  background: #e0e0e0;
  -webkit-border-radius: 50%;
  border-radius: 50%;
  margin: 0 .25em;
  background: <?php echo $options['load_color1']; ?>;
  -webkit-animation: loading-dots-middle-dots .5s linear infinite;
  -moz-animation: loading-dots-middle-dots .5s linear infinite;
  -ms-animation: loading-dots-middle-dots .5s linear infinite;
  -o-animation: loading-dots-middle-dots .5s linear infinite;
  animation: loading-dots-middle-dots .5s linear infinite;
}
#site_loader_animation i:first-child {
  -webkit-animation: loading-dots-first-dot .5s infinite;
  -moz-animation: loading-dots-first-dot .5s linear infinite;
  -ms-animation: loading-dots-first-dot .5s linear infinite;
  -o-animation: loading-dots-first-dot .5s linear infinite;
  animation: loading-dots-first-dot .5s linear infinite;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
  opacity: 0;
  filter: alpha(opacity=0);
  -webkit-transform: translate(-1em);
  -moz-transform: translate(-1em);
  -ms-transform: translate(-1em);
  -o-transform: translate(-1em);
  transform: translate(-1em);
}
#site_loader_animation i:last-child {
  -webkit-animation: loading-dots-last-dot .5s linear infinite;
  -moz-animation: loading-dots-last-dot .5s linear infinite;
  -ms-animation: loading-dots-last-dot .5s linear infinite;
  -o-animation: loading-dots-last-dot .5s linear infinite;
  animation: loading-dots-last-dot .5s linear infinite;
}
@-webkit-keyframes loading-dots-fadein{100%{opacity:1;-ms-filter:none;filter:none}}
@-moz-keyframes loading-dots-fadein{100%{opacity:1;-ms-filter:none;filter:none}}
@-o-keyframes loading-dots-fadein{100%{opacity:1;-ms-filter:none;filter:none}}
@keyframes loading-dots-fadein{100%{opacity:1;-ms-filter:none;filter:none}}
@-webkit-keyframes loading-dots-first-dot{100%{-webkit-transform:translate(1em);-moz-transform:translate(1em);-o-transform:translate(1em);-ms-transform:translate(1em);transform:translate(1em);opacity:1;-ms-filter:none;filter:none}}
@-moz-keyframes loading-dots-first-dot{100%{-webkit-transform:translate(1em);-moz-transform:translate(1em);-o-transform:translate(1em);-ms-transform:translate(1em);transform:translate(1em);opacity:1;-ms-filter:none;filter:none}}
@-o-keyframes loading-dots-first-dot{100%{-webkit-transform:translate(1em);-moz-transform:translate(1em);-o-transform:translate(1em);-ms-transform:translate(1em);transform:translate(1em);opacity:1;-ms-filter:none;filter:none}}
@keyframes loading-dots-first-dot{100%{-webkit-transform:translate(1em);-moz-transform:translate(1em);-o-transform:translate(1em);-ms-transform:translate(1em);transform:translate(1em);opacity:1;-ms-filter:none;filter:none}}
@-webkit-keyframes loading-dots-middle-dots{100%{-webkit-transform:translate(1em);-moz-transform:translate(1em);-o-transform:translate(1em);-ms-transform:translate(1em);transform:translate(1em)}}
@-moz-keyframes loading-dots-middle-dots{100%{-webkit-transform:translate(1em);-moz-transform:translate(1em);-o-transform:translate(1em);-ms-transform:translate(1em);transform:translate(1em)}}
@-o-keyframes loading-dots-middle-dots{100%{-webkit-transform:translate(1em);-moz-transform:translate(1em);-o-transform:translate(1em);-ms-transform:translate(1em);transform:translate(1em)}}
@keyframes loading-dots-middle-dots{100%{-webkit-transform:translate(1em);-moz-transform:translate(1em);-o-transform:translate(1em);-ms-transform:translate(1em);transform:translate(1em)}}
@-webkit-keyframes loading-dots-last-dot{100%{-webkit-transform:translate(2em);-moz-transform:translate(2em);-o-transform:translate(2em);-ms-transform:translate(2em);transform:translate(2em);opacity:0;-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";filter:alpha(opacity=0)}}
@-moz-keyframes loading-dots-last-dot{100%{-webkit-transform:translate(2em);-moz-transform:translate(2em);-o-transform:translate(2em);-ms-transform:translate(2em);transform:translate(2em);opacity:0;-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";filter:alpha(opacity=0)}}
@-o-keyframes loading-dots-last-dot{100%{-webkit-transform:translate(2em);-moz-transform:translate(2em);-o-transform:translate(2em);-ms-transform:translate(2em);transform:translate(2em);opacity:0;-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";filter:alpha(opacity=0)}}
@keyframes loading-dots-last-dot{100%{-webkit-transform:translate(2em);-moz-transform:translate(2em);-o-transform:translate(2em);-ms-transform:translate(2em);transform:translate(2em);opacity:0;-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";filter:alpha(opacity=0)}}
@media only screen and (max-width: 767px) {
  #site_loader_animation i  { width: 0.25em; height: 0.25em; margin: 0 0.125em; }
}
<?php } else { ?>
#site_loader_animation {
  width: 48px;
  height: 48px;
  font-size: 10px;
  text-indent: -9999em;
  position: fixed;
  top: 0;
  left: 0;
	right: 0;
	bottom: 0;
	margin: auto;
  border: 3px solid rgba(<?php echo $hex_color1; ?>,0.2);
  border-top-color: <?php echo $options['load_color1']; ?>;
  border-radius: 50%;
  -webkit-animation: loading-circle 1.1s infinite linear;
  animation: loading-circle 1.1s infinite linear;
}
@-webkit-keyframes loading-circle {
  0% { -webkit-transform: rotate(0deg); transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); transform: rotate(360deg); }
}
@media only screen and (max-width: 767px) {
	#site_loader_animation { width: 30px; height: 30px; }
}
@keyframes loading-circle {
  0% { -webkit-transform: rotate(0deg); transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); transform: rotate(360deg); }
}
<?php } ?>
<?php } ?>
