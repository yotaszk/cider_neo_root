<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=yes,viewport-fit=cover">
  <title><?php bloginfo( 'name' ) ?></title>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <header class="Header">
    <div class="Layout-Split">
      <a class="Logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">

        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="YCH">
        <span>
          <?php bloginfo( 'name' ) ?>
        </span>
      </a>
      <nav class="Nav">
        menu
      </nav>
    </div>
  </header>
  <main>