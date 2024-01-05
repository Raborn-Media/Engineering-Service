<?php
$benefits     = get_sub_field( 'benefits' );
$how_to_apply = get_sub_field( 'how_to_apply' );
?>

<!-- BEGIN  benefits-section -->
<section id="apply" class="benefits-section bottom-graphics">
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell large-5 benefits-col">
                <?php if ( $benefits ) : ?>
                    <article class="benefits">
                        <?php echo $benefits; ?>
                    </article>
                <?php endif; ?>
            </div>
            <div class="cell large-7 apply-col">
                <?php if ( $how_to_apply ) : ?>
                    <article class="how-to-apply">
                        <?php echo $how_to_apply; ?>
                    </article>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- END  benefits-section -->
