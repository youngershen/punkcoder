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
    <header class="single-article-header justify-content-center">
        <h2 class="justify-content-center single-article-title"><?php echo(get_the_title()); ?></h2>
    </header>
    <div class="single-article-meta">
        <?php get_template_part('template-parts/post-meta')?>
    </div>
    <hr>
    <div class="single-article-content">
        <?php the_content(); ?>
    </div>
</article>

<div class="single-comment">
    <?php

    if ( comments_open() || get_comments_number() )
    {
        comments_template('./template-parts/comments.php');
    }
    ?>
</div>