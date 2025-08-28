<?php
/**
 * Category Template
 * Template for displaying posts in a specific category with pagination.
 */

get_header(); ?>

<div class="container my-5">
    <h1 class="mb-4">
        <?php single_cat_title(); ?>
    </h1>

    <?php if ( have_posts() ) : ?>
        <div class="row">
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( 'medium', ['class' => 'card-img-top'] ); ?>
                            </a>
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h5>
                            <p class="card-text">
                                <?php echo wp_trim_words( get_the_excerpt(), 20 ); ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <!-- Pagination -->
       <div class="pagination-wrapper mt-4">
            <?php
            the_posts_pagination( array(
                'mid_size'  => 2,
                'prev_text' => '« Prev',
                'next_text' => 'Next »',
            ) );
            ?>
        </div>

    <?php else : ?>
        <p><?php _e( 'No posts found in this category.', 'plant-nest' ); ?></p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
