<?php
$section_image = get_sub_field('section_image');
$section_title = get_sub_field('section_title');
$section_subtitle = get_sub_field('section_subtitle');
$section_text = get_sub_field('section_text');
$section_button = get_sub_field('section_button');
?>

<!-- BEGIN  image-w-text-section -->
<section class="image-w-text-section">
    <div class="grid-container section-container">
        <div class="grid-x">
            <div class="cell large-6 text-col">
                <?php if ($section_subtitle) : ?>
                    <h6>
                        <?php echo $section_subtitle; ?>
                    </h6>
                <?php endif; ?>

                <?php if ($section_title) : ?>
                    <h2 class="">
                        <?php echo $section_title; ?>
                    </h2>
                <?php endif; ?>

                <?php if ($section_text) : ?>
                    <article>
                        <?php echo $section_text; ?>
                    </article>
                <?php endif; ?>

                <?php if ($section_button) : ?>
                    <a href="<?php echo $section_button['url']; ?>"
                       class="button button--white">
                        <?php echo $section_button['title']; ?>
                    </a>
                <?php endif; ?>
            </div>

            <div class="cell large-6">
                <?php if ($section_image) : ?>
                    <div class="section-image ease-btm" data-scroll>
                        <?php echo wp_get_attachment_image($section_image['id'], 'large'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- END  image-w-text-section -->
