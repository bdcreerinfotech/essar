<?php
/**
 * HVO (Hydrotreated Vegetable Oil) page template.
 *
 * @package YourThemeOrPlugin
 */

?>

<main class="main-wrapper">
	<div class="section">
		<div class="container-medium">
			<div class="padding-vertical">
				<div class="inner-container2">
					<div class="our-solution-section">
						<div class="saf_btn border-btn marBottom20"><h5 class="gradient-font"><?php the_field('hvo_out_solution_title'); ?></h5></div>
						<h2 class="hero_title"><?php the_field('hvo__our_solutions_sub_title_1'); ?> </h2>
						<h2 class="hero_title gradient-font"><?php the_field('hvo_our_solutions_sub_title_2'); ?></h2>
						<p class="os_paragraph marTop20"><?php the_field('hvo_our_solutions_description'); ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php if ( have_rows( 'hvo_production_section' ) ) : ?>
	<div class="scroll-section vertical-section section">
		<div class="wrapper">
			<div role="list" class="list">
				<?php
				while ( have_rows( 'hvo_production_section' ) ) :
					the_row();
					$title           = get_sub_field( 'title' );
					$sub_title       = get_sub_field( 'sub_title' );
					$description     = get_sub_field( 'description' );
					$background_img  = get_sub_field( 'background_image' );
					$bg_img_url      = esc_url( $background_img['url'] );
					$bg_img_alt      = esc_attr( $background_img['alt'] );

					$extra_class = get_sub_field( 'custom_text_class' );
					$extra_class = ! empty( $extra_class ) ? esc_attr( $extra_class ) : '';
					?>
					<div role="listitem" class="item_saf">
						<img src="<?php echo $bg_img_url; ?>" class="ss-desk-show" alt="<?php echo $bg_img_alt; ?>" />
						<img src="<?php echo $bg_img_url; ?>" class="ss-mobile-show" alt="<?php echo $bg_img_alt; ?>" />
						<div class="item_content absolute-section">
							<div class="inner-container2">
								<div class="inner-content-area">
									<?php if ( ! empty( $title ) ) : ?>
										<div class="saf_btn gradient-btn marBottom20">
											<h5><?php echo esc_html( $title ); ?></h5>
										</div>
									<?php endif; ?>

									<?php if ( $sub_title ) : ?>
										<h2 class="hero_title <?php echo $extra_class; ?>"><?php echo esc_html( $sub_title ); ?></h2>
									<?php endif; ?>

									<?php if ( $description ) : ?>
										<p class="os_paragraph marTop20 <?php echo $extra_class; ?>"><?php echo esc_html( $description ); ?></p>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
<?php endif; ?>

</main>

<!-- Benefits Section -->
<section class="benefits-section animate-on-scroll">
	<div class="inner-container2">
		<h2 class="heading_title"><?php the_field('hvo_benefits_title');  ?></h2>
		<!-- Need Four Box Add "four_box" class in benefits-cards class -->
		<?php if ( have_rows( 'hvo_benefits' ) ) : ?>
	<div class="benefits-cards four_box">
		<?php
		while ( have_rows( 'hvo_benefits' ) ) :
			the_row();
			$icon        = get_sub_field( 'icon' );
			$title       = get_sub_field( 'title' );
			$description = get_sub_field( 'description' );

			$icon_url = isset( $icon['url'] ) ? esc_url( $icon['url'] ) : '';
			$icon_alt = isset( $icon['alt'] ) ? esc_attr( $icon['alt'] ) : '';
			?>
			<div class="card">
				<?php if ( $icon_url ) : ?>
					<img src="<?php echo $icon_url; ?>" alt="<?php echo $icon_alt; ?>" />
				<?php endif; ?>

				<?php if ( $title ) : ?>
					<h3><?php echo esc_html( $title ); ?></h3>
				<?php endif; ?>

				<?php if ( $description ) : ?>
					<p><?php echo esc_html( $description ); ?></p>
				<?php endif; ?>
			</div>
		<?php endwhile; ?>
	</div>
