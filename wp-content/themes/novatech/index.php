<?php


/**
 * Main package
 * 
 * @package NovaTech
 */


get_header();


?>

<div class="tw:relative tw:isolate tw:px-6 tw:pt-14 lg:tw:px-8">
    <h1 class="tw:text-5xl tw:font-semibold tw:tracking-tight tw:text-balance tw:text-white sm:tw:text-7xl tw:mb-4">
        Nova Tech Blogs
    </h1>


    <div>
        <?php if (have_posts()): ?>

            <div class="tw:grid tw:grid-cols-1 tw:md:grid-cols-2 tw:lg:grid-cols-3 tw:gap-3">
                <?php
                while (have_posts()): the_post();
                    get_template_part('template-parts/content');
                endwhile;
                ?>
            </div>

        <?php
        else: esc_html_e("Sorry, no posts are available.", 'novatech');
        endif;
        ?>

    </div>
</div>


<?php
get_footer();
