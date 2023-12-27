<?php
/**
 * Page
 */
get_header(); ?>

<!-- BEGIN  hero-section -->
<div class="hero-section" <?php bg( get_attached_img_url( get_the_ID(), 'full_hd' ) ); ?>>
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell">
                <h1 class="page-title">
                    <?php echo the_title();?>
                </h1>
            </div>
        </div>
    </div>
</div>
<!-- END  hero-section -->

<?php if (have_rows('flexible')) : ?>
    <?php while (have_rows('flexible')) :
        the_row();
        $layout = get_row_layout(); ?>
        <?php get_template_part('parts/flexible/flexible', $layout);
        ?>
    <?php endwhile; ?>
<?php endif;?>

<?php get_footer(); ?>
