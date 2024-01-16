<?php
/**
 * Template Name: Contact Page
 */

get_header(); ?>
<!-- BEGIN  hero-section -->
<div class="hero-section" <?php bg( get_attached_img_url( get_the_ID(), 'full_hd' ) ); ?>>
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell">
                <h1 class="page-title">
                    <?php echo the_title(); ?>
                </h1>
            </div>
        </div>
    </div>
</div>
<!-- END  hero-section -->
<?php
$info_section_bg = get_field( 'info_section_bg' );
?>
<section class="contact bottom-graphics" <?php bg( $info_section_bg['url'], 'full_hd' ); ?>>
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell medium-6 location-col">
                <h3>
                    <?php _e( 'Location' ); ?>
                </h3>
                <?php if ( $address = get_field( 'contact_page_address' ) ) : ?>
                    <address class="address">
                        <?php echo $address; ?>
                    </address>
                <?php endif; ?>
            </div>
            <div class="cell medium-6 call-us-col">
                <h3>
                    <?php _e( 'Call Us' ); ?>
                </h3>
                <?php if ( $phone = get_field( 'contact_page_phone' ) ) : ?>
                    <p>
                        <a href="tel:<?php echo sanitize_number( $phone ); ?>"><?php echo $phone; ?></a>
                    </p>
                <?php endif; ?>
            </div>
        </div>

        <div class="grid-x">
            <div class="cell">
                <?php if ( $contact_page_information_text = get_field( 'contact_page_information_text' ) ) : ?>
                    <article class="contact-page-info-text">
                        <?php echo $contact_page_information_text; ?>
                    </article>
                <?php endif; ?>
            </div>
        </div>

        <?php if ( have_rows( 'contact_page_experts' ) ) : ?>
            <div class="grid-x">
                <?php while ( have_rows( 'contact_page_experts' ) ) : the_row();
                    $experts_icon = get_sub_field( 'experts_icon' );
                    $experts_text = get_sub_field( 'experts_text' );
                    ?>
                    <div class="cell large-6">
                        <div class="experts-info">
                            <div class="experts-icon">
                                <?php echo wp_get_attachment_image( $experts_icon['id'], 'large' ); ?>
                            </div>
                            <div class="experts-text">
                                <?php echo $experts_text; ?>
                            </div>

                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<!--<section class="form-section">-->
<!--    <div class="grid-container">-->
<!--        <div class="grid-x">-->
<!--            <div class="cell text-center">-->
<!--                <div class="section-heading">-->
<!--                    --><?php //if ( $section_subtitle = get_field( 'contact_form_subtitle' ) ) : ?>
<!--                        <h6>-->
<!--                            --><?php //echo $section_subtitle; ?>
<!--                        </h6>-->
<!--                    --><?php //endif; ?>
<!---->
<!--                    --><?php //if ( $section_title = get_field( 'contact_form_title' ) ) : ?>
<!--                        <h2 class="">-->
<!--                            --><?php //echo $section_title; ?>
<!--                        </h2>-->
<!--                    --><?php //endif; ?>
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="grid-x">-->
<!--            <div class="cell">-->
<!--                --><?php //$contact_form = get_field( 'contact_form' ); ?>
<!--                --><?php //if ( class_exists( 'GFAPI' ) && ! empty( $contact_form ) && is_array( $contact_form ) ) : ?>
<!--                    <div class="contact__form">-->
<!--                        --><?php //echo do_shortcode( "[gravityform id='{$contact_form['id']}' title='false' description='false' ajax='true']" ); ?>
<!--                    </div>-->
<!--                --><?php //endif; ?>
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<?php get_footer(); ?>
