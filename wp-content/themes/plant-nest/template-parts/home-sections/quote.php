<?php
/**
 * Plant Nest - Minimal Quote Spotlight Section (Free)
 */

$quote_text = get_theme_mod('plant_nest_quote_text', '“Simplicity is the ultimate sophistication.”');
$quote_author = get_theme_mod('plant_nest_quote_author', 'Leonardo da Vinci');
$cta_text = get_theme_mod('plant_nest_cta_text', 'Read More');
$cta_url = get_theme_mod('plant_nest_cta_url', '#');
?>

<section class="aether-quote-section py-5 bg-white text-center">
    <div class="container">
        <blockquote class="aether-quote fs-4 fst-italic mx-auto mb-4">
            <?php echo esc_html($quote_text); ?>
        </blockquote>
        <footer class="aether-quote-author mb-4 fw-semibold text-muted">
            &mdash; <?php echo esc_html($quote_author); ?>
        </footer>
        <a href="<?php echo esc_url($cta_url); ?>" class="btn btn-outline-primary rounded-pill px-4 py-2">
            <?php echo esc_html($cta_text); ?>
        </a>
    </div>
</section>
