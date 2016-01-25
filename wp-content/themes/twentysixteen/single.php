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
		<div class="content-page content-page-news">
            <?php
            // Start the loop.
            while ( have_posts() ) : the_post();
            ?>
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
                
                <div class="content-page-body"> 
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
        
                                <?php
                                // Include the single post content template.
                                get_template_part( 'template-parts/content', 'single' );


                                // End of the loop.
                            endwhile;
                            ?>
                            </div>
                            
                            <div class="col-md-4">
                                <?php get_sidebar(); ?>
                            </div>
                        </div>
                    </div>
                </div>
	</main><!-- .site-main -->

	<?php //get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->


<?php get_footer(); ?>
