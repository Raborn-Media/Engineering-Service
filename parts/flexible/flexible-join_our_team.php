<?php
$section_title    = get_sub_field( 'section_title' );
$section_subtitle = get_sub_field( 'section_subtitle' );
$join_form = get_sub_field( 'join_form' );
?>

<!-- BEGIN  form-section -->
<section id="form-section" class="form-section">
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell text-center">
                <div class="section-heading">
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
        </div>
        <div class="grid-x">
            <div class="cell">
                <?php if (class_exists('GFAPI') && !empty($join_form) && is_array($join_form)) : ?>
                    <div class="cell medium-6">
                        <div class="contact__form">
<!--                            --><?php //echo do_shortcode("[gravityform id='{$join_form['id']}' title='false' description='false' ajax='true']"); ?>
                            <?php echo do_shortcode("[gravityform id='3' title='false' description='false' ajax='true']"); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- END  form-section -->
