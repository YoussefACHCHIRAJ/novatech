<?php
/**
 * Premium Hero Section - Plant Nest Free
 */
$hero_image   = get_theme_mod( 'plant_nest_hero_image', '' );
$hero_title   = get_theme_mod( 'plant_nest_hero_title', __( 'Welcome to Plant Nest', 'plant-nest' ) );
$hero_desc    = get_theme_mod( 'plant_nest_hero_desc', __( 'We love <strong>plants</strong> and we’re dedicated to care tips, indoor plant shopping, and green stories for every home.', 'plant-nest' ) );
$hero_points  = array(
    get_theme_mod( 'plant_nest_point_1', __( 'Bright indirect light', 'plant-nest' ) ),
    get_theme_mod( 'plant_nest_point_2', __( 'Water moderately, not daily', 'plant-nest' ) ),
    get_theme_mod( 'plant_nest_point_3', __( 'Keep clean monthly', 'plant-nest' ) ),
);
$hero_btn_text = get_theme_mod( 'plant_nest_hero_btn_text', __( 'Read Plant Profile', 'plant-nest' ) );
$hero_btn_url  = get_theme_mod( 'plant_nest_hero_btn_url', '#' );
?>

<section class="plantnest-hero-split">
  <div class="container">
    <div class="hero-wrapper">
      <div class="hero-image">
        <img src="<?php echo esc_url( $hero_image ); ?>" alt="<?php esc_attr_e( 'Hero Plant', 'plant-nest' ); ?>">
      </div>
      <div class="hero-content">
        <h1><?php echo esc_html( $hero_title ); ?></h1>
        <p class="hero-description"><?php echo wp_kses_post( $hero_desc ); ?></p>
        <ul class="hero-points">
          <?php foreach ( $hero_points as $point ) : ?>
            <li><i class="fas fa-leaf"></i> <?php echo esc_html( $point ); ?></li>
          <?php endforeach; ?>
        </ul>
        <a href="<?php echo esc_url( $hero_btn_url ); ?>" class="btn btn-primary"><?php echo esc_html( $hero_btn_text ); ?></a>
      </div>
    </div>
  </div>
</section>
