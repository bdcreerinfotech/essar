<?php
/**
 * Template Name: Newsroom
 * Description: Newsroom template with dynamic videos, modals, and tabs.
 *
 * @package essar
 */

get_header();

$template_uri = esc_url( get_template_directory_uri() );
$default_img  = esc_url( get_template_directory_uri() . '/images/default-news.png' );
?>

<section class="Newsroom_section">
	<div class="inner_NS_area">
		<div class="container">
			<div class="inner-container2">
				<div class="NS_Main_area">
					<div class="newsroom_title_section">
						<h1 class="inner_heading_title"><?php echo esc_html__( 'Newsroom', 'essar' ); ?></h1>
					</div>
					<div class="tab-wrapper">
						<div class="news_tabs">
							<button class="tab-button active" data-target="news"><?php echo esc_html__( 'News', 'essar' ); ?></button>
							<button class="tab-button" data-target="videos"><?php echo esc_html__( 'Videos', 'essar' ); ?></button>
							<button class="tab-button" data-target="downloads"><?php echo esc_html__( 'Downloads', 'essar' ); ?></button>
						</div>
					</div>

					<!-- News Section -->
					<div class="content-section active" id="news">
						<?php
						$news_query = new WP_Query(
							array(
								'post_type'      => 'post',
								'posts_per_page' => 9,
							)
						);
						if ( $news_query->have_posts() ) :
							while ( $news_query->have_posts() ) :
								$news_query->the_post();
								$news_url = get_field( 'news_url' );
								?>
								<div class="grid">
									<div class="card">
										<a href="<?php echo esc_url( $news_url ? $news_url : '#' ); ?>">
											<?php
											if ( has_post_thumbnail() ) :
												the_post_thumbnail( 'custom-thumb-340x200' );
											else :
												?>
												<img src="<?php echo esc_url( $default_img ); ?>" alt="<?php esc_attr_e( 'Default image', 'essar' ); ?>">
											<?php endif; ?>
											<div class="card-body">
												<p><?php the_title(); ?></p>
											</div>
											<div class="card-footer">
												<span><?php echo esc_html( get_the_date( 'M d, Y' ) ); ?></span>
												<img src="<?php echo esc_url( $template_uri ); ?>/images/nr-button.png" alt="<?php esc_attr_e( 'Arrow icon', 'essar' ); ?>">
											</div>
										</a>
									</div>
								</div>
								<?php
							endwhile;
							wp_reset_postdata();
						else :
							echo '<div class="no-record-found">' . esc_html__( 'No news found.', 'essar' ) . '</div>';
						endif;
						?>
					</div>

					<!-- Videos Section -->
					<div class="content-section" id="videos">
						<?php
						$video_query = new WP_Query(
							array(
								'post_type'      => 'video',
								'posts_per_page' => 9,
							)
						);
						if ( $video_query->have_posts() ) :
							while ( $video_query->have_posts() ) :
								$video_query->the_post();
								$video_url = get_field( 'video_url' );
								?>
								<div class="grid">
									<div class="card">
										<a href="#" class="video-link" data-video-url="<?php echo esc_url( $video_url ); ?>">
											<div class="video_IMG">
												<?php
												if ( has_post_thumbnail() ) :
													the_post_thumbnail( 'custom-thumb-340x200' );
												endif;
												?>
												<img src="<?php echo esc_url( $template_uri ); ?>/images/newsroom/VI.png" class="newsroom_video_icons" alt="<?php esc_attr_e( 'Play', 'essar' ); ?>">
											</div>
											<div class="card-body">
												<p><?php the_title(); ?></p>
											</div>
											<div class="card-footer">
												<span><?php echo esc_html( get_the_date( 'M d, Y' ) ); ?></span>
											</div>
										</a>
									</div>
								</div>
								<?php
							endwhile;
							wp_reset_postdata();
						else :
							echo '<div class="no-record-found">' . esc_html__( 'No videos found.', 'essar' ) . '</div>';
						endif;
						?>
					</div>

					<!-- Downloads Section -->
					<div class="content-section" id="downloads">
						<?php
						$download_query = new WP_Query(
							array(
								'post_type'      => 'download',
								'posts_per_page' => 9,
							)
						);
						if ( $download_query->have_posts() ) :
							while ( $download_query->have_posts() ) :
								$download_query->the_post();
								$file_url = get_field( 'file_url' );
								?>
								<div class="grid">
									<div class="card">
										<a href="<?php echo esc_url( $file_url ); ?>" download target="_blank" rel="noopener noreferrer">
											<div class="video_IMG">
												<?php
												if ( has_post_thumbnail() ) :
													the_post_thumbnail( 'custom-thumb-340x200' );
												endif;
												?>
												<img src="<?php echo esc_url( $template_uri ); ?>/images/newsroom/download_icon.png" class="newsroom_video_icons" alt="<?php esc_attr_e( 'Download', 'essar' ); ?>">
											</div>
											<div class="card-body">
												<p><?php the_title(); ?></p>
											</div>
											<div class="card-footer">
												<span><?php echo esc_html( get_the_date( 'M d, Y' ) ); ?></span>
											</div>
										</a>
									</div>
								</div>
								<?php
							endwhile;
							wp_reset_postdata();
						else :
							echo '<div class="no-record-found">' . esc_html__( 'No downloads found.', 'essar' ) . '</div>';
						endif;
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Modal -->
<div id="videoModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.8); justify-content:center; align-items:center; z-index:1000;">
	<div class="popup-content">
		<span class="close-popup mobi-close"><img src="<?php echo esc_url( $template_uri ); ?>/images/about/close_icon.png" alt="<?php esc_attr_e( 'Close', 'essar' ); ?>"></span>
		<iframe id="videoFrame" width="100%" height="100%" frameborder="0" allowfullscreen></iframe>
		<span class="close-popup desk-close" onclick="closeVideo()"><img src="<?php echo esc_url( $template_uri ); ?>/images/about/close_icon.png" alt="<?php esc_attr_e( 'Close', 'essar' ); ?>"></span>
	</div>
