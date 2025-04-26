<?php
/**
 * The template for displaying the footer
 *
 * @package essar
 */

?>

<footer>
    <div class="footer-section">
        <div class="inner-container-space">
            <div class="container">
                <div class="WT-footer-textarea">

                    <div class="top-footer">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/images/white-logo1.png' ); ?>" alt="<?php esc_attr_e( 'Site Logo', 'essar' ); ?>" />
                        </a>
                    </div>

                    <div class="midd-footer">
                            <div class="foot-col-1 mar-R">
							<?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'top-footer-menu',
                                    'menu_class'     => 'list-unstyled foot-page-links',
                                    'container'      => false,
                                )
                            );
                            ?>
                            </div>
                            <div class="foot-col-2 mar-R">
							<h3><?php esc_html_e( 'Our Solutions', 'essar' ); ?></h3>
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'solutions-menu',
                                    'menu_class'     => 'list-unstyled foot-page-links',
                                    'container'      => false,
                                )
                            );
                            ?>
                            </div>
                            <div class="foot-col-3 mar-R">
							<h3><?php esc_html_e( 'Markets', 'essar' ); ?></h3>
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'markets-menu',
                                    'menu_class'     => 'list-unstyled foot-page-links',
                                    'container'      => false,
                                )
                            );
                            ?>
                            </div>
                            <div class="foot-col-4 mar-R">
                              

								<?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'news-room-menu',
                                    'menu_class'     => 'list-unstyled foot-page-links',
                                    'container'      => false,
                                )
                            );
                            ?>
								
                            </div>

                            <div class="foot-col-5">
							<?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'contact-us-menu',
                                    'menu_class'     => 'list-unstyled foot-page-links',
                                    'container'      => false,
                                )
                            );
                            ?>
                            </div>
                            <i class="clearfix"></i>
                        </div> 

                    <div class="bottom-footer">
                        <div class="inner-container2">
                            <div class="WB-footer-textarea">

                                <div class="footer-col-2 mobi">
								<ul class="social-links">
    <?php
    wp_nav_menu(
        array(
            'theme_location' => 'social-menu',
            'container'      => false,
            'items_wrap'     => '%3$s', // Removes default ul
            'walker'         => new Essar_Social_Walker(),
        )
    );
    ?>
    <div class="clearfix"></div>
</ul>

                                    <div class="clearfix"></div>
                                </div>

                                <div class="footer-col-1">
                                    <span>©<?php echo esc_html( gmdate( 'Y' ) ); ?>. <?php esc_html_e( 'All rights reserved', 'essar' ); ?></span>
                                </div>

                                <div class="footer-col-2 desktop">
								<ul class="social-links">
    <?php
    wp_nav_menu(
        array(
            'theme_location' => 'social-menu',
            'container'      => false,
            'items_wrap'     => '%3$s', // Removes default ul
            'walker'         => new Essar_Social_Walker(),
        )
    );
    ?>
    <div class="clearfix"></div>
</ul>
                                </div>

                                <div class="footer-col-3">
                                    <div class="pixel-foot">
                                        <span class="design-by"><?php esc_html_e( 'Designed by', 'essar' ); ?></span>
                                        <a href="https://www.thepixelcollective.in/" target="_blank" rel="noopener noreferrer">
                                            <span class="pixel-logo">
                                                <img src="<?php echo esc_url( get_template_directory_uri() . '/images/logomark.png' ); ?>" alt="<?php esc_attr_e( 'The Pixel Collective Logo', 'essar' ); ?>" />
                                            </span>
                                            <span class="t-text">
                                                <p class="the-pixel"><?php esc_html_e( 'the', 'essar' ); ?></p>
                                                <p><?php esc_html_e( 'Pixel collective', 'essar' ); ?></p>
                                            </span>
                                        </a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
