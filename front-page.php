<?php
/**
 * Template Name: Home Page Template
 *
 * The template for displaying the home page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Essar
 */

get_header();
?>
<section class="Home-banner-section" id="homeSectionTwo">
	<div class="video-section">
		<div class="black_bg"></div>
		<div class="video-wrapper">
			<video autoplay muted loop playsinline preload="metadata">
				<source src="<?php the_field( 'banner_video' ); ?>" type="video/mp4">
			</video>

			<div class="banner-textarea bannertitle">
				<div class="container">
					<div class="banner-left-path">
						<div class="imagerevealRight">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/images/left-Path.png' ); ?>" class="desk-b" alt="Left Path">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/images/banner-mobi-path.png' ); ?>" class="mobi-b" alt="Banner Mobile Path">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/images/ipad-path.png' ); ?>" class="ipad-b" alt="iPad Path">
						</div>
					</div>
					<div class="inner-container2">
						<h2 class="left-path roboto-custom offset-header-odd"><?php the_field( 'title' ); ?></h2>
						<h2 class="right-path roboto-custom offset-header-even"><?php the_field( 'sub_title' ); ?></h2>
						<h2 class="mobile-banner"><?php the_field( 'mobile_title' ); ?></h2>

						<div class="para-button-area offset-header-even bannertopslide">
							<div class="paragraph">
								<p><?php the_field( 'description' ); ?></p>
							</div>
							<div class="story-button">
								<?php
								$link = get_field( 'our_story_button' );
								if ( $link ) :
									$link_url    = isset( $link['url'] ) ? $link['url'] : '';
									$link_title  = isset( $link['title'] ) ? $link['title'] : '';
									$link_target = isset( $link['target'] ) ? $link['target'] : '_self';
									?>
									<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
										<?php echo esc_html( $link_title ); ?>
										<span class="arrow">
											<img src="<?php echo esc_url( get_template_directory_uri() . '/images/Arrow-3.png' ); ?>" alt="Arrow">
										</span>
										<span class="arrow2">
											<img src="<?php echo esc_url( get_template_directory_uri() . '/images/Arrow-3.png' ); ?>" alt="Arrow">
										</span>
									</a>
								<?php endif; ?>
							</div>
						</div>
					</div>

					<div class="banner-right-path">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/right-path1.png' ); ?>" class="desk-b" alt="Right Path">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/home_banner_right_mobile.png' ); ?>" class="mobi-b" alt="Mobile Right Path">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/home_banner_right_mobile.png' ); ?>" class="ipad-b" alt="iPad Right Path">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="about-essar-section" id="homeSectionOne">
	<div class="container">
		<div class="inner-container2">
			<div class="top-ab-area wool-paralax">
				<div class="left-tbp-area bannertitle">
					<div class="ab-paragraph">
					<?php the_field( 'paragraph_left' ); ?>
					</div>
				</div>
				<div class="right-tbp-area bannertitle">
					<p>
					<?php the_field( 'paragraph_right' ); ?>
					</p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

	<div class="ab-img-right imagerevealLeft">
		<img src="<?php echo esc_url( get_template_directory_uri() . '/images/ab-right-img.png' ); ?>" class="layer" data-depth="0.20" alt="About Essar Image">
	</div>
