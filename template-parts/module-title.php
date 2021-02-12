<?php
/**
 * Title Module
 *
 * @package Portfolio
 */
?>

<div class="title-section">
	<div class="container">
		<div class="title-content row">
			<?php
			// The title
			?>
			<div class="title-content-text col-md-8 col-md-offset-2">
				<h1>
					<?php
					if ( is_home() && ! is_front_page() ) :
						_e( 'Notes', 'portfolio' );
					else :
						the_title();
					endif;
					?>
				</h1>
			</div><!-- .title-content-text -->
		</div><!-- .title-content -->
	</div><!-- .container -->
</div><!-- .title-section -->
