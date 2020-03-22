<?php get_header(); ?>
<div class="Single">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <header class="Single-Header">
        <?php the_title('<h1 class="Single-Title">', '</h1>'); ?>
        <h2 class="Single-Subtitle">
          <?php echo get_post_meta($post->ID, 'subtitle', true); ?>
        </h2>
        <div class="Single-Time">
          <?php if (get_the_date() != get_the_modified_date()) : ?>
            <span class="Single-Publish">公開：<?php echo esc_html(get_the_date()); ?></span>
            <time class="Single-Update">更新：<span datetime="<?php echo esc_attr(get_the_modified_date(DATE_ISO8601)); ?>"><?php echo esc_html(get_the_modified_date()); ?></span></time>
          <?php else : ?>
            <time class="Single-Publish">公開：<?php echo esc_html(get_the_date()); ?></time>
          <?php endif; ?>
        </div>
      </header>

      <div class="AD-L"></div>

      <div class="Layout-Single">  
        <?php get_template_part('/components/editor'); ?>
        <article class="Article">
          <!-- <figure class="Article-Figure">
            <?php $post_title = get_the_title();
            the_post_thumbnail('full', array('class' => 'Image Article-Image', 'alt' => $post_title)); ?>
          </figure> -->
          <figure class="Article-Figure">
            <img width="1920" height="1080" src="https://youtachannel.com/wp-content/uploads/2020/01/apple-education-pricing-201508.jpeg" class="Image Article-Image wp-post-image" alt="Apple 学割：学生向け！MacBook・iPadの購入方法・購入体験談まとめ" srcset="https://youtachannel.com/wp-content/uploads/2020/01/apple-education-pricing-201508.jpeg 1920w, https://youtachannel.com/wp-content/uploads/2020/01/apple-education-pricing-201508-720x405.jpeg 720w, https://youtachannel.com/wp-content/uploads/2020/01/apple-education-pricing-201508-360x203.jpeg 360w, https://youtachannel.com/wp-content/uploads/2020/01/apple-education-pricing-201508-1536x864.jpeg 1536w" sizes="(max-width: 1920px) 100vw, 1920px">
          </figure>
          <div class="Article-Content">
            <?php the_content(); ?>
          </div>
          <div class="Meta">
            <p class="Meta-Title">&#092; 同じタグがついた関連記事を探す &#047;</p>
            <div class="Meta-Tags">
              <?php the_category(' '); ?>
              <?php the_tags('', ''); ?>
            </div>
          </div>

          <div class="AD-L"></div>
          
          <?php get_template_part('components/share'); ?>
        </article>
      </div>
  <?php endwhile;
  endif; ?>
</div>
<?php get_template_part( 'components/youtube' ); ?>
<?php get_footer(); ?>