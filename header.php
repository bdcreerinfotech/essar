<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package essar
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if ( is_front_page() ) { ?>	
<div id="loader">
    <h1></h1>
  </div> 
  <?php } ?>
<?php wp_body_open(); ?>
<section class="headersection">
	<div class="menu-bg"></div>
	<nav class="navigation">
		<div class="container">
			<div class="inner-container">
				<div class="navbar">

					<div class="logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<?php
							$white_logo = get_field( 'white_logo', 'option' );
							if ( $white_logo ) :
								?>
								<img src="<?php echo esc_url( $white_logo['url'] ); ?>" alt="<?php echo esc_attr( $white_logo['alt'] ); ?>">
							<?php endif; ?>
						</a>
					</div>

					<div class="blacklogo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<?php
							$header_logo = get_field( 'header_logo', 'option' );
							if ( $header_logo ) :
								?>
								<img src="<?php echo esc_url( $header_logo['url'] ); ?>" alt="<?php echo esc_attr( $header_logo['alt'] ); ?>">
							<?php endif; ?>
						</a>
					</div>

					<i class="bx bx-menu"></i>

					<div class="nav-links">
						<div class="sidebar-logo">
							<!-- <span class="logo-name"><img src="images/logo.png" alt="Logo" /></span> -->
							<i class="bx bx-x"></i>
						</div>

						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'primary',
								'menu_class'     => 'links',
								'container'      => false,
								'depth'          => 3,
								'walker'         => new Essar_Walker_Nav_Menu(),
							)
						);
						?>
					</div>

					<?php
					$contact_us_link = get_field( 'contact_us_link', 'option' );

					if ( $contact_us_link ) :
						$contact_url   = $contact_us_link['url'];
						$contact_title = $contact_us_link['title'];
						$contact_target = $contact_us_link['target'] ? $contact_us_link['target'] : '_self';
						?>
						
						 <div class="search-box desktop">
          <a href="<?php echo esc_url( $contact_url ); ?>" class="contact-bg"><span class="con-txt" target="<?php echo esc_attr( $contact_target ); ?>"><?php echo esc_html( $contact_title ); ?></span> <span class="arrow"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/Arrow-3.png' ); ?>"></span><span class="arrow2"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/Arrow-3.png' ); ?>"></span></a>

        </div>
					<?php endif; ?>

				</div><!-- .navbar -->
			</div><!-- .inner-container -->
		</div><!-- .container -->
	</nav>
	 <i class="clearfix"></i>
</section>
