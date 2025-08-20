<?php

/**
 * Header Navigation Template
 * 
 * @package NovaTech 
 */

?>
<nav aria-label="Global" class="tw:flex tw:items-center tw:justify-between tw:p-6 tw:lg:px-8">
    <div class="tw:flex-1">
        <a href="#" class="tw:-m-1.5 tw:p-1.5 tw:bg-white">
            <?php
            $logo = wp_get_attachment_Image_src(get_theme_mod('custom_logo'));

            ?>
            <span class="tw:sr-only">Your Company</span>
            <img src="<?= $logo ? $logo[0] : "https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" ?>" alt="" class="tw:h-8 tw:w-auto" />
        </a>
    </div>
    <div class="tw:flex tw:lg:hidden">
        <button type="button" command="show-modal" commandfor="mobile-menu" class="tw:-m-2.5 tw:inline-flex tw:items-center tw:justify-center tw:rounded-md tw:p-2.5 tw:text-gray-200">
            <span class="tw:sr-only">Open main menu</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="tw:size-6">
                <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
    </div>
    <div class="tw:lg:flex tw:gap-x-12 tw:hidden">
        <a href="#" class="tw:text-sm/6 tw:font-semibold tw:text-white">Product</a>
        <a href="#" class="tw:text-sm/6 tw:font-semibold tw:text-white">Features</a>
        <a href="#" class="tw:text-sm/6 tw:font-semibold tw:text-white">Marketplace</a>
        <a href="#" class="tw:text-sm/6 tw:font-semibold tw:text-white">Company</a>
    </div>
    <div class="tw:lg:flex tw:hidden tw:flex-1 tw:justify-end">
        <a href="#" class="tw:text-sm/6 tw:font-semibold tw:text-white">Log in <span aria-hidden="true">&rarr;</span></a>
    </div>
</nav>

<el-dialog>
    <dialog id="mobile-menu" class="tw:backdrop:bg-transparent tw:lg:hidden">
        <div tabindex="0" class="tw:fixed tw:inset-0 tw:focus:outline-none">
            <el-dialog-panel class="tw:fixed tw:inset-y-0 tw:right-0 tw:z-50 tw:w-full tw:overflow-y-auto tw:bg-gray-900 tw:p-6 sm:tw:max-w-sm sm:tw:ring-1 sm:tw:ring-gray-100/10">
                <div class="tw:flex tw:items-center tw:justify-between">
                    <a href="#" class="tw:-m-1.5 tw:p-1.5">
                        <span class="tw:sr-only">Your Company</span>
                        <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="" class="tw:h-8 tw:w-auto" />
                    </a>
                    <button type="button" command="close" commandfor="mobile-menu" class="tw:-m-2.5 tw:rounded-md tw:p-2.5 tw:text-gray-200">
                        <span class="tw:sr-only">Close menu</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="tw:size-6">
                            <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
                <div class="tw:mt-6 tw:flow-root">
                    <div class="tw:-my-6 tw:divide-y tw:divide-white/10">
                        <div class="tw:space-y-2 tw:py-6">
                            <a href="#" class="tw:-mx-3 tw:block tw:rounded-lg tw:px-3 tw:py-2 tw:text-base/7 tw:font-semibold tw:text-white hover:tw:bg-white/5">Product</a>
                            <a href="#" class="tw:-mx-3 tw:block tw:rounded-lg tw:px-3 tw:py-2 tw:text-base/7 tw:font-semibold tw:text-white hover:tw:bg-white/5">Features</a>
                            <a href="#" class="tw:-mx-3 tw:block tw:rounded-lg tw:px-3 tw:py-2 tw:text-base/7 tw:font-semibold tw:text-white hover:tw:bg-white/5">Marketplace</a>
                            <a href="#" class="tw:-mx-3 tw:block tw:rounded-lg tw:px-3 tw:py-2 tw:text-base/7 tw:font-semibold tw:text-white hover:tw:bg-white/5">Company</a>
                        </div>
                        <div class="tw:py-6">
                            <a href="#" class="tw:-mx-3 tw:block tw:rounded-lg tw:px-3 tw:py-2.5 tw:text-base/7 tw:font-semibold tw:text-white hover:tw:bg-white/5">Log in</a>
                        </div>
                    </div>
                </div>
            </el-dialog-panel>
        </div>
    </dialog>
</el-dialog>