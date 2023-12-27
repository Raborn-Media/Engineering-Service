<?php
$section_text = get_sub_field('section_text');
$section_bg = get_sub_field('section_bg');
?>

<!-- BEGIN  full-width-text-section -->
<section class="full-width-text-section" <?php bg($section_bg['url'], 'full_hd'); ?>>
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell">
                <article>
                    <?php echo $section_text; ?>
                </article>
            </div>
        </div>
    </div>
</section>
<!-- END  full-width-text-section -->
