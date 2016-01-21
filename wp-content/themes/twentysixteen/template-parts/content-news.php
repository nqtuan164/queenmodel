<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('news-item col-md-6'); ?>>
    <div class="news-img"><a href="#"><?php if ( has_post_thumbnail() ) { the_post_thumbnail('news-thumbnails', $image_attr); }  ?></a></div>
    <div class="news-info">
        <h2><a href="#"><?php the_title() ?></a></h2>
        <p>
            <?php the_content(); ?>
        </p>
        <a href="#" class="btn-more"><?php _e("[:en]More[:vi]Chi tiết"); ?></a>
    </div>
</article>
