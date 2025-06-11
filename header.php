<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <canvas id="galaxy-canvas"></canvas>
    <header id="main-header" class="transparent-header">
        <div class="header-container">
            <!-- Logo (Rightmost) -->
            <div class="site-logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" class="logo-img">
                </a>
            </div>
            <!-- Navigation Menu (Center) -->
            <nav id="primary-nav">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'container'      => false,
                    'fallback_cb'    => false,
                    'items_wrap'     => '<ul id="%1$s" class="%2$s" dir="rtl">%3$s</ul>',
                ) );
                ?>
            </nav>
            <!-- Icons and Button (Leftmost) -->
            <div class="header-actions">
                <div class="header-icons">
                    <a href="#" class="icon user-icon" title="<?php _e( 'User Account', 'noxhara' ); ?>">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </a>
                    <a href="#" class="icon search-icon" title="<?php _e( 'Search', 'noxhara' ); ?>">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </a>
                </div>
                <a href="#" class="consultation-btn"><?php _e( 'Free Consultation', 'noxhara' ); ?></a>
            </div>
        </div>
    </header>
    <main class="container">