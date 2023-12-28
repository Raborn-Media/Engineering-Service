<?php
$section_title    = get_sub_field( 'section_title' );
$section_subtitle = get_sub_field( 'section_subtitle' );
$section_text     = get_sub_field( 'section_text' );
?>

<!-- BEGIN  legacy-section -->
<section class="legacy-section">
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

                <?php if ( $section_text ) : ?>
                    <article class="">
                        <?php echo $section_text; ?>
                    </article>
                <?php endif; ?>
            </div>

            <div class="cell">
                <?php if ( have_rows( 'partners_list' ) ) : ?>
                    <div class="partners-list">
                        <?php while ( have_rows( 'partners_list' ) ) : the_row();
                            $partner_position = get_sub_field( 'partner_position' );
                            $partner_name     = get_sub_field( 'partner_name' );
                            ?>

                            <div class="partners-list__partner text-center">
                                <?php if ( $partner_name ) : ?>
                                    <p class="partner-name">
                                        <?php echo $partner_name; ?>
                                    </p>
                                <?php endif; ?>
                                <?php if ( $partner_position ) : ?>
                                    <p class="partner-position">
                                        <?php echo $partner_position; ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- END  legacy-section -->
