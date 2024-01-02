<?php
$section_title    = get_sub_field( 'section_title' );
$section_subtitle = get_sub_field( 'section_subtitle' );
?>

<!-- BEGIN  portfolio-section -->
<section class="portfolio-section">
    <div class="grid-container fluid">
        <div class="grid-x">
            <div class="cell text-center">
                <?php if ( $section_subtitle ) : ?>
                    <h6>
                        <?php echo $section_subtitle; ?>
                    </h6>
                <?php endif; ?>

                <?php if ( $section_title ) : ?>
                    <h2 class="">
                        <?php echo $section_title; ?>
                    </h2>
                <?php endif; ?>
            </div>
        </div>
        <div class="grid-x">
            <div class="cell">
                <?php if ( have_rows( 'portfolio_items' ) ) : ?>
                    <div class="portfolio-items">
                        <?php while ( have_rows( 'portfolio_items' ) ) : the_row();
                            $item_title = get_sub_field( 'item_title' );
                            $item_subtitle = get_sub_field( 'item_subtitle' );
                            $item_bg = get_sub_field( 'item_bg' );
                            ?>
                            <a href="<?php echo $item_bg['url']?>" class="portfolio-items__item gallery-item" data-fancybox="gallery">
                                <div class="item-bg">
                                    <?php echo wp_get_attachment_image($item_bg['id'], 'large');?>
                                </div>
                                <div class="item-content">
                                    <?php if ( $item_title ) : ?>
                                        <div class="item-title">
                                            <?php echo $item_title; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ( $item_subtitle ) : ?>
                                        <div class="item-subtitle">
                                            <?php echo $item_subtitle; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </a>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- END  portfolio-section -->
