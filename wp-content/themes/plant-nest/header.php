<?php
/**
 * The Header for our theme.
 *
 * @package plant-nest
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <?php do_action( 'wp_body_open' ); ?>
  
  <a class="skip-link screen-reader-text" href="#content"><?php echo esc_html__('Skip to content', 'plant-nest'); ?></a>

  <?php
$email    = get_theme_mod( 'aether_topbar_email', 'info@example.com' );
$phone    = get_theme_mod( 'aether_topbar_phone', '+91-9876543210' );
$facebook = get_theme_mod( 'aether_topbar_facebook', '#' );
$twitter  = get_theme_mod( 'aether_topbar_twitter', '#' );
$insta    = get_theme_mod( 'aether_topbar_instagram', '#' );
?>
<div class="top-bar bg-light border-bottom py-2">
    <div class="container-fluid d-flex justify-content-between align-items-center flex-wrap gap-2">
        <div class="topbar-left d-flex flex-wrap gap-3 small text-muted align-items-center">
            <span><span class="dashicons dashicons-calendar-alt"></span> <?php echo esc_html( date_i18n( get_option( 'date_format' ) ) ); ?></span>
            <?php if ( $email ) : ?>
                <span><span class="dashicons dashicons-email"></span> <a href="mailto:<?php echo antispambot( $email ); ?>"><?php echo esc_html( $email ); ?></a></span>
            <?php endif; ?>
            <?php if ( $phone ) : ?>
                <span><span class="dashicons dashicons-phone"></span> <a href="tel:<?php echo esc_attr( $phone ); ?>"><?php echo esc_html( $phone ); ?></a></span>
            <?php endif; ?>
        </div>
        <div class="topbar-right d-flex gap-3 small">
            <?php if ( $facebook ) : ?>
                <a href="<?php echo esc_url( $facebook ); ?>"><span class="dashicons dashicons-facebook"></span></a>
            <?php endif; ?>
            <?php if ( $twitter ) : ?>
                <a href="<?php echo esc_url( $twitter ); ?>"><span class="dashicons dashicons-twitter"></span></a>
            <?php endif; ?>
            <?php if ( $insta ) : ?>
                <a href="<?php echo esc_url( $insta ); ?>"><span class="dashicons dashicons-instagram"></span></a>
            <?php endif; ?>
        </div>
    </div>
</div>

  <div class="container-fluid header-border">
    <div class="row">
      <div class="col-lg-3 col-6">
        <div class="site-branding">
          <?php if ( has_custom_logo() ) : ?>
            <div class="site-logo"><?php the_custom_logo(); ?></div>
          <?php else : ?>
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <p class="site-description"><?php bloginfo( 'description' ); ?></p>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-lg-9 col-6">
        <header id="Main-head-class" class="site-header">
          <?php do_action( 'plant_nest_before_header' ); ?>
          <?php get_template_part('template-parts/header/header-file'); ?>
        </header>
      </div>

    </div>
  </div>

  <!-- End of Header -->
