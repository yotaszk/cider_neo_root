<?php get_header(); ?>
<?php get_template_part('components/youtube'); ?>
<div class="Frontpage">
  <?php get_template_part('components/pickup'); ?>
  <?php get_template_part('components/profile'); ?>
  <aside class="header_ads">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-6699082147104021" data-ad-slot="7387828569" data-ad-format="auto"></ins>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
  </aside>
  <div class="Layout-Single">
    <?php get_template_part('components/tab'); ?>
    <section class="New">
      <h2 class="New-Heading">New</h2>
      <?php get_template_part('components/list'); ?>
    </section>
  </div>
</div>

<?php get_footer(); ?>