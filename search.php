<?php
/**
 * Index
 *
 * Standard loop for the search result page
 */
get_header(); ?>
<!-- BEGIN  hero-section -->
<div class="hero-section" <?php bg( get_attached_img_url( get_the_ID(), 'full_hd' ) ); ?>>
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell">
                <h1 class="page-title">
                    <h1 class="page-title"><?php printf(__('Search Results for: %s', 'fxy'), '<span>' . esc_html(get_search_query()) . '</span>'); ?></h1>
                </h1>
            </div>
        </div>
    </div>
</div>
<!-- END  hero-section -->
<div class="grid-container">
    <div class="grid-x posts-list">
        <div class="cell small-12">
            <!-- BEGIN of search results -->
            <main class="main-content">
                <?php get_search_form(); ?>
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) :
                        the_post(); ?>
                        <?php get_template_part('parts/loop', 'post'); // Post item?>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p><?php _e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'fxy'); ?></p>
                <?php endif; ?>
                <!-- BEGIN of pagination -->
                <?php foundation_pagination(); ?>
                <!-- END of pagination -->
            </main>
        </div>
        <!-- END of search results -->
    </div>
</div>

<?php get_footer(); ?>
