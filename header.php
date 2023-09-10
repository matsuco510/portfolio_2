<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <?php wp_head(); ?>

</head>
<body>
  <header id="header">
    <a href="<?php echo home_url('/')?>" class="header__logo logo">PORTFOLIO</a>
    <!-- <ul class="header__items"> -->
    <?php
      wp_nav_menu(
        array(
          'depth' => 1,
          'theme_location' => 'global',
          'container' => '',
          'menu_class' => 'header__items',
        )
      );
    ?>
    <!-- </ul> -->
  </header>
