<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

</div><!-- .site-content -->

<div class="footer"> 
    <div class="container">
        <div class="row">
            <div class="col-md-3"><a href="#" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Queen Model"></a>
                <p>Công ty TNHH Queen Model <br />Địa chỉ: 123 Nguyễn ABC, P10, Q.8<br />Hotline: 0123 8877777<br /></p>
            </div>
            <div class="col-md-3">
                <h2 class="footer-list-url-title">Dịch vụ Khách hàng</h2>
                <ul class="footer-list-url">
                    <li> <a href=""><i class="fa fa-chevron-circle-right"></i>Tìm Model/PG/PB</a></li>
                    <li> <a href=""><i class="fa fa-chevron-circle-right"></i>Các câu hỏi thường gặp</a></li>
                    <li> <a href=""><i class="fa fa-chevron-circle-right"></i>Thông tin liên hệ</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h2 class="footer-list-url-title">Dành cho model</h2>
                <ul class="footer-list-url">
                    <li> <a href=""><i class="fa fa-chevron-circle-right"></i>Hướng dẫn đăng profile</a></li>
                    <li> <a href=""><i class="fa fa-chevron-circle-right"></i>Chính sách điều khoản</a></li>
                    <li> <a href=""><i class="fa fa-chevron-circle-right"></i>Chính sách bảo mật</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <div data-href="https://www.facebook.com/queenmodel.vn/?fref=ts" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false" class="fb-page"></div>
            </div>
            <div class="col-md-12 copyright">
                <p>&#169 2016 Copyright by QueenModel</p>
            </div>
        </div>
    </div>
</div>

<!--		<footer id="colophon" class="site-footer" role="contentinfo">
<?php if (has_nav_menu('primary')) : ?>
                    <nav class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Footer Primary Menu', 'twentysixteen'); ?>">
    <?php
    wp_nav_menu(array(
        'theme_location' => 'primary',
        'menu_class' => 'primary-menu',
    ));
    ?>
                    </nav> .main-navigation 
<?php endif; ?>

<?php if (has_nav_menu('social')) : ?>
                    <nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e('Footer Social Links Menu', 'twentysixteen'); ?>">
    <?php
    wp_nav_menu(array(
        'theme_location' => 'social',
        'menu_class' => 'social-links-menu',
        'depth' => 1,
        'link_before' => '<span class="screen-reader-text">',
        'link_after' => '</span>',
    ));
    ?>
                    </nav> .social-navigation 
<?php endif; ?>

            <div class="site-info">
<?php
/**
 * Fires before the twentysixteen footer text for footer customization.
 *
 * @since Twenty Sixteen 1.0
 */
do_action('twentysixteen_credits');
?>
                <span class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></span>
                <a href="<?php echo esc_url(__('https://wordpress.org/', 'twentysixteen')); ?>"><?php printf(__('Proudly powered by %s', 'twentysixteen'), 'WordPress'); ?></a>
            </div> .site-info 
        </footer> .site-footer -->
</div><!-- .site-inner -->
</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>
