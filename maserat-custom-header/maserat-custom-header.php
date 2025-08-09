<?php
/**
 * Plugin Name: Maserat Custom Header
 * Description: Renders the Maserat header via shortcode [maserat_custom_header].
 * Version: 1.0.0
 * Author: Maserat
 */
if ( ! defined('ABSPATH') ) exit;
function maserat_ch_enqueue(){
  $base = plugin_dir_path(__FILE__);
  $url  = plugin_dir_url(__FILE__);
  $css_v = file_exists($base.'assets/css/header-style.css') ? filemtime($base.'assets/css/header-style.css') : '1.0.0';
  $js_v  = file_exists($base.'assets/js/header-script.js')  ? filemtime($base.'assets/js/header-script.js')  : '1.0.0';
  wp_enqueue_style('fa6','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css',[], '6.5.2');
  wp_enqueue_style('maserat-ch', $url.'assets/css/header-style.css', [], $css_v);
  wp_enqueue_script('maserat-ch', $url.'assets/js/header-script.js', [], $js_v, true);
}
function maserat_ch_shortcode(){
  maserat_ch_enqueue();
  ob_start(); include plugin_dir_path(__FILE__).'templates/header-template.php'; return ob_get_clean();
}
add_shortcode('maserat_custom_header', 'maserat_ch_shortcode');
