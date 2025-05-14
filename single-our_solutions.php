<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package essar
 */

get_header();

?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			global $post;
		$slug = get_post_field( 'post_name', $post->ID );
		
		if ($slug == 'hydrotreated-vegetable-oil-hvo' || $slug == 'green-hydrogen' ||  $slug == 'green-ammonia' || $slug == 'renewable-hydrogen-co₂-utilization') {
			get_template_part( 'template-parts/content', 'hvo' );
		}else
		{
			get_template_part( 'template-parts/content', get_post_type() );
		}
			

			

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
