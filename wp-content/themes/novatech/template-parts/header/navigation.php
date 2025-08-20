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

<el-popover-group class="tw:hidden tw:lg:flex tw:lg:gap-x-12">
    <div class="tw:relative">
        <button popovertarget="desktop-menu-product" class="tw:flex tw:items-center tw:gap-x-1 tw:text-sm/6 tw:font-semibold tw:text-white">
            Product
            <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="tw:size-5 tw:flex-none tw:text-gray-500">
                <path d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" fill-rule="evenodd" />
            </svg>
        </button>

        <el-popover id="desktop-menu-product" anchor="bottom" popover class="tw:w-screen tw:max-w-md tw:overflow-hidden tw:rounded-3xl tw:bg-gray-800 tw:outline-1 tw:-outline-offset-1 tw:outline-white/10 tw:transition tw:transition-discrete [--anchor-gap:--spacing(3)] tw:backdrop:bg-transparent tw:open:block data-closed:tw:translate-y-1 data-closed:tw:opacity-0 data-enter:tw:duration-200 data-enter:tw:ease-out data-leave:tw:duration-150 data-leave:tw:ease-in">
            <div class="tw:p-4">
                <div class="tw:group tw:relative tw:flex tw:items-center tw:gap-x-6 tw:rounded-lg tw:p-4 tw:text-sm/6 hover:tw:bg-white/5">
                    <div class="tw:flex tw:size-11 tw:flex-none tw:items-center tw:justify-center tw:rounded-lg tw:bg-gray-700/50 group-hover:tw:bg-gray-700">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="tw:size-6 tw:text-gray-400 group-hover:tw:text-white">
                            <path d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="tw:flex-auto">
                        <a href="#" class="tw:block tw:font-semibold tw:text-white">
                            Analytics
                            <span class="tw:absolute tw:inset-0"></span>
                        </a>
                        <p class="tw:mt-1 tw:text-gray-400">Get a better understanding of your traffic</p>
                    </div>
                </div>
                <div class="tw:group tw:relative tw:flex tw:items-center tw:gap-x-6 tw:rounded-lg tw:p-4 tw:text-sm/6 hover:tw:bg-white/5">
                    <div class="tw:flex tw:size-11 tw:flex-none tw:items-center tw:justify-center tw:rounded-lg tw:bg-gray-700/50 group-hover:tw:bg-gray-700">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="tw:size-6 tw:text-gray-400 group-hover:tw:text-white">
                            <path d="M15.042 21.672 13.684 16.6m0 0-2.51 2.225.569-9.47 5.227 7.917-3.286-.672ZM12 2.25V4.5m5.834.166-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243-1.59-1.59" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="tw:flex-auto">
                        <a href="#" class="tw:block tw:font-semibold tw:text-white">
                            Engagement
                            <span class="tw:absolute tw:inset-0"></span>
                        </a>
                        <p class="tw:mt-1 tw:text-gray-400">Speak directly to your customers</p>
                    </div>
                </div>
                <div class="tw:group tw:relative tw:flex tw:items-center tw:gap-x-6 tw:rounded-lg tw:p-4 tw:text-sm/6 hover:tw:bg-white/5">
                    <div class="tw:flex tw:size-11 tw:flex-none tw:items-center tw:justify-center tw:rounded-lg tw:bg-gray-700/50 group-hover:tw:bg-gray-700">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="tw:size-6 tw:text-gray-400 group-hover:tw:text-white">
                            <path d="M7.864 4.243A7.5 7.5 0 0 1 19.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 0 0 4.5 10.5a7.464 7.464 0 0 1-1.15 3.993m1.989 3.559A11.209 11.209 0 0 0 8.25 10.5a3.75 3.75 0 1 1 7.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 0 1-3.6 9.75m6.633-4.596a18.666 18.666 0 0 1-2.485 5.33" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="tw:flex-auto">
                        <a href="#" class="tw:block tw:font-semibold tw:text-white">
                            Security
                            <span class="tw:absolute tw:inset-0"></span>
                        </a>
                        <p class="tw:mt-1 tw:text-gray-400">Your customers’ data will be safe and secure</p>
                    </div>
                </div>
                <div class="tw:group tw:relative tw:flex tw:items-center tw:gap-x-6 tw:rounded-lg tw:p-4 tw:text-sm/6 hover:tw:bg-white/5">
                    <div class="tw:flex tw:size-11 tw:flex-none tw:items-center tw:justify-center tw:rounded-lg tw:bg-gray-700/50 group-hover:tw:bg-gray-700">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="tw:size-6 tw:text-gray-400 group-hover:tw:text-white">
                            <path d="M13.5 16.875h3.375m0 0h3.375m-3.375 0V13.5m0 3.375v3.375M6 10.5h2.25a2.25 2.25 0 0 0 2.25-2.25V6a2.25 2.25 0 0 0-2.25-2.25H6A2.25 2.25 0 0 0 3.75 6v2.25A2.25 2.25 0 0 0 6 10.5Zm0 9.75h2.25A2.25 2.25 0 0 0 10.5 18v-2.25a2.25 2.25 0 0 0-2.25-2.25H6a2.25 2.25 0 0 0-2.25 2.25V18A2.25 2.25 0 0 0 6 20.25Zm9.75-9.75H18a2.25 2.25 0 0 0 2.25-2.25V6A2.25 2.25 0 0 0 18 3.75h-2.25A2.25 2.25 0 0 0 13.5 6v2.25a2.25 2.25 0 0 0 2.25 2.25Z" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="tw:flex-auto">
                        <a href="#" class="tw:block tw:font-semibold tw:text-white">
                            Integrations
                            <span class="tw:absolute tw:inset-0"></span>
                        </a>
                        <p class="tw:mt-1 tw:text-gray-400">Connect with third-party tools</p>
                    </div>
                </div>
                <div class="tw:group tw:relative tw:flex tw:items-center tw:gap-x-6 tw:rounded-lg tw:p-4 tw:text-sm/6 hover:tw:bg-white/5">
                    <div class="tw:flex tw:size-11 tw:flex-none tw:items-center tw:justify-center tw:rounded-lg tw:bg-gray-700/50 group-hover:tw:bg-gray-700">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="tw:size-6 tw:text-gray-400 group-hover:tw:text-white">
                            <path d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="tw:flex-auto">
                        <a href="#" class="tw:block tw:font-semibold tw:text-white">
                            Automations
                            <span class="tw:absolute tw:inset-0"></span>
                        </a>
                        <p class="tw:mt-1 tw:text-gray-400">Build strategic funnels that will convert</p>
                    </div>
                </div>
            </div>
            <div class="tw:grid tw:grid-cols-2 tw:divide-x tw:divide-white/10 tw:bg-gray-700/50">
                <a href="#" class="tw:flex tw:items-center tw:justify-center tw:gap-x-2.5 tw:p-3 tw:text-sm/6 tw:font-semibold tw:text-white hover:tw:bg-gray-700/50">
                    <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="tw:size-5 tw:flex-none tw:text-gray-500">
                        <path d="M2 10a8 8 0 1 1 16 0 8 8 0 0 1-16 0Zm6.39-2.908a.75.75 0 0 1 .766.027l3.5 2.25a.75.75 0 0 1 0 1.262l-3.5 2.25A.75.75 0 0 1 8 12.25v-4.5a.75.75 0 0 1 .39-.658Z" clip-rule="evenodd" fill-rule="evenodd" />
                    </svg>
                    Watch demo
                </a>
                <a href="#" class="tw:flex tw:items-center tw:justify-center tw:gap-x-2.5 tw:p-3 tw:text-sm/6 tw:font-semibold tw:text-white hover:tw:bg-gray-700/50">
                    <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="tw:size-5 tw:flex-none tw:text-gray-500">
                        <path d="M2 3.5A1.5 1.5 0 0 1 3.5 2h1.148a1.5 1.5 0 0 1 1.465 1.175l.716 3.223a1.5 1.5 0 0 1-1.052 1.767l-.933.267c-.41.117-.643.555-.48.95a11.542 11.542 0 0 0 6.254 6.254c.395.163.833-.07.95-.48l.267-.933a1.5 1.5 0 0 1 1.767-1.052l3.223.716A1.5 1.5 0 0 1 18 15.352V16.5a1.5 1.5 0 0 1-1.5 1.5H15c-1.149 0-2.263-.15-3.326-.43A13.022 13.022 0 0 1 2.43 8.326 13.019 13.019 0 0 1 2 5V3.5Z" clip-rule="evenodd" fill-rule="evenodd" />
                    </svg>
                    Contact sales
                </a>
            </div>
        </el-popover>
    </div>

    <a href="#" class="tw:text-sm/6 tw:font-semibold tw:text-white">Features</a>
    <a href="#" class="tw:text-sm/6 tw:font-semibold tw:text-white">Marketplace</a>
    <a href="#" class="tw:text-sm/6 tw:font-semibold tw:text-white">Company</a>
</el-popover-group>

<!-- <?php if (isset($header_menu)) : ?>
    <div class="tw:lg:flex tw:gap-x-12 tw:hidden">
        <?php foreach ($header_menu as $menu) : ?>
            <?php if (!$menu->menu_item_parent): ?>
                <a href="#" class="tw:text-sm/6 tw:font-semibold tw:text-white"><?= $menu->title ?></a>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?> -->