<?php
/**
 * Flexible Content - CTA Alt
 *
 *
 * @package Portfolio
 */

// Get ACF values
$cta_text            = get_sub_field( 'cta_text' );
$cta_url             = get_sub_field( 'cta_url' );
?>

<section class="content-row
<?php
echo esc_attr( "$content_row_class $content_row_count_class $margin $padding" . " background-$row_color" );
?>
">

	<div class="container">
		<div class="row">

			<div class="col-md-12">

				<?php

				// The title
				?>
				<div class="content-row-title">
					<h3><?php echo esc_html( $title ); ?></h3>
				</div><!-- .content-row-title -->

				<?php

				// The CTA
				?>
				<div class="content-row-cta-alt-cta">
					<a href="<?php echo esc_attr( $cta_url ); ?>" 
					   class="cta primary-cta"
					   data-scroll>
						<?php echo esc_html( $cta_text ); ?>
					</a><!-- .cta -->
				</div><!-- .content-row-cta-alt-cta -->
				
			</div><!-- .col -->

		</div><!-- .row -->		
	</div><!-- .container -->

</section><!-- .content-row -->
