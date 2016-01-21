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
                    <?php if(function_exists('bcn_display'))
                    {
                        bcn_display();
                    }?>
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
                        <form class="form-inline">
                            <label>Tìm kiếm: 
                                <div class="form-group">
                                    <label class="radiobox">
                                        <input type="radio" name="gender" checked class="radio radio-female"><span class="lbradio-gender"></span>
                                    </label>
                                    <label class="radiobox">
                                        <input type="radio" name="gender" class="radio radio-male"><span class="lbradio-gender"></span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="combobox">
                                        <select class="form-control">
                                            <option>Chọn chiều cao</option>
                                            <option>&lt; 1m60</option>
                                        </select>
                                    </label>
                                </div>
                            </label>
                        </form>
                    </div>
                    <div class="model-list">
                        <?php 
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        echo $paged;
                        $args = array( 
                            'posts_per_page'   => 1,
                            'offset'           => 0,
                            'paged'             => $paged,
                            'orderby'          => 'date',
                            'order'            => 'DESC',
                            'post_type'        => array('acme_pg-pb'),
                            'post_status'      => 'publish',
                            'meta_query'       => array(
                                                    'relation' => 'AND',
                                                    array(
                                                        'key'		=> 'model_gender',
                                                        'value'		=> 'female',
                                                        'compare'	=> '='
                                                    ), 
                                                    array(
                                                        'key'       => 'model_birthday',
                                                        'value'     => array('19890101', '19941231'),
                                                        'compare'   => 'BETWEEN',
                                                        'type'      => 'DATE'
                                                    )
                                                )
                            );
                        
                        
                        $the_query = new WP_Query( $args );
                        while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
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
                    <div class="alignleft"><?php next_posts_link('Previous Entries'); ?></div>
<div class="alignright"><?php previous_posts_link('Next Entries'); ?></div>
                    <?php
//                    the_posts_pagination( array(
//                        'prev_text'          => __( 'Previous page', 'twentysixteen' ),
//                        'next_text'          => __( 'Next page', 'twentysixteen' ),
//                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
//                    ) );
//                    if (function_exists(custom_pagination)) {
//                        echo "kaka";
//                        custom_pagination($the_query->max_num_pages,"",$paged);
//                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>


<?php// get_sidebar(); ?>
<?php get_footer(); ?>
