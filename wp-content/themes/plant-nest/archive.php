<?php
/**
 * The template for displaying archive pages (Category, Tag, Author, etc.)
 * @package plant-nest
 */

get_header(); ?>

<main id="content">
    <section class="archive-section py-5">
        <div class="container">
            <header class="archive-header text-center mb-5">
                <h1 class="archive-title"><?php the_archive_title(); ?></h1>
                <p class="archive-description text-muted"><?php the_archive_description(); ?></p>
            </header>

            <div class="row g-4">
                <div class="col-lg-8 col-md-8 col-12">
                    <?php if ( have_posts() ) : ?>
                        <div class="row g-4">
                            <?php while ( have_posts() ) : the_post(); ?>
                                <div class="col-md-6">
                                    <article class="card h-100 shadow-sm border-0 post-archive-item">
                                        <?php if ( has_post_thumbnail() ) : ?>
                                            <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                                                <?php the_post_thumbnail('medium_large', array('class' => 'card-img-top img-fluid')); ?>
                                            </a>
                                        <?php endif; ?>

                                        <div class="card-body">
                                            <?php if ( get_theme_mod( 'plant_nest_post_meta_toggle_switch_control', true ) ) : ?>
                                                <div class="text-muted small mb-2">
                                                    <span><?php echo esc_html( get_the_date() ); ?></span>
                                                    <span class="mx-2">|</span>
                                                    <span><?php echo esc_html( get_the_author() ); ?></span>
                                                </div>
                                            <?php endif; ?>

                                            <h2 class="card-title h5">
                                                <a href="<?php the_permalink(); ?>" class="text-dark text-decoration-none">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h2>

                                            <p class="card-text text-muted">
                                                <?php echo wp_trim_words( get_the_excerpt(), 20 ); ?>
                                            </p>
                                        </div>

                                        <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
                                            <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-primary">
                                                <?php esc_html_e( 'Read More', 'plant-nest' ); ?>
                                            </a>
                                            <div class="social-share small">
                                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( get_permalink() ); ?>" target="_blank" class="me-2 text-secondary"><i class="fab fa-facebook-f"></i></a>
                                                <a href="https://twitter.com/intent/tweet?text=<?php echo esc_attr( get_the_title() ); ?>&url=<?php echo esc_url( get_permalink() ); ?>" target="_blank" class="me-2 text-secondary"><i class="fab fa-twitter"></i></a>
                                                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url( get_permalink() ); ?>&title=<?php echo esc_attr( get_the_title() ); ?>" target="_blank" class="text-secondary"><i class="fab fa-linkedin-in"></i></a>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            <?php endwhile; ?>
                        </div>

                        <!-- Pagination -->
                        <div class="mt-4">
                            <?php
                            the_posts_pagination( array(
                                'mid_size'  => 2,
                                'prev_text' => __('« Prev', 'plant-nest'),
                                'next_text' => __('Next »', 'plant-nest'),
                                'screen_reader_text' => '',
                            ) );
                            ?>
                        </div>

                    <?php else : ?>
                        <p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'plant-nest' ); ?></p>
                    <?php endif; ?>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4 col-md-4 col-12">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
