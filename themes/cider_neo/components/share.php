<aside class="share" role="complementary">
  <h3 class="article__label">Share</h3>
  <p class="article__text">みんなに記事をシェアする</p>

  <?php $url_encode=urlencode(get_permalink());$title_encode=urlencode(get_the_title());?>
  <ul class="share__button">
    <li class="share__item">
      <a class="share__a tw" href="https://twitter.com/share?text=<?php echo $title_encode ?>&url=<?php echo $url_encode ?>&via=yotaszk&tw_p=tweetbutton&related="yotaszk" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=600');return false;">
        <svg class="share__svg"><title>Twitterでシェア</title><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/icons.svg#i-twitter"></use></svg>
      </a>
    </li>
    <li class="share__item">
      <a class="share__a fb" href="https://www.facebook.com/sharer.php?src=bm&u=<?php echo $url_encode;?>&t=<?php echo $title_encode;?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;">
        <svg class="share__svg"><title>Facebookでシェア</title><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/icons.svg#i-facebook"></use></svg>
      </a>
    </li>
  </ul>
</aside>
