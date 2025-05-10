<?php
/**
 * Template Name: Our Solutions
 *
 * @package essar
 * @subpackage essar
 * @since essar 1.0
 */

get_header();

$template_uri = esc_url( get_template_directory_uri() );
?>

<section class="innovation_bg">
	<div class="container">
		<div class="inner-container2">
			<div class="innovation_hero_bg">
				<img src="<?php echo esc_url( get_field( 'main_image' ) ); ?>" alt="<?php esc_attr_e( 'Main Image', 'essar' ); ?>" />
			</div>
		</div>
	</div>
</section>

<section class="about-essar-section" id="homeSectionOne">
	<div class="container">
		<div class="inner-container2">
			<div class="innovation_cutting_edge wool-paralax">
				<div class="left_innovation animate-left">
					<div class="ab-paragraph">
						<div class="saf_btn border-btn">
							<h5 class="gradient-font"><?php echo esc_html( get_field( 'our_solution_title' ) ); ?></h5>
						</div>
						<h2><?php echo wp_kses_post( get_field( 'our_solution_sub_title' ) ); ?></h2>
					</div>
				</div>
				<div class="right_inno_text animate-right">
					<p><?php echo wp_kses_post( get_field( 'our_solution_description' ) ); ?></p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</section>

<section class="why-essar-enery-section fade-in-up">
	<div class="h-our-service-section">
		<div class="container">
			<div class="inner-container-box">
				<div class="why_container our_strategic-container">
					<div class="left LEFT-list">
						<div class="strategic_advantage_title">
							<h3><?php echo esc_html( get_field( 'our_solution_faq_title' ) ); ?></h3>
						</div>

						<div class="why-essar-enery-tab strategic_advantage_tab">
							<?php if ( have_rows( 'our_solution_faq' ) ) :
								$counter = 5;
								while ( have_rows( 'our_solution_faq' ) ) :
									the_row();
									$icon             = get_sub_field( 'icon' );
									$icon_not_active  = get_sub_field( 'icon_not_active' );
									$title            = get_sub_field( 'title' );
									$description      = get_sub_field( 'description' );
									?>
									<div class="accordion-item">
										<div class="accordion-header <?php echo ( 5 === $counter ) ? 'active' : ''; ?>" id="toggleText<?php echo esc_attr( $counter ); ?>">
											<div class="WE-img">
												<div class="IWE-img">
													<img src="<?php echo esc_url( $icon_not_active ); ?>" alt="" class="img-inactive" />
													<img src="<?php echo esc_url( $icon ); ?>" alt="" class="img-active" />
												</div>
												<div class="WE-title"><h3><?php echo esc_html( $title ); ?></h3></div>
											</div>
										</div>
										<div class="accordion-content" id="content<?php echo esc_attr( $counter ); ?>"<?php echo ( 5 === $counter ) ? ' style="display:block;"' : ''; ?>>
											<div class="WE-txt"><p><?php echo esc_html( $description ); ?></p></div>
										</div>
									</div>
									<?php
									$counter++;
								endwhile;
							endif;
							?>
						</div>
					</div>

					<div class="right h-our-service-info">
						<?php if ( have_rows( 'our_solution_faq' ) ) :
							$counter = 5;
							while ( have_rows( 'our_solution_faq' ) ) :
								the_row();
								$right_image = get_sub_field( 'right_image' );
								?>
								<div class="image-container h-our-service-info-title <?php echo ( 5 === $counter ) ? 'active' : ''; ?>" id="image<?php echo esc_attr( $counter ); ?>">
									<img src="<?php echo esc_url( $right_image ); ?>" alt="<?php esc_attr_e( 'FAQ Image', 'essar' ); ?>" />
								</div>
								<?php
								$counter++;
							endwhile;
						endif;
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container">
		<div class="inner-container2">
			<div class="side-bar">
				<div class="solution_navigation">
					<div class="container">
						<div class="inner-container2">
							<ul>
								<li>
									<?php if ( have_rows( 'our_solution_tab' ) ) :
										$index = 0;
										while ( have_rows( 'our_solution_tab' ) ) :
											the_row();
											$title     = get_sub_field( 'title' );
											$anchor_id = sanitize_title( $title );
											?>
											<a href="#<?php echo esc_attr( $anchor_id ); ?>"<?php echo ( 0 === $index ) ? ' class="active"' : ''; ?>>
												<?php echo esc_html( $title ); ?>
											</a>
											<?php
											$index++;
										endwhile;
									endif;
									?>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="main-content">
				<?php if ( have_rows( 'our_solution_tab' ) ) :
					$i = 0;
					while ( have_rows( 'our_solution_tab' ) ) :
						the_row();
						$title        = get_sub_field( 'title' );
						$description  = get_sub_field( 'description' );
						$contact_link = get_sub_field( 'contact_link' );
						$image        = get_sub_field( 'image' );
						$anchor_id    = sanitize_title( $title );
						?>
						<div id="<?php echo esc_attr( $anchor_id ); ?>" class="solution_box">
							<?php if ( 1 === $i % 2 ) : ?>
								<div class="Right_solution_area Fl mobi-hide">
									<?php if ( ! empty( $image ) ) : ?>
										<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
									<?php endif; ?>
								</div>
							<?php endif; ?>

							<div class="Left_solution_area FR">
								<div class="inn_content">
									<h3 class="FC"><?php echo esc_html( $title ); ?></h3>
									<p><?php echo esc_html( $description ); ?></p>
									<?php if ( ! empty( $contact_link ) && is_array( $contact_link ) ) : ?>
										<a href="<?php echo esc_url( $contact_link['url'] ); ?>" class="common_btn"<?php echo ( ! empty( $contact_link['target'] ) ) ? ' target="' . esc_attr( $contact_link['target'] ) . '"' : ''; ?>>
											<span class="view-txt"><?php echo esc_html( $contact_link['title'] ); ?></span>
											<span class="arrow">
												<img src="<?php echo esc_url( $template_uri . '/images/Arrow-3.png' ); ?>" alt="<?php esc_attr_e( 'Arrow Icon', 'essar' ); ?>" />
											</span>
											<span class="arrow2">
												<img src="<?php echo esc_url( $template_uri . '/images/Arrow-3.png' ); ?>" alt="<?php esc_attr_e( 'Arrow Icon', 'essar' ); ?>" />
											</span>
										</a>
									<?php endif; ?>
								</div>
							</div>

							<?php if ( 1 !== $i % 2 ) : ?>
								<div class="Right_solution_area Fl">
									<?php if ( ! empty( $image ) ) : ?>
										<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
									<?php endif; ?>
								</div>
							<?php else : ?>
								<div class="Right_solution_area Fl mobi-show">
									<?php if ( ! empty( $image ) ) : ?>
										<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
									<?php endif; ?>
								</div>
							<?php endif; ?>
						</div>
						<?php
						$i++;
					endwhile;
				endif;
				?>
			</div>
		</div>
	</div>
