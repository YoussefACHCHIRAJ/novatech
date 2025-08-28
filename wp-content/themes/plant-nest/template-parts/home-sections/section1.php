<?php
/**
 * Latest Blog Posts Section - Plant Nest Free
 */
?>

<section class="plantnest-latest-posts py-5 bg-light">
  <div class="container">
    <div class="row mb-4">
      <div class="col-12 text-center">
        <h2 class="section-title"><?php echo esc_html( get_theme_mod( 'plant_nest_blog_section_title', 'Latest from the Blog' ) ); ?></h2>
      </div>
    </div>

    <div class="row">
      <?php
      $latest_query = new WP_Query(array(
        'post_type' => 'post',
        'posts_per_page' => 3,
      ));

      if ($latest_query->have_posts()) :
        while ($latest_query->have_posts()) : $latest_query->the_post(); ?>
          <div class="col-md-6 mb-4">
            <div class="card h-100 shadow-sm border-0">
              <?php if (has_post_thumbnail()) : ?>
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail('medium_large', ['class' => 'card-img-top']); ?>
                </a>
              <?php endif; ?>
              <div class="card-body">
                <h5 class="card-title">
                  <a href="<?php the_permalink(); ?>" class="text-dark text-decoration-none"><?php the_title(); ?></a>
                </h5>
                <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 18); ?></p>
              </div>
              <div class="card-footer bg-transparent border-0">
                <a href="<?php the_permalink(); ?>" class="btn btn-outline-success">Read More</a>
              </div>
            </div>
          </div>
        <?php endwhile;
        wp_reset_postdata();
      else : ?>
        <div class="col-12 text-center">
          <p><?php esc_html_e('No blog posts found.', 'plant-nest'); ?></p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>
