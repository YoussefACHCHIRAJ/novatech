<?php
/**
 * Vaximo Activation Page
 *
 * @package vaximo
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$vaximo_my_theme = wp_get_theme();
if ( $vaximo_my_theme->parent_theme ) {
	$vaximo_my_theme = wp_get_theme( basename( get_template_directory() ) );
}
?>

<div class="wrap about-wrap et-admin-wrap">

	<?php vaximo_admin_navigation_tabs( 'vaximo-activation' ); ?>

    <div id="vaximo-dashboard" class="wrap about-wrap">
            <div class="et-dsd-wrap">
                <div class="w-row middle">
                    <div class="w-col-sm-4">
                        <img src="<?php echo esc_url( get_template_directory_uri() .'/inc/theme-dashboard/images/license.svg' ); ?>">
                    </div>
                    <div class="w-col-sm-8">
                        <?php
                        $register = new Vaximo_RT;
                        $purchase_code_status = trim( get_option( 'vaximo_purchase_code_status' ) );
                        if ( $purchase_code_status == 'valid' ) {
                            $license_status = 'success';
                        } elseif ( $purchase_code_status == 'invalid' ) {
                            $license_status = 'failed';
                        }elseif($purchase_code_status == 'already_registered'){
                            $license_status = 'failed';
                        } elseif ( $purchase_code_status == '' ) {
                            $license_status = '';
                        }

                        ?>
                        <div class="et-dsb-box dt-theme-register-box">
                            <div class="et-box-head <?php echo esc_attr($license_status) ?>">
                                <?php $register->messages(); ?>
                            </div><!-- /.lqd-dsd-box-head -->

                            <?php $register->form(); ?>

                        </div><!-- /.lqd-dsd-register-box -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
