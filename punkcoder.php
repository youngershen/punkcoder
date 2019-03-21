<?php
/**
 * PROJECT : punkcoder
 * FILE    : punkcoder.php
 * TIME    : 2019/3/15 10:14
 * AUTHOR  : Younger Shen
 * EMAIL   : younger.x.shen@gmail.com
 * PHONE   : 13811754531
 * WECHAT  : 13811754531
 * WEBSIT  : https://www.punkcoder.cn
 */


function punkcoder_menu_items()
{
    add_menu_page(
        null,
        __('主题', 'punkcoder'),
        "manage_options",
        "punkcoder",
        "punkcoder_options_page_form",
        "",
        99
    );

}

function punkcoder_options_page_form()
{
    settings_errors( 'punkcoder_messages' );

    ?>
    <div class="wrap">
        <div id="icon-options-general" class="icon32"></div>
        <h1><?php echo esc_html(get_admin_page_title())?></h1>
        <?php

        $active_tab = "profile";
        if(isset($_GET["tab"]))
        {
            if($_GET["tab"] == "profile")
            {
                $active_tab = "profile";
            }
            else
            {
                $active_tab = "setting";
            }
        }
        ?>

        <!-- wordpress provides the styling for tabs. -->
        <h2 class="nav-tab-wrapper">
            <!-- when tab buttons are clicked we jump back to the same page but with a new parameter that represents the clicked tab. accordingly we make it active -->
            <a href="?page=punkcoder&tab=profile" class="nav-tab <?php if($active_tab == 'profile'){echo 'nav-tab-active';} ?> "><?php _e('个人资料', 'punkcoder'); ?></a>
            <a href="?page=punkcoder&tab=setting" class="nav-tab  <?php if($active_tab == 'setting'){echo 'nav-tab-active';} ?>"><?php _e('系统设置', 'punkcoder'); ?></a>
        </h2>

        <form method="post" action="options.php" id="punkcoder-option-form">
            <?php

            settings_fields("punkcoder");

            do_settings_sections("punkcoder");

            submit_button();

            ?>
        </form>
    </div>
    <?php
}

function punkcoder_options_validate($args)
{
    $default_avatar = punkcoder_get_url('images', 'default-avatar-image.jpg');
    $default_wechat_qr_image = punkcoder_get_url('images', 'wechat-qr-image.jpg');


    $filtered = [
            'avatar' => $default_avatar,
            'nickname' => __('申延刚', 'punkcoder'),
            'age' => '30',
            'cellphone' => '13811754531',
            'email' => 'shenyangang@163.com',
            'github' => 'https://github.com/youngershen',
            'weibo' => 'https://weibo.com/shenyangang',
            'wechat_qr_image' => $default_wechat_qr_image,
            'twitter' => 'https://twitter.com/youngershen'
    ];

    if($args['avatar'])
    {
        $filtered['avatar'] = $args['avatar'];
    }

    if($args['nickname'])
    {
        $filtered['nickname'] = $args['nickname'];
    }

    if($args['age'])
    {
        if(preg_match('/^[1-9][\d]*$/', $args['age']))
        {
            $filtered['age'] = $args['age'];
        }
        else
        {
            add_settings_error('punkcoder_messages','punkcoder_options_age',__('年龄输入非法', 'punkcoder'),'error');
        }
    }

    if($args['cellphone'])
    {
        $filtered['cellphone'] = $args['cellphone'];
    }

    if($args['email'])
    {
        $filtered['email'] = $args['email'];
    }

    if($args['github'])
    {
        $filtered['github'] = $args['github'];
    }

    if($args['weibo'])
    {
        $filtered['weibo'] = $args['weibo'];
    }

    if($args['wechat_qr_image'])
    {
        $filtered['wechat_qr_image'] = $args['wechat_qr_image'];
    }

    if($args['twitter'])
    {
        $filtered['twitter'] = $args['twitter'];
    }

    return $filtered;
}

function punkcoder_options_header_html()
{
    if( !key_exists('tab', $_GET) || $_GET['tab'] == 'profile') {
        ?>
        <span><?php _e('这里填写的内容将会显示在首页侧边栏中 随便填就行 默认显示作者的信息', 'punkcoder'); ?></span>
        <?php
    }
    elseif ($_GET['tab'] == 'setting')
    {
        ?>
        <span><?php _e('这里是系统设置 按需求填写即可', 'punkcoder'); ?></span>
        <?php
    }

}

