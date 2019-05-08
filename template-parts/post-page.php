<?php
/**
 * PROJECT : punkcoder
 * FILE    : post-page.php
 * TIME    : 2019/4/20 16:59
 * AUTHOR  : Younger Shen
 * EMAIL   : younger.x.shen@gmail.com
 * PHONE   : 13811754531
 * WECHAT  : 13811754531
 * WEBSIT  : https://www.punkcoder.cn
 */
 
 ?>

<article class="single-article <?php post_class();?>" id="post-<?php the_ID(); ?>">
    <div class="single-article-meta">
        <?php get_template_part('template-parts/post-meta')?>
    </div>
    <hr>
    <div class="single-article-content">
        <?php the_content(); ?>
    </div>
</article>