</section>
<section class="about-chart-section header" id="header1">
	<div class="container">
		<div class="inner-container2">
			<div class="chart-area" id="homeSectionThree">
				<div class="ab-count-box">

					<?php if ( have_rows( 'counter_repeater' ) ) : ?>
						<?php
						$index = 0;
						while ( have_rows( 'counter_repeater' ) ) :
							the_row();

							$title       = get_sub_field( 'title' );
							$description = get_sub_field( 'description' );
							$cb_class    = 'CB' . ( ++$index );
							?>
							<div class="count-box <?php echo esc_attr( $cb_class ); ?>">
								<div class="inner-CB-box">
									<div class="chart-tbox2">
										<div class="inn-padd">
											<h3 class="gradient-font"><?php echo esc_html( $title ); ?></h3>
											<h3 class="white-font"><?php echo esc_html( $title ); ?></h3>
										</div>
									</div>
									<div class="clrfix"></div>
								</div>
								<div class="chart-txt">
									<?php echo esc_html( $description ); ?>
								</div>
								<div class="clrfix"></div>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>

					<div class="clrfix"></div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="why-essar-enery-section">
	<div class="h-our-service-section">
		<div class="container">
			<div class="inner-container-box">
				<div class="why_container">
					<div class="left LEFT-list">
						<div class="WEF-title"> <h3><?php the_field( 'why_essar_future_energy_ttitle' ); ?></h3></div>

						<div class="why-essar-enery-tab">
							<?php
							if ( have_rows( 'faq_repeater' ) ) :
								$index = 1;
								while ( have_rows( 'faq_repeater' ) ) :
									the_row();
									$icon         = get_sub_field( 'icon' );
									$icon_hover   = get_sub_field( 'icon_hover' );
									$title        = get_sub_field( 'title' );
									$description  = get_sub_field( 'description' );
									$active_class = ( 1 === $index ) ? 'active' : '';
									?>
									<div class="accordion-item">
										<div class="accordion-header <?php echo esc_attr( $active_class ); ?>" id="toggleText<?php echo esc_attr( $index ); ?>">
											<div class="WE-img">
												<div class="IWE-img">
													<img data-src="<?php echo esc_url( $icon ); ?>" src="<?php echo esc_url( $icon ); ?>" alt="" class="img-inactive" />
													<img data-src="<?php echo esc_url( $icon_hover ); ?>" src="<?php echo esc_url( $icon_hover ); ?>" alt="" class="img-active" />
												</div>
												<div class="WE-title"><h3><?php echo esc_html( $title ); ?></h3></div>
											</div>  
										</div>
										<div class="accordion-content" id="content<?php echo esc_attr( $index ); ?>">
											<div class="WE-txt "><p><?php echo esc_html( $description ); ?></p></div>
										</div>
									</div>
									<?php
									$index++;
								endwhile;
							endif;
							?>
						</div>
					</div>
					<div class="right h-our-service-info">
						<?php
						if ( have_rows( 'faq_repeater' ) ) :
							$counter = 1;
							while ( have_rows( 'faq_repeater' ) ) :
								the_row();
								$image = get_sub_field( 'big_image' );
								if ( $image ) :
									?>
									<div class="image-container h-our-service-info-title" id="image<?php echo esc_attr( $counter ); ?>">
										<img data-src="<?php echo esc_url( $image ); ?>" src="<?php echo esc_url( $image ); ?>" alt="">
									</div>
									<?php
								endif;
								$counter++;
							endwhile;
						endif;
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section><!--End-->
<section class="Essar-future-energy-section" data-aos="zoom-in">
	<div class="EFE-video-area">
		<div class="container">
			<div class="video-container">
				<video autoplay muted loop>
					<source src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/essar-energy.mp4" type="video/mp4" />
					<?php esc_html_e( 'Your browser does not support HTML5 video.', 'essar' ); ?>
				</video>
				<div class="EFE-overlay"></div>
				<div class="video-txt">

					<div class="top-path">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/ece-path.png" alt="<?php esc_attr_e( 'Top path decorative image', 'essar' ); ?>"/>
					</div>
					<div class="midd-area">
						<div class="EFE-Left-area">
							<div class="EFE-content">
								<h4><?php the_field( 'left_title' ); ?></h4>
								<p><?php the_field( 'left_description' ); ?></p>
							</div>
						</div>
						<div class="EFE-Midd-area">
							<div class="mobi-top-path">
								<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/top_mobi_path.png" alt="<?php esc_attr_e( 'Mobile top path decorative image', 'essar' ); ?>"/>
							</div>
							<div class="EFE-content">
								<span class="CEC-title"><?php the_field( 'circular_economy_title' ); ?></span>
								<h4><?php the_field( 'middle_title' ); ?></h4>
								<p><?php the_field( 'middle_description' ); ?></p>
							</div>
							<div class="mobi-bottom-path">
								<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/bottom_mobi_path.png" alt="<?php esc_attr_e( 'Mobile bottom path decorative image', 'essar' ); ?>"/>
							</div>
						</div>
						<div class="EFE-Right-area">
							<div class="EFE-content">
								<h4><?php the_field( 'right_title' ); ?></h4>
								<p><?php the_field( 'right_description' ); ?></p>
							</div>
						</div>
					</div>
					<div class="bottom-path">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/ece-path1.png" alt="<?php esc_attr_e( 'Bottom path decorative image', 'essar' ); ?>"/>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</section>
