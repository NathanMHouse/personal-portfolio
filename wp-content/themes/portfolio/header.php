<?php
/**
 * Header - the template for displaying everythign up until the main content.
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
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="shortcut icon" 
	href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png" 
	type="image/x-icon" />
	<?php wp_head(); ?>
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/assets/js/html5shiv.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/assets/js/respond.min.js"></script>
	<![endif]-->
	</head>
	<body <?php body_class(); ?>>
		<div id="page" class="site">
			<header id="masthead" class="site-header">

				<?php
				// The navigation
				?>
				<div class="container">

					<?php
					// The primary CTA button
					?>
					<a href="<?php echo $nav_cta_url; ?>" 
					id="header-cta" 
					class="cta primary-cta footer-cta-link logo" 
					data-scroll><?php echo $nav_cta_text; ?></a>
					<nav id="site-navigation" 
					class="main-navigation nav-collapse" 
					role="navigation">
						<?php wp_nav_menu( array( 
											'theme_location' 	=> 'menu-1',
											'menu_id' 			=> 'primary-menu',
											'container'			=> false,
					 					) ); 
					 	?>
					</nav><!-- #site-navigation -->
				</div><!-- .container -->
			</header><!-- #masthead -->
			<div id="content" class="site-content">