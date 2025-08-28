<?php
if ( ! class_exists( 'WooCommerce' ) ) return;
?>

<section class="plantnest-featured-shop py-5 position-relative bg-white">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-lg-8 text-center">
        <h2 class="section-title"><?php echo esc_html( get_theme_mod( 'plant_nest_product_section_title', 'Fresh from the Shop' ) ); ?></h2>
        <p class="lead text-muted">Curated plants hand-picked to thrive in your home. 🌱</p>
      </div>
    </div>
    <div class="row g-4">
      <?php
      $args = array(
        'post_type'      => 'product',
        'posts_per_page' => 6,
      );
      $loop = new WP_Query( $args );
      if ( $loop->have_posts() ) :
        while ( $loop->have_posts() ) : $loop->the_post();
          global $product;
          ?>
          <div class="col-lg-4 col-md-6">
            <div class="product-glass-box position-relative rounded overflow-hidden shadow-sm">
              <a href="<?php the_permalink(); ?>" class="d-block">
                <div class="product-img-wrapper overflow-hidden position-relative">
                  <?php the_post_thumbnail( 'medium_large', ['class' => 'w-100 product-img'] ); ?>
                  <span class="product-glass-price bg-white text-success fw-bold px-3 py-1 rounded-pill position-absolute top-0 start-0 m-2">
                    <?php echo $product->get_price_html(); ?>
                  </span>
                </div>
              </a>
              <div class="product-glass-info position-absolute bottom-0 start-0 end-0 text-center p-3">
                <h5 class="text-white fw-bold mb-2"><?php the_title(); ?></h5>
                <div class="product-btn-holder">
                  <?php woocommerce_template_loop_add_to_cart(); ?>
                </div>
              </div>
            </div>
          </div>
          <?php
        endwhile;
        wp_reset_postdata();
      else :
        echo '<div class="col-12 text-center">' . esc_html__( 'No products available.', 'plant-nest' ) . '</div>';
      endif;
      ?>
    </div>
  </div>
</section>
