<main class="main-wrapper">
  <div class="section">
    <div class="container-medium">
      <div class="padding-vertical">
        <div class="inner-container2">
            <div class="our-solution-section">
              <div class="saf_btn border-btn marBottom20"><h5 class="gradient-font"><?php the_field('out_solution_title'); ?></h5></div>
              <h2 class="hero_title"><?php the_field('our_solutions_sub_title_1'); ?></h2>
              <h2 class="hero_title gradient-font"><?php the_field('our_solutions_sub_title_2'); ?></h2>
              <p class="os_paragraph marTop20"><?php the_field('our_solutions_description'); ?></p>
            </div>
        </div>
      </div>
    </div>
  </div>

  <?php if ( have_rows( 'production_section' ) ) : ?>
	<div class="scroll-section vertical-section section">
		<div class="wrapper">
			<div role="list" class="list">
				<?php
				$index = 0;
				while ( have_rows( 'production_section' ) ) :
					the_row();
					$title            = get_sub_field( 'title' );
					$sub_title        = get_sub_field( 'sub_title' );
					$description      = get_sub_field( 'description' );
					$background_image = get_sub_field( 'background_image' );
					?>

					<div role="listitem" class="item_saf">
						<div class="item_content 
							<?php echo ( 0 === $index ) ? 'plane-section' : 'plant-section'; ?>" 
							<?php
							if ( 0 !== $index && $background_image ) {
								echo 'style="background-image: url(' . esc_url( $background_image ) . ');"'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
							}
							?>>
							<div class="inner-container2">
								<div class="our-production-section">
									<div class="inner-content-area">
										<?php if ( $title ) : ?>
											<div class="saf_btn gradient-btn marBottom20">
												<h5><?php echo esc_html( $title ); ?></h5>
											</div>
										<?php endif; ?>

										<?php if ( $sub_title ) : ?>
											<h2 class="hero_title"><?php echo esc_html( $sub_title ); ?></h2>
										<?php endif; ?>

										<?php if ( $description ) : ?>
											<p class="os_paragraph marTop20">
												<?php echo esc_html( $description ); ?>
											</p>
										<?php endif; ?>
									</div>

									<?php if ( 0 === $index && $background_image ) : ?>
										<img src="<?php echo esc_url( $background_image ); ?>" alt="<?php echo esc_attr( $title ); ?>" class="plane-img">
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>

					<?php $index++; ?>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
<?php endif; ?>
</main>
<!-- Benefits Section -->
<section class="benefits-section animate-on-scroll">
	<div class="inner-container2">
		<h2 class="heading_title">
			<?php echo esc_html__( 'Who', 'essar' ); ?>
			<span class="gradient-font"><?php echo esc_html__( 'Benefits', 'essar' ); ?></span>
			<?php echo esc_html__( 'from SAF?', 'essar' ); ?>
		</h2>
		<div class="benefits-cards">
			<?php if ( have_rows( 'benefits' ) ) : ?>
				<?php while ( have_rows( 'benefits' ) ) : the_row(); ?>
					<div class="card">
						<?php
						$icon        = get_sub_field( 'icon' );
						$title       = get_sub_field( 'title' );
						$description = get_sub_field( 'description' );
						?>

						<?php if ( $icon ) : ?>
							<img src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>" />
						<?php endif; ?>

						<?php if ( $title ) : ?>
							<h3><?php echo esc_html( $title ); ?></h3>
						<?php endif; ?>

						<?php if ( $description ) : ?>
							<p><?php echo esc_html( $description ); ?></p>
						<?php endif; ?>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</section>


<!-- Partnership Section -->
<section class="partnership-section animate-on-scroll">
  <div class="container">
    <div class="call_to_action_section">
        <div class="inner-container2">
          <div class="Left_cta_section">
            <h2 class="cta_title"><?php the_field('partner_section_title');?></h2>
            <p class="os_paragraph"><?php the_field('partner_section_description');?></p>
           <?php
