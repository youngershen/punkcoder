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

    <div class="row punkcoder-sidebar-profile">
        <div class="col-12 punkcoder-sidebar-profile">
            <?php
            $avatar = punkcoder_get_options('punkcoder_profiles', 'avatar', punkcoder_get_url('images', 'default-avatar-image.jpg'));
            $alt = punkcoder_get_options('punkcoder_profiles', 'nickname', __('申延刚', 'punkcoder'));
            $name = punkcoder_get_options('punkcoder_profiles', 'nickname', __('申延刚','punkcoder'));
            $bio = punkcoder_get_options('punkcoder_profiles', 'bio', __('你好世界', 'punkcoder'));
            ?>
            <img src="<?php esc_html_e($avatar);?>" alt="<?php esc_html_e($alt)?>" class="rounded mw-100 punkcoder-sidebar-profile-avatar">
            <div class="punkcoder-sidebar-profile-info">
                <span class="punkcoder-sidebar-profile-info-nickname d-block">
                    <?php esc_html_e($name)?>
                </span>
                <span class="punkcoder-sidebar-profile-info-bio d-block">
                    <?php esc_html_e($bio)?>
                </span>
            </div>


        </div>
        <div class="col-12 punkcoder-sidebar-profile-social">
            <a href="" target="_blank" class="punkcoder-sidebar-profile-social-link">
                <i class="fab fa-weixin fa-1x punkcoder-sidebar-profile-social-link-item"></i>
            </a>
            <a href="" target="_blank" class="punkcoder-sidebar-profile-social-link">
                <i class="fab fa-weibo fa-1x punkcoder-sidebar-profile-social-link-item"></i>
            </a>
            <a href="" target="_blank" class="punkcoder-sidebar-profile-social-link">
                <i class="fab fa-qq fa-1x punkcoder-sidebar-profile-social-link-item"></i>
            </a>
            <a href="" target="_blank" class="punkcoder-sidebar-profile-social-link">
                <i class="fab fa-zhihu fa-1x punkcoder-sidebar-profile-social-link-item"></i>
            </a>
            <a href="" target="_blank" class="punkcoder-sidebar-profile-social-link">
                <i class="fab fa-github fa-1x punkcoder-sidebar-profile-social-link-item"></i>
            </a>
            <a href="" target="_blank" class="punkcoder-sidebar-profile-social-link">
                <i class="fab fa-stack-overflow fa-1x punkcoder-sidebar-profile-social-link-item"></i>
            </a>
            <a href="" target="_blank" class="punkcoder-sidebar-profile-social-link">
                <i class="fab fa-twitter fa-1x punkcoder-sidebar-profile-social-link-item"></i>
            </a>
            <a href="" target="_blank" class="punkcoder-sidebar-profile-social-link">
                <i class="fas fa-envelope fa-1x punkcoder-sidebar-profile-social-link-item"></i>
            </a>
            <a href="" target="_blank" class="punkcoder-sidebar-profile-social-link">
                <i class="fab fa-instagram fa-1x punkcoder-sidebar-profile-social-link-item"></i>
            </a>
            <a href="" target="_blank" class="punkcoder-sidebar-profile-social-link">
                <i class="fab fa-pinterest fa-1x punkcoder-sidebar-profile-social-link-item"></i>
            </a>
            <a href="" target="_blank" class="punkcoder-sidebar-profile-social-link">
                <i class="fab fa-linkedin fa-1x punkcoder-sidebar-profile-social-link-item"></i>
            </a>
            <a href="" target="_blank" class="punkcoder-sidebar-profile-social-link">
                <i class="fab fa-youtube fa-1x punkcoder-sidebar-profile-social-link-item"></i>
            </a>
            <a href="" target="_blank" class="punkcoder-sidebar-profile-social-link">
                <i class="fab fa-quora fa-1x punkcoder-sidebar-profile-social-link-item"></i>
            </a>
        </div>
    </div>

    <div class="row punkcoder-sidebar-profiles justify-content-center">
        <div class="col-12">
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

<?php
$show = punkcoder_get_options('punkcoder_profiles', 'wechat_qr_image_show', 'no');;
$wechat = punkcoder_get_options('punkcoder_profiles', 'wechat_qr_image');

if('yes' == $show && $wechat)
{
?>
    <div class="modal fade" id="wechat-qr-modal" tabindex="-1" role="dialog" aria-labelledby="wechat-qr-modal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="modal-body">
                    <img class="punkcoder-sidebar-wechat-qr-image rounded mw-100" src="<?php echo esc_attr($wechat); ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><?php _e('Close', 'punkcoder');?></button>
                </div>
            </div>
        </div>
    </div>
<?php
}

