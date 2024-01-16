<?php
$section_title    = get_sub_field( 'section_title' );
$section_subtitle = get_sub_field( 'section_subtitle' );
$section_text     = get_sub_field( 'section_text' );
?>

<!-- BEGIN  leadership-section -->
<section class="leadership-section">
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
                <?php
                $featured_posts = get_sub_field( 'leaders_list' );
                if ( $featured_posts ): ?>
                    <div class="leaders-list">
                        <?php foreach ( $featured_posts as $post ):
                            setup_postdata( $post );
                            $member_position = get_field( 'member_position' );
                            ?>
                            <div class="leaders-list__leader">
                                    <div class="leader-photo">
                                        <?php the_post_thumbnail(); ?>
                                    </div>
                                    <div class="leader-info">
                                        <div class="leader-name">
                                            <?php the_title(); ?>
                                        </div>
                                        <?php if ( $member_position ) : ?>
                                            <p>
                                                <?php echo $member_position; ?>
                                            </p>
                                        <?php endif; ?>
                                        <?php if ( $short_description = get_field( 'short_description' ) ) : ?>
                                            <div class="short-description">
                                                <?php echo $short_description; ?>
                                            </div>
                                        <?php endif; ?>
                                        <article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
                                            <div class="entry__content clearfix">
                                                <?php the_content( '', true ); ?>
                                            </div>
                                        </article>
                                    </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php
                    // Reset the global post object so that the rest of the page works correctly.
                    wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- END  leadership-section -->
