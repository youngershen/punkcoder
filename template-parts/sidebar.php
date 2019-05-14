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
        <div class="col-12 punkcoder-sidebar-profile-col">
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
            <?php
            $show_phone = punkcoder_get_options('punkcoder_profiles', 'cellphone_show', 'no');
            $phone = punkcoder_get_options('punkcoder_profiles', 'cellphone');

            if('yes' == $show_phone && $phone)
            {
                ?>
                <a href="tel://<?php echo($phone); ?>" target="_blank" class="punkcoder-sidebar-profile-social-link">
                    <i class="fas fa-phone fa-1x punkcoder-sidebar-profile-social-link-item"></i>
                </a>
                <?php
            }
            ?>

            <?php
                $show_wechat = punkcoder_get_options('punkcoder_profiles', 'wechat_qr_image_show', 'no');
                $wechat_qr_image = esc_html(punkcoder_get_options('punkcoder_profiles', 'wechat_qr_image'));

                if('yes' == $show_wechat && $wechat_qr_image)
                {?>
                    <a href="" class="punkcoder-sidebar-profile-social-link"  data-toggle="modal" data-target="#wechat-qr-modal">
                        <i class="fab fa-weixin fa-1x punkcoder-sidebar-profile-social-link-item"></i>
                    </a>
                    <?php
                }
            ?>

            <?php
                $show_weibo = punkcoder_get_options('punkcoder_profiles', 'weibo_show', 'no');
                $weibo = punkcoder_get_options('punkcoder_profiles', 'weibo');

                if('yes' == $show_weibo && $weibo)
                {
                    ?>
                    <a href="<?php echo($weibo)?>" target="_blank" class="punkcoder-sidebar-profile-social-link">
                        <i class="fab fa-weibo fa-1x punkcoder-sidebar-profile-social-link-item"></i>
                    </a>
                    <?php
                }
            ?>

            <?php
                $show_qq = punkcoder_get_options('punkcoder_profiles', 'qq_show', 'no');
                $qq = punkcoder_get_options('punkcoder_profiles', 'qq');

                if('yes' == $show_qq && $qq)
                {
                    ?>
                    <a href="tencent://message/?uin=<?php echo($qq);?>" target="_blank" class="punkcoder-sidebar-profile-social-link">
                        <i class="fab fa-qq fa-1x punkcoder-sidebar-profile-social-link-item"></i>
                    </a>
                    <?php
                }
            ?>

            <?php

                $show_zhihu = punkcoder_get_options('punkcoder_profiles', 'zhihu_show', 'no');
                $zhihu = punkcoder_get_options('punkcoder_profiles', 'zhihu');

                if('yes' == $show_zhihu && $zhihu)
                {
                    ?>
                    <a href="<?php echo($zhihu)?>" target="_blank" class="punkcoder-sidebar-profile-social-link">
                        <i class="fab fa-zhihu fa-1x punkcoder-sidebar-profile-social-link-item"></i>
                    </a>
                    <?php
                }
            ?>
            <?php
                $show_github = punkcoder_get_options('punkcoder_profiles', 'github_show', 'no');
                $github = punkcoder_get_options('punkcoder_profiles', 'github');

                if('yes' == $show_github && $github)
                {
                    ?>
                    <a href="<?php echo($github); ?>" target="_blank" class="punkcoder-sidebar-profile-social-link">
                        <i class="fab fa-github fa-1x punkcoder-sidebar-profile-social-link-item"></i>
                    </a>
                    <?php
                }
            ?>

            <?php
                $show_stackoverflow = punkcoder_get_options('punkcoder_profiles', 'stackoverflow_show', 'no');
                $stackoverflow = punkcoder_get_options('punkcoder_profiles', 'stackoverflow');

                if('yes' == $show_stackoverflow && $stackoverflow)
                {
                    ?>
                    <a href="<?php echo($stackoverflow); ?>" target="_blank" class="punkcoder-sidebar-profile-social-link">
                        <i class="fab fa-stack-overflow fa-1x punkcoder-sidebar-profile-social-link-item"></i>
                    </a>
                    <?php
                }
                ?>

            <?php
                $show_twitter = punkcoder_get_options('punkcoder_profiles', 'twitter_show', 'no');
                $twitter = punkcoder_get_options('punkcoder_profiles', 'twitter');

                if('yes' == $show_twitter && $twitter)
                {
                    ?>
                    <a href="<?php echo($twitter); ?>" target="_blank" class="punkcoder-sidebar-profile-social-link">
                        <i class="fab fa-twitter fa-1x punkcoder-sidebar-profile-social-link-item"></i>
                    </a>
                    <?php
                }
            ?>

            <?php
                $show_email = punkcoder_get_options('punkcoder_profiles', 'email_show', 'no');
                $email = punkcoder_get_options('punkcoder_profiles', 'email');

                if('yes' == $show_email && $email)
                {
                    ?>
                    <a href="mailto://<?php echo($email);?>" target="_blank" class="punkcoder-sidebar-profile-social-link">
                        <i class="fas fa-envelope fa-1x punkcoder-sidebar-profile-social-link-item"></i>
                    </a>
                    <?php
                }
            ?>

            <?php
                $show_instagram = punkcoder_get_options('punkcoder_profiles', 'instagram_show', 'no');
                $instagram = punkcoder_get_options('punkcoder_profiles', 'instagram');

                if('yes' == $show_instagram && $instagram)
                {
                    ?>

                    <a href="<?php echo($instagram); ?>" target="_blank" class="punkcoder-sidebar-profile-social-link">
                        <i class="fab fa-instagram fa-1x punkcoder-sidebar-profile-social-link-item"></i>
                    </a>
                    <?php
                }

            ?>

            <?php
                $show_pinterest = punkcoder_get_options('punkcoder_profiles', 'pinterest_show', 'no');
                $pinterest = punkcoder_get_options('punkcoder_profiles', 'pinterest');

                if('yes' == $show_pinterest && $pinterest)
                {
                    ?>
                    <a href="<?php echo($pinterest); ?>" target="_blank" class="punkcoder-sidebar-profile-social-link">
                        <i class="fab fa-pinterest fa-1x punkcoder-sidebar-profile-social-link-item"></i>
                    </a>
                    <?php
                }

            ?>

            <?php
                $show_linkedin = punkcoder_get_options('punkcoder_profiles', 'linkedin_show', 'no');
                $linked_in = punkcoder_get_options('punkcoder_profiles', 'linkedin');

                if('yes' == $show_linkedin && $linked_in)
                {
                    ?>
                    <a href="<?php echo($linked_in);?>" target="_blank" class="punkcoder-sidebar-profile-social-link">
                        <i class="fab fa-linkedin fa-1x punkcoder-sidebar-profile-social-link-item"></i>
                    </a>
                    <?php
                }

            ?>

            <?php
                $show_youtube = punkcoder_get_options('punkcoder_profiles', 'youtube_show', 'no');
                $youtube = punkcoder_get_options('punkcoder_profiles', 'youtube');

                if('yes' == $show_youtube && $youtube)
                {
                    ?>
                    <a href="<?php echo($youtube); ?>" target="_blank" class="punkcoder-sidebar-profile-social-link">
                        <i class="fab fa-youtube fa-1x punkcoder-sidebar-profile-social-link-item"></i>
                    </a>
                    <?php
                }
            ?>

            <?php
                $show_quora = punkcoder_get_options('punkcoder_profiles', 'quora_show', 'no');
                $quora = punkcoder_get_options('punkcoder_profiles', 'quora');

                if('yes' == $show_quora && $quora)
                {
                    ?>
                    <a href="<?php echo($quora); ?>" target="_blank" class="punkcoder-sidebar-profile-social-link">
                        <i class="fab fa-quora fa-1x punkcoder-sidebar-profile-social-link-item"></i>
                    </a>
                    <?php
                }
            ?>


            <a href="" target="_blank" class="punkcoder-sidebar-profile-social-link">
                <i class="fas fa-rss fa-1x punkcoder-sidebar-profile-social-link-item"></i>
            </a>
        </div>
    </div>

    <?php
    if ($query->have_posts())
    {
    ?>
        <div class="row punkcoder-sidebar-panel">
            <div class="col-12 punkcoder-sidebar-panel-col">
                <div class="card bg-light mb-3">
                    <div class="card-header punkcoder-sidebar-panel-header"><?php _e('热门文章', 'punkcoder')?></div>
                    <div class="card-body punkcoder-sidebar-panel-body">
                        <?php
                        global $post;
                        while ($query->have_posts())
                        {
                            $query->the_post();
                        ?>
                            <div class="punkcoder-sidebar-panel-body-item">
                                <a href="<?php echo(get_permalink($post)); ?>"><?php echo(get_the_title()); ?></a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
<?php } ?>

<?php
if ($categories && count($categories) > 0) {
    ?>
    <div class="row punkcoder-sidebar-panel">
        <div class="col-12 punkcoder-sidebar-panel-col">
            <div class="card bg-light mb-3">
                <div class="card-header punkcoder-sidebar-panel-header"><?php _e('热门分类', 'punkcoder')?></div>
                <div class="card-body punkcoder-sidebar-panel-body">
                    <?php
                    foreach ($categories as $key => $val) {
                        $category_link = get_category_link($val->term_id);
                        ?>
                        <div class="punkcoder-sidebar-panel-body-item">
                            <a href="<?php echo($category_link); ?>"><?php echo($val->name); ?>(10)</a>
                        </div>
                        <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>

<?php }?>

    <?php
    if ($tags && count($tags) > 0) {
        ?>
        <div class="row punkcoder-sidebar-panel">
            <div class="col-12 punkcoder-sidebar-panel-col">
                <div class="card bg-light mb-3">
                    <div class="card-header punkcoder-sidebar-panel-header">
                        <?php _e('热门标签', 'punkcoder')?>
                    </div>
                    <div class="card-body punkcoder-sidebar-panel-body">
                        <?php
                        foreach ($tags as $key => $val) {
                            $tag_link = get_tag_link($val->term_id);
                            ?>
                            <a href="<?php echo($tag_link); ?>" target="_blank" class="punkcoder-sidebar-tag-item">
                                <?php echo($val->name) ?> (1)
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                </div>

            </div>
        </div>
        <?php
    }
    ?>
</div>

<!-- Wechat Qr Image Modal -->

<?php
if('yes' == $show_wechat && $wechat_qr_image)
{
?>
    <div class="modal fade" id="wechat-qr-modal" tabindex="-1" role="dialog" aria-labelledby="wechat-qr-modal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="modal-body">
                    <img class="punkcoder-sidebar-wechat-qr-image rounded mw-100" src="<?php echo esc_attr($wechat_qr_image); ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><?php _e('Close', 'punkcoder');?></button>
                </div>
            </div>
        </div>
    </div>
<?php
}

