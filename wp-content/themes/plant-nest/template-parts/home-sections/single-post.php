<?php
/**
 * Plant Nest - Featured Posts Section (Free, Bootstrap version)
 */
$featured_title = get_theme_mod('plant_nest_featured_title', __('Featured Reads', 'plant-nest'));
$category_id = get_theme_mod('plant_nest_featured_category', '');

$args = array(
    'posts_per_page' => 3,
    'ignore_sticky_posts' => true,
);

if ($category_id) {
    $args['cat'] = absint($category_id);
}

$featured_query = new WP_Query($args);

if ($featured_query->have_posts()) : ?>
<section class="aether-featured-posts py-5 bg-light">

    <div class="container">
        <?php if ($featured_title) : ?>
            <h2 class="text-center mb-5"><?php echo esc_html($featured_title); ?></h2>
        <?php endif; ?>

        <div class="row justify-content-center g-4">
            <?php while ($featured_query->have_posts()) : $featured_query->the_post(); ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium', ['class' => 'card-img-top']); ?>
                            <?php else : ?>
                                <img src='<?php echo esc_url( get_template_directory_uri() . "/assets/images/placeholder.png" ); ?>' class="card-img-top" alt="<?php the_title_attribute(); ?>">
                            <?php endif; ?>
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="<?php the_permalink(); ?>" class="text-dark text-decoration-none"><?php the_title(); ?></a>
                            </h5>
                        </div>
                    </div>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</section>
<?php endif; ?>
