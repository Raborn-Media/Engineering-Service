<?php
$section_title    = get_sub_field( 'section_title' );
$section_subtitle = get_sub_field( 'section_subtitle' );
?>

<!-- BEGIN  portfolio-section -->
<section class="portfolio-section">
    <div class="grid-container fluid">
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
        </div>
        <div class="grid-x">
            <div class="cell">

                <div class="portfolio-items">
                    <?php
                    $portfolio_item_cat = get_field( 'portfolio_item_cat' );
                    $show_item_cat      = get_field( 'show_item_cat' );
                    $featured_posts     = get_sub_field( 'portrait_view_posts' );

                    // Define an array to store post IDs that should be excluded
                    $exclude_posts = array();

                    if ( $featured_posts ) :
                        // Shuffle the array to get a random order
                        shuffle( $featured_posts );
                        // Limit the display to 2 posts
                        foreach ( $featured_posts as $post ) {
                            $exclude_posts[] = $post->ID;
                        }
                        $selected_posts         = array_slice( $featured_posts, 0, 2 );
                        foreach ( $selected_posts as $featured_post ) :
                            // Retrieve post details
                            $permalink = get_permalink( $featured_post->ID );
                            $title              = get_the_title( $featured_post->ID );
                            $custom_field       = get_field( 'field_name', $featured_post->ID );
                            $portfolio_item_cat = get_field( 'portfolio_item_cat', $featured_post->ID );
                            $show_item_cat      = get_field( 'show_item_cat', $featured_post->ID );
                            $image              = get_the_post_thumbnail( $featured_post->ID, 'full', array( 'class' => 'img-responsive' ) );
                            ?>

                            <a href="
                            <?php the_post_thumbnail_url(); ?>" class="portfolio-items__item gallery-item"
                               data-fancybox>
                                <div class="item-bg">
                                    <?php echo $image; ?>
                                </div>
                                <div class="item-content">
                                    <div class="item-title">
                                        <?php echo $title; ?>
                                    </div>

                                    <?php if ( $show_item_cat == true && $portfolio_item_cat ) : ?>
                                        <div class="item-subtitle">
                                            <?php echo $portfolio_item_cat; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </a>

                        <?php endforeach; ?>
                    <?php endif; ?>

                    <?php
                    $portrait_args = array(
                        'post_type'      => 'portfolio',
                        'order'          => 'ASC',
                        'orderby'        => 'rand',
                        'posts_per_page' => - 1,
                        'post__not_in'   => $exclude_posts, // Exclude posts already shown in $featured_posts
                    );
                    ?>
                    <?php $portrait_the_query = new WP_Query( $portrait_args ); ?>

                    <?php if ( $portrait_the_query->have_posts() ) : ?>
                        <!-- the loop -->
                        <?php while ( $portrait_the_query->have_posts() ) :
                            $portrait_the_query->the_post();
                            ?>
                            <a href="<?php the_post_thumbnail_url(); ?>" class="portfolio-items__item gallery-item"
                               data-fancybox>
                                <div class="item-bg">
                                    <?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) ); ?>
                                </div>
                                <div class="item-content">
                                    <div class="item-title">
                                        <?php the_title(); ?>
                                    </div>

                                    <?php if ( $show_item_cat == true && $portfolio_item_cat ) : ?>
                                        <div class="item-subtitle">
                                            <?php echo $portfolio_item_cat; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </a>
                        <?php endwhile; ?>
                        <!-- end of the loop -->
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- END  portfolio-section -->
