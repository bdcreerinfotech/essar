<?php
/**
 * Template Name: Market
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
				<img src="<?php the_field( 'market_header_image' ); ?>" alt="<?php echo esc_attr__( 'Market Background', 'essar' ); ?>" />
			</div>
		</div>
	</div>
</section>

<section class="market_geo_section">
	<div class="container-medium">
		<div class="padding-vertical">
			<div class="inner-container2">
				<div class="our-solution-section animate-on-scroll">
					<div class="saf_btn border-btn marBottom20">
						<h5 class="gradient-font"><?php the_field( 'market_page_title' ); ?></h5>
					</div>
					<h2 class="hero_title"><?php the_field( 'market_page_sub_title' ); ?></h2>
					<h2 class="hero_title gradient-font"><?php the_field( 'market_page_sub_title_2' ); ?></h2>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="industries-section">
	<div class="container">
		<?php if ( have_rows( 'markets' ) ) : ?>
			<?php
			$section_index = 0;
			while ( have_rows( 'markets' ) ) :
				the_row();

				$image             = get_sub_field( 'image' );
				$title             = get_sub_field( 'title' );
				$left_description  = get_sub_field( 'left_description' );
				$right_description = get_sub_field( 'right_description' );
				$button_link       = get_sub_field( 'button_link' );
				$is_second         = ( 1 === $section_index );
				$section_class     = $is_second ? 'industries-section geographics_section' : 'industries-section';
				$overflow_class    = $is_second ? 'inner_overflow2' : 'inner_overflow';
				$container_class   = $is_second ? 'inner_industries_container inner_geographics' : 'inner_industries_container';
				?>
				<section class="<?php echo esc_attr( $section_class ); ?>">
					<div class="container">
						<div class="industries_img">
							<div class="<?php echo esc_attr( $container_class ); ?>">
								<div class="<?php echo esc_attr( $overflow_class ); ?>">
									<?php if ( ! empty( $image ) ) : ?>
										<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $title ); ?>" />
									<?php endif; ?>
								</div>
							</div>
						</div>
						<div class="inner-container2 animate-on-scroll">
							<h2 class="inner_heading_title"><?php echo esc_html( $title ); ?></h2>
							<div class="market_industries_section wool-paralax">
								<div class="left_industries">
									<div class="ab-paragraph">
										<p><?php echo wp_kses_post( $left_description ); ?></p>
									</div>
								</div>
								<div class="right_indutries">
									<p><?php echo wp_kses_post( $right_description ); ?></p>
								</div>
								<div class="clearfix"></div>
							</div>
							<?php if ( ! empty( $button_link ) ) : ?>
								<div class="know_more_btn">
									<a href="<?php echo esc_url( $button_link['url'] ); ?>" class="common_btn"<?php echo ( $button_link['target'] ? ' target="' . esc_attr( $button_link['target'] ) . '"' : '' ); ?>>
										<span class="view-txt"><?php echo esc_html( $button_link['title'] ); ?></span>
										<span class="arrow">
											<img src="<?php echo esc_url( $template_uri . '/images/Arrow-3.png' ); ?>" alt="<?php echo esc_attr__( 'Arrow', 'essar' ); ?>">
										</span>
										<span class="arrow2">
											<img src="<?php echo esc_url( $template_uri . '/images/Arrow-3.png' ); ?>" alt="<?php echo esc_attr__( 'Arrow', 'essar' ); ?>">
										</span>
									</a>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</section>
				<?php
				$section_index++;
			endwhile;
			?>
		<?php endif; ?>
	</div>
</section>

<section class="partnership-section solution_cta_section animate-on-scroll">
	<div class="container">
		<div class="call_to_action_section">
			<div class="inner-container2">
				<div class="Left_cta_section">
					<h2 class="cta_title">
						<?php the_field( 'market_last_section_title' ); ?>
					</h2>
					<p class="os_paragraph">
						<?php the_field( 'market_last_section_description' ); ?>
					</p>
					<div class="partner-btn">
						<?php
						$market_link = get_field( 'market_last_section_link' );
						if ( $market_link ) :
							$link_url    = esc_url( $market_link['url'] );
							$link_title  = esc_html( $market_link['title'] );
							$link_target = ( isset( $market_link['target'] ) && $market_link['target'] ) ? esc_attr( $market_link['target'] ) : '_self';
							?>
							<a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>" class="contact-bg">
								<span class="con-txt"><?php echo $link_title; ?></span>
								<span class="arrow">
									<img src="<?php echo esc_url( $template_uri . '/images/Arrow-3.png' ); ?>" alt="<?php echo esc_attr__( 'Arrow', 'essar' ); ?>">
								</span>
								<span class="arrow2">
									<img src="<?php echo esc_url( $template_uri . '/images/Arrow-3.png' ); ?>" alt="<?php echo esc_attr__( 'Arrow', 'essar' ); ?>">
								</span>
							</a>
						<?php endif; ?>
					</div>
				</div>
				<img src="<?php the_field( 'market_last_section_image' ); ?>" alt="<?php echo esc_attr__( 'Earth', 'essar' ); ?>" class="partner-img" />
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
?>