<?php
$section_title    = get_sub_field( 'section_title' );
$section_subtitle = get_sub_field( 'section_subtitle' );
$section_bg       = get_sub_field( 'section_bg' );
?>

<!-- BEGIN  history-section -->
<div class="history-section" <?php bg( $section_bg['url'], 'full_hd' ); ?>>
    <div class="grid-container">
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

            <div class="cell">
                <?php if ( have_rows( 'timeline' ) ) : ?>
                    <div class="timeline">
                        <?php while ( have_rows( 'timeline' ) ) : the_row();
                            $timeline_item_title = get_sub_field( 'timeline_item_title' );
                            $timeline_item_image = get_sub_field( 'timeline_item_image' );
                            $timeline_item_text  = get_sub_field( 'timeline_item_text' );
                            ?>

                            <div class="timeline__item">
                                <div class="timeline-item-title">
                                    <?php if ( $timeline_item_title ) : ?>
                                        <h2>
                                            <?php echo $timeline_item_title; ?>
                                        </h2>
                                    <?php endif; ?>
                                </div>
                                <div class="timeline-item-content">
                                    <?php if ( $timeline_item_image ) : ?>
                                        <div class="timeline-item-image">
                                            <?php echo wp_get_attachment_image($timeline_item_image['id'], 'large'); ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ( $timeline_item_text ) : ?>
                                        <article>
                                            <?php echo $timeline_item_text; ?>
                                        </article>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- END  history-section -->
