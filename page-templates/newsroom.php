<?php
/**
 * Template Name: Newsroom
 *
 * @package essar
 * @subpackage essar
 * @since essar 1.0
 */

get_header();

$template_uri = esc_url( get_template_directory_uri() );
?>

<section class="section">
    <div class="container-medium">
        <div class="padding-vertical">
            <div class="inner-container2">
                <div class="geographies-section">
                    <div class="saf_btn border-btn marBottom20"><h5 class="gradient-font"><?php echo esc_html( get_field( 'geographies_title' ) ); ?></h5></div>
                    <h2 class="hero_title"><?php echo esc_html( get_field( 'geographies_sub_title' ) ); ?></h2>
                    <h2 class="hero_title gradient-font"><?php echo esc_html( get_field( 'geographies_sub_title_2' ) ); ?></h2>              
                    <p class="os_paragraph marTop20">
                        <?php echo wp_kses_post( get_field( 'geographies_description' ) ); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="geo_ab_section">
    <div class="geographies_about_area">
        <div class="container">
            <div class="inner-container2">
                <div class="inn_geographies">
                    <div class="Left_gab_sec">
                        <p>
                            <?php echo wp_kses_post( get_field( 'key_advantage_description' ) ); ?>
                        </p>
                    </div>
                    <div class="Right_gab_sec">
                        <video autoplay muted loop playsinline preload="metadata">
                            <source src="<?php echo esc_url( get_field( 'key_advantage_video' ) ); ?>" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="industries_top_bar">
    <div class="">
        <div class="inner-container2 fixed-side-bar">
            <div class="side-bar">
                <div class="solution_navigation geo_navigation">
                    <div class="container">
                        <div class="inner-container2">
                            <ul>
                                <li>
                                    <?php
                                    if ( have_rows( 'geographies_tabs' ) ) :
                                        $first = true;
                                        while ( have_rows( 'geographies_tabs' ) ) :
                                            the_row();
                                            $tab_name = get_sub_field( 'tab_name' );
                                            $slug     = sanitize_title_with_dashes( $tab_name );
                                            ?>
                                            <a href="#<?php echo esc_attr( $slug ); ?>"<?php echo $first ? ' class="active"' : ''; ?>>
                                                <?php echo esc_html( $tab_name ); ?>
                                            </a>
                                            <?php
                                            $first = false;
                                        endwhile;
                                    endif;
                                    ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--inner Container2--->

        <div class="main-content">
            <?php
            if ( have_rows( 'geographies_tabs' ) ) :
                while ( have_rows( 'geographies_tabs' ) ) :
                    the_row();
                    $tab_name                = get_sub_field( 'tab_name' );
                    $tab_slug                = sanitize_title_with_dashes( $tab_name );
                    $geographies_image       = get_sub_field( 'geographies_image' );
                    $geographies_title       = get_sub_field( 'geographies_title' );
                    $geographies_sub_title   = get_sub_field( 'geographies_sub_title' );
                    $challange_title         = get_sub_field( 'challange_title' );
                    $challange_description   = get_sub_field( 'challange_description' );
                    $solution_title          = get_sub_field( 'solution_title' );
                    $solution_textarea       = get_sub_field( 'solution_textarea' );
                    $key_benefits_title      = get_sub_field( 'key_benefits_title' );
                    $key_benefits_description = get_sub_field( 'key_benefits_description' );
                    ?>
                    <div class="TBG">
                        <?php if ( $geographies_image ) : ?>
                            <img src="<?php echo esc_url( $geographies_image['url'] ); ?>" alt="<?php echo esc_attr( $geographies_image['alt'] ); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="indutries_infomation">
                        <div class="inner-container2">
                            <div id="<?php echo esc_attr( $tab_slug ); ?>" class="industries_info_section">
                                <div class="industries_infomation_title">
                                    <div class="inn_info_title">
                                        <h3 class="third_title FC"><?php echo esc_html( $geographies_title ); ?></h3>
                                        <h3 class="third_title gradient-font"><?php echo esc_html( $geographies_sub_title ); ?></h3>
                                    </div>
                                </div>

                                <div class="midd_industries_area">
                                    <div class="Left_industries_area FR">
                                        <div class="inn_content">
                                            <div class="challeage_title">
                                                <img src="<?php echo esc_url( $template_uri ); ?>/images/industries/cil_puzzle.png" alt="<?php esc_attr_e( 'Challenge icon', 'essar' ); ?>" />
                                                <h5 class="CS_title FC"><?php echo esc_html( $challange_title ); ?></h5>
                                            </div>
                                            <p><?php echo esc_html( $challange_description ); ?></p>
                                        </div>
                                    </div>
                                    <div class="Right_industries_area Fl">
                                        <div class="inn_content">
                                            <div class="challeage_title">
                                                <img src="<?php echo esc_url( $template_uri ); ?>/images/industries/lets-icons_target.png" alt="<?php esc_attr_e( 'Solution icon', 'essar' ); ?>" />
                                                <h5 class="CS_title FC"><?php echo esc_html( $solution_title ); ?></h5>
                                            </div>
                                            <p><?php echo esc_html( $solution_textarea ); ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="key_benifit_section">
                                    <div class="KB_title">
                                        <img src="<?php echo esc_url( $template_uri ); ?>/images/industries/key_benfit.png" alt="<?php esc_attr_e( 'Key benefit icon', 'essar' ); ?>" />
                                        <h5><?php echo esc_html( $key_benefits_title ); ?></h5>
                                    </div>
                                    <div class="KB_info">
                                        <p><?php echo esc_html( $key_benefits_description ); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
 <!-- Partnership Section -->
 <section class="partnership-section geographies_cta_section animate-on-scroll">
    <div class="container">
      <div class="call_to_action_section">
          <div class="inner-container2">
            <div class="Left_cta_section">
              <h2 class="cta_title"><?php the_field('geographies_global_vision_title'); ?></h2>
              <p class="os_paragraph"><?php the_field('geographies_global_vision_description'); ?></p>
              <?php
$geographies_contact_button = get_field( 'geographies_link' );
if ( $geographies_contact_button ) :
    $geographies_contact_url    = esc_url( $geographies_contact_button['url'] );
    $geographies_contact_title  = esc_html( $geographies_contact_button['title'] );
    $geographies_contact_target = $geographies_contact_button['target'] ? esc_attr( $geographies_contact_button['target'] ) : '_self';
    $template_uri   = get_template_directory_uri();
    ?>
    <div class="partner-btn">
        <a href="<?php echo $geographies_contact_url; ?>" target="<?php echo $geographies_contact_target; ?>" class="contact-bg">
            <span class="con-txt"><?php echo $geographies_contact_title; ?></span>
            <span class="arrow">
                <img src="<?php echo esc_url( $template_uri . '/images/Arrow-3.png' ); ?>" alt="<?php echo esc_attr__( 'Arrow Icon', 'essar' ); ?>">
            </span>
            <span class="arrow2">
                <img src="<?php echo esc_url( $template_uri . '/images/Arrow-3.png' ); ?>" alt="<?php echo esc_attr__( 'Arrow Icon', 'essar' ); ?>">
            </span>
        </a>
    </div>
<?php endif; ?>
            </div>

            <img src="<?php the_field('geographies_image');  ?>" alt="Earth" class="partner-img">
          </div>
      </div>
    </div>
  </section>
<?php
get_footer();