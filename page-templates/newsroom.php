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
						<h1 class="inner_heading_title"><?php echo esc_html( 'Newsroom' ); ?></h1>
					</div>
					<div class="tab-wrapper">
						<div class="news_tabs">
							<button class="tab-button active" data-target="news"><?php echo esc_html( 'News' ); ?></button>
							<button class="tab-button" data-target="videos"><?php echo esc_html( 'Videos' ); ?></button>
							<button class="tab-button" data-target="downloads"><?php echo esc_html( 'Downloads' ); ?></button>
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
												<img src="<?php echo esc_url( $default_img ); ?>" alt="Default image">
											<?php endif; ?>
											<div class="card-body">
												<p><?php the_title(); ?></p>
											</div>
											<div class="card-footer">
												<span><?php echo esc_html( get_the_date( 'M d, Y' ) ); ?></span>
												<img src="<?php echo esc_url( $template_uri ); ?>/images/nr-button.png" alt="Arrow icon">
											</div>
										</a>
									</div>
								</div>
								<?php
							endwhile;
							wp_reset_postdata();
						else :
							echo '<div class="no-record-found">No news found.</div>';
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
												<img src="<?php echo esc_url( $template_uri ); ?>/images/newsroom/VI.png" class="newsroom_video_icons" alt="Play">
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
							echo '<div class="no-record-found">No videos found.</div>';
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
										<a href="<?php echo esc_url( $file_url ); ?>" download  target="_blank" rel="noopener">
											<div class="video_IMG">
												<?php
												if ( has_post_thumbnail() ) :
													the_post_thumbnail( 'custom-thumb-340x200' );
												endif;
												?>
												<img src="<?php echo esc_url( $template_uri ); ?>/images/newsroom/download_icon.png" class="newsroom_video_icons" alt="Download">
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
							echo '<div class="no-record-found">No downloads found.</div>';
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
		<span class="close-popup mobi-close"><img src="<?php echo esc_url( $template_uri ); ?>/images/about/close_icon.png" alt="Close"></span>
		<iframe id="videoFrame" width="100%" height="100%" frameborder="0" allowfullscreen></iframe>
		<span class="close-popup desk-close" onclick="closeVideo()"><img src="<?php echo esc_url( $template_uri ); ?>/images/about/close_icon.png" alt="Close"></span>
	</div>
</div>



<?php get_footer(); ?>
