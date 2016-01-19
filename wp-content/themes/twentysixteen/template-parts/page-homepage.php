<?php
/**
 * Template Name: Home Page
 *
 * @package WordPress
 * @subpackage Queen Model
 * @since Twenty Sixteen 1.0
 */
get_header();
?>
<div class="content-block main-slider"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/slide/1.jpg" alt=""></a></div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="content-block new-models">
                <h2 class="content-block-title">Models / PG Mới</h2>
                <div class="swiper-models-slide-prev"><i class="fa fa-angle-left"></i></div>
                <div class="swiper-container models-slide">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide model-item"><a href="#"><img src="img/models/1.jpg" alt="">
                                <figcaption>
                                    <p>Nguyễn Ngọc Kỳ Hân</p>
                                </figcaption></a></div>
                        <div class="swiper-slide model-item"><a href="#"><img src="img/models/2.jpg" alt="">
                                <figcaption>
                                    <p>Trà Thanh Như Thủy</p>
                                </figcaption></a></div>
                        <div class="swiper-slide model-item"><a href="#"><img src="img/models/3.jpg" alt="">
                                <figcaption>
                                    <p>Bách Kỳ Ngọc Hạnh</p>
                                </figcaption></a></div>
                        <div class="swiper-slide model-item"><a href="#"><img src="img/models/4.jpg" alt="">
                                <figcaption>
                                    <p>Lê Minh Trang</p>
                                </figcaption></a></div>
                        <div class="swiper-slide model-item"><a href="#"><img src="img/models/5.jpg" alt="">
                                <figcaption>
                                    <p>Nguyễn Ngọc Thanh Trà</p>
                                </figcaption></a></div>
                        <div class="swiper-slide model-item"><a href="#"><img src="img/models/6.jpg" alt="">
                                <figcaption>
                                    <p>Hà Thanh Liên</p>
                                </figcaption></a></div>
                        <div class="swiper-slide model-item"><a href="#"><img src="img/models/7.jpg" alt="">
                                <figcaption>
                                    <p>Nguyễn Dương Minh Châu</p>
                                </figcaption></a></div>
                        <div class="swiper-slide model-item"><a href="#"><img src="img/models/8.jpg" alt="">
                                <figcaption>
                                    <p>Dương Nguyễn Thùy Dương</p>
                                </figcaption></a></div>
                        <div class="swiper-slide model-item"><a href="#"><img src="img/models/9.jpg" alt="">
                                <figcaption>
                                    <p>Lê Hải Như</p>
                                </figcaption></a></div>
                        <div class="swiper-slide model-item"><a href="#"><img src="img/models/10.jpg" alt="">
                                <figcaption>
                                    <p>Đào Lam Giang</p>
                                </figcaption></a></div>
                        <div class="swiper-slide model-item"><a href="#"><img src="img/models/4.jpg" alt="">
                                <figcaption>
                                    <p>Nguyễn Ngọc Kỳ Hân</p>
                                </figcaption></a></div>
                        <div class="swiper-slide model-item"><a href="#"><img src="img/models/3.jpg" alt="">
                                <figcaption>
                                    <p>Trà Thanh Như Thủy</p>
                                </figcaption></a></div>
                        <div class="swiper-slide model-item"><a href="#"><img src="img/models/7.jpg" alt="">
                                <figcaption>
                                    <p>Bách Kỳ Ngọc Hạnh</p>
                                </figcaption></a></div>
                        <div class="swiper-slide model-item"><a href="#"><img src="img/models/11.jpg" alt="">
                                <figcaption>
                                    <p>Lê Minh Trang</p>
                                </figcaption></a></div>
                        <div class="swiper-slide model-item"><a href="#"><img src="img/models/5.jpg" alt="">
                                <figcaption>
                                    <p>Nguyễn Ngọc Thanh Trà</p>
                                </figcaption></a></div>
                        <div class="swiper-slide model-item"><a href="#"><img src="img/models/6.jpg" alt="">
                                <figcaption>
                                    <p>Hà Thanh Liên</p>
                                </figcaption></a></div>
                        <div class="swiper-slide model-item"><a href="#"><img src="img/models/7.jpg" alt="">
                                <figcaption>
                                    <p>Nguyễn Dương Minh Châu</p>
                                </figcaption></a></div>
                        <div class="swiper-slide model-item"><a href="#"><img src="img/models/8.jpg" alt="">
                                <figcaption>
                                    <p>Dương Nguyễn Thùy Dương</p>
                                </figcaption></a></div>
                        <div class="swiper-slide model-item"><a href="#"><img src="img/models/11.jpg" alt="">
                                <figcaption>
                                    <p>Lê Hải Như</p>
                                </figcaption></a></div>
                        <div class="swiper-slide model-item"><a href="#"><img src="img/models/2.jpg" alt="">
                                <figcaption>
                                    <p>Đào Lam Giang</p>
                                </figcaption></a></div>
                    </div>
                </div>
                <div class="swiper-models-slide-next"><i class="fa fa-angle-right"></i></div><a href="#" class="search-link"> <i class="fa fa-search"></i>Tìm kiếm</a>
            </div>
        </div>
    </div>
</div>


<?php 
$aboutus = get_post(37);
if( $aboutus != null) { ?>

   <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content-block aboutus">
                    <h2 class="content-block-title"><?php _e($aboutus->post_title); ?></h2>
                    <div class="content-block-content">
                        <?php _e($aboutus->post_content); ?>
                    </div>
                </div>
            </div>
        </div>
    </div> 
<?php } ?>


<div class="container">
    <div class="row">
        <div class="content-block news-list">
            <h2 class="content-block-title"><?php _e("[:en]Latest News[:vi]Tin tức"); ?></h2>
            <div class="content-block-content">
                <ul>
                    <?php
                        $args = array( 
                            'posts_per_page'   => 6,
                            'offset'           => 0,
                            'category'         => 1,
                            'orderby'          => 'date',
                            'order'            => 'DESC',
                            'post_type'        => 'post',
                            'post_status'      => 'publish');

                        $myposts = get_posts( $args );
                        $image_attr = array(
                            'alt'   => trim( strip_tags( $wp_postmeta->_wp_attachment_image_alt ) ),
                            'title' => trim( strip_tags( $attachment->post_title ) )
                        );
                        foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
                            <li class="news-item col-md-4">
                                <div class="news-img"><a href="#"><?php if ( has_post_thumbnail() ) { the_post_thumbnail('news-thumbnails', $image_attr); }  ?></a></div>
                                <div class="news-info">
                                    <h3><a href="#"><?php the_title() ?></a></h3>
                                    <p>
                                        <?php the_content(); ?>
                                    </p>
                                    <a href="#" class="btn-more"><?php _e("[:en]More[:vi]Chi tiết"); ?></a>
                                </div>
                            </li>
                    <?php   endforeach; 
                            wp_reset_postdata(); ?>
                    
                    
                </ul>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>
