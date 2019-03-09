<?php
/**
 * PROJECT : punkcoder
 * FILE    : posts.php
 * TIME    : 2019/3/6 17:11
 * AUTHOR  : Younger Shen
 * EMAIL   : younger.x.shen@gmail.com
 * PHONE   : 13811754531
 * WECHAT  : 13811754531
 * WEBSIT  : https://www.punkcoder.cn
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("home-post"); ?>>
    <header>
        <a href="<?php echo( esc_url( get_permalink() ) );?>" class="text-secondary" target="_self">
            <h2 class="home-post-title">
                <?php echo( get_the_title() ); ?>
            </h2>
        </a>
    </header>
    <div class="home-post-meta">
        <span class="home-post-meta-item">
            <i class="far fa-calendar-alt"></i>
            <span>2019/03/15 20:25:55</span>
        </span>
        <span class="home-post-meta-item">
            <i class="fas fa-user-alt"></i>
            <a href="">Younger Shen</a>
        </span>
        <span class="home-post-meta-item">
            <i class="fas fa-comments"></i>
            <span>88 <?php _e("Comments", "punkcoder"); ?></span>
        </span>
        <span class="home-post-meta-item">
            <i class="fas fa-users"></i>
            <span>22 <?php _e("Clicks", "punkcoder"); ?></span>
        </span>
    </div>
    <hr>
    <p class="home-post-content">
        <?php
        the_content(
            sprintf(
                wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'punkcoder' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            )
        );
        ?>
    </p>
    <hr>
    <div class="">
        <div class="d-inline">
            <span><?php _e("Rate", "punkcoder"); ?>: </span>
            <span class="text-warning">
                <i class="far fa-star"></i>
                <i class="far fa-star "></i>
                <i class="far fa-star "></i>
                <i class="fas fa-star "></i>
                <i class="fas fa-star-half"></i>
            </span>
        </div>
        <div class="d-inline">
            <span><?php _e("Share", "punkcoder"); ?>: </span>
            <span style="font-size: 1rem; cursor: pointer">
                <i class="fab fa-facebook"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-weixin"></i>
                <i class="fab fa-weibo"></i>
                <i class="fab fa-qq"></i>
            </span>
        </div>
    </div>
</article>