</section>

<section class="partnership-section solution_cta_section">
	<div class="container">
		<div class="call_to_action_section">
			<div class="inner-container2">
				<div class="Left_cta_section">
					<h2 class="cta_title"><?php the_field('our_solution_last_section_title'); ?></h2>
					<p class="os_paragraph"><?php the_field('our_solution_last_section_description'); ?></p>
					<div class="partner-btn">
						<?php
                        $our_solution_last_section_link = get_field( 'our_solution_last_section_link' );
                        if ( $our_solution_last_section_link ) :
                            $contact_url_our_solution    = esc_url( $our_solution_last_section_link['url'] );
                            $contact_title_our_solution  = esc_html( $our_solution_last_section_link['title'] );
                            $contact_target_our_solution = isset( $our_solution_last_section_link['target'] ) ? esc_attr( $our_solution_last_section_link['target'] ) : '_self';
                            ?>
                            <a href="<?php echo $contact_url_our_solution; ?>" target="<?php echo $contact_target_our_solution; ?>" class="contact-bg">
                                <span class="con-txt"><?php echo $contact_title_our_solution; ?></span>
                                <span class="arrow">
                                    <img src="<?php echo esc_url( $template_uri . '/images/Arrow-3.png' ); ?>" alt="<?php esc_attr_e( 'Arrow Icon', 'essar' ); ?>" />
                                </span>
                                <span class="arrow2">
                                    <img src="<?php echo esc_url( $template_uri . '/images/Arrow-3.png' ); ?>" alt="<?php esc_attr_e( 'Arrow Icon', 'essar' ); ?>" />
                                </span>
                            </a>
                        <?php endif; ?>
					</div>
				</div>
				<img src="<?php the_field('our_solution_last_section_image'); ?>" alt="<?php esc_attr_e( 'Earth', 'essar' ); ?>" class="partner-img" />
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
?>
