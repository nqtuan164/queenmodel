<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen 2
 * @since Twenty Sixteen 2.0
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <div class="content-page content-page-news">
            <?php if ( have_posts() ) : ?>
                <?php if ( is_home() && ! is_front_page() ) : ?>

                <div class="content-page-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="content-page-title"><?php single_post_title(); ?></h1>

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
                                // Start the loop.
                                while ( have_posts() ) : the_post();

                                    /*
                                     * Include the Post-Format-specific template for the content.
                                     * If you want to override this in a child theme, then include a file
                                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                     */
                                    get_template_part( 'template-parts/content-news', get_post_format() );

                                // End the loop.
                                endwhile;

                                // Previous/next page navigation.
                                the_posts_pagination( array(
                                    'prev_text'          => __( 'Previous page', 'twentysixteen' ),
                                    'next_text'          => __( 'Next page', 'twentysixteen' ),
                                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
                                ) );

                                // If no content, include the "No posts found" template.
                                else :
                                    get_template_part( 'template-parts/content', 'none' );

                                endif;
                                ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <?php get_sidebar(); ?>
                            </div>
                        </div>
                    </div>
                </div>
			
            </div>
		</main><!-- .site-main -->
	</div><!-- .content-area -->


<?php get_footer(); ?>
