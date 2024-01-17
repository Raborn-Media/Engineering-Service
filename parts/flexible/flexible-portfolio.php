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
                <?php
                $args  = array(
                	'post_type'      => 'portfolio',
                	'order'          => 'ASC', // ASC, DESC
                	'orderby'        => 'rand', // none, ID, author, title, name, date, modified, parent, rand, comment_count, menu_order, meta_value, meta_value_num, title menu_order, post__in
                	'posts_per_page' => 5,

                );
                ?>

                <?php $the_query = new WP_Query( $args ); ?>

                <?php if ( $the_query->have_posts() ) : ?>
                <div class="portfolio-items">

                <!-- the loop -->
                	<?php while ( $the_query->have_posts() ) : $the_query->the_post();
                    $portfolio_item_cat = get_field('portfolio_item_cat');
                    ?>
                        <a href="<?php the_post_thumbnail_url(); ?>" class="portfolio-items__item gallery-item" data-fancybox="gallery">
                            <div class="item-bg">
<!--                                --><?php //echo wp_get_attachment_image($item_bg['id'], 'large');?>
                                <?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) ); ?>
                            </div>
                            <div class="item-content">
                                <?php if ( $portfolio_item_cat ) : ?>
                                    <div class="item-title">
                                        <?php echo $portfolio_item_cat; ?>
                                    </div>
                                <?php endif; ?>

                                    <div class="item-subtitle">
                                        <?php the_title(); ?>
                                    </div>
                            </div>
                        </a>

                	<?php endwhile; ?>
                    <!-- end of the loop -->
                	<?php wp_reset_postdata(); ?>
                </div>

                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- END  portfolio-section -->
