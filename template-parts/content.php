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
	<div class="content-section container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<?php
				if ( have_rows( 'section' ) ) {
					while ( have_rows( 'section' ) ) {
						the_row();
						
						$title   = get_sub_field( 'title' );
						$id      = strtolower( str_replace( ' ', '-', $title ) );
						$content = get_sub_field( 'content' );

						if ( empty( $content ) ) {
							continue;
						}
						?>
						<section id="<?php echo esc_attr( $id ); ?>" class="content-section__content">
							<?php
							if ( $title ) {
							?>
								<h2><?php echo esc_html( $title ); ?></h2>
							<?php
							}
							echo wp_kses_post( $content );
							?>
						</section>
						<?php
					}
				}
				?>
			</div><!-- .entry-content -->
		</div><!-- .rwo -->
	</div><!-- .container -->
</article><!-- #post-## -->
