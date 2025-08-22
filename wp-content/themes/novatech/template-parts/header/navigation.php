<?php

/**
 * Header Navigation Template
 * 
 * @package NovaTech 
 */

use NovaTech\Inc\Menus;

$header_menu = Menus::get_menu_items_by_location('novatech-header-menu');
?>



<div class="tw:flex tw:lg:hidden">
    <button type="button" command="show-modal" commandfor="mobile-menu" class="tw:-m-2.5 tw:inline-flex tw:items-center tw:justify-center tw:rounded-md tw:p-2.5 tw:text-gray-200">
        <span class="tw:sr-only">Open main menu</span>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="tw:size-6">
            <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </button>
</div>

<?php if (isset($header_menu)) : ?>
    <el-popover-group class="tw:hidden tw:lg:flex tw:lg:gap-x-12">
        <div class="tw:lg:flex tw:gap-x-12 tw:hidden">
            <?php foreach ($header_menu as $item) : ?>
                <?php if ($item->menu_item_parent) {
                    continue;
                }
                $children = Menus::get_menu_children($header_menu, $item->ID);
                ?>
                <?php if (empty($children)): ?>
                    <a href="<?= esc_url($item->url) ?>" class="tw:text-sm/6 tw:font-semibold tw:text-white"><?= esc_html($item->title) ?></a>
                <?php else: ?>
                    <div class="tw:relative">
                        <button popovertarget="desktop-menu-<?= $item->ID ?>" class="tw:flex tw:items-center tw:gap-x-1 tw:text-sm/6 tw:font-semibold tw:text-white">
                            <?= esc_html($item->title) ?>
                            <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="tw:size-5 tw:flex-none tw:text-gray-500">
                                <path d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" fill-rule="evenodd" />
                            </svg>
                        </button>

                        <el-popover id="desktop-menu-<?= $item->ID ?>" anchor="bottom" popover class="tw:max-w-md tw:w-full tw:md:w-1/2 tw:overflow-hidden tw:rounded-xl tw:bg-gray-800 tw:outline-1 tw:-outline-offset-1 tw:outline-white/10 tw:transition tw:transition-discrete tw:backdrop:bg-transparent tw:open:block data-closed:tw:translate-y-1 data-closed:tw:opacity-0 data-enter:tw:duration-200 data-enter:tw:ease-out data-leave:tw:duration-150 data-leave:tw:ease-in">
                            <div class="tw:p-2">
                                <?php foreach ($children as $child): ?>
                                    <div class="tw:group tw:relative tw:flex tw:items-center tw:gap-x-6 tw:rounded-lg tw:p-2 tw:text-sm/6 hover:tw:bg-white/5">

                                        <a href="<?= esc_url($child->url) ?>" class="tw:block tw:font-semibold tw:text-white">
                                            <?= esc_html($child->title) ?>
                                        </a>
                                    </div>
                                <?php endforeach; ?>

                            </div>
                        </el-popover>
                    </div>
                <?php endif; ?>

            <?php endforeach; ?>
        </div>
    </el-popover-group>


<?php endif; ?>

<?php get_template_part('template-parts/header/navigation', 'dialog', ['menu' => $header_menu]) ?>