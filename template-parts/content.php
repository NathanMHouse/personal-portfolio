<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Portfolio
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
	// The title module
	get_template_part( 'template-parts/module', 'title' );
	?>
	<div class="container">
		<div class="row">
			<aside class="col-md-4">
				<div class="table-of-contents">
					<h2>Table of Contents</h2>
					<?php
					if ( have_rows( 'section' ) ) {
						?>
						<ol>
						<?php
						while ( have_rows( 'section' ) ) {
							the_row();
							
							$title = get_sub_field( 'title' );

							if ( empty( $title ) ) {
								continue;
							}
							?>
							<li><a href="#"><?php echo esc_html( $title ); ?></a></li>
							<?php
						}
						?>
						</ol>
						<?php
					}
					?>
				</div>
			</aside>
			<div class="col-md-8">
				<?php
				the_content();
				?>
			</div><!-- .entry-content -->
		</div><!-- .rwo -->
	</div><!-- .container -->
</article><!-- #post-## -->
