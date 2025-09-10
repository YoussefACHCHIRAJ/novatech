<?php
/**
 * Template Name: Blog Page 
 */
?>

<?php get_header(); ?>

<div id="content" class="content-area">
    <main id="content" class="site-main">
        <div class="container">
            <div class="blog-page-main">
                <div class="row">
                    <h1 class="other-pages"><?php the_title(); ?></h1>
                    <?php
                    // Set up pagination
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args = array(
                        'posts_per_page' => 10,
                        'paged' => $paged,
                        'order' => 'DESC'
                    );
                    
                    $query = new WP_Query($args);
                    
                    // Loop through the posts
                    while ($query->have_posts()) : $query->the_post();
                    ?>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="post">
                            <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail(); ?>
                                </a>
                            </div>
                            <?php endif; ?>
                            
                            <h2 class="post-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <div class="post-meta">
                                <span class="post-author"><?php echo __('by', 'plant-nest'); ?> <?php the_author_posts_link(); ?></span>
                                <span class="post-date"><?php echo get_the_date(); ?></span>
                            </div>
                            <div class="post-excerpt">
                                <?php the_excerpt(); ?>
                                <a href="<?php the_permalink(); ?>" class="read-more"><?php _e('Read More', 'plant-nest'); ?></a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>      
            </div>
        </div>
    </main>
</div>

<?php get_footer(); ?>
