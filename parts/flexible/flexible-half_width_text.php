<?php
$section_title    = get_sub_field( 'section_title' );
$section_subtitle = get_sub_field( 'section_subtitle' );
$section_text     = get_sub_field( 'section_text' );
$section_bg     = get_sub_field( 'section_bg' );
?>

<!-- BEGIN  half-width-text -->
<section class="half-width-text" <?php bg($section_bg['url'], 'full_hd'); ?>>
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell large-9">
                <?php if ( $section_subtitle ) : ?>
                    <h6 class="" >
                        <?php echo $section_subtitle; ?>
                    </h6>
                <?php endif; ?>

                <?php if ( $section_title ) : ?>
                    <h1 class="section-title ease-btm" data-scroll>
                        <?php echo $section_title; ?>
                    </h1>
                <?php endif; ?>
            </div>
            <div class="cell large-6 large-offset-6">
                <?php if ( $section_text ) : ?>
                    <article>
                        <?php echo $section_text; ?>
                    </article>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- END  half-width-text -->
