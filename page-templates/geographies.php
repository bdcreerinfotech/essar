<?php
/**
 * Template Name: Geographies
 *
 * @package essar
 * @subpackage essar
 * @since essar 1.0
 */

get_header();

$template_uri = get_template_directory_uri();
?>

<section class="section">
	<div class="container-medium">
		<div class="padding-vertical">
			<div class="inner-container2">
				<div class="our-solution-section">
					<div class="saf_btn border-btn marBottom20">
						<h5 class="gradient-font"><?php echo esc_html( get_field( 'industries_title' ) ); ?></h5>
					</div>
					<h2 class="hero_title"><?php echo wp_kses_post( get_field( 'industries_sub_title' ) ); ?></h2>
					<?php echo wp_kses_post( get_field( 'industries_description' ) ); ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php if ( have_rows( 'industries_tabs' ) ) : ?>
	<section class="industries_top_bar">
		<div class="">
			<div class="inner-container2 fixed-side-bar">
				<div class="side-bar">
					<div class="solution_navigation">
						<div class="container">
							<div class="inner-container2">
								<ul>
									<li>
										<?php
										$is_first = true;
										while ( have_rows( 'industries_tabs' ) ) :
											the_row();
											$tab_name = get_sub_field( 'tab_name' );
											?>
											<a href="#<?php echo esc_attr( sanitize_title( $tab_name ) ); ?>" <?php echo $is_first ? 'class="active"' : ''; ?>>
												<?php echo esc_html( $tab_name ); ?>
											</a>
											<?php
											$is_first = false;
										endwhile;
										?>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="main-content">
				<?php while ( have_rows( 'industries_tabs' ) ) : the_row(); ?>
					<div class="TBG">
						<?php
						$image = get_sub_field( 'industry_image' );
						if ( $image ) :
							?>
							<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
						<?php endif; ?>
					</div>

					<div class="indutries_infomation">
						<div class="inner-container2">
							<div id="<?php echo esc_attr( sanitize_title( get_sub_field( 'tab_name' ) ) ); ?>" class="industries_info_section">
								<div class="industries_infomation_title">
									<div class="inn_info_title">
										<h3 class="third_title FC"><?php echo esc_html( get_sub_field( 'industry_title' ) ); ?></h3>
									</div>
									<div class="inn_pro_info">
										<div class="LSM"><span class="sm_title"><?php esc_html_e( 'Fuel:', 'essar' ); ?></span></div>
										<div class="RSM">
											<?php
											if ( have_rows( 'industry_fuel' ) ) :
												while ( have_rows( 'industry_fuel' ) ) :
													the_row();
													?>
													<span class="sm_info"><?php echo esc_html( get_sub_field( 'fuel_name' ) ); ?></span>
													<?php
												endwhile;
											endif;
											?>
										</div>
									</div>
								</div>

								<div class="midd_industries_area">
									<div class="Left_industries_area FR">
										<div class="inn_content">
											<div class="challeage_title">
												<img src="<?php echo esc_url( $template_uri . '/images/industries/cil_puzzle.png' ); ?>" alt="<?php esc_attr_e( 'Challenge Icon', 'essar' ); ?>" />
												<h5 class="CS_title FC"><?php echo esc_html( get_sub_field( 'challange_title' ) ); ?></h5>
											</div>
											<p><?php echo esc_html( get_sub_field( 'challange_description' ) ); ?></p>
										</div>
									</div>

									<div class="Right_industries_area Fl">
										<div class="inn_content">
											<div class="challeage_title">
												<img src="<?php echo esc_url( $template_uri . '/images/industries/lets-icons_target.png' ); ?>" alt="<?php esc_attr_e( 'Solution Icon', 'essar' ); ?>" />
												<h5 class="CS_title FC"><?php echo esc_html( get_sub_field( 'solution_title' ) ); ?></h5>
											</div>
											<p><?php echo esc_html( get_sub_field( 'solution_textarea' ) ); ?></p>
										</div>
									</div>
								</div>

								<div class="key_benifit_section">
									<div class="KB_title">
										<img src="<?php echo esc_url( $template_uri . '/images/industries/key_benfit.png' ); ?>" alt="<?php esc_attr_e( 'Key Benefit Icon', 'essar' ); ?>" />
										<h5><?php echo esc_html( get_sub_field( 'key_benefits_title' ) ); ?></h5>
									</div>
									<div class="KB_info">
										<p><?php echo esc_html( get_sub_field( 'key_benefits_description' ) ); ?></p>
									</div>
								</div>
							</div> <!-- .industries_info_section -->
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	</section>
<?php endif; ?>

<section class="partnership-section solution_cta_section animate-on-scroll">
	<div class="container">
		<div class="call_to_action_section">
			<div class="inner-container2">
				<div class="Left_cta_section">
					<h2 class="cta_title">
						<?php esc_html_e( 'Committed to delivering scalable, sustainable, and commercially viable clean energy solutions', 'essar' ); ?>
					</h2>
					<p class="os_paragraph">
						<?php esc_html_e( 'Contact us today to partner us in our journey to power the world\'s transition to a net-zero future.', 'essar' ); ?>
					</p>
					<div class="partner-btn">
						<a href="#" class="contact-bg">
							<span class="con-txt"><?php esc_html_e( 'Contact Us', 'essar' ); ?></span>
							<span class="arrow"><img src="<?php echo esc_url( $template_uri . '/images/Arrow-3.png' ); ?>" alt="<?php esc_attr_e( 'Arrow Icon', 'essar' ); ?>"></span>
							<span class="arrow2"><img src="<?php echo esc_url( $template_uri . '/images/Arrow-3.png' ); ?>" alt="<?php esc_attr_e( 'Arrow Icon', 'essar' ); ?>"></span>
						</a>
					</div>
				</div>
				<img src="<?php echo esc_url( $template_uri . '/images/solution/cta_right_img.png' ); ?>" alt="<?php esc_attr_e( 'Earth', 'essar' ); ?>" class="partner-img">
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
