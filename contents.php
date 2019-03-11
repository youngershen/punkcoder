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

<article id="post-<?php the_ID(); ?>" <?php post_class("home-post"); ?> class="container-fluid p-2">
    <div class="row">
        <div class="col-4 m-0 d-none d-lg-block">
            <img src="<?php echo(get_template_directory_uri()); ?>/images/feature.png" alt="" class="mw-100">
        </div>
        <div class="col-lg-8 m-0 col-sm-12">
            <header>
                <a href="<?php echo(esc_url(get_permalink())); ?>" class="text-secondary" target="_self">
                    <h2 class="home-post-title">
                        <?php echo(get_the_title()); ?>
                    </h2>
                </a>
            </header>
            <div class="home-post-meta d-none d-lg-block">
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
                <span class="home-post-meta-item">
                    <i class="fas fa-thumbs-up"></i>
                    <span>100 <?php _e("Likes", "punkcoder"); ?></span>
                </span>
            </div>
            <hr>
            <p class="home-post-content">
                <?php
                the_content(
                    sprintf(
                        wp_kses(
                            __('Read More', 'punkcoder'),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        )
                    )
                );
                ?>
            </p>
        </div>
    </div>
</article>

