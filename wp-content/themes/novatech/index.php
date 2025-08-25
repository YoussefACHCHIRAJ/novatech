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
                while (have_posts()): the_post(); ?>
                    <div class="tw:bg-neutral-900/40 tw:p-4 tw:rounded tw:border tw:border-white/30 tw:relative tw:hover:scale-[1.01] tw:transition tw:duration-200">
                        <h2 class="tw:text-lg tw:font-bold tw:mb-3">
                            <a href="<?= the_permalink() ?>">
                                <span class="tw:absolute tw:inset-0 tw:size-full tw:cursor-pointer"></span>
                                <?= the_title(); ?>
                            </a>
                        </h2>
                        <div class="tw:line-clamp-2 tw:text-gray-300"><?= the_excerpt(); ?></div>
                    </div>

                <?php
                endwhile;
                ?>
            </div>
        <?php else: esc_html_e("Sorry, no posts are available.", 'novatech') ?>

        <?php endif; ?>
    </div>
</div>


<?php
get_footer();
