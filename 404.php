<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Portfolio
 */

// The '404' header
get_header( '404' );

// The '404' banner
get_template_part( '/template-parts/module-banner-404' );
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="error-404 not-found">
				<div class="page-content">
				
					<?php

					// The '404' content
					get_template_part( '/template-parts/content-404' );
					?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

// The footer
get_footer();

// The 'Copyright' section
get_template_part( '/template-parts/module-copyright' );
