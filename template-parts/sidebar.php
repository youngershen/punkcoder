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
                <img src="<?php echo(get_template_directory_uri()); ?>/assets/images/avatar-default.jpg"
                     class="rounded mw-100" alt="...">
            </div>
            <div class="punkcoder-sidebar-profile-item">
                <div>
                    <span><?php echo(__("昵称", "punkcoder"));?>:</span>
                    <span><?php echo esc_attr(get_option('punkcoder_profile_nickname')); ?></span>
                </div>
                <div>
                    <span><?php echo(__("年龄", "punkcoder"));?>:</span>
                    <span><?php echo esc_attr(get_option('punkcoder_profile_age')); ?></span>
                </div>
                <div>
                    <span><?php echo(__("手机", "punkcoder"));?>:</span>
                    <span><a href="tel:<?php echo esc_attr(get_option('punkcoder_profile_cellphone')); ?>"><?php echo esc_attr(get_option('punkcoder_profile_cellphone')); ?></a></span>
                </div>
                <div>
                    <span><?php echo(__("微信", "punkcoder"));?>:</span>
                    <span><?php echo esc_attr(get_option('punkcoder_profile_wechat')); ?></span>
                </div>
                <div class="punkcoder-sidebar-profile-item-social justify-content-center">
                    <a href="<?php echo esc_attr(get_option('punkcoder_profile_github')); ?>" target="_blank">
                        <i class="fab fa-github fa-2x"></i>
                    </a>
                    <a href="<?php echo esc_attr(get_option('punkcoder_profile_weibo')); ?>" target="_blank">
                        <i class="fab fa-weibo fa-2x"></i>
                    </a>
                    <a href="">
                        <i class="fab fa-weixin fa-2x"></i>
                    </a>
                    <a href="<?php echo esc_attr(get_option('punkcoder_profile_twitter')); ?>" target="_blank">
                        <i class="fab fa-twitter fa-2x"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <hr>

    <?php

    if ($query->have_posts()) {
        ?>
        <div class="row punkcoder-sidebar-hot">
            <div class="col-12 punkcoder-sidebar-hot-col">
                <div class="punkcoder-sidebar-hot-head">
                    <span>热门文章</span>
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
    if ($categories) {
        ?>
        <hr>
        <div class="row punkcoder-sidebar-hot">
            <div class="col-12 punkcoder-sidebar-hot-col">
                <div class="punkcoder-sidebar-hot-head">
                    <span>分类</span>
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
        <hr>
        <?php
    }
    ?>
    <?php
    if ($tags) {

        ?>
        <div class="row punkcoder-sidebar-tag">
            <div class="col-12">
                <div class="punkcoder-sidebar-tag-head">
                    <span>标签</span>
                </div>
                <div class="punkcoder-sidebar-tag-body">
                    <?php
                    foreach ($tags as $key => $val) {
                        $tag_link = get_tag_link($val->term_id);
                        ?>
                        <a href="<?php echo($tag_link); ?>">
                            <span class="badge badge-primary punkcoder-sidebar-tag-item"><?php echo($val->name) ?></span>
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
