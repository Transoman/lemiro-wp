<!doctype html>
<html <?php language_attributes(); ?> class="animation">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="format-detection" content="telephone=no">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv-printshiv.min.js"></script>
  <![endif]-->

  <style>
    html.animation {
      overflow: hidden;
    }
    .preloader {
      position: fixed;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      z-index: 200;
      background-color: #fff;
      overflow: hidden;
      transition: opacity 1s ease;
    }

    .preloader.end-animation {
      opacity: 0;
      pointer-events: none;
    }
  </style>
  <?php wp_head(); ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.5.7/lottie_light.min.js"></script>
</head>

<body <?php body_class(); ?>>

<div class="preloader" data-path="<?php echo THEME_URL; ?>/js/data.json"></div>
<script>
  var anim = lottie.loadAnimation({
    container: document.querySelector('.preloader'),
    renderer: 'svg',
    loop: true,
    autoplay: true,
    path: document.querySelector('.preloader').getAttribute('data-path')
  });

  window.addEventListener('load', function() {
    anim.addEventListener('loopComplete', function() {
      document.querySelector('html').classList.remove('animation');
      document.querySelector('.preloader').classList.add('end-animation');
      lottie.destroy();
    });
  });
</script>

<div class="wrapper">
  <header class="header">
    <div class="container">

      <div class="logo header__logo">
        <?php the_custom_logo(); ?>
      </div>

      <?php if (get_field('address', 'option')): ?>
        <div class="header__address"><?php the_field('address' , 'option'); ?></div>
      <?php endif; ?>

      <nav class="nav header__nav">
        <?php
        wp_nav_menu( array(
          'theme_location' => 'primary',
          'menu'            => '', 
          'container'       => '', 
          'container_class' => '', 
          'container_id'    => '',
          'menu_class'      => 'nav-list', 
          'menu_id'         => '',
        ) );
        ?>

        <?php qtranxf_generateLanguageSelectCode('text'); ?>
      </nav>

      <div class="nav-overlay"></div>

      <div class="header__language">
        <?php qtranxf_generateLanguageSelectCode('text'); ?>
      </div>

      <button type="button" class="nav-toggle">
        <span class="nav-toggle__line"></span>
      </button>

    </div>
  </header><!-- /.header-->

  <div class="content">