<?php
$section_bg = get_sub_field('section_bg');
$section_title = get_sub_field('section_title');
$section_subtitle = get_sub_field('section_subtitle');
?>

<!-- BEGIN  services-section -->
<section id="services" class="services-section bottom-graphics" <?php bg($section_bg['url'], 'full_hd'); ?>>
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell text-center">
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
            </div>

            <div class="cell">
                <?php if (have_rows('services_list')) : ?>
                    <div class="services-list">
                        <?php while (have_rows('services_list')) : the_row();
                            $service_icon = get_sub_field('service_icon');
                            $service_title = get_sub_field('service_title');
                            $subservices = get_sub_field('subservices');
                            ?>

                            <div class="services-list__item ease-btm" data-scroll>
                                <?php if ($service_icon) : ?>
                                    <div class="item-icon">
                                        <?php echo display_svg($service_icon); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ($service_title) : ?>
                                    <h5 class="item-title">
                                        <?php echo $service_title; ?>
                                    </h5>
                                <?php endif; ?>

                                <?php if ($subservices) : ?>
                                    <div class="item-subservices">
                                    <div class="item-subservices-wrap">
                                        <?php echo $subservices; ?>
                                    </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- END  services-section -->
