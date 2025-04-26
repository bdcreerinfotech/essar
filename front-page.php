<?php
/**
 * Template Name: Home Page Template
 *
 * The template for displaying all pages.
 * This is the template that displays all pages by default.
 * Other 'pages' on your WordPress site may use a different template.
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
				<source src="<?php echo esc_url( get_template_directory_uri() . '/images/flying-airplane-at-sunset-over-a-building-with-veg.mp4' ); ?>" type="video/mp4">
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
						<h2 class="left-path roboto-custom offset-header-odd">Sustainable Fuels.</h2>
						<h2 class="right-path roboto-custom offset-header-even">Limitless Possibilities.</h2>
						<h2 class="mobile-banner">Sustainable Fuels. Limitless Possibilities.</h2>

						<div class="para-button-area offset-header-even bannertopslide">
							<div class="paragraph">
								<p>Essar Future Energy is leading India's energy transition by building the country's first and largest greenfield biofuels complex, designed to produce next-generation renewable fuels like Sustainable Aviation Fuel (SAF), Hydrotreated Vegetable Oil (HVO), Green Hydrogen, Green Ammonia, and e-Methanol.</p>
							</div>
							<div class="story-button">
								<a href="#">
									<?php esc_html_e( 'Our Story', 'essar' ); ?>
									<span class="arrow">
										<img src="<?php echo esc_url( get_template_directory_uri() . '/images/Arrow-3.png' ); ?>" alt="Arrow">
									</span>
									<span class="arrow2">
										<img src="<?php echo esc_url( get_template_directory_uri() . '/images/Arrow-3.png' ); ?>" alt="Arrow">
									</span>
								</a>
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
                        <span>
                            <?php esc_html_e( 'With a mission to ', 'essar' ); ?>
                            <span class="gradient-font"><?php esc_html_e( 'decarbonize hard-to-', 'essar' ); ?></span>
                            <span class="gradient-font"><?php esc_html_e( 'abate sectors', 'essar' ); ?></span>
                            <?php esc_html_e( ' such as aviation, road, and marine transport industries, we are creating ', 'essar' ); ?>
                            <span class="gradient-font"><?php esc_html_e( 'future-ready energy solutions', 'essar' ); ?></span>
                            <?php esc_html_e( ' that will significantly reduce emissions and support global net-zero ambitions.', 'essar' ); ?>
                        </span>
                    </div>
                </div>
                <div class="right-tbp-area bannertitle">
                    <p>
                        <?php esc_html_e( 'As a pioneer in India’s green energy landscape, Essar Future Energy is not just shaping the future of energy - we are powering a more sustainable world for generations to come.', 'essar' ); ?>
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

                    <div class="count-box CB1">
                        <div class="inner-CB-box">
                            <div class="chart-tbox2">
                                <div class="inn-padd">
                                    <h3 class="gradient-font"><?php esc_html_e( '2 Million+', 'essar' ); ?></h3>
                                    <h3 class="white-font"><?php esc_html_e( '2 Million+', 'essar' ); ?></h3>
                                </div>
                            </div>
                            <i class="clrfix"></i>
                        </div>
                        <div class="chart-txt"><?php esc_html_e( 'Tonnes of Low-Carbon Sustainable Biofuels to be produced annually', 'essar' ); ?></div>
                        <i class="clrfix"></i>
                    </div>

                    <div class="count-box CB2">
                        <div class="inner-CB-box">
                            <div class="chart-tbox2">
                                <div class="inn-padd">
                                    <h3 class="gradient-font"><?php esc_html_e( '70%+', 'essar' ); ?></h3>
                                    <h3 class="white-font"><?php esc_html_e( '70%+', 'essar' ); ?></h3>
                                </div>
                            </div>
                            <i class="clrfix"></i>
                        </div>
                        <div class="chart-txt"><?php esc_html_e( 'Reduction in GHG Emissions', 'essar' ); ?></div>
                        <i class="clrfix"></i>
                    </div>

                    <div class="count-box CB3">
                        <div class="inner-CB-box">
                            <div class="chart-tbox2">
                                <div class="inn-padd">
                                    <h3 class="gradient-font"><?php esc_html_e( '1.1 Million+', 'essar' ); ?></h3>
                                    <h3 class="white-font"><?php esc_html_e( '1.1 Million+', 'essar' ); ?></h3>
                                </div>
                            </div>
                            <i class="clrfix"></i>
                        </div>
                        <div class="chart-txt"><?php esc_html_e( 'Tonnes of Green Ammonia and E-Methanol Production Capacity', 'essar' ); ?></div>
                        <i class="clrfix"></i>
                    </div>

                    <div class="count-box CB4">
                        <div class="inner-CB-box">
                            <div class="chart-tbox2">
                                <div class="inn-padd">
                                    <h3 class="gradient-font"><?php esc_html_e( '0.8 Million+', 'essar' ); ?></h3>
                                    <h3 class="white-font"><?php esc_html_e( '0.8 Million+', 'essar' ); ?></h3>
                                </div>
                            </div>
                            <i class="clrfix"></i>
                        </div>
                        <div class="chart-txt"><?php esc_html_e( 'Tonnes of SAF and HVO Production Capacity', 'essar' ); ?></div>
                        <i class="clrfix"></i>
                    </div>

                    <i class="clrfix"></i>

                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
?>
