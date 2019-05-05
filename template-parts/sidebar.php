<?php
/**
 * PROJECT : punkcoder
 * FILE    : sidebar.php
 * TIME    : 2019/3/6 17:11
 * AUTHOR  : Younger Shen
 * EMAIL   : younger.x.shen@gmail.com
 * PHONE   : 13811754531
 * WECHAT  : 13811754531
 * WEBSIT  : https://www.punkcoder.cn
 */
$categories = get_categories(array(
    'orderby' => 'name',
    'order' => 'ASC'
));

$tags = get_tags();

$args = array(
    'posts_per_page' => 10,
    'category' => 7,
    'orderby' => 'post_date',
    'order' => 'DESC',
    'post_type' => 'post'
);

$args = array(
    'orderby' => 'post_date',
    'order' => 'DESC',
    'posts_per_page' => 10,

);

$query = new WP_Query($args);

?>

<div class="d-none d-lg-block punkcoder-sidebar container-fluid">
    <div class="row punkcoder-sidebar-profile justify-content-center">
        <div class="col-12">
            <div class="text-center punkcoder-sidebar-profile-avatar">
                <img src="<?php echo esc_html(punkcoder_get_options('punkcoder_profile_options', 'avatar', punkcoder_get_url('images', 'default-avatar-image.jpg'))); ?>"
                     class="rounded mw-100" alt="<?php echo esc_attr(punkcoder_get_options('punkcoder_profile_options', 'nickname', '申延刚')); ?>">
            </div>
            <div class="punkcoder-sidebar-profile-item">
                <div>
                    <span><?php echo(__("昵称", "punkcoder"));?>:</span>
                    <span><?php echo esc_attr(punkcoder_get_options('punkcoder_profile_options', 'nickname', '申延刚')); ?></span>
                </div>
                <div>
                    <span><?php echo(__("年龄", "punkcoder"));?>:</span>
                    <span><?php echo esc_attr(punkcoder_get_options('punkcoder_profile_options', 'age', '30')); ?></span>
                </div>
                <div>
                    <span><?php echo(__("性别", "punkcoder"));?>:</span>
                    <span><?php echo esc_attr(punkcoder_get_options('punkcoder_profile_options', 'gender', '男')); ?></span>
                </div>
                <div>
                    <span><?php echo(__("职业", "punkcoder"));?>:</span>
                    <span><?php echo esc_attr(punkcoder_get_options('punkcoder_profile_options', 'occupation', 'PHP程序员')); ?></span>
                </div>
                <div>
                    <span><?php echo(__("手机", "punkcoder"));?>:</span>
                    <span><a href="tel:<?php echo esc_attr(punkcoder_get_options('punkcoder_profile_options', 'cellphone', '13811754531')); ?>"><?php echo esc_attr(punkcoder_get_options('punkcoder_profile_options', 'cellphone', '13811754531')); ?></a></span>
                </div>
                <div>
                    <span><?php echo(__("微信", "punkcoder"));?>:</span>
                    <span><?php echo esc_attr(punkcoder_get_options('punkcoder_profile_options', 'wechat', '13811754531')); ?></span>
                </div>
                <div>
                    <span><?php echo(__("QQ", "punkcoder"));?>:</span>
                    <span><?php echo esc_attr(punkcoder_get_options('punkcoder_profile_options', 'qq', '89198011')); ?></span>
                </div>

                <div>
                    <span><?php echo(__("WhatsApp", "punkcoder"));?>:</span>
                    <span><?php echo esc_attr(punkcoder_get_options('punkcoder_profile_options', 'qq', '89198011')); ?></span>
                </div>

                <div>
                    <span><?php echo(__("Telegram", "punkcoder"));?>:</span>
                    <span><?php echo esc_attr(punkcoder_get_options('punkcoder_profile_options', 'qq', '89198011')); ?></span>
                </div>

                <div>
                    <span><?php echo(__("Skype", "punkcoder"));?>:</span>
                    <span><?php echo esc_attr(punkcoder_get_options('punkcoder_profile_options', 'qq', '89198011')); ?></span>
                </div>

                <div>
                    <span><?php echo(__("Line", "punkcoder"));?>:</span>
                    <span><?php echo esc_attr(punkcoder_get_options('punkcoder_profile_options', 'qq', '89198011')); ?></span>
                </div>

                <div>
                    <span><?php echo(__("地址", "punkcoder"));?>:</span>
                    <span><?php echo esc_attr(punkcoder_get_options('punkcoder_profile_options', 'address', '北京')); ?></span>
                </div>
                <div class="punkcoder-sidebar-profile-item-social justify-content-center">
                    <a href="<?php echo esc_attr(punkcoder_get_options('punkcoder_profile_options', 'github', 'https://github.com/youngershen')); ?>" target="_blank">
                        <i class="fab fa-github fa-1x"></i>
                    </a>
                    <a href="<?php echo esc_attr(punkcoder_get_options('punkcoder_profile_options', 'weibo', 'https://weibo.com/shenyangang')); ?>" target="_blank">
                        <i class="fab fa-weibo fa-1x"></i>
                    </a>
                    <a data-toggle="modal" data-target="#wechat-qr-modal">
                        <i class="fab fa-weixin fa-1x"></i>
                    </a>
                    <a href="<?php echo esc_attr(punkcoder_get_options('punkcoder_profile_options', 'twitter', 'https://twitter.com/youngershen')); ?>" target="_blank">
                        <i class="fab fa-twitter fa-1x"></i>
                    </a>
                    <a href="<?php echo esc_attr(punkcoder_get_options('punkcoder_profile_options', 'email', 'shenyangang@163.com')); ?>">
                        <i class="fas fa-envelope"></i>
                    </a>
                    <a href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="">
                        <i class="fab fa-pinterest"></i>
                    </a>
                    <a href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="">
                        <i class="fab fa-quora"></i>
                    </a>
                    <a href="">
                        <i class="fab fa-zhihu"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php

    if ($query->have_posts()) {
        ?>
        <hr>
        <div class="row punkcoder-sidebar-hot">
            <div class="col-12 punkcoder-sidebar-hot-col">
                <div class="punkcoder-sidebar-hot-head">
                    <span><?php _e('热门文章', 'punkcoder')?></span>
                </div>
                <div class="punkcoder-sidebar-hot-body">
                    <?php
                    global $post;
                    while ($query->have_posts()) {
                        $query->the_post();
                        ?>
                        <div>
                            <a href="<?php echo(get_permalink($post)); ?>"><?php echo(get_the_title()); ?></a>
                        </div>
                        <?php
                        if ($query->post_count != $query->current_post + 1) {
                            ?>
                            <hr>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        <?php
    }

    ?>
    <?php
    if ($categories && count($categories) > 0) {
        ?>
        <hr>
        <div class="row punkcoder-sidebar-hot">
            <div class="col-12 punkcoder-sidebar-hot-col">
                <div class="punkcoder-sidebar-hot-head">
                    <span><?php _e('分类', 'punkcoder')?></span>
                </div>
                <div class="punkcoder-sidebar-hot-body">
                    <?php
                    foreach ($categories as $key => $val) {
                        $category_link = get_category_link($val->term_id);
                        ?>
                        <div>
                            <a href="<?php echo($category_link); ?>"><?php echo($val->name); ?></a>
                        </div>
                        <?php
                        if ($key != (sizeof($categories) - 1)) {
                            ?>
                            <hr>
                            <?php
                        }
                        ?>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if ($tags && count($tags) > 0) {

        ?>
        <hr>
        <div class="row punkcoder-sidebar-tag">
            <div class="col-12">
                <div class="punkcoder-sidebar-tag-head">
                    <span><?php _e('标签', 'punkcoder')?></span>
                </div>
                <div class="punkcoder-sidebar-tag-body">
                    <?php
                    foreach ($tags as $key => $val) {
                        $tag_link = get_tag_link($val->term_id);
                        ?>
                        <a href="<?php echo($tag_link); ?>">
                            <span class="badge badge-primary punkcoder-sidebar-tag-item">#<?php echo($val->name) ?></span>
                        </a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>

<!-- Wechat Qr Image Modal -->
<div class="modal fade" id="wechat-qr-modal" tabindex="-1" role="dialog" aria-labelledby="wechat-qr-modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="modal-body">
                <img class="punkcoder-sidebar-wechat-qr-image rounded mw-100" src="<?php echo esc_attr(punkcoder_get_options('punkcoder_profile_options', 'wechat_qr_image', '')); ?>">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal"><?php _e('Close', 'punkcoder');?></button>
            </div>
        </div>
    </div>
</div>