function punkcoder_profile_options()
{
    add_settings_section("punkcoder_option_section", __('个人资料', 'punkcoder'), "punkcoder_options_header_html", "punkcoder");

    add_settings_field(
        "punkcoder_avatar",
        __('头像', 'punkcoder'),
        "punkcoder_avatar_form",
        "punkcoder",
        "punkcoder_option_section");

    add_settings_field(
        "punkcoder_nickname",
        __('昵称', 'punkcoder'),
        "punkcoder_nickname_form",
        "punkcoder",
        "punkcoder_option_section");

    add_settings_field(
        "punkcoder_age",
        __('年龄', 'punkcoder'),
        "punkcoder_age_form",
        "punkcoder",
        "punkcoder_option_section");

    add_settings_field(
        "punkcoder_cellphone",
        __('手机', 'punkcoder'),
        "punkcoder_cellphone_form",
        "punkcoder",
        "punkcoder_option_section");

    add_settings_field(
        "punkcoder_email",
        __('电邮', 'punkcoder'),
        "punkcoder_email_form",
        "punkcoder",
        "punkcoder_option_section");

    add_settings_field(
        "punkcoder_github",
        __('Github', 'punkcoder'),
        "punkcoder_github_form",
        "punkcoder",
        "punkcoder_option_section");

    add_settings_field(
        "punkcoder_weibo",
        __('微博', 'punkcoder'),
        "punkcoder_weibo_form",
        "punkcoder",
        "punkcoder_option_section");


    add_settings_field(
        "punkcoder_wechat_qr_image",
        __('微信二维码', 'punkcoder'),
        "punkcoder_wechat_qr_image_form",
        "punkcoder",
        "punkcoder_option_section");


    add_settings_field(
        "punkcoder_twitter",
        __('Twitter', 'punkcoder'),
        "punkcoder_twitter_form",
        "punkcoder",
        "punkcoder_option_section");
}

function punkcoder_display_setting_options()
{
    add_settings_section("punkcoder_option_section", __('系统设置', 'punkcoder'), "display_header_options_content", "punkcoder");

    add_settings_field(
        "punkcoder_logo_image",
        __('LOGO', 'punkcoder'),
        "display_setting_logo_form_element",
        "punkcoder",
        "punkcoder_option_section");

    register_setting(
        "punkcoder",
        "punkcoder_setting_options");
}

function punkcoder_options_page()
{
    register_setting(
        "punkcoder",
        "punkcoder_options",
        [
            'sanitize_callback' => 'punkcoder_options_validate'
        ]);

    //here we display the sections and options in the settings page based on the active tab
    if(isset($_GET["tab"]))
    {
        if($_GET["tab"] == "profile")
        {
            punkcoder_profile_options();
        }
        else
        {
            punkcoder_display_setting_options();
        }
    }
    else
    {
        punkcoder_profile_options();
    }

}

function punkcoder_avatar_form()
{
    ?>
    <div class="punkcoder-options-avatar">
        <img src="<?php echo esc_html(punkcoder_get_options('punkcoder_options', 'avatar')); ?>" alt="" class="rounded mw-100 punkcoder-options-avatar" id="punkcoder-options-avatar-image">
        <input type="hidden" name="punkcoder_options[avatar]" id="punkcoder-options-avatar-input" value="<?php echo esc_html(punkcoder_get_options('punkcoder_options', 'avatar')); ?>">
    </div>
    <div>
        <button class="button-primary" id="punkcoder-avatar-upload-button"><?php _e('上传', 'punkcoder')?></button>
    </div>
    <?php
}

function punkcoder_nickname_form()
{
    ?>
    <input type="text" class="punkcoder-option-form-input" name="punkcoder_options[nickname]" id="punkcoder-options-nickname" value="<?php echo esc_html(punkcoder_get_options('punkcoder_options', 'nickname')); ?>" />
    <?php
}

function punkcoder_age_form()
{
    ?>
    <input class="punkcoder-option-form-input" type="text" name="punkcoder_options[age]" id="punkcoder-options-age" value="<?php echo esc_html(punkcoder_get_options('punkcoder_options', 'age')); ?>" />
    <?php
}

function punkcoder_cellphone_form()
{
    ?>
    <input class="punkcoder-option-form-input" type="text" name="punkcoder_options[cellphone]" id="punkcoder-options-cellphone" value="<?php echo esc_html(punkcoder_get_options('punkcoder_options', 'cellphone')); ?>" />
    <?php
}