$contact_link = get_field( 'contact_button_link' ); // ACF Link field
?>
<?php if ( $contact_link ) : ?>
	<div class="partner-btn">
		<a href="<?php echo esc_url( $contact_link['url'] ); ?>" class="contact-bg" target="<?php echo esc_attr( $contact_link['target'] ); ?>">
			<span class="con-txt"><?php echo esc_html( $contact_link['title'] ); ?></span>
			<span class="arrow">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/images/Arrow-3.png' ); ?>" alt="<?php echo esc_attr__( 'Arrow Icon', 'essar' ); ?>">
			</span>
			<span class="arrow2">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/images/Arrow-3.png' ); ?>" alt="<?php echo esc_attr__( 'Arrow Icon', 'essar' ); ?>">
			</span>
		</a>
	</div>
<?php endif; ?>
          </div>

          <?php
          $partner_img =get_field('partner_image');;
          ?>
          <img src="<?php echo esc_url( $partner_img ); ?>" alt="<?php echo esc_attr__( 'Plane and Hand', 'essar' ); ?>" class="partner-img">
        </div>
    </div>
  </div>
</section>

<!-- Browse Other Solutions -->
<section class="browse-solutions animate-on-scroll">
  <div class="container">
    <div class="inner-container2">
      <h2 class="browse-title"><?php echo esc_html__( 'Browse', 'essar' ); ?> <span class="gradient-font"><?php echo esc_html__( 'other Solutions', 'essar' ); ?></span></h2>
      <div class="solutions-grid">
        <div class="solution-card">
          <a href="<?php echo esc_url( '#' ); ?>">
            <div class="solution_img"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/saf/hvo.png' ); ?>" alt="<?php echo esc_attr__( 'HVO Solution', 'essar' ); ?>" /></div>
            <div class="solution_btn_section">
              <span class="solution-txt"><?php echo esc_html__( 'Hydrotreated Vegetable Oil (HVO)', 'essar' ); ?></span>
              <span><img src="<?php echo esc_url( get_template_directory_uri() . '/images/nr-button.png' ); ?>" alt="<?php echo esc_attr__( 'Navigation Arrow', 'essar' ); ?>" /></span>
            </div>
          </a>
        </div>
        <div class="solution-card">
            <a href="<?php echo esc_url( '#' ); ?>">
              <div class="solution_img"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/saf/green_hydrogen.png' ); ?>" alt="<?php echo esc_attr__( 'Green Hydrogen Solution', 'essar' ); ?>" /></div>
              <div class="solution_btn_section">
                <span class="solution-txt"><?php echo esc_html__( 'Green Hydrogen', 'essar' ); ?></span>
                <span><img src="<?php echo esc_url( get_template_directory_uri() . '/images/nr-button.png' ); ?>" alt="<?php echo esc_attr__( 'Navigation Arrow', 'essar' ); ?>" /></span>
              </div>
            </a>
        </div>
        <div class="solution-card">
            <a href="<?php echo esc_url( '#' ); ?>">
              <div class="solution_img"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/saf/green_ammonia.png' ); ?>" alt="<?php echo esc_attr__( 'Green Ammonia Solution', 'essar' ); ?>" /></div>
              <div class="solution_btn_section">
                <span class="solution-txt"><?php echo esc_html__( 'Green Ammonia', 'essar' ); ?></span>
                <span><img src="<?php echo esc_url( get_template_directory_uri() . '/images/nr-button.png' ); ?>" alt="<?php echo esc_attr__( 'Navigation Arrow', 'essar' ); ?>" /></span>
              </div>
            </a>
        </div>
        <div class="solution-card">
            <a href="<?php echo esc_url( '#' ); ?>">
              <div class="solution_img"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/saf/e_methanol.png' ); ?>" alt="<?php echo esc_attr__( 'E-Methanol Solution', 'essar' ); ?>" /></div>
              <div class="solution_btn_section">
                <span class="solution-txt"><?php echo esc_html__( 'E-Methanol', 'essar' ); ?></span>
                <span><img src="<?php echo esc_url( get_template_directory_uri() . '/images/nr-button.png' ); ?>" alt="<?php echo esc_attr__( 'Navigation Arrow', 'essar' ); ?>" /></span>
              </div>
            </a>
        </div>
      </div>
    </div>
  </div>
</section>