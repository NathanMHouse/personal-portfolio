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
				<div class="table-of-contents"></div>
			</aside>
			<div class="col-md-8">
				<?php
				the_content();
				?>
			</div><!-- .entry-content -->
		</div><!-- .rwo -->
	</div><!-- .container -->
</article><!-- #post-## -->
