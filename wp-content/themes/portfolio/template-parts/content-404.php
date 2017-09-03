<?php
/**
 * 404 Content
 *
 * @package Portfolio
 */

// Vars
$content_404_title	= get_field( 'content_404_title', 'options' );
$content_404_text	= get_field( 'content_404_text', 'options' );
?>

<div class="content-404-section">
	<div class="container">
		<div class="row">
			<div class="content-404-text col-md-8 col-md-offset-2">
				
				<?php
				// The 404 title 
				?>
				<h3><?php echo $content_404_title; ?></h3>

				<?php
				// The 404 text
				?>
				<?php echo $content_404_text; ?>

			</div><!-- .content-404-text -->
			<div class="content-404-work col-md-12">

				<?php
					// The 'Work' section
					get_template_part( '/template-parts/content-work' );
				?>

			</div><!-- .content-404-work -->
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .404-content-section -->