<section class="Circle-tabs-section" id="homeSectionSix">
	<div class="container">
		<div class="inner-container2">
			<div class="">
				<div class="top-OS-title-area">
					<div class="quote">
						<h3>
							<?php the_field( 'circle_title' ); ?>
						</h3>
					</div>
					<p data-aos="fade-up">
						<?php the_field( 'circle_description' ); ?>
					</p>
					<?php $our_solutions_link = get_field( 'circle_button' ); ?>
					<div class="Gbutton-box">
						<?php if ( $our_solutions_link ) : ?>
							<?php
							$link_url_our_solutions     = $our_solutions_link['url'];
							$link_title_our_solutions   = $our_solutions_link['title'];
							$link_target_our_solutions  = $our_solutions_link['target'] ? $our_solutions_link['target'] : '_self';
							?>
							<a href="<?php echo esc_url( $link_url_our_solutions ); ?>" class="Gbutton our-solution-btn" target="<?php echo esc_attr( $link_target_our_solutions ); ?>">
								<span class="solution-txt"><?php echo esc_html( $link_title_our_solutions ); ?></span>
								<span class="arrow">
									<img src="<?php echo esc_url( get_template_directory_uri() . '/images/Arrow-3.png' ); ?>" alt="Arrow">
								</span>
								<span class="arrow2">
									<img src="<?php echo esc_url( get_template_directory_uri() . '/images/Arrow-3.png' ); ?>" alt="Arrow">
								</span>
							</a>
						<?php endif; ?>
					</div>
				</div>

				<div class="circle-section">
					<div class="Ellipse">
						<svg width="1048" height="475" viewBox="0 0 1050 395" fill="none" xmlns="http://www.w3.org/2000/svg">
							<ellipse cx="525" cy="488.5" rx="523" ry="486.5" stroke="#D1D5DB" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="6 12" />
						</svg>
					</div>

					<div class="half-circle-txt">
						<?php
						$items = array();

						if ( have_rows( 'circle_repeater' ) ) {
							while ( have_rows( 'circle_repeater' ) ) {
								the_row();
								$items[] = array(
									'img'   => wp_get_attachment_image_url( get_sub_field( 'image' ), 'full' ),
									'no'    => wp_get_attachment_image_url( get_sub_field( 'number_image' ), 'full' ),
									'title' => get_sub_field( 'title' ),
									'desc'  => get_sub_field( 'description' ),
								);
							}
						}

						foreach ( $items as $index => $item ) :
							$index_plus_one = $index + 1;
							?>
							<div class="item item<?php echo esc_attr( $index_plus_one ); ?>" data-aos="fade-zoom-in"
								data-title="<?php echo esc_attr( $item['title'] ); ?>"
								data-text="<?php echo esc_attr( $item['desc'] ); ?>"
								data-img="<img src='<?php echo esc_url( $item['img'] ); ?>' alt='<?php echo esc_attr( $item['title'] ); ?>' />">
								<h3>
									<span class="number-txt">
										<img src="<?php echo esc_url( $item['no'] ); ?>" alt="Step <?php echo esc_attr( $index_plus_one ); ?>"><br/>
									</span>
									<span class="title-txt"><?php echo esc_html( $item['title'] ); ?></span>
								</h3>
							</div>
						<?php endforeach; ?>
					</div>

					<?php if ( ! empty( $items ) ) : ?>
						<div class="center" id="centerContent">
							<div class="inner-center-area">
								<div class="inner-center">
									<div class="icon">
										<img src="<?php echo esc_url( $items[0]['img'] ); ?>" alt="<?php echo esc_attr( $items[0]['title'] ); ?>">
									</div>
									<h2><?php echo esc_html( $items[0]['title'] ); ?></h2>
									<p><?php echo esc_html( $items[0]['desc'] ); ?></p>
								</div>
							</div>
						</div>
					<?php endif; ?>

					<i class="clearfix"></i>
				</div>

				<div class="mask desk">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/images/mask_group.png' ); ?>" alt="Mask Group">
				</div>
			</div>
		</div>
	</div>
	<div class="mask mobi">
		<img src="<?php echo esc_url( get_template_directory_uri() . '/images/mobile-mask.png' ); ?>" alt="Mobile Mask">
	</div>
