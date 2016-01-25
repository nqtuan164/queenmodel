<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
get_header();
?>
<div class="content-page content-page-models">
    <div class="content-page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="content-page-title">Models</h1>
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
    <div class="content-page-body"> 
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="model-filter">
                        <form class="form-inline" method="get" action="<?php echo home_url('/models') ?>">
                            <label>Tìm kiếm: 
                                <div class="form-group">
                                    <label class="radiobox">
                                        <input type="radio" name="gender" value="female" checked class="radio radio-female"><span class="lbradio-gender"></span>
                                    </label>
                                    <label class="radiobox">
                                        <input type="radio" name="gender" value="male" class="radio radio-male"><span class="lbradio-gender"></span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="combobox">
                                        <select class="form-control" name="height">
                                            <?php 
                                                if($search_condition) {
                                                    foreach ($search_condition['height'] as $key => $value) {
                                                        echo '<option value="'. $key . '">' . __($value) . '</option>';
                                                    }
                                                }
                                            ?>
<!--                                            <option><?php _e('[:en]Choose height [:vi]Chọn chiều cao'); ?></option>
                                            <option value="1"><?php _e('[:en]Under 1.60m [:vi]Dưới 1.60m'); ?></option>
                                            <option value="2"><?php _e('[:en]1.60m - 1.70m [:vi]1.60m - 1.70m'); ?></option>
                                            <option value="3"><?php _e('[:en]1.70m [:vi]1.80m'); ?></option>
                                            <option value="4"><?php _e('[:en]Over 1.80m [:vi]Trên 1.80m'); ?></option>-->
                                        </select>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="combobox">
                                        <select class="form-control" name="age">
                                            <?php 
                                                if($search_condition) {
                                                    foreach ($search_condition['age'] as $key => $value) {
                                                        echo '<option value="'. $key . '">' . __($value) . '</option>';
                                                    }
                                                }
                                            ?>
<!--                                            <option><?php _e('[:en]Choose age [:vi]Chọn tuổi'); ?></option>
                                            <option value="1"><?php _e('[:en]Under 20 years old [:vi]Dưới 20 tuổi'); ?></option>
                                            <option value="2"><?php _e('[:en]20 - 25 years old [:vi]20 - 25 tuổi'); ?></option>
                                            <option value="3"><?php _e('[:en]25 - 30 years old [:vi]25 - 30 tuổi'); ?></option>
                                            <option value="4"><?php _e('[:en]Over 30 years old [:vi]Trên 30 tuổi'); ?></option>-->
                                        </select>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-submit"><?php _e('[:en]Search now[:vi] Tìm kiếm'); ?></button>
                                </div>
                            </label>
                        </form>
                    </div>
                    <div class="model-list">
                        <?php
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        
                        $gender = $_GET['gender'];
                        $height = $_GET['height'];
                        $age = $_GET['age'];
                        
                        //echo $gender;
                        
                        $query = build_query_search($gender, $height, $age);
                        //var_dump($query);
                        $args = array(
                            'posts_per_page'    => 2,
                            'paged'             => $paged,
                            'orderby'           => 'date',
                            'order'             => 'DESC',
                            'post_type'         => array('pgpb'),
                            'post_status'       => 'publish',
                            'meta_query'        => $query,
                        );


                        $the_query = new WP_Query($args);
                        while ($the_query->have_posts()) : $the_query->the_post();
                            ?>
                            <div class="model-item">
                                <a href="<?php the_permalink(); ?>">
                                    <?php
                                    $images = get_field('model_image');
                                    //var_dump($images);
                                    if ($images) :
                                        //var_dump($images[0]);
                                        ?>
                                        <img src="<?php echo $images[0]['sizes']['medium']; ?>" alt="">
                                    <?php else: ?>
                                        <img src="http://placehold.it/350x150" alt="">
                                    <?php endif; ?>
                                    <figcaption>
                                        <p><?php the_title(); ?></p>
                                    </figcaption>
                                </a>
                            </div>
                    <?php endwhile; ?>
                    </div>
                    <?php
                    if (function_exists(custom_pagination)) {
                        //echo "kaka";
                        custom_pagination($the_query->max_num_pages, 2, $paged);
                    }
                    wp_reset_query();
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>


<?php// get_sidebar(); ?>
<?php get_footer(); ?>
