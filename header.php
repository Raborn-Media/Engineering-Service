<?php
/**
 * Header
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Set up Meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta charset="<?php bloginfo('charset'); ?>">

    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, user-scalable=yes">
    <!-- Remove Microsoft Edge's & Safari phone-email styling -->
    <meta name="format-detection" content="telephone=no,email=no,url=no">

    <!-- Add external fonts below (GoogleFonts / Typekit) -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Spectral:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/gmv7nsy.css">

    <?php wp_head(); ?>
</head>

<body <?php body_class('no-outline fxy'); ?>>
<?php wp_body_open(); ?>

<!-- <div class="preloader hide-for-medium">
    <div class="preloader__icon"></div>
</div> -->

<!-- BEGIN of header -->
<header class="header">
    <div class="grid-container menu-grid-container fluid">
        <div class="grid-x">
            <div class="medium-4 small-5 cell">
                <div class="logo text-center medium-text-left">
                    <h1>
                        <?php show_custom_logo(); ?><span class="show-for-sr"><?php echo get_bloginfo('name'); ?></span>
                    </h1>
                </div>
            </div>
            <div class="medium-8 small-7 cell">
                <?php if (has_nav_menu('header-menu')) : ?>
                    <div class="title-bar hide-for-large" data-responsive-toggle="main-menu" data-hide-for="large">
                        <div class="search-form-container">
                            <button class="search-button-show">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                            <div class="search-form">
                                <?php get_search_form(); ?>
                            </div>
                        </div>
                        <button class="menu-icon" type="button" data-toggle aria-label="Menu" aria-controls="main-menu">
                            <span></span></button>
<!--                        <div class="title-bar-title">Menu</div>-->
                    </div>
                    <nav class="top-bar" id="main-menu">
                        <?php wp_nav_menu(array(
                            'theme_location' => 'header-menu',
                            'menu_class' => 'menu header-menu',
                            'items_wrap' => '<ul id="%1$s" class="%2$s" data-responsive-menu="accordion large-dropdown" data-submenu-toggle="true" data-multi-open="false" data-close-on-click-inside="false">%3$s</ul>',
                            'walker' => new theme\FoundationNavigation()
                        )); ?>
                        <div class="search-form-container show-for-large">
                            <button class="search-button-show">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                            <div class="search-form">
                                <?php get_search_form(); ?>
                            </div>
                        </div>
                    </nav>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>
<!-- END of header -->
