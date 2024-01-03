<?php
$section_title    = get_sub_field( 'section_title' );
$section_subtitle = get_sub_field( 'section_subtitle' );
$section_text     = get_sub_field( 'section_text' );
$section_button   = get_sub_field( 'section_button' );
?>

<!-- BEGIN  career-opportunities-section -->
<section class="career-opportunities-section">
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
            </div>

            <div class="cell">
                <?php if ( have_rows( 'key_roles' ) ) : ?>
                    <div class="key-roles">
                        <?php while ( have_rows( 'key_roles' ) ) : the_row();
                            $role_title       = get_sub_field( 'role_title' );
                            $role_subtitle    = get_sub_field( 'role_subtitle' );
                            $role_description = get_sub_field( 'role_description' );
                            ?>
                            <div class="role matchHeight">
                                <div class="role-heading">
                                    <?php if ( $role_title ) : ?>
                                        <h3 class="">
                                            <?php echo $role_title; ?>
                                        </h3>
                                    <?php endif; ?>
                                    <?php if ( $role_subtitle ) : ?>
                                        <h6>
                                            <?php echo $role_subtitle; ?>
                                        </h6>
                                    <?php endif; ?>
                                </div>
                                <?php if ( $role_description ) : ?>
                                    <article class="">
                                        <?php echo $role_description; ?>
                                    </article>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="cell text-center">
                <?php if ( $section_text ) : ?>
                    <article class="section-text">
                        <?php echo $section_text; ?>
                    </article>
                <?php endif; ?>

                <?php if ( $section_button ) : ?>
                    <a href="<?php echo $section_button['url']; ?>"
                       class="button button--white button--downArrow">
                        <?php echo $section_button['title']; ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- END  career-opportunities-section -->
