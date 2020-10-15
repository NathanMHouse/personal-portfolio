<?php
/**
 * Flexible Content - CTA
 *
 *
 * @package Portfolio
 */

// Get ACF values
$cta_text            = get_sub_field( 'cta_text' );
$cta_url             = get_sub_field( 'cta_url' );
$row_color_secondary = get_sub_field( 'row_color_secondary' );
?>

<section class="content-row 
<?php
echo esc_attr( "$content_row_class $content_row_count_class $margin" . " background-$row_color" );
?>
">

	<div class="container">
		<div class="row">

			<div class="col-md-4 <?php echo esc_attr( $padding ); ?>">

				<?php

				// The title
				?>
				<div class="content-row-title">
					<h3><?php echo esc_html( $title ); ?></h3>
				</div><!-- .content-row-title -->

				<?php

				// The CTA
				?>
				<div class="content-row-cta-cta">
					<a href="<?php echo esc_attr( $cta_url ); ?>" 
					   class="cta primary-cta"
					   data-scroll>
						<?php echo esc_html( $cta_text ); ?>
					</a><!-- .cta -->
				</div><!-- .content-row-cta -->
				
			</div><!-- .col -->
				
			<div class="col-md-8 <?php echo esc_attr( "$padding " . "background-$row_color_secondary" ); ?>">

				<?php

				// The arrow
				?>
				<div class="content-row-arrow-outer content-row-arrow-left <?php echo esc_attr( "content-row-arrow-$row_color" ); ?>">
					<div class="content-row-arrow-inner content-row-arrow-left <?php echo esc_attr( "content-row-arrow-$row_color" ); ?>"></div><!-- .content-row-arrow-inner -->
				</div><!-- .content-row-carousel-arrow-outer -->

				<?php

				// The content
				?>
				<div class="content-row-content">
					<?php echo wp_kses_post( $content ); ?>
				</div><!-- .content-row-content -->

				<?php

				// The social links
				?>
				<div class="content-row-social-links">

					<?php
					if ( have_rows( 'social_links' ) ) {
						while ( have_rows( 'social_links' ) ) {
							the_row();

							// Get ACF values
							$social_link_url        = get_sub_field( 'social_link_url' );
							$social_link_icon_class = get_sub_field( 'social_link_icon_class' );
					?>
							<a href="<?php echo esc_attr( $social_link_url ); ?>" 
							   target="_blank">
								<i class="fa fa-2x <?php echo esc_attr( $social_link_icon_class ); ?>"></i>
							</a>
					<?php
						}
					}
					?>

				</div><!-- .content-row-social-links -->

			</div><!-- .col -->

		</div><!-- .row -->		
	</div><!-- .container -->

</section><!-- .content-row -->
