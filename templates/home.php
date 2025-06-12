<?php
/*
Template Name: Homepage
Template Post Type: page
*/
get_header(); ?>
<div class="hero-section">
    <div class="hero-content">
        <h1 class="hero-title animate"><?php _e( 'Welcome to the Future', 'noxhara' ); ?></h1>
        <p class="hero-subtitle animate"><?php _e( 'Experience a Modern and Luxurious Journey with Noxhara', 'noxhara' ); ?></p>
        <a href="#" class="hero-cta animate"><?php _e( 'Explore Services', 'noxhara' ); ?></a>
    </div>
</div>
<main class="container">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            the_content();
        endwhile;
    else :
        echo '<p>' . esc_html__( 'No content found.', 'noxhara' ) . '</p>';
    endif;
    ?>
</main>
<?php get_footer(); ?>