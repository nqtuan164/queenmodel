<?php
/**
 * Template Name: Intro Page
 *
 * @package WordPress
 * @subpackage Queen Model
 * @since Twenty Sixteen 1.0
 */
get_header('empty');
?>
<div id="primary" class="content-area" 
     style="background: url(<?php echo get_template_directory_uri() ?>/img/intro-final.jpg) no-repeat center;height: 100%;background-size: cover;">
    <main id="main" class="site-main" role="main">
        <div class="contact-info">
            <ul>
                <li class="tel">
                    <a>0123 8877777<br />0164 8077777</a>
                </li>
                <li class="social social-fb">
                    <a href="https://www.facebook.com/queenmodel.vn/"></a>
                </li>
                <li class="social social-gg">
                    <a></a>
                </li>
            </ul>
        </div>
        <div class="construction">
            <p>
                TRANG WEB HIỆN ĐANG TRONG QUÁ TRÌNH PHÁT TRIỂN
            </p>
        </div>
        <div class="language-bar">
            <ul class="language-chooser language-chooser-text qtranxs_language_chooser" id="qtranslate-chooser">
                <li class="lang-vi"><a href="<?php echo home_url('/vi/home/') ?>" hreflang="vi" title="Tiếng Việt (vi)" class="qtranxs_text qtranxs_text_vi"><span>Tiếng Việt</span></a></li>
                <li class="lang-en"><a href="<?php echo home_url('/en/home/') ?>" hreflang="en" title="English (en)" class="qtranxs_text qtranxs_text_en"><span>English</span></a></li>
            </ul>
        </div>
    </main>
</div>

<?php 
get_footer('empty');
?>