</div>

<section class="partnership-section solution_cta_section animate-on-scroll">
	<div class="container">
		<div class="call_to_action_section">
			<div class="inner-container2">
				<div class="Left_cta_section">
					<h2 class="cta_title">
						<?php the_field( 'newsroom_last_room_title' ); ?>
					</h2>
					<p class="os_paragraph">
						<?php the_field( 'newsroom_last_section_description' ); ?>
					</p>
					<div class="partner-btn">
						<?php
						$contact_us_link = get_field( 'newsroom_last_section_link' );

						if ( $contact_us_link ) :
							$link_url    = esc_url( $contact_us_link['url'] );
							$link_title  = esc_html( $contact_us_link['title'] );
							$link_target = ! empty( $contact_us_link['target'] ) ? esc_attr( $contact_us_link['target'] ) : '_self';
							?>
							<a href="<?php echo esc_url( $link_url ); ?>" class="contact-bg" target="<?php echo esc_attr( $link_target ); ?>">
								<span class="con-txt"><?php echo esc_html( $link_title ); ?></span>
								<span class="arrow">
									<img src="<?php echo esc_url( get_template_directory_uri() . '/images/Arrow-3.png' ); ?>" alt="<?php esc_attr_e( 'Arrow', 'essar' ); ?>">
								</span>
								<span class="arrow2">
									<img src="<?php echo esc_url( get_template_directory_uri() . '/images/Arrow-3.png' ); ?>" alt="<?php esc_attr_e( 'Arrow', 'essar' ); ?>">
								</span>
							</a>
						<?php endif; ?>
					</div>
				</div>

				<img src="<?php echo esc_url( get_field( 'newsroom_last_section_image' ) ); ?>" alt="<?php esc_attr_e( 'Earth', 'essar' ); ?>" class="partner-img">
			</div>
		</div>
	</div>
</section>

<?php
get_footer();