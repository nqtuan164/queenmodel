<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
<?php 
    while ( have_posts() ) : the_post();
    ?>
<div class="content-page content-page-models">
    <div class="content-page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="content-page-title"><?php the_title(); ?></h1>
                    <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
                        <?php
                        if (function_exists('bcn_display')) {
                            bcn_display();
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="content-page-body" id="post-<?php the_ID(); ?>"> 
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a class="main-profile-img">
                        <?php
                            $images = get_field('model_image');
                            //var_dump($images);
                            if ($images) :
                            //var_dump($images[0]);
                        ?>
                            <img src="<?php echo $images[0]['sizes']['large']; ?>" alt="">
                        <?php else: ?>
                            <img src="http://placehold.it/350x150" alt="">
                        <?php endif; ?>
                    </a>
                </div>
                <div class="col-md-8">
                    <div class="main-profile-content">
                        <table class="table table-striped">
                            <tr>
                                <th>
                                    <?php _e('[:vi]Họ và Tên:[:en]Full name:'); ?>
                                </th>
                                <td colspan="3">
                                    <?php the_title(); ?>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <?php _e('[:vi]Ngày sinh:[:en]Birthday:'); ?>
                                </th>
                                <td colspan="3">
                                    <?php 
                                        $date = DateTime::createFromFormat('Ymd', get_field('model_birthday'));
                                        echo $date->format('d/m/Y');
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <?php _e('[:vi]Hôn nhân:[:en]Status:'); ?>
                                </th>
                                <td colspan="3">
                                    <?php 
                                        $field = get_field_object('model_status');
                                        $value = get_field('model_status');
                                        echo $field['choices'][ $value ];
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <?php _e('[:vi]Chiều cao:[:en]Height:'); ?>
                                </th>
                                <td>
                                    <?php the_field('model_height'); ?>&nbsp;(cm)
                                </td>
                                <th>
                                    <?php _e('[:vi]Cân nặng:[:en]Weight:'); ?>
                                </th>
                                <td>
                                    <?php the_field('model_weight'); ?>&nbsp;(kg)
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <?php _e('[:vi]Số đo 3 vòng:[:en]Measurements:'); ?>
                                </th>
                                <td colspan="3">
                                    <?php the_field('model_body_1'); ?>/<?php the_field('model_body_2'); ?>/<?php the_field('model_body_3'); ?>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <?php _e('[:vi]Trình độ học vấn:[:en]Educational background:'); ?>
                                </th>
                                <td colspan="3">
                                    <?php the_field('model_level'); ?>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <?php _e('[:vi]Ngoại ngữ:[:en]Foreign language:'); ?>
                                </th>
                                <td colspan="3">
                                    <?php the_field('model_language'); ?>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <?php _e('[:vi]Kinh nghiệm:[:en]Experiences:'); ?>
                                </th>
                                <td colspan="3">
                                    <?php the_field('model_exp'); ?>
                                </td>
                            </tr>
                        </table>
                        <!-- ADDTHIS BUTTON BEGIN -->
                        <script type="text/javascript">
                        var addthis_config = {
                             pubid: "YOUR-PROFILE-ID"
                        }
                        </script>

                        <a href="http://www.addthis.com/bookmark.php?v=250" 
                            class="addthis_button"><img 
                            src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" 
                            width="125" height="16" border="0" alt="Share" /></a>

                        <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js"></script>
                        <!-- ADDTHIS BUTTON END -->
                    </div>
                </div>
                <div class="col-md-12">
                    <!-- Slider main container -->
                    <div class="swiper-detail-slide-prev"><i class="fa fa-angle-left"></i></div>
                    <div class="swiper-container main-profile-img-list">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <?php foreach ($images as $key => $value) : ?>
                            <div class="swiper-slide">
                                <a href="<?php echo $value['sizes']['large']; ?>" class="fancybox" rel="models">
                                    <img src="<?php echo $value['sizes']['thumbnail']; ?>"/>
                                </a>
                            </div>
                            <?php endforeach; ?>
                            
<!--                            <div class="swiper-slide">Slide 1</div>
                            <div class="swiper-slide">Slide 2</div>
                            <div class="swiper-slide">Slide 3</div>-->
                        </div>
                    </div>
                    <div class="swiper-detail-slide-next"><i class="fa fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    endwhile;
?>
    </main>
</div>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>
