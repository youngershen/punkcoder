<?php
/**
 * PROJECT : punkcoder
 * FILE    : post.php
 * TIME    : 2019/3/12 10:31
 * AUTHOR  : Younger Shen
 * EMAIL   : younger.x.shen@gmail.com
 * PHONE   : 13811754531
 * WECHAT  : 13811754531
 * WEBSIT  : https://www.punkcoder.cn
 */
?>

<article class="single-article">
    <header class="single-article-header justify-content-center">
        <h2 class="justify-content-center single-article-title"><?php echo(get_the_title()); ?></h2>
    </header>
    <div class="single-article-meta">
        <span class="home-post-meta-item">
            <i class="far fa-calendar-alt"></i>
            <span><?php echo get_the_date("Y-m-d H:i:s"); ?></span>
        </span>
        <span class="home-post-meta-item">
            <i class="fas fa-user-alt"></i>
            <span><?php the_author_posts_link()?></span>
        </span>
        <span class="home-post-meta-item">
            <i class="fas fa-comments"></i>
            <span>
                <span><?php echo(get_comments_number()); ?></span>
                <span><?php _e("条评论", "punkcoder"); ?></span>
            </span>
        </span>
        <span class="home-post-meta-item">
            <i class="fas fa-users"></i>
            <span><?php the_view_count();_e("人阅读", "punkcoder"); ?></span>
        </span>
        <span class="home-post-meta-item">
            <i class="fas fa-thumbs-up"></i>
            <span>100 <?php _e("赞", "punkcoder"); ?></span>
        </span>
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