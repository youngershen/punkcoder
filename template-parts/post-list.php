<?php
/**
 * PROJECT : punkcoder
 * FILE    : post-list.php
 * TIME    : 2019/3/12 10:31
 * AUTHOR  : Younger Shen
 * EMAIL   : younger.x.shen@gmail.com
 * PHONE   : 13811754531
 * WECHAT  : 13811754531
 * WEBSIT  : https://www.punkcoder.cn
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("home-post ontainer-fluid p-2 shadow "); ?>>
    <div class="row">
        <div class="col-4 m-0 d-none d-lg-block">
            <?php
                global $post;
                if(has_post_thumbnail($post->ID))
                {
                    $url = get_the_post_thumbnail_url($post);
                    ?>
                    <a href="<?php echo(esc_url(get_permalink())); ?>">
                        <img src="<?php echo($url); ?>" alt="<?php echo(get_the_title()); ?>" class="mw-100">
                    </a>

                    <?php
                }else
                {
                    ?>
                    <a href="<?php echo(esc_url(get_permalink())); ?>">
                        <img src="<?php echo(get_template_directory_uri()); ?>/assets/images/feature.png" alt="<?php echo(get_the_title()); ?>" class="mw-100">
                    </a>
                    <?php
                }

            ?>
        </div>
        <div class="col-lg-8 m-0 col-sm-12">
            <header>
                <a href="<?php echo(esc_url(get_permalink())); ?>" class="text-secondary" target="_self">
                    <h2 class="home-post-title">
                        <?php echo(get_the_title()); ?>
                    </h2>
                </a>
            </header>
            <hr>
            <div class="home-post-meta d-nonse d-lg-block">
                <span class="home-post-meta-item">
                    <i class="far fa-calendar-alt"></i>
                    <span><?php echo get_the_date("Y-m-d H:i:s"); ?></span>
                </span>
                <span class="home-post-meta-item">
                    <i class="fas fa-user-alt"></i>
                    <span><?php the_author(); ?></span>
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
                    <span>22 <?php _e("人阅读", "punkcoder"); ?></span>
                </span>
                <span class="home-post-meta-item">
                    <i class="fas fa-thumbs-up"></i>
                    <span>100 <?php _e("赞", "punkcoder"); ?></span>
                </span>
            </div>
            <hr>
            <p class="home-post-content">
                <?php
                the_excerpt();
                ?>
            </p>
        </div>
    </div>
</article>

