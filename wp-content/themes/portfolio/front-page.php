<?php
/**
 * Front Page - the template for displaying the home page.
 *
 *
 * @package Portfolio
 */

// The header
get_header();

// The banner
get_template_part( '/template-parts/module-banner' );

// The 'About Me' section
get_template_part( '/template-parts/content-about_me' );

// The 'Work' section
get_template_part( '/template-parts/content-work' );

// The 'Testimonial' section
get_template_part( '/template-parts/content-testimonial' );

// The 'Thank You' section
get_template_part( '/template-parts/content-thank_you' );

// The footer
get_footer();

// The 'Copyright' section
get_template_part( '/template-parts/module-copyright' );
