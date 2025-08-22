<?php

/**
 * Mobile Navigation Dialog Template
 * 
 * @package NovaTech
 */

use NovaTech\Inc\Menus;

$args = wp_parse_args($args, ['menu' => null]);

$menu = $args['menu'];
?>

<el-dialog>
    <dialog id="mobile-menu" class="tw:backdrop:bg-transparent tw:lg:hidden">
        <div tabindex="0" class="tw:fixed tw:inset-0 tw:focus:outline-none">
            <el-dialog-panel class="tw:fixed tw:inset-y-0 tw:right-0 tw:z-50 tw:w-full tw:overflow-y-auto tw:bg-gray-900 tw:p-6 tw:sm:max-w-sm tw:sm:ring-1 tw:sm:ring-gray-100/10">
                <div class="tw:flex tw:items-center tw:justify-between">
                    <a href="/" class="tw:-m-1.5 tw:p-1.5">
                        <span class="tw:sr-only">Your Company</span>
                        <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="" class="tw:h-8 tw:w-auto" />
                    </a>
                    <button type="button" command="close" commandfor="mobile-menu" class="tw:-m-2.5 tw:rounded-md tw:p-2.5 tw:text-gray-400">
                        <span class="tw:sr-only">Close menu</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="tw:size-6">
                            <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
                <div class="tw:mt-6 tw:flow-root">
                    <div class="tw:-my-6 tw:divide-y tw:divide-white/10">
                        <?php if ($menu): ?>
                            <div class="tw:space-y-2 tw:py-6">
                                <?php foreach ($menu as $item): ?>
                                    <?php
                                    if ($item->menu_item_parent) {
                                        continue;
                                    }

                                    $children = Menus::get_menu_children($menu, $item->ID);

                                    if (empty($children)):
                                    ?>
                                        <a href="<?= esc_url($item->url) ?>" class="tw:-mx-3 tw:block tw:rounded-lg tw:px-3 tw:py-2 tw:text-base/7 tw:font-semibold tw:text-white hover:tw:bg-white/5"><?= esc_html($item->title) ?></a>
                                    <?php else: ?>
                                        <div class="tw:-mx-3">
                                            <button type="button" command="--toggle" commandfor="products" class="tw:flex tw:w-full tw:items-center tw:justify-between tw:rounded-lg tw:py-2 tw:pr-3.5 tw:pl-3 tw:text-base/7 tw:font-semibold tw:text-white hover:tw:bg-white/5">
                                                <?= esc_html($item->title) ?>
                                                <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="tw:size-5 tw:flex-none in-aria-expanded:tw:rotate-180">
                                                    <path d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" fill-rule="evenodd" />
                                                </svg>
                                            </button>
                                            <el-disclosure id="products" hidden class="tw:mt-2 tw:block tw:space-y-2">
                                                <?php foreach ($children as $child): ?>
                                                    <a href="<?= esc_url($child->url) ?>" class="tw:block tw:rounded-lg tw:py-2 tw:pr-3 tw:pl-6 tw:text-sm/7 tw:font-semibold tw:text-white hover:tw:bg-white/5"><?= esc_html($child->title) ?></a>
                                                <?php endforeach; ?>
                                            </el-disclosure>
                                        </div>
                                    <?php endif; ?>


                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <div class="tw:py-6">
                            <a href="#" class="tw:-mx-3 tw:block tw:rounded-lg tw:px-3 tw:py-2.5 tw:text-base/7 tw:font-semibold tw:text-white hover:tw:bg-white/5">Log in</a>
                        </div>
                    </div>
                </div>
            </el-dialog-panel>
        </div>
    </dialog>
</el-dialog>