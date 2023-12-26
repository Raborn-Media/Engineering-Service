<?php
/**
 * Footer
 */
?>
<!-- BEGIN  before-footer-section -->
<?php if ( $before_footer_bg = get_field( 'before_footer_bg', 'options' ) ) : ?>
    <div class="before-footer-section">
        <?php echo wp_get_attachment_image( $before_footer_bg['id'], 'full_hd' ); ?>
    </div>
<?php endif; ?>
<!-- END  before-footer-section -->
<!-- BEGIN of footer -->
<footer class="footer">
    <div class="grid-container footer-top-container">
        <div class="grid-x ">

            <div class="cell large-8">
                <?php
                if ( has_nav_menu( 'footer-menu' ) ) {
                    wp_nav_menu( array(
                        'theme_location' => 'footer-menu',
                        'menu_class'     => 'footer-menu',
                        'depth'          => 1
                    ) );
                }
                ?>
            </div>

            <div class="cell large-4">
                <div class="footer__logo">
                    <?php if ( $footer_logo = get_field( 'footer_logo', 'options' ) ) :
                        echo wp_get_attachment_image( $footer_logo['id'], 'medium' );
                    else :
                        show_custom_logo();
                    endif; ?>
                </div>
                <div class="footer-contact-info">
                    <?php if ( $phone = get_field( 'phone', 'options' ) ) : ?>
                        <p class="footer-contact-link footer-contact-link--phone">
                            <a href="tel:<?php echo sanitize_number( $phone ); ?>"><?php echo $phone; ?></a>
                        </p>
                    <?php endif; ?>
                    <?php if ( $address = get_field( 'address', 'option' ) ) : ?>
                        <address class="footer-contact-link footer-contact-link--address">
                            <?php echo $address; ?>
                        </address>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="grid-container footer-bottom-container">
        <div class="grid-x">
            <div class="cell ">
                <?php if ( $copyright = get_field( 'copyright', 'options' ) ) : ?>
                    <div class="footer__copy">
                        <p>
                            <?php echo $copyright; ?>
                        </p>
                        <?php if ( $build_by = get_field( 'build_by', 'options' ) ) : ?>
                            <p class="build-by">
                                <?php echo $build_by; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>
<!-- END of footer -->

<?php wp_footer(); ?>
</body>
</html>
