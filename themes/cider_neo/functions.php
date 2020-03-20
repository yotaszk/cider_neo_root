<?php

// support thumbnails
add_theme_support( 'post-thumbnails' );

// inport resources
function theme_name_scripts() {
	wp_enqueue_style( 'nomalize', '//cdnjs.cloudflare.com/ajax/libs/modern-normalize/0.6.0/modern-normalize.min.css' );
	wp_enqueue_style( 'style-name', get_stylesheet_uri() );
	// wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );

//remove
add_theme_support( 'automatic-feed-links' );
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action( 'wp_head', 'feed_links_extra', 3);
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action('wp_head','rest_output_link_wp_head');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);

//youtube
if ( !function_exists( 'st_wrap_iframe_in_div' ) ) {
  function st_wrap_iframe_in_div( $the_content ) {
    $the_content =
    preg_replace( '/<iframe[^>]+?youtube\.com[^<]+?<\/iframe>/is',
      '<div class="youtube-wrap">${0}</div>',
      $the_content );

    return $the_content;
  }
}

if ( !function_exists( 'st_singular_wrap_iframe_in_div' ) ) {
  function st_singular_wrap_iframe_in_div( $the_content ) {
    if ( is_singular() ) {
      $the_content = st_wrap_iframe_in_div( $the_content );
    }

    return $the_content;
  }
}
add_filter('the_content','st_singular_wrap_iframe_in_div');

//iphoneアフィリ
function mobile_links_func() {
  return '<div class="mobile-links-wrap">
  <div class="mobile-links-title">新型iPhoneの予約はこちら</div>
  <ul class="mobile-links-ul">
    <li class="mobile-links-item c-apple"><a href="https://apple.sjv.io/c/1403921/548367/7648">Apple公式サイト</a></li>
    <li class="mobile-links-item c-docomo"><a href="//ck.jp.ap.valuecommerce.com/servlet/referral?sid=3243923&pid=885371442"><img src="//ad.jp.ap.valuecommerce.com/servlet/gifbanner?sid=3243923&pid=885371442" height="1" width="1" border="0">ドコモショップ</a></li>
    <li class="mobile-links-item c-au"><a href="//ck.jp.ap.valuecommerce.com/servlet/referral?sid=3243923&pid=885371675"><img src="//ad.jp.ap.valuecommerce.com/servlet/gifbanner?sid=3243923&pid=885371675" height="1" width="1" border="0">auショップ</a></li>
    <li class="mobile-links-item c-softbank"><a href="//ck.jp.ap.valuecommerce.com/servlet/referral?sid=3243923&pid=885371678"><img src="//ad.jp.ap.valuecommerce.com/servlet/gifbanner?sid=3243923&pid=885371678" height="1" width="1" border="0">ソフトバンク</a></li>
  </ul>
  </div>';
}
add_shortcode('mobile_links', 'mobile_links_func');
