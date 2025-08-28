<?php
/**
 * Featured Categories Section - Bootstrap + Loop
 */

$section_title = get_theme_mod( 'plant_nest_cat_section_title', __( 'Explore Plant Types', 'plant-nest' ) );
?>

<section class="plantnest-featured-categories py-5 bg-white">
  <div class="container">
    <div class="row mb-4">
      <div class="col-12 text-center">
        <h2 class="section-title"><?php echo esc_html( $section_title ); ?></h2>
      </div>
    </div>
    <div class="row justify-content-center">
      <?php
      for ( $i = 1; $i <= 4; $i++ ) :
        $title = get_theme_mod( "plant_nest_cat{$i}_title", '' );
        $url   = get_theme_mod( "plant_nest_cat{$i}_url", '#' );
        $icon  = get_theme_mod( "plant_nest_cat{$i}_icon", '🌿' ); // Emoji icon fallback
        if ( $title ) :
      ?>
        <div class="col-md-3 col-sm-6 mb-4">
          <a href="<?php echo esc_url( $url ); ?>" class="card text-center border-0 shadow-sm h-100 category-box text-decoration-none">
            <div class="card-body">
              <div class="display-4 mb-3 text-success"><?php echo esc_html( $icon ); ?></div>
              <h5 class="card-title text-dark fw-semibold"><?php echo esc_html( $title ); ?></h5>
            </div>
          </a>
        </div>
      <?php
        endif;
      endfor;
      ?>
    </div>
  </div>
</section>