</section>
<section class="NewsRoom-section">
	<div class="NR-section">
		<div class="container">
			<div class="inner-container2">
				<div class="NR-title">
					<h3><?php esc_html_e( 'Newsroom', 'essar' ); ?></h3>
					<a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>" class="Gbutton">
						<?php esc_html_e( 'View all', 'essar' ); ?>
						<span class="arrow">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/images/Arrow-3.png' ); ?>" alt="<?php esc_attr_e( 'Arrow', 'essar' ); ?>" />
						</span>
						<span class="arrow2">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/images/Arrow-3.png' ); ?>" alt="<?php esc_attr_e( 'Arrow', 'essar' ); ?>" />
						</span>
					</a>
				</div>

				<div class="NR-list-area">
					<?php
					$args       = array(
						'post_type'      => 'post',
						'posts_per_page' => 3,
					);
					$news_query = new WP_Query( $args );

					if ( $news_query->have_posts() ) :
						while ( $news_query->have_posts() ) :
							$news_query->the_post();
							?>
							<div class="NR-content">
								<div class="INR-content">
									<a href="<?php the_permalink(); ?>">
										<div class="blog-img">
											<?php
											if ( has_post_thumbnail() ) {
												the_post_thumbnail(
													'medium',
													array(
														'alt' => the_title_attribute(
															array(
																'echo' => false,
															)
														),
													)
												);
											} else {
												?>
												<img src="<?php echo esc_url( get_template_directory_uri() . '/images/default-news.png' ); ?>" alt="<?php esc_attr_e( 'Default News Image', 'essar' ); ?>" />
												<?php
											}
											?>
										</div>

										<div class="contxt" data-aos="fade-up">
											<p><?php echo esc_html( wp_trim_words( get_the_title(), 20, '...' ) ); ?></p>
											<div class="bloger-name" data-aos="fade-up">
												<span><?php echo esc_html( get_the_date( 'M d, Y' ) ); ?></span>
												<span class="fr">
													<img src="<?php echo esc_url( get_template_directory_uri() . '/images/nr-button.png' ); ?>" alt="<?php esc_attr_e( 'Read More', 'essar' ); ?>" />
												</span>
											</div>
										</div>
									</a>
								</div>
							</div>
							<?php
						endwhile;
						wp_reset_postdata();
					else :
						?>
						<p><?php esc_html_e( 'No news posts found.', 'essar' ); ?></p>
						<?php
					endif;
					?>
				</div>
			</div>
		</div>
	</div>
	<i class="clearfix"></i>
</section>
<section class="Green-future-section">        
	<div class="inner-container-space">
		<div class="container">
			<div class="container1">
				<div class="inner-green-section">
					<div class="Left-content">
						<h2 data-aos="fade-up">
							<?php the_field( 'green_future_title' ); ?>
						</h2>
						<p data-aos="fade-up" data-aos-delay="300">
						<?php the_field( 'green_future_description' ); ?>
						</p>
						<div class="Gbutton-box" data-aos="fade-up" data-aos-delay="300">
						<?php
						$contact_us_link = get_field( 'green_future_button' );

						if ( $contact_us_link ) :
							$link_url_green    = $contact_us_link['url'];
							$link_title_green  = $contact_us_link['title'];
							$link_target_green = $contact_us_link['target'] ? $contact_us_link['target'] : '_self';
							?>
							<a href="<?php echo esc_url( $link_url_green ); ?>" class="Gbutton" target="<?php echo esc_attr( $link_target_green ); ?>">
								<?php echo esc_html( $link_title_green ); ?>
								<span class="arrow">
									<img src="<?php echo esc_url( get_template_directory_uri() . '/images/Arrow-3.png' ); ?>" alt="<?php esc_attr_e( 'Arrow', 'essar' ); ?>" />
								</span>
								<span class="arrow2">
									<img src="<?php echo esc_url( get_template_directory_uri() . '/images/Arrow-3.png' ); ?>" alt="<?php esc_attr_e( 'Arrow', 'essar' ); ?>" />
								</span>
							</a>
						<?php endif; ?>
						</div>
					</div>
					<div class="Right-content scaleDown">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/zoom-img.png' ); ?>" class="earth-image" alt="<?php esc_attr_e( 'Zoomed Earth', 'essar' ); ?>" />
					</div>
					<i class="clearfix"></i>
				</div>
			</div>
		</div>
	</div>
	<i class="clearfix"></i>
</section>
<?php
get_footer();