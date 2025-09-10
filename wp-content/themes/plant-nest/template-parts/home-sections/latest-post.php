<?php
/**
 * Hero Section - Plant Nest Free
 */
$hero_heading = get_theme_mod('plant_nest_hero_heading', __('Welcome to Plant Nest', 'plant-nest'));
$hero_subheading = get_theme_mod('plant_nest_hero_subheading', __('A calm space for your mindful words.', 'plant-nest'));
$hero_button_text = get_theme_mod('plant_nest_hero_button_text', __('Read the Blog', 'plant-nest'));
$hero_button_url  = get_theme_mod('plant_nest_hero_button_url', '#');
$hero_bg_image = get_theme_mod('plant_nest_hero_bg', get_template_directory_uri() . '/assets/images/hero-bg.jpg');
?>

<section class="aether-hero" style="background-image: url('<?php echo esc_url($hero_bg_image); ?>');">
  <div class="aether-hero-overlay"></div>
  <div class="aether-hero-content container">
    <h1 class="aether-hero-title"><?php echo esc_html($hero_heading); ?></h1>
    <p class="aether-hero-subtitle"><?php echo esc_html($hero_subheading); ?></p>
    <?php if ( $hero_button_text ) : ?>
      <a href="<?php echo esc_url($hero_button_url); ?>" class="aether-hero-btn"><?php echo esc_html($hero_button_text); ?></a>
    <?php endif; ?>
  </div>
</section>
