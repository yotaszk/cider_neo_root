<?php

add_theme_support('title-tag');
// support thumbnails
add_theme_support('post-thumbnails');

// inport resources
function theme_name_scripts()
{
  wp_enqueue_style('nomalize', '//cdnjs.cloudflare.com/ajax/libs/modern-normalize/0.6.0/modern-normalize.min.css');
  wp_enqueue_style('style-name', get_stylesheet_uri());
  // wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
}
add_action('wp_enqueue_scripts', 'theme_name_scripts');

//remove
add_theme_support('automatic-feed-links');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);

//youtube
if (!function_exists('st_wrap_iframe_in_div')) {
  function st_wrap_iframe_in_div($the_content)
  {
    $the_content =
      preg_replace(
        '/<iframe[^>]+?youtube\.com[^<]+?<\/iframe>/is',
        '<div class="youtube-wrap">${0}</div>',
        $the_content
      );

    return $the_content;
  }
}

if (!function_exists('st_singular_wrap_iframe_in_div')) {
  function st_singular_wrap_iframe_in_div($the_content)
  {
    if (is_singular()) {
      $the_content = st_wrap_iframe_in_div($the_content);
    }

    return $the_content;
  }
}
add_filter('the_content', 'st_singular_wrap_iframe_in_div');

//RSS add image
function add_thumb_to_RSS($content)
{
  global $post;
  if (has_post_thumbnail($post->ID)) {
    $content = '' . get_the_post_thumbnail($post->ID, 'thumbnail') . '' . $content;
  }
  return $content;
}
add_filter('the_excerpt_rss', 'add_thumb_to_RSS');
add_filter('the_content_feed', 'add_thumb_to_RSS');

//RSS add copyright
function st_rss_feed_copyright($content)
{
  $content = $content . '<p>Copyright &copy; ' . esc_html(date('Y')) .
    ' <a href="' . esc_url(home_url()) . '">' .
    apply_filters('bloginfo', get_bloginfo('name'), 'name') .
    '</a> All Rights Reserved.</p>';
  return $content;
}
add_filter('the_excerpt_rss', 'st_rss_feed_copyright');
add_filter('the_content_feed', 'st_rss_feed_copyright');

//code
function escape_my_code($attr, $content = null)
{
  $content = clean_pre($content);
  $content = trim($content);
  $content = str_replace("\t", '    ', $content);
  $content = str_replace('<', '&lt;', $content);
  return '<pre><code class="prettyprint linenums">' . $content . '</code></pre>';
}
add_shortcode('code', 'escape_my_code');

//AMP GA
add_filter('amp_post_template_analytics', 'xyz_amp_add_custom_analytics');
function xyz_amp_add_custom_analytics($analytics)
{
  if (!is_array($analytics)) {
    $analytics = array();
  }
  $analytics['xyz-googleanalytics'] = array(
    'type' => 'googleanalytics',
    'attributes' => array(
      // 'data-credentials' => 'include',
    ),
    'config_data' => array(
      'vars' => array(
        'account' => "UA-54717500-1"
      ),
      'triggers' => array(
        'trackPageview' => array(
          'on' => 'visible',
          'request' => 'pageview',
        ),
      ),
    ),
  );
  return $analytics;
}

//AMP Logo
add_filter('amp_post_template_metadata', 'xyz_amp_modify_json_metadata', 10, 2);
function xyz_amp_modify_json_metadata($metadata, $post)
{
  $metadata['publisher']['logo'] = array(
    '@type' => 'ImageObject',
    'url' => "//youtachannel.com/wp-content/themes/cider_card/img/logo.png",
    'width' => "200",
    'height' => "40",
  );
  return $metadata;
}

//iphoneアフィリ
function mobile_links_func()
{
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

//Google ads
function add_ads_h2_before($the_content)
{
  // AMPチェック
  $is_amp = false;
  if (function_exists('is_amp_endpoint') && is_amp_endpoint()) {
    $is_amp = true;
  }

  // AMPのとき
  if ($is_amp) {
    $amp_ad = <<< EOF
 <aside class="ads">
 <!-- AMPページ -->
 <amp-ad width="100vw" height=320
 type="adsense"
 data-ad-client="ca-pub-6699082147104021"
 data-ad-slot="2639832677"
 data-ad-layout="in-article"
 data-auto-format="rspv"
 data-full-width>
 <div overflow></div>
 </amp-ad>
 </aside>
EOF;

    $h2 = '/^<h2.*?>.+?<\/h2>$/im';
    if (preg_match_all($h2, $the_content, $h2s)) {
      if ($h2s[0]) {
        if ($h2s[0][0]) {
          $the_content  = str_replace($h2s[0][0], $amp_ad . $h2s[0][0], $the_content);
        }
      }
    }

    //通常のとき
  } else {

    $sp_ad = <<< EOF
 <aside class="article_ads" role="complementary">
 <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
 <ins class="adsbygoogle"
 style="display:block; text-align:center;"
 data-ad-layout="in-article"
 data-ad-format="fluid"
 data-ad-client="ca-pub-6699082147104021"
 data-ad-slot="2434884782"></ins>
 <script>
 (adsbygoogle = window.adsbygoogle || []).push({});
 </script>
 </aside>
EOF;

    $h2 = '/^<h2.*?>.+?<\/h2>$/im';
    if (preg_match_all($h2, $the_content, $h2s)) {
      if ($h2s[0]) {
        if ($h2s[0][0]) {
          $the_content  = str_replace($h2s[0][0], $sp_ad . $h2s[0][0], $the_content);
        }
      }
    }
  }
  return $the_content;
}
add_filter('the_content', 'add_ads_h2_before');
