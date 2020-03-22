<?php get_header(); ?>
<?php get_template_part( 'components/youtube' ); ?>

<div class="Frontpage">
  <?php get_template_part( 'components/pickup' ); ?>
  <?php get_template_part( 'components/top-profile' ); ?>

  <div class="AD-L"></div>

<div class="Layout-Single">  

  <?php get_template_part( 'components/top-tab' ); ?>

  <section class="New">
  <h2>New</h2>
  <?php get_template_part( 'components/list' ); ?>
  </section>
</div>
</div>

<?php get_footer(); ?>