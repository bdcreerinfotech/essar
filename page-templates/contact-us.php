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
					<form onsubmit="return validateForm();" novalidate>
						<div class="row">
							<div class="form_div">
								<input type="text" name="firstName" placeholder="<?php esc_attr_e( 'First Name', 'text-domain' ); ?>" required>
							</div>
							<div class="form_div">
								<input type="text" name="lastName" placeholder="<?php esc_attr_e( 'Last Name', 'text-domain' ); ?>" required>
							</div>
						</div>
						<div class="row">
							<div class="form_div">
								<input type="email" name="email" placeholder="<?php esc_attr_e( 'E-mail', 'text-domain' ); ?>" required>
							</div>
							<div class="form_div">
								<input type="tel" name="phone" placeholder="<?php esc_attr_e( 'Phone', 'text-domain' ); ?>" required pattern="[0-9+()\-\s]+">
							</div>
						</div>
						<div class="form_div">
							<textarea name="interest" placeholder="<?php esc_attr_e( 'What are you interested in?', 'text-domain' ); ?>" required></textarea>
						</div>
						<button type="submit">
							<?php esc_html_e( 'Send message', 'text-domain' ); ?> &#8594;
						</button>
					</form>
				</div>

			</div>
		</div>
	</div>
</section>

<?php
get_footer();