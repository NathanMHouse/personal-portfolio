<?php
/**
 * Banner Module
 *
 * @package Portfolio
 */

// Vars
$banner_404_title		= get_field( 'banner_404_title', 'options' );
$banner_404_subtitle	= get_field( 'banner_404_subtitle', 'options' );
?>

<div class="banner-section">
	<div class="container">
		<div class="banner-content row">

			<?php
			// The banner symbol
			?>	
			<div class="banner-content-icon col-md-2 col-md-offset-2">
				<i class="fa fa-7x fa-mobile-5x fa-exclamation-circle"></i>
			</div><!-- .banner-content-icon -->

			<?php
			// The banner title/subtitle
			?>
			<div class="banner-content-text col-md-6">
				<h1><?php echo $banner_404_title; ?></h1>
				<h2><?php echo $banner_404_subtitle; ?></h2>
			</div><!-- .banner-content-text -->
		</div><!-- .banner-content -->
	</div><!-- .container -->
	<div class="banner-section-arrow">
	</div><!-- .banner-section-arrow -->
</div><!-- .banner-section -->