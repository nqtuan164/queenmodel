<?php
/**
 * Template Name: News Page
 *
 * @package WordPress
 * @subpackage Queen Model
 * @since Twenty Sixteen 1.0
 */
get_header();
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="content-page content-page-news">
            <?php if ( have_posts() ) : ?>

                <div class="content-page-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="content-page-title"><?php the_title(); ?></h1>

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

                <?php endif; ?>
            
            
                <div class="content-page-body"> 
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                <?php
                                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                $args = array(
                                    'posts_per_page' => 2,
                                    'paged' => $paged,
                                    'category' => 1,
                                    'orderby' => 'date',
                                    'order' => 'DESC',
                                    'post_type' => 'post',
                                    'post_status' => 'publish');
                                
                                $the_query = new WP_Query($args);
                                while ($the_query->have_posts()) : $the_query->the_post();
                                    ?>
                                    <article id="post-<?php the_ID(); ?>" <?php post_class('news-item col-md-6'); ?>>
                                        <div class="news-img"><a href="#"><?php if ( has_post_thumbnail() ) { the_post_thumbnail('news-thumbnails', $image_attr); }  ?></a></div>
                                        <div class="news-info">
                                            <h2><a href="<?php echo the_permalink(); ?>"><?php the_title() ?></a></h2>
                                            <p>
                                                <?php the_content(); ?>
                                            </p>
                                            <a href="<?php echo the_permalink(); ?>" class="btn-more"><?php _e("[:en]More[:vi]Chi tiết"); ?></a>
                                        </div>
                                    </article>

                                    
                                    <?php

                                // End the loop.
                                endwhile;
                                ?>
                                
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
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
                            <div class="col-md-4">
                                <?php get_sidebar(); ?>
                            </div>
                        </div>
                    </div>
                </div>
			
            </div>
        
    </main>
</div>
<?php get_footer(); ?>