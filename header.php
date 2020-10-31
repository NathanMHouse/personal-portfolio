<?php
/**
 * Header - the template for displaying everythign up until the main content.
 *
 *
 * @package Portfolio
 */

// Vars
$nav_cta_text = get_field( 'nav_cta_text', 'options' );
$nav_cta_url  = get_field( 'nav_cta_url', 'options' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" 
		  content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" 
		  content="IE=edge,chrome=1">
	<link rel="profile" 
		  href="http://gmpg.org/xfn/11">
	<link rel="shortcut icon" 
		  href="<?php echo esc_attr( get_template_directory_uri() ); ?>/assets/images/favicon.png" 
		  type="image/x-icon" />
	<?php wp_head(); ?>
	<!--[if lt IE 9]>
		<script src="<?php echo esc_attr( get_template_directory_uri() ); ?>/assets/js/html5shiv.min.js"></script>
		<script src="<?php echo esc_attr( get_template_directory_uri() ); ?>/assets/js/respond.min.js"></script>
	<![endif]-->
	</head>
	<body <?php body_class(); ?>>
		<div id="page" 
			 class="site">
			<header id="masthead"
					class="site-header">

				<?php

				// The navigation
				?>
				<div class="container">

					<?php

					// Load main nav if on front page
					if ( is_front_page() ) {

						// The primary CTA button
						?>
						<a href="<?php echo esc_attr( $nav_cta_url ); ?>" 
						   id="header-cta" 
						   class="cta primary-cta footer-cta-link logo" 
						   data-scroll><?php echo esc_html( $nav_cta_text ); ?></a>

						<nav id="site-navigation" 
							 class="main-navigation nav-collapse" 
							 role="navigation">
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
									'container'      => false,
								)
							);
							?>
						</nav><!-- #site-navigation -->

					<?php
					} else {

						// The home page link
					?>
						<nav id="site-navigation"
							 class="main-navigation navigation-inner"
							 role="navigation">
							<ul id="menu-inner"
								class="menu">
								<li class="menu-item">
									<a href="<?php echo esc_attr( home_url() ); ?>"><h1><?php bloginfo( 'name' ); ?></h1></a>
								</li>
							</ul>
						</nav>

						<?php

						// The primary CTA button
						?>
						<a href="<?php echo esc_attr( $nav_cta_url ); ?>" 
						   id="header-inner-cta" 
						   class="cta primary-cta footer-cta-link logo" 
						   data-scroll><?php echo esc_html( $nav_cta_text ); ?></a>

					<?php
					}
					?>

				</div><!-- .container -->
			</header><!-- #masthead -->
			<div id="content" 
				 class="site-content <?php echo ( is_front_page() ) ? esc_attr( 'site-content--front-page' ) : ''; ?>">
