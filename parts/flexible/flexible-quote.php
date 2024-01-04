<?php
$section_text = get_sub_field( 'section_text' );
$section_bg   = get_sub_field( 'section_bg' );
?>

<!-- BEGIN  quote-section -->
<section class="quote-section bottom-graphics">
    <?php echo wp_get_attachment_image( $section_bg['id'], 'full_hd', false, ['class' => 'section-bg-image'] ); ?>
<!--    <div class="section-bg-image">-->
<!--        --><?php //echo wp_get_attachment_image( $section_bg['id'], 'full_hd' ); ?>
<!--    </div>-->
    <div class="grid-container section-container">
        <div class="grid-x">
            <div class="call medium-6">
                <article>
                    <?php echo $section_text; ?>
                </article>
            </div>
        </div>
    </div>
</section>
<!-- END  quote-section -->
