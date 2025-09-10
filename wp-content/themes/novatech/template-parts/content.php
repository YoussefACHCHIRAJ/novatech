<?php

/**
 * Content Template
 * 
 * @package NovaTech
 */
?>

<div class="tw:bg-neutral-900/40 tw:p-4 tw:rounded tw:border tw:border-white/30 tw:relative tw:hover:scale-[1.01] tw:transition tw:duration-200">
    <h2 class="tw:text-lg tw:font-bold tw:mb-3">
        <a href="<?= the_permalink() ?>">
            <span class="tw:absolute tw:inset-0 tw:size-full tw:cursor-pointer"></span>
            <?= the_title(); ?>
        </a>
    </h2>
    <div class="tw:line-clamp-2 tw:text-gray-300"><?= the_excerpt(); ?></div>
</div>