<?php
/**
 * The main template file.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package plant-nest
 */

get_header();
?>

<main id="content">
  <div class="container-fluid">
    <div class="row">
      <section class="col-lg-8 col-md-8 col-12 content-area">
        <?php if ( have_posts() ) : ?>
          <div class="row">
            <?php
            $post_counter = 0;
            while ( have_posts() ) : the_post();
              $post_counter++;
            ?>
              <div class="col-lg-6 col-md-6 col-12">
                <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                  <div class="main-index">
                  <header class="entry-header">
                    <div class="class-category">
                      <span class="cat-links"><?php the_category(', '); ?></span>
                    </div>
                    <?php if ( has_post_thumbnail() ) : ?>
                      <div class="post-thumbnail">
                        <a href="<?php the_permalink(); ?>">
                          <?php the_post_thumbnail('large'); ?>
                        </a>
                      </div>
                    <?php endif; ?>
                    <div class="entry-meta">
                      <span class="posted-on"><?php echo get_the_date(); ?></span>
                      <span class="separator">|</span>
                      <span class="byline"><?php echo __('by', 'plant-nest'); ?> <?php the_author_posts_link(); ?></span>
                    </div>
                    <h2 class="entry-title">
                      <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                    </h2>
                  </header>
                  <div class="entry-content">
                    <?php the_excerpt(); ?>
                  </div>
                  <footer class="entry-footer">
                    <a href="<?php the_permalink(); ?>" class="read-more"><?php _e('Read More', 'plant-nest'); ?></a>
                  </footer>
                  </div>
                </article>
              </div>

              <?php
              // Close row div after every second post
              if ( $post_counter % 2 == 0 ) {
                echo '</div><div class="row">';
              }
            endwhile;
            ?>
          </div> <!-- End .row -->
          <div class="pagination">
            <?php the_posts_pagination( array(
              'prev_text'          => __( 'Previous', 'plant-nest' ),
              'next_text'          => __( 'Next', 'plant-nest' ),
              'before_page_number' => '<span class="screen-reader-text">' . __( 'Page', 'plant-nest' ) . ' </span>',
            ) ); ?>
          </div>
        <?php else : ?>
          <?php get_template_part( 'template-parts/content', 'none' ); ?>
        <?php endif; ?>
      </section>

      <aside class="col-lg-4 col-md-4 col-12 sidebar-area">
        <?php get_sidebar(); ?>
      </aside>
    </div>
  </div>

  <?php if ( comments_open() || get_comments_number() ) : ?>
    <div class="container comments-section">
      <?php comments_template(); ?>
    </div>
  <?php endif; ?>
</main>

<?php
get_footer();
?>
