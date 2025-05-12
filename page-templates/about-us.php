<?php
/**
* Template Name: About Us
*
* @package essar
* @subpackage essar
* @since essar 1.0
*/

get_header();

// Get template directory URI
$template_uri = get_template_directory_uri();
?>
<main class="main-wrapper">
	<div class="scroll-section vertical-section section">
		<div class="wrapper">
			<div role="list" class="list">
				<?php
				if ( have_rows( 'banner_repeater' ) ) :
					while ( have_rows( 'banner_repeater' ) ) :
						the_row();
						$title           = get_sub_field( 'title' );
						$description     = get_sub_field( 'description' );
						$background_image = get_sub_field( 'background_image' );
						$section_class    = sanitize_title( $title );
						$additional_class = ( 'our mission' === strtolower( $title ) ? 'ab_width' : 'vision' );
						?>
						<div role="listitem" class="item_saf">
							<div 
								class="item_content <?php echo esc_attr( $section_class ); ?>-section" 
								<?php
								if ( $background_image ) :
									?>
									style="background-image: url('<?php echo esc_url( $background_image['url'] ); ?>'); background-size: cover;"
									<?php
								endif;
								?>
							>
								<div class="inner-container2">
									<div class="inner-content-area">
										<div class="saf_btn gradient-btn marBottom20">
											<h5><?php echo esc_html( $title ); ?></h5>
										</div>
										<h2 class="ab_hero_title <?php echo esc_attr( $additional_class ); ?>">
											<?php echo esc_html( $description ); ?>
										</h2>
									</div>
								</div>
							</div>
						</div>
						<?php
					endwhile;
				endif;
				?>
			</div>
		</div>
	</div>
</main>

<section class="leadership">
	<div class="inner-container2">
		<h3 class="leader_title"><?php the_field('leadership_title'); ?></h3>
		<p class="lead-desc">
        <?php the_field('leadership_description'); ?>
		</p>

		<div class="leaders">
			<?php
			$leaders = new WP_Query(
				array(
					'post_type'      => 'team',
					'posts_per_page' => -1,
					'orderby'        => 'menu_order',
					'order'          => 'ASC',
				)
			);

			if ( $leaders->have_posts() ) :
				while ( $leaders->have_posts() ) :
					$leaders->the_post();
					$designation = get_field( 'designation' );
					$popup_id   = 'popup_' . get_the_ID();
					?>
					<div class="leader-card">
						<?php the_post_thumbnail( 'full' ); ?>
						<div class="leader_name_designation">
							<div class="inner_lnd">
								<a href="javascript:void(0);" class="open-popup" data-target="<?php echo esc_attr( $popup_id ); ?>">
									<div class="Left_lnd">
										<h3><?php the_title(); ?></h3>
										<p><?php echo esc_html( $designation ); ?></p>
									</div>
									<div class="Right_lnd">
										<img 
											src="<?php echo esc_url( get_template_directory_uri() . '/images/nr-button.png' ); ?>"
											class="img_size"
											alt="<?php esc_attr_e( 'Button', 'essar' ); ?>"
										/>
									</div>
								</a>
							</div>
						</div>
					</div>
					<?php
				endwhile;
				wp_reset_postdata();
			endif;
			?>
		</div>
	</div>
</section>

<?php
$popup_loop = new WP_Query(
	array(
		'post_type'      => 'team',
		'posts_per_page' => -1,
	)
);

if ( $popup_loop->have_posts() ) :
	while ( $popup_loop->have_posts() ) :
		$popup_loop->the_post();
		$popup_id   = 'popup_' . get_the_ID();
		$designation = get_field( 'designation' );
		$popup_text  = get_the_content();
		?>
		<div id="<?php echo esc_attr( $popup_id ); ?>" class="popup">
			<div class="popup-content"> 
				<button type="button" class="close-popup mobi-close" aria-label="<?php esc_attr_e( 'Close popup', 'essar' ); ?>">
					<img 
						src="<?php echo esc_url( get_template_directory_uri() . '/images/about/close_icon.png' ); ?>"
						alt="<?php esc_attr_e( 'Close', 'essar' ); ?>"
					/>
				</button>
				<div class="inner_popups">
					<div class="Left_leaderimg">
						<?php the_post_thumbnail( 'medium' ); ?>
					</div>
					<div class="Right_leadertext">
						<span class="close-popup desk-close"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/about/close_icon.png' ); ?>" alt="<?php esc_attr_e( 'Close', 'essar' ); ?>" /></span>
						<h3 class="person_name"><?php the_title(); ?></h3>
						<span class="person_designation"><?php echo esc_html( $designation ); ?></span>
						<div class="scroll-txt">
							<p class="martop_24"><?php echo wp_kses_post( $popup_text ); ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	endwhile;
	wp_reset_postdata();
endif;
?>
<?php
get_footer();