<?php endif; ?>
                        
	</div>
	<i class="clearfix"></i>
</section>

<!-- Partnership Section -->
<section class="partnership-section animate-on-scroll">
	<div class="container">
		<div class="call_to_action_section">
			<div class="inner-container2">
				<div class="Left_cta_section">
					<h2 class="cta_title"><?php the_field('hvo_partner_section_title'); ?></h2>
					<p class="os_paragraph"><?php the_field('hvo_partner_section_description'); ?></p>
					<div class="partner-btn">
                        <?php
                        $link = get_field( 'hvo_partner_section_button_link' );
                        if ( $link ) :
                            $link_url    = esc_url( $link['url'] );
                            $link_title  = esc_html( $link['title'] );
                            $link_target = isset( $link['target'] ) ? esc_attr( $link['target'] ) : '_self';
                            $template_uri = esc_url( get_template_directory_uri() );
                            ?>
                            <a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>" class="contact-bg">
                                <span class="con-txt"><?php echo $link_title; ?></span>
                                <span class="arrow">
                                    <img src="<?php echo $template_uri; ?>/images/Arrow-3.png" alt="<?php esc_attr_e( 'Arrow icon', 'essar' ); ?>">
                                </span>
                                <span class="arrow2">
                                    <img src="<?php echo $template_uri; ?>/images/Arrow-3.png" alt="<?php esc_attr_e( 'Arrow icon', 'essar' ); ?>">
                                </span>
                            </a>
                        <?php endif; ?>
                </div>
				</div>

				<img src="<?php the_field('hvo_partner_image'); ?>" alt="Plane and Hand" class="partner-img">
			</div>
		</div>
		<i class="clearfix"></i>
	</div>
</section>

<!-- Browse Other Solutions -->
<section class="browse-solutions animate-on-scroll">
	<div class="container">
		<div class="inner-container2">
			<h2 class="browse-title">Browse <span class="gradient-font">other Solutions</span></h2>
			<div class="solutions-grid">
				<div class="solution-card">
					<a href="<?php echo esc_url( home_url( '/saf' ) ); ?>">
						<div class="solution_img"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/saf/saf.png" alt="SAF solution" /></div>
						<div class="solution_btn_section">
							<span class="solution-txt">Sustainable 
							Aviation Fuel (SAF)</span>
							<span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/nr-button.png" alt="Navigation arrow" /></span>
						</div>
					</a>
				</div>
				<div class="solution-card">
					<a href="<?php echo esc_url( home_url( '/green_hydrogen' ) ); ?>">
						<div class="solution_img"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/saf/green_hydrogen.png" alt="Green hydrogen solution" /></div>
						<div class="solution_btn_section">
							<span class="solution-txt">Green Hydrogen</span>
							<span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/nr-button.png" alt="Navigation arrow" /></span>
						</div>
					</a>
				</div>
				<div class="solution-card">
					<a href="<?php echo esc_url( home_url( '/green_ammonia' ) ); ?>">
						<div class="solution_img"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/saf/green_ammonia.png" alt="Green ammonia solution" /></div>
						<div class="solution_btn_section">
							<span class="solution-txt">Green Ammonia</span>
							<span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/nr-button.png" alt="Navigation arrow" /></span>
						</div>
					</a>
				</div>
				<div class="solution-card">
					<a href="<?php echo esc_url( home_url( '/e_methanol' ) ); ?>">
						<div class="solution_img"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/saf/e_methanol.png" alt="E-Methanol solution" /></div>
						<div class="solution_btn_section">
							<span class="solution-txt">E-Methanol</span>
							<span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/nr-button.png" alt="Navigation arrow" /></span>
						</div>
					</a>
				</div>
			</div>
		</div>
		<i class="clearfix"></i>
	</div>
</section>