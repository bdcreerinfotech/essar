<?php
/**
* Template Name: Contact Us
*
* @package essar
* @subpackage essar
* @since essar 1.0
*/

get_header();
?>
<section class="contact_us_section">
	<div class="container">
		<div class="inner-container2">
			<div class="inner_contact_us">
				<div class="Left_contact">
					<h3>
					<?php the_field('contact_us_title'); ?>
					</h3>
					<p>
					<?php the_field('contact_us_description'); ?>
					</p>
					<div class="mail_text">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/mailto.png' ); ?>" alt="<?php esc_attr_e( 'Mail icon', 'text-domain' ); ?>" />
						<a href="mailto:<?php the_field('contact_us_email'); ?>"><?php the_field('contact_us_email'); ?></a>
					</div>
				</div>

				<div class="Right_contact">
					<?php echo do_shortcode('[contact-form-7 id="1231511" title="Contact form"]'); ?>
				</div>

			</div>
		</div>
	</div>
</section>

<?php
get_footer();