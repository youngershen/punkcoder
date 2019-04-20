<?php
/**
 * PROJECT : punkcoder
 * FILE    : post-meta.php
 * TIME    : 2019/4/20 10:55
 * AUTHOR  : Younger Shen
 * EMAIL   : younger.x.shen@gmail.com
 * PHONE   : 13811754531
 * WECHAT  : 13811754531
 * WEBSIT  : https://www.punkcoder.cn
 */
?>

<span class="home-post-meta-item">
    <i class="far fa-calendar-alt"></i>
    <span><?php echo get_the_date("Y-m-d H:i:s"); ?></span>
</span>

<span class="home-post-meta-item">
    <i class="fas fa-user-alt"></i>
    <span><?php the_author_posts_link(); ?></span>
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
    <span><?php the_view_count(); ?></span>
    <span><?php _e("人阅读", "punkcoder"); ?></span>
</span>

<span class="home-post-meta-item">
    <a href="javascript:punkcoder.post_like('<?php the_ID();?>')" class="post-meta-item-like-icon">
        <i class="fas fa-thumbs-up"></i>
    </a>
    <span  id="post-meta-item-like-count-<?php the_ID(); ?>"><?php the_like_count(); ?></span>
    <span><?php _e("赞", "punkcoder"); ?></span>
</span>
