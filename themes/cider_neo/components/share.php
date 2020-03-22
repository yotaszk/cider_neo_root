<aside class="Share" role="complementary">
  <p class="Share-Title">&#092;	記事をシェアする &#047;</p>
  <?php $url_encode=urlencode(get_permalink());$title_encode=urlencode(get_the_title());?>
  <ul class="Share-Buttons">
    <li>
      <a class="Share-Button" href="https://twitter.com/share?text=<?php echo $title_encode ?>&url=<?php echo $url_encode ?>&via=yotaszk&tw_p=tweetbutton&related="yotaszk" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=600');return false;">
        <img class="Share-Icon" src="<?php echo get_template_directory_uri(); ?>/icons/twitter.svg">
        <span class="Share-Label">ツイートする</span>
      </a>
    </li>
    <li>
      <a class="Share-Button" href="https://www.facebook.com/sharer.php?src=bm&u=<?php echo $url_encode;?>&t=<?php echo $title_encode;?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;">
        <img class="Share-Icon" src="<?php echo get_template_directory_uri(); ?>/icons/facebook.svg">
        <span class="Share-Label">シェアする</span>
      </a>
    </li>
  </ul>
</aside>
