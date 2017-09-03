<?php
/**
 * Header - 404 - the template for displaying everything up until the main content on the 404 template.
 *
 *
 * @package Portfolio
 */

// Vars
$nav_cta_text 	= get_field( 'nav_cta_text', 'options' );
$nav_cta_url	= get_field( 'nav_cta_url', 'options' );
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div id="page" class="site">
			<header id="masthead" class="site-header">

				<?php
				// The navigation
				?>
				<div class="container">

					<?php 
					// The branding
					?>
					<nav class="main-navigation navigation-404">
						<ul id="menu-404" class="menu">
							<li class="menu-item">
								<a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
							</li>
						</ul>
					</nav>
				
					<?php
					// The primary CTA button
					?>
					<a href="<?php echo $nav_cta_url; ?>" 
					id="header-404-cta" 
					class="cta primary-cta footer-cta-link logo" 
					data-scroll><?php echo $nav_cta_text; ?></a>
				</div><!-- .container -->
			</header><!-- #masthead -->
			<div id="content" class="site-content">