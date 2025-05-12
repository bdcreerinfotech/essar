<?php
/**
 * Template Name: Newsroom
 *
 * @package essar
 * @subpackage essar
 * @since 1.0.0
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

					<?php
					$paged      = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
					$news_query = new WP_Query(
						array(
							'post_type'      => 'post',
							'posts_per_page' => 3,
							'paged'          => $paged,
						)
					);
					?>
					<div class="content-section active" id="news" data-page="1" data-type="news" data-max="<?php echo esc_attr( $news_query->max_num_pages ?? 5 ); ?>">
						<?php
						if ( $news_query->have_posts() ) :
							while ( $news_query->have_posts() ) :
								$news_query->the_post();
								$news_url = get_field( 'news_url' );
								?>
								<div class="grid">
									<div class="card">
										<a href="<?php echo esc_url( $news_url ); ?>">
											<?php if ( has_post_thumbnail() ) : ?>
												<?php the_post_thumbnail( 'custom-thumb-340x200' ); ?>
											<?php else : ?>
												<img src="<?php echo esc_url( $default_img ); ?>" alt="<?php esc_attr_e( 'Default image', 'essar' ); ?>">
											<?php endif; ?>
											<div class="card-body">
												<p><?php echo esc_html( get_the_title() ); ?></p>
											</div>
											<div class="card-footer">
												<span><?php echo esc_html( get_the_date( 'M d, Y' ) ); ?></span>
												<img src="<?php echo esc_url( $template_uri . '/images/nr-button.png' ); ?>" alt="<?php esc_attr_e( 'Arrow icon', 'essar' ); ?>">
											</div>
										</a>
									</div>
								</div>
								<?php
							endwhile;
							wp_reset_postdata();
						else :
							echo '<p>' . esc_html__( 'No news found.', 'essar' ) . '</p>';
						endif;
						?>
					</div>

					<?php
					$video_query = new WP_Query(
						array(
							'post_type'      => 'video',
							'posts_per_page' => 3,
						)
					);
					?>
					<div class="content-section" id="videos" data-page="1" data-type="video" data-max="<?php echo esc_attr( $video_query->max_num_pages ); ?>">
						<?php
						if ( $video_query->have_posts() ) :
							while ( $video_query->have_posts() ) :
								$video_query->the_post();
								$video_url = get_field( 'video_url' );
								?>
								<div class="grid">
									<div class="card">
										<a href="#" class="video-link" data-video-url="<?php echo esc_url( $video_url ); ?>">
											<div class="video_IMG">
												<?php if ( has_post_thumbnail() ) : ?>
													<?php the_post_thumbnail( 'custom-thumb-340x200' ); ?>
												<?php endif; ?>
												<img src="<?php echo esc_url( $template_uri . '/images/newsroom/VI.png' ); ?>" class="newsroom_video_icons" alt="<?php esc_attr_e( 'Play icon', 'essar' ); ?>">
											</div>
											<div class="card-body">
												<p><?php echo esc_html( get_the_title() ); ?></p>
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
							echo '<p>' . esc_html__( 'No videos found.', 'essar' ) . '</p>';
						endif;
						?>
					</div>

					<?php
					$download_query = new WP_Query(
						array(
							'post_type'      => 'download',
							'posts_per_page' => 3,
						)
					);
					?>
					<div class="content-section" id="downloads" data-page="1" data-type="download" data-max="<?php echo esc_attr( $download_query->max_num_pages ); ?>">
						<?php
						if ( $download_query->have_posts() ) :
							while ( $download_query->have_posts() ) :
								$download_query->the_post();
								$file_url = get_field( 'file_url' );
								?>
								<div class="grid">
									<div class="card">
										<a href="<?php echo esc_url( $file_url ); ?>" target="_blank" rel="noopener">
											<div class="video_IMG">
												<?php if ( has_post_thumbnail() ) : ?>
													<?php the_post_thumbnail( 'custom-thumb-340x200' ); ?>
												<?php endif; ?>
												<img src="<?php echo esc_url( $template_uri . '/images/newsroom/download_icon.png' ); ?>" class="newsroom_video_icons" alt="<?php esc_attr_e( 'Download icon', 'essar' ); ?>">
											</div>
											<div class="card-body">
												<p><?php echo esc_html( get_the_title() ); ?></p>
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
							echo '<p>' . esc_html__( 'No downloads found.', 'essar' ) . '</p>';
						endif;
						?>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>

<div id="videoModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.8); justify-content:center; align-items:center; z-index:1000;">
	<div class="youtube_video_box" style="position:relative; width:80%; max-width:800px;">
		<iframe id="videoFrame" width="100%" height="450" frameborder="0" allowfullscreen></iframe>
		<button onclick="closeVideo()" class="yt_closebtn">X</button>
	</div>
</div>

<?php get_footer(); ?>