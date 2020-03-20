<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php bloginfo( 'name' ) ?></title>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <header class="Header">
    <div class="Layout-Split">
      <a class="Logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <?php bloginfo( 'name' ) ?>
      </a>
      <nav class="Nav">
        menu
      </nav>
    </div>
  </header>
  <main>