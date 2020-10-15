<?php
/**
 * Work Content
 *
 * @package Portfolio
 */

// Vars
$work_title = get_field( 'work_title', 'options' );
?>

<div id="work" class="work-section">
	<?php if ( ! is_404() ) : ?>
		<div  class="container">
	<?php endif; ?>
			<div class="row">

				<?php

				// The title
				// Hide on 404
				if ( ! is_404() ) :
				?>
					<div class="col-md-12">
						<h3><?php echo esc_html( $work_title ); ?></h3>
					</div><!-- .col -->

				<?php
				endif;

				// The example tiles
				// The args
				$args = array(
					'post_type'      => array( 'pp_examples' ),
					'post_status'    => array( 'publish' ),
					'posts_per_page' => '3',
					'orderby'        => 'rand',
				);

				// The query
				$query = new WP_Query( $args );

				// The loop
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post();

							// Vars
							$title                    = get_the_title();
							$cta_text                 = get_field( 'example_tile_cta_text' );
							$content                  = get_field( 'example_tile_content' );
							$modal_logo               = get_field( 'modal_logo' );
							$modal_content            = get_field( 'modal_content' );
							$modal_primary_cta_text   = get_field( 'modal_primary_cta_text' );
							$modal_primary_cta_url    = get_field( 'modal_primary_cta_url' );
							$modal_secondary_cta_text = get_field( 'modal_secondary_cta_text' );
							$modal_secondary_cta_url  = get_field( 'modal_secondary_cta_url' );
				?>
						<a href="" 
						   class="work-section-content-container col-md-4" 
						   data-toggle="modal" 
						   data-target="<?php echo '#' . esc_html( preg_replace( '/ /', '-', strtolower( $title ) ) ) . '-modal'; ?>"
						>
							<div class="work-section-content-block">
								<p>
									<span class="work-section-logo <?php echo esc_attr( preg_replace( '/ /', '-', strtolower( $title ) ) ) . '-logo'; ?>"></span>
										<?php echo esc_html( $content ); ?>
									<span class="pseudo-cta"><?php echo esc_html( $cta_text ); ?></span>
								</p>
						</div><!-- work-section-content-block -->
						</a>

						<?php

						// The modal
						?>
						<div class="modal fade" 
							 id="<?php echo esc_attr( preg_replace( '/ /', '-', strtolower( $title ) ) ) . '-modal'; ?>" 
							 tabindex="-1" 
							 role="dialog" 
							 aria-labelledby="<?php echo esc_attr( $title ) . ' Modal'; ?>" 
							 aria-hidden="true">
							<div class="modal-dialog modal-lg" 
								 role="document">
								<div class="modal-content">
									<div class="modal-header">
										<img src="<?php echo esc_attr( $modal_logo['url'] ); ?>" 
											 alt="<?php echo esc_attr( $modal_logo['alt'] ); ?>" />
										<button type="button" class="close" 
												data-dismiss="modal" 
												aria-label="Close">
											<i class="fa fa-3x fa-close"></i>
										</button><!-- .close -->
								</div><!-- .modal-header -->
								<div class="modal-body">
									<div class="container-fluid">
										<div class="row">

											<?php

											// The overview
											?>
											<div class="col-md-6 modal-overview">
												<h3><?php esc_html_e( 'Overview', 'portfolio' ); ?></h3>
												<?php 
												echo wp_kses_post(
													$modal_content
												);
												?>
												<div class="modal-skills-arrow">
												</div><!-- .modal-skills-arrow -->
											</div><!-- .col -->

											<?php

											// The skills
											?>
											<div class="col-md-6 modal-skills">
												<h3><?php esc_html_e( 'Skills', 'portfolio' ); ?></h3>
												<ul>
													<?php
													if ( have_rows( 'modal_skills_list' ) ) :
														while ( have_rows( 'modal_skills_list' ) ) :

															the_row();
													?>
															<li><?php the_sub_field( 'modal_skills_list_item' ); ?></li>
													<?php
														endwhile;
													endif;
													?>
												</ul>										
											</div><!-- .col -->

										</div><!-- .row -->
									</div><!-- .container-fluid -->
								</div><!-- .modal-body -->

								<?php

								// The CTAs
								?>
								<div class="modal-footer">
									<a role="button" 
									   class="cta primary-cta case-study-cta" 
									   href="<?php echo esc_attr( $modal_primary_cta_url ); ?>" 
								   	>
										<?php echo esc_html( $modal_primary_cta_text ); ?>
									</a>
									<a role="button"
									   class="cta secondary-cta contact-cta"
									   href="<?php echo esc_attr( $modal_secondary_cta_url ); ?>"
									   data-scroll
								   	>
										<?php echo esc_html( $modal_secondary_cta_text ); ?>
									</a>
								</div><!-- .modal-footer -->
								
							</div><!-- .modal-content -->
						</div><!-- .modal-dialog -->
					</div><!-- .modal -->
				<?php
					}
				}

				// Restore original Post Data
				wp_reset_postdata();
				?>
				
			</div><!-- .row -->
	<?php if ( ! is_404() ) : ?>
		</div><!-- .container -->
	<?php endif; ?>
</div><!-- #work -->
