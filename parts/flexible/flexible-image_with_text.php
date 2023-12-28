<?php
$section_image    = get_sub_field( 'section_image' );
$section_title    = get_sub_field( 'section_title' );
$section_subtitle = get_sub_field( 'section_subtitle' );
$section_text     = get_sub_field( 'section_text' );
$section_button   = get_sub_field( 'section_button' );
$text_or_list     = get_sub_field( 'text_or_list' );
$content_position     = get_sub_field( 'content_position' );
$section_bg     = get_sub_field( 'section_bg' );
?>

<!-- BEGIN  image-w-text-section -->
<section class="image-w-text-section <?php echo $content_position ? 'bg-reverse' : '';?>">
    <div class="section-bg" <?php bg($section_bg['url'], 'full_hd'); ?>></div>
    <div class="grid-container section-container <?php echo $content_position ? 'section-container--no-top-graphics' : '';?>">
        <div class="grid-x <?php echo $content_position ? 'row-reverse' : '';?>">
            <div class="cell large-6 text-col">
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

                <?php if ( $text_or_list == true ) :
                    ?>
                    <?php if ( have_rows( 'section_list' ) ) : ?>
                        <div class="section-list">
                            <?php while ( have_rows( 'section_list' ) ) : the_row();
                                $list_icon = get_sub_field( 'list_icon' );
                                $list_text = get_sub_field( 'list_text' );
                                ?>
                                <div class="section-list__item">
                                    <div class="list-icon">
                                        <?php echo display_svg( $list_icon ); ?>
                                    </div>

                                    <div class="list_text">
                                        <?php echo $list_text; ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                <?php else:
                    ?>
                    <?php if ( $section_text ) : ?>
                        <article>
                            <?php echo $section_text; ?>
                        </article>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if ( $section_button ) : ?>
                    <a href="<?php echo $section_button['url']; ?>"
                       class="button button--white">
                        <?php echo $section_button['title']; ?>
                    </a>
                <?php endif; ?>
            </div>

            <div class="cell large-6">
                <?php if ( $section_image ) : ?>
                    <div class="section-image ease-btm" data-scroll>
                        <?php echo wp_get_attachment_image( $section_image['id'], 'large' ); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- END  image-w-text-section -->
