<?php
/**
 * Flexible Content - Code and Text
 *
 *
 * @package Portfolio
 */

// Get ACF values
$code = get_sub_field( 'code' );
$alignment_class_arrow = ( 'code-right-text-left' === get_sub_field( 'alignment' ) )
						 ? 'content-row-arrow-left'
						 : 'content-row-arrow-right';
$alignment_class_code  = ( 'code-right-text-left' === get_sub_field( 'alignment' ) )
						 ? 'col-md-7 col-md-push-5 code-right-text-left'
						 : 'col-md-7 code-left-text-right';
$alignment_class_text  = ( 'code-right-text-left' === get_sub_field( 'alignment' ) )
						 ? 'col-md-5 col-md-pull-7'
						 : 'col-md-5';
?>

<section class="content-row 
<?php
echo esc_attr( "$content_row_class $content_row_count_class $margin $padding" . " background-$row_color" );
?>
">

	<div class="container">
		<div class="row">

			<?php

			// The code
			?>
			<div class="content-row-code <?php echo esc_attr( $alignment_class_code ); ?>">
				
				<?php

				// The arrow
				?>
				<div class="content-row-arrow-outer <?php echo esc_attr( "content-row-arrow-$row_color $alignment_class_arrow" ); ?>">
					<div class="content-row-arrow-inner <?php echo esc_attr( "content-row-arrow-$row_color $alignment_class_arrow" ); ?>"></div><!-- .content-row-arrow-inner -->
				</div><!-- .content-row-carousel-arrow-outer -->

				<?php echo wp_kses_post( $code ); ?>

			</div><!-- .content-row-code -->
				
			<div class="content-row-content-title-container <?php echo esc_attr( $alignment_class_text ); ?>">

				<?php

				// The title
				?>
				<div class="content-row-title">

					<h3><?php echo esc_html( $title ); ?></h3>

				</div><!-- .content-row-title -->

				<?php

				// The content
				?>
				<div class="content-row-content">

					<?php echo wp_kses_post( $content ); ?>

				</div><!-- .content-row-content -->

			</div><!-- .content-row-content-title-container -->

		</div><!-- .row -->
	</div><!-- .container -->

</section><!-- .content-row -->
