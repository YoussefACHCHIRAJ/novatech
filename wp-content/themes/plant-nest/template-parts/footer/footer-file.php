<footer class="site-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="footer-inside">
                    <?php if ( is_active_sidebar( 'footer_widget_area1' ) ) : ?>
                        <?php dynamic_sidebar( 'footer_widget_area1' ); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="footer-inside">
                    <?php if ( is_active_sidebar( 'footer_widget_area2' ) ) : ?>
                        <?php dynamic_sidebar( 'footer_widget_area2' ); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="footer-inside">
                    <?php if ( is_active_sidebar( 'footer_widget_area3' ) ) : ?>
                        <?php dynamic_sidebar( 'footer_widget_area3' ); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php get_template_part( 'template-parts/footer/footer-copyright' ); ?> 
</footer>















