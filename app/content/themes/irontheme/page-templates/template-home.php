<?php
/**
 * Template Name: Home
 */
get_header(); ?>

<?php if ( have_rows('home_layout') ):

  while ( have_rows('home_layout') ) : the_row();

    if ( get_row_layout() == 'hero' ): ?>

      <section class="hero">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <div class="hero__content">
                <h1 class="hero__title">
                  <?php the_sub_field('title'); ?>
                  <span><?php the_sub_field('subtitle'); ?></span>
                </h1>

                <div class="hero__descr">
                  <?php the_sub_field('descr'); ?>
                </div>

                <button type="button" class="scroll-down">
                  <?php ith_the_icon('mouse'); ?>
                  <span>Scroll down</span>
                </button>

              </div>
            </div>
            <div class="col-lg-6"><?php echo wp_get_attachment_image( get_sub_field('img'), 'full', '', array('class' => 'hero__img') );?></div>
          </div>
        </div>

        <img src="<?php echo THEME_URL; ?>/images/general/shape-1.png" alt="" class="parallax parallax-1">
        <img src="<?php echo THEME_URL; ?>/images/general/shape-2.png" alt="" class="parallax parallax-2">

      </section>

    <?php elseif ( get_row_layout() == 'le_miro_house' ): ?>

      <section class="about" id="about">
        <div class="container">
          <div class="row">
            <div class="col-lg-7">
              <div class="about__imgs">
              <?php if (get_sub_field('image_1')) {
                echo wp_get_attachment_image(get_sub_field('image_1'), 'full', '', array('class'=>'about__img-1'));
              } ?>
              <?php if (get_sub_field('image_2')) {
                echo wp_get_attachment_image(get_sub_field('image_2'), 'full', '', array('class'=>'about__img-2'));
              } ?>
              </div>
            </div>
            <div class="col-lg-5">
              <div class="about__content">
                <h2 class="section-title"><?php the_sub_field('title'); ?></h2>

                <?php if (get_sub_field('descr')): ?>
                  <div class="about__descr">
                    <?php the_sub_field('descr'); ?>
                  </div>
                <?php endif; ?>

                <?php if (get_sub_field('file')): ?>
                  <a href="<?php echo esc_url(get_sub_field('file')); ?>" class="btn" target="_blank"><?php _e( '[:en]View Floorplans[:es]Ver planos de planta[:de]Grundrisse anzeigen[:]', 'ith' ); ?></a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>

        <img src="<?php echo THEME_URL; ?>/images/general/shape-3.png" alt="" class="parallax parallax-3">
        <img src="<?php echo THEME_URL; ?>/images/general/shape-4.png" alt="" class="parallax parallax-4">
        <img src="<?php echo THEME_URL; ?>/images/general/shape-5.png" alt="" class="parallax parallax-5">
        <img src="<?php echo THEME_URL; ?>/images/general/shape-6.png" alt="" class="parallax parallax-6">

      </section>

    <?php elseif ( get_row_layout() == 'gallery' ): ?>

      <section class="gallery">
        <div class="container">
          <?php $gallery = get_sub_field('list');
          if ($gallery): ?>
            <div class="gallery-slider swiper-container">
              <div class="swiper-wrapper">
              <?php foreach ($gallery as $item): ?>
                <div class="gallery-slider__item swiper-slide">
                  <?php echo wp_get_attachment_image($item, 'gallery'); ?>
                </div>
              <?php endforeach; ?>
              </div>
              <div class="swiper-pagination"></div>
              <div class="swiper-button-prev">
                <?php ith_the_icon('arrow-left'); ?>
              </div>
              <div class="swiper-button-next">
                <?php ith_the_icon('arrow-right'); ?>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </section>

    <?php elseif ( get_row_layout() == 'apartments' ): ?>

      <section class="apartments" id="apartments">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <h2 class="section-title"><?php the_sub_field('title'); ?></h2>
              <div class="apartments__content">
                <?php the_sub_field('description'); ?>
                <a href="#" class="btn request_open"><?php _e( '[:en]Request Expose[:es]Solicitar exponer[:de]Expose anfordern[:]', 'ith' ); ?></a>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="apartments__img-wrap">
                <h3 class="apartments__img-title"><?php the_sub_field('img_title'); ?></h3>

                <?php if (get_sub_field('img')): ?>
                  <a href="<?php echo wp_get_attachment_image_url(get_sub_field('img'), 'full')?>" class="apartments__img" data-fancybox>
                    <?php echo wp_get_attachment_image(get_sub_field('img'), 'large'); ?>
                  </a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>

        <img src="<?php echo THEME_URL; ?>/images/general/shape-7.png" alt="" class="parallax parallax-7">
        <img src="<?php echo THEME_URL; ?>/images/general/shape-8.png" alt="" class="parallax parallax-8">
        <img src="<?php echo THEME_URL; ?>/images/general/shape-9.png" alt="" class="parallax parallax-9">

      </section>

    <?php elseif ( get_row_layout() == 'district' ): ?>

    <section class="district" id="district">
      <?php echo wp_get_attachment_image(get_sub_field('image'), 'full', '', array('class' => 'district__img')); ?>

      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="district__map">
              <?php
              $location = get_sub_field('map');
              if ( !empty($location) ):?>
                <div class="acf-map">
                  <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="block-content">
              <h2 class="section-title"><?php the_sub_field('title'); ?></h2>
              <div class="description description--right">
                <?php the_sub_field('descr'); ?>
                <a href="#" class="btn request_open"><?php _e( '[:en]Request Expose[:es]Solicitar exponer[:de]Expose anfordern[:]', 'ith' ); ?></a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <img src="<?php echo THEME_URL; ?>/images/general/shape-10.png" alt="" class="parallax parallax-10">
      <img src="<?php echo THEME_URL; ?>/images/general/shape-11.png" alt="" class="parallax parallax-11">
      <img src="<?php echo THEME_URL; ?>/images/general/shape-12.png" alt="" class="parallax parallax-12">
      <img src="<?php echo THEME_URL; ?>/images/general/shape-13.png" alt="" class="parallax parallax-13">

    </section>

    <?php elseif ( get_row_layout() == 'contacts' ): ?>

      <section class="contact" id="contact">
        <div class="container">
          <h2 class="section-title"><?php the_sub_field('title'); ?></h2>

          <div class="row">
            <?php if (get_field('address_showroom', 'option')): ?>
              <div class="col-lg-4">
                <div class="contact__col contact__col--address">
                  <p>Showroom: <?php the_field('address_showroom', 'option'); ?></p>
                </div>
              </div>
            <?php endif; ?>
            <div class="col-lg-4">
              <div class="contact__col contact__col--phone">
                <?php if (get_field('phone', 'option')): ?>
                  <a href="tel:<?php echo preg_replace('![^0-9\+]+!', '', get_field('phone', 'option')); ?>"><?php the_field('phone', 'option'); ?></a>
                <?php endif; ?>
                <?php if (get_field('phone', 'option')): ?>
                  <br>
                  <a href="mailto:<?php the_field('email', 'option'); ?>"><?php the_field('email', 'option'); ?></a>
                <?php endif; ?>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="contact__col contact__col--social">
                <?php if (get_field('fb', 'option')): ?>
                  <a href="<?php echo esc_url(get_field('fb', 'option')) ?>" target="_blank">
                    <img src="<?php echo THEME_URL; ?>/images/general/fb.svg" width="18" alt="Facebook">
                    <span>Facebook</span>
                  </a>
                <?php endif; ?>
                <?php if (get_field('insta', 'option')): ?>
                  <br>
                  <a href="<?php echo esc_url(get_field('insta', 'option')) ?>" target="_blank">
                    <img src="<?php echo THEME_URL; ?>/images/general/insta.svg" width="18" alt="Instagram">
                    <span>Instagram</span>
                  </a>
                <?php endif; ?>
              </div>
            </div>
          </div>

          <div class="contact__form-wrap">
            <?php echo do_shortcode(get_sub_field('shortcode_form')); ?>
          </div>

        </div>

        <img src="<?php echo THEME_URL; ?>/images/general/shape-3.png" alt="" class="parallax parallax-14">
        <img src="<?php echo THEME_URL; ?>/images/general/shape-5.png" alt="" class="parallax parallax-15">

      </section>

    <?php endif;

  endwhile;

endif; ?>



<?php get_footer(); ?>