function punkcoder_email_form()
{
    ?>
    <input class="punkcoder-option-form-input" type="text" name="punkcoder_options[email]" id="punkcoder-options-wechat" value="<?php echo esc_html(punkcoder_get_options('punkcoder_options', 'email'));?>" />
    <?php
}

function punkcoder_github_form()
{
    ?>
    <input class="punkcoder-option-form-input" type="text" name="punkcoder_options[github]" id="punkcoder-options-github" value="<?php echo esc_html(punkcoder_get_options('punkcoder_options', 'github'));?>" />
    <?php
}

function punkcoder_weibo_form()
{
    ?>
    <input class="punkcoder-option-form-input" type="text" name="punkcoder_options[weibo]" id="punkcoder-options-weibo" value="<?php echo esc_html(punkcoder_get_options('punkcoder_options', 'weibo'));?>" />
    <?php
}

function punkcoder_wechat_qr_image_form()
{
    ?>
    <div class="punkcoder-options-wechat-qr-image">
        <img src="<?php echo esc_html(punkcoder_get_options('punkcoder_options', 'wechat_qr_image')); ?>" alt="" class="rounded mw-100 punkcoder-options-wechat-qr-image" id="punkcoder-options-wechat-qr-image">
        <input type="hidden" name="punkcoder_options[wechat_qr_image]" id="punkcoder-options-wechat-qr-image-input" value="<?php echo esc_html(punkcoder_get_options('punkcoder_options', 'wechat_qr_image')); ?>">
    </div>
    <div>
        <button class="button-primary" id="punkcoder-wechat-upload-button"><?php _e('上传', 'punkcoder')?></button>
    </div>

    <?php
}

function punkcoder_twitter_form()
{
    ?>
    <input class="punkcoder-option-form-input" type="text" name="punkcoder_options[twitter]" id="punkcoder_profile_options_twitter" value="<?php echo esc_html(punkcoder_get_options('punkcoder_options', 'twitter'));?>" />
    <?php
}

function display_setting_logo_form_element()
{
    ?>
    <div class="punkcoder-options-setting-logo">
        <img src="<?php echo esc_html(punkcoder_get_options('punkcoder_profile_options', 'avatar')); ?>" alt="" class="rounded mw-100 punkcoder-options-profile-avatar" id="punkcoder-options-profile-avatar-image">
        <input type="hidden" name="punkcoder_profile_options[avatar]" id="punkcoder-options-profile-avatar-input" value="<?php echo esc_html(punkcoder_get_options('punkcoder_profile_options', 'avatar')); ?>">
    </div>
    <div>
        <button class="button-primary" id="punkcoder-avatar-upload-button"><?php _e('上传', 'punkcoder')?></button>
    </div>    <?php
}

function punkcoder_enqueue_js() {
    wp_enqueue_media();

    // admin.js
    $url = punkcoder_get_url('js', 'admin.js');
    wp_register_script('punkcoder-admin', $url, array('jquery'));

    // bootstrap.js
    $url = punkcoder_get_url('vendor', 'bootstrap-4.3.1-dist/js/bootstrap.min.js');
    wp_register_script('punkcoder-bootstrap', $url, array('jquery'));

    //fontawesome.js
    $url = punkcoder_get_url('vendor', 'fontawesome-free-5.7.2-web/js/all.min.js');
    wp_register_script('punkcoder-fontawesome', $url);

    wp_enqueue_script('punkcoder-admin');
    wp_enqueue_script('punkcoder-bootstrap');
    wp_enqueue_script('punkcoder-fontawesome');


    // admin.css
    $url = punkcoder_get_url('css', 'admin.css');
    wp_register_style('punkcoder-admin', $url);

    // bootstrap
    $url = punkcoder_get_url('vendor', 'bootstrap-4.3.1-dist/css/bootstrap.min.css');
    wp_register_style('punkcoder-bootstrap', $url);

    // fontawesome
    $url = punkcoder_get_url('vendor', 'fontawesome-free-5.7.2-web/css/all.min.css');
    wp_register_style('punkcoder-fontawesome', $url);

    wp_enqueue_style('punkcoder-admin');
//    wp_enqueue_style('punkcoder-bootstrap');
//    wp_enqueue_style('punkcoder-fontawesome');

}

add_action("admin_menu", "punkcoder_menu_items");
add_action('admin_enqueue_scripts', 'punkcoder_enqueue_js');
add_action("admin_init", "punkcoder_options_page");