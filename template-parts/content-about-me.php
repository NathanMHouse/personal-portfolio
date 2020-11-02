<?php
/**
 * About Me Content
 *
 * @package Portfolio
 */

// Vars
$about_me_title = get_field( 'about_me_title', 'options' );
$about_me_text  = get_field( 'about_me_text', 'options' );
$skills_title   = get_field( 'skills_title', 'options' );
?>

<section id="about-me" class="about-me-section">
	<div class="container">
		<div class="row">

			<?php

			// The title and intro text
			?>
			<div class="about-me-content-text col-md-7">
				<h2><?php echo esc_html( $about_me_title ); ?></h2>
				<?php
				echo wp_kses_post(
					$about_me_text
				);
				?>
			</div><!-- .about-me-content-text -->

			<?php

			// The skills block
			?>
			<div class="about-me-content-skills col-md-4 col-md-offset-1">
				<h2><?php echo esc_html( $skills_title ); ?></h2>
				<ul>
					<?php
					if ( have_rows( 'skills_list_items', 'options' ) ) :
						while ( have_rows( 'skills_list_items', 'options' ) ) :

							the_row();

							// Vars
							$skills_list_item_type  = get_sub_field( 'skills_list_item_icon_type' );
							$skills_list_item_icon  = get_sub_field( 'skills_list_item_icon' );
							$skills_list_item_image = get_sub_field( 'skills_list_item_image' );
							$skills_list_item_text  = get_sub_field( 'skills_list_item_text' );
					?>
							<li>
								<?php if ( 'icon' === $skills_list_item_type ) : ?>
									<i class="fa <?php echo esc_attr( $skills_list_item_icon ); ?>"></i>
								<?php else : ?>
									<img src="<?php echo esc_attr( $skills_list_item_image['url'] ); ?>" 
										 alt="<?php echo esc_attr( $skills_list_item_image['alt'] ); ?>" />
								<?php endif; ?>
								<?php echo esc_html( $skills_list_item_text ); ?>
							</li>
					<?php
						endwhile;
					endif;
					?>
				</ul>
			</div><!-- .about-me-content-skills -->
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #about-me -->
