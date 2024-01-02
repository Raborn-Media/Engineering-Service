<?php
/**
 * Single
 *
 * Loop container for single post content
 */
get_header(); ?>
<main class="main-content main-content__single">
    <div class="grid-container">
        <div class="grid-x member-heading-row">
            <div class="cell">
                <div class="custom-breadcrumbs">
                    <a href="<?php echo get_home_url(); ?>" class="home-url">Home</a>
                    <span><i class="fa-solid fa-chevron-right"></i></span>
                    <a href="/about-us"><?php _e( 'ABOUT US' ); ?></a>
                </div>
            </div>
            <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) :
            the_post(); ?>

            <div class="cell medium-4">
                <?php if ( has_post_thumbnail() ) : ?>
                    <div title="<?php the_title_attribute(); ?>" class="entry__thumb">
                        <?php the_post_thumbnail( 'large' ); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="cell medium-8">
                <div class="member-heading-info">
                    <h2 class="member-title"><?php the_title(); ?></h2>
                    <?php if ( $member_position = get_field( 'member_position' ) ) : ?>
                        <p class="member-position">
                            <?php echo $member_position; ?>
                        </p>
                    <?php endif; ?>
                    <?php if ( $email = get_field( 'member_email' ) ) : ?>
                        <a href="mailto:<?php echo $email; ?>"
                           class="member-email">
                            <?php echo $email; ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="grid-x">
            <!-- BEGIN of post content -->
            <div class="small-12 cell">
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

                <?php
                $current_team_member_id = get_the_ID(); // Get the ID of the current team member

                $args = array(
                    'post_type'      => 'team', // Replace 'team' with your custom post type name
                    'posts_per_page' => - 1, // Set the number of team members to display (-1 for all)
                    'post__not_in'   => array( $current_team_member_id ), // Exclude the current team member
                );

                $team_query = new WP_Query( $args );

                if ( $team_query->have_posts() ) { ?>

                    <div class="single-leaders-list">
                        <div class="top-graphics text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="87" height="24" viewBox="0 0 87 24"
                                 fill="none">
                                <path d="M43.6987 24L0.397463 5.83601e-08L87 7.62939e-06L43.6987 24Z"
                                      fill="#1B5B44"/>
                            </svg>
                        </div>
                        <h6 class="text-center">
                            <?php _e( 'OUR LEADERS' ); ?>
                        </h6>

                        <h2 class="text-center">
                            <?php _e( 'Company Leadership' ); ?>
                        </h2>
                        <div class="leaders-list">
                            <?php
                            while ( $team_query->have_posts() ) {
                                $team_query->the_post();
                                $leader_position = get_field( 'member_position' )
                                ?>
                                <div class="leaders-list__leader">
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="leader-photo">
                                            <?php the_post_thumbnail(); ?>
                                        </div>
                                        <div class="leader-name">
                                            <?php the_title(); ?>
                                        </div>
                                        <?php if ( $leader_position ) : ?>
                                            <p>
                                                <?php echo $leader_position; ?>
                                            </p>
                                        <?php endif; ?>
                                    </a>
                                </div>
                            <?php }
                            wp_reset_postdata(); // Reset post data after the loop
                            ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <!-- END of post content -->
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
