<?php
/**
 * Banner Module
 *
 * @package Portfolio
 */

// Vars
$banner_image    = get_field( 'banner_image', 'options' );
$banner_title    = get_field( 'banner_title', 'options' );
$banner_subtitle = get_field( 'banner_subtitle', 'options' );
?>

<div class="banner-section">
	<div class="container">
		<div class="banner-content row">

			<?php

			// The banner photo
			?>
			<div class="banner-content-image col-md-4" style="background-image: url( <?php echo esc_attr( $banner_image['url'] ); ?> );">
			</div><!-- .banner-content-image -->

			<?php

			// The banner title/subtitle
			?>
			<div class="banner-content-text col-md-7 col-md-offset-1">
				<h1><?php echo esc_html( $banner_title ); ?></h1>
				<h2><?php echo esc_html( $banner_subtitle ); ?></h2>
			</div><!-- .banner-content-text -->
		</div><!-- .banner-content -->
	</div><!-- .container -->
	<div class="banner-section-arrow">
	</div><!-- .banner-section-arrow -->
</div><!-- .banner-section -->
