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
        '',
        __('PUNKCODER', 'punkcoder'),
        '',
        'punkcoder'
    );

    add_submenu_page(
            'punkcoder',
            __('设置', 'punkcoder'),
            __('设置', 'punkcoder'),
            'manage_options',
            'punkcoder-options',
            'punkcoder_options_page_form');


    add_submenu_page(
        'punkcoder',
        __('关于', 'punkcoder'),
        __('关于', 'punkcoder'),
        'manage_options',
        'punkcoder-about',
        'punkcoder_about_page');

    add_submenu_page(
        'punkcoder',
        __('友链', 'punkcoder'),
        __('友链', 'punkcoder'),
        'manage_options',
        'punkcoder-links',
        'punkcoder_links_page');

    add_submenu_page(
            'punkcoder',
            __('相册', 'punkcoder'),
            __('相册', 'punkcoder'),
            'manage_options',
            'punkcoder-album',
            'punkcoder_album_page');

    add_submenu_page(
        'punkcoder',
        __('项目', 'punkcoder'),
        __('项目', 'punkcoder'),
        'manage_options',
        'punkcoder-portfolio',
        'punkcoder_portfolio_page');

    add_submenu_page(
        'punkcoder',
        __('广告', 'punkcoder'),
        __('广告', 'punkcoder'),
        'manage_options',
        'punkcoder-ad',
        'punkcoder_ad_page');

    add_submenu_page(
        'punkcoder',
        __('SEO', 'punkcoder'),
        __('SEO', 'punkcoder'),
        'manage_options',
        'punkcoder-seo',
        'punkcoder_seo_page');
}

function punkcoder_about_page()
{
    echo 'about';
}

function punkcoder_links_page()
{
    echo "link";
}

function punkcoder_album_page()
{
    echo "album";
}

function punkcoder_portfolio_page()
{
    echo 'portfolio';
}


function punkcoder_ad_page()
{
    echo "ad";
}


function punkcoder_seo_page()
{
    echo "seo";
}

function punkcoder_options_page_form()
{
    settings_errors( 'punkcoder_messages' );

    ?>
    <div class="wrap">
        <div id="icon-options-general" class="icon32"></div>
        <h1><?php echo esc_html(get_admin_page_title())?></h1>
        <?php

        $active_tab = 'profiles';

        if(isset($_GET['tab']))
        {
            if($_GET['tab'] == 'profiles')
            {
                $active_tab = 'profiles';
            }
            else
            {
                $active_tab = 'settings';
            }
        }
        $option = 'punkcoder_' . $active_tab;
        ?>
        <br>
        <!-- wordpress provides the styling for tabs. -->
        <h2 class="nav-tab-wrapper">
            <!-- when tab buttons are clicked we jump back to the same page but with a new parameter that represents the clicked tab. accordingly we make it active -->
            <a href="?page=punkcoder-options&tab=profiles" class="nav-tab <?php if($active_tab == 'profiles'){echo 'nav-tab-active';} ?> "><?php _e('个人资料', 'punkcoder'); ?></a>
            <a href="?page=punkcoder-options&tab=settings" class="nav-tab  <?php if($active_tab == 'settings'){echo 'nav-tab-active';} ?>"><?php _e('系统设置', 'punkcoder'); ?></a>
        </h2>

        <form method="post" action="options.php" id="punkcoder-option-form">
            <?php

            settings_fields($option);

            do_settings_sections($option);

            submit_button();

            ?>
        </form>
    </div>
    <?php
}

function punkcoder_settings_validate($args)
{
    if(!array_key_exists('logo_show', $args))
    {
        $args['logo_show'] = 'no';
    }

    if(!array_key_exists('bg_image_show', $args))
    {
        $args['bg_image_show'] = 'no';
    }

    if(!array_key_exists('custom_code_show', $args))
    {
        $args['custom_code_show'] = 'no';
    }

    if(!array_key_exists('beian_show', $args))
    {
        $args['beian_show'] = 'no';
    }

    if(!array_key_exists('copyright_show', $args))
    {
        $args['copyright_show'] = 'no';
    }

    if(!array_key_exists('theme_copyright_show', $args))
    {
        $args['theme_copyright_show'] = 'no';
    }

    if(!array_key_exists('wp_copyright_show', $args))
    {
        $args['wp_copyright_show'] = 'no';
    }

    return $args;
}

function punkcoder_profiles_validate($args)
{

    if(!array_key_exists('qq_show', $args))
    {
        $args['qq_show'] = 'no';
    }


    if(!array_key_exists('skype_show', $args))
    {
        $args['skype_show'] = 'no';
    }


    if(!array_key_exists('whatsapp_show', $args))
    {
        $args['whatsapp_show'] = 'no';
    }

    if(!array_key_exists('bio_show', $args))
    {
        $args['bio_show'] = 'no';
    }

    if(!array_key_exists('github_show', $args))
    {
        $args['github_show'] = 'no';
    }

    if(!array_key_exists('weibo_show', $args))
    {
        $args['weibo_show'] = 'no';
    }

    if(!array_key_exists('wechat_qr_image_show', $args))
    {
        $args['wechat_qr_image_show'] = 'no';
    }

    if(!array_key_exists('twitter_show', $args))
    {
        $args['twitter_show'] = 'no';
    }

    if(!array_key_exists('email_show', $args))
    {
        $args['email_show'] = 'no';
    }

    if(!array_key_exists('instagram_show', $args))
    {
        $args['instagram_show'] = 'no';
    }

    if(!array_key_exists('pinterest_show', $args))
    {
        $args['pinterest_show'] = 'no';
    }

    if(!array_key_exists('linkedin_show', $args))
    {
        $args['linkedin_show'] = 'no';
    }

    if(!array_key_exists('youtube_show', $args))
    {
        $args['youtube_show'] = 'no';
    }

    if(!array_key_exists('quora_show', $args))
    {
        $args['quora_show'] = 'no';
    }

    if(!array_key_exists('stackoverflow_show', $args))
    {
        $args['stackoverflow_show'] = 'no';
    }

    if(!array_key_exists('zhihu_show', $args))
    {
        $args['zhihu_show'] = 'no';
    }

    if(!array_key_exists('rss_show', $args))
    {
        $args['rss_show'] = 'no';
    }

    return $args;
}

function punkcoder_options_header_html()
{
    if( !key_exists('tab', $_GET) || $_GET['tab'] == 'profiles') {
        ?>
        <span><?php _e('这里填写的内容将会显示在首页侧边栏中', 'punkcoder'); ?></span>
        <?php
    }
    elseif ($_GET['tab'] == 'settings')
    {
        ?>
        <span><?php _e('这里是系统设置 按需求填写即可', 'punkcoder'); ?></span>
        <?php
    }
}

function punkcoder_profiles()
{
    add_settings_section(
            'punkcoder_profiles_section',
            __('个人资料', 'punkcoder'),
            'punkcoder_options_header_html',
            'punkcoder_profiles');

    add_settings_field(
        'punkcoder_avatar',
        __('头像', 'punkcoder'),
        'punkcoder_avatar_form',
        'punkcoder_profiles',
        'punkcoder_profiles_section');

    add_settings_field(
        "punkcoder_nickname",
        __('昵称', 'punkcoder'),
        "punkcoder_nickname_form",
        "punkcoder_profiles",
        "punkcoder_profiles_section");

    add_settings_field(
        "punkcoder_cellphone",
        __('手机', 'punkcoder'),
        "punkcoder_cellphone_form",
        "punkcoder_profiles",
        "punkcoder_profiles_section");

    add_settings_field(
        "punkcoder_cellphone_show",
        __('显示手机', 'punkcoder'),
        "punkcoder_cellphone_show_form",
        "punkcoder_profiles",
        "punkcoder_profiles_section");

    add_settings_field(
        "punkcoder_qq",
        __('QQ', 'punkcoder'),
        "punkcoder_qq_form",
        "punkcoder_profiles",
        "punkcoder_profiles_section");

    add_settings_field(
        "punkcoder_qq_show",
        __('显示 QQ', 'punkcoder'),
        "punkcoder_qq_show_form",
        "punkcoder_profiles",
        "punkcoder_profiles_section");

    add_settings_field(
        "punkcoder_whatsapp",
        __('WhatsAPP', 'punkcoder'),
        "punkcoder_whatsapp_form",
        "punkcoder_profiles",
        "punkcoder_profiles_section");

    add_settings_field(
        "punkcoder_whatsapp_show",
        __('显示 WhatsAPP', 'punkcoder'),
        "punkcoder_whatsapp_show_form",
        "punkcoder_profiles",
        "punkcoder_profiles_section");

    add_settings_field(
        "punkcoder_skype",
        __('Skype', 'punkcoder'),
        "punkcoder_skype_form",
        "punkcoder_profiles",
        "punkcoder_profiles_section");

    add_settings_field(
        "punkcoder_skype_show",
        __('显示 Skype', 'punkcoder'),
        "punkcoder_skype_show_form",
        "punkcoder_profiles",
        "punkcoder_profiles_section");


    add_settings_field(
        "punkcoder_bio",
        __('简介', 'punkcoder'),
        "punkcoder_bio_form",
        "punkcoder_profiles",
        "punkcoder_profiles_section");

    add_settings_field(
        "punkcoder_bio_show",
        __('显示简介', 'punkcoder'),
        "punkcoder_bio_show_form",
        "punkcoder_profiles",
        "punkcoder_profiles_section");

    add_settings_field(
        "punkcoder_github",
        __('Github', 'punkcoder'),
        "punkcoder_github_form",
        "punkcoder_profiles",
        "punkcoder_profiles_section");

    add_settings_field(
        "punkcoder_github_show",
        __('显示 Github', 'punkcoder'),
        "punkcoder_github_show_form",
        "punkcoder_profiles",
        "punkcoder_profiles_section");

    add_settings_field(
        "punkcoder_weibo",
        __('微博', 'punkcoder'),
        "punkcoder_weibo_form",
        "punkcoder_profiles",
        "punkcoder_profiles_section");

    add_settings_field(
        "punkcoder_weibo_show",
        __('显示微博', 'punkcoder'),
        "punkcoder_weibo_show_form",
        "punkcoder_profiles",
        "punkcoder_profiles_section");

    add_settings_field(
        "punkcoder_wechat_qr_image",
        __('微信二维码', 'punkcoder'),
        "punkcoder_wechat_qr_image_form",
        "punkcoder_profiles",
        "punkcoder_profiles_section");

    add_settings_field(
        "punkcoder_wechat_qr_image_show",
        __('显示微信二维码', 'punkcoder'),
        "punkcoder_wechat_qr_image_show_form",
        "punkcoder_profiles",
        "punkcoder_profiles_section");

    add_settings_field(
        "punkcoder_twitter",
        __('Twitter', 'punkcoder'),
        "punkcoder_twitter_form",
        "punkcoder_profiles",
        "punkcoder_profiles_section");

    add_settings_field(
        "punkcoder_twitter_show",
        __('显示 Twitter', 'punkcoder'),
        "punkcoder_twitter_show_form",
        "punkcoder_profiles",
        "punkcoder_profiles_section");

    add_settings_field(
        "punkcoder_email",
        __('电邮', 'punkcoder'),
        "punkcoder_email_form",
        "punkcoder_profiles",
        "punkcoder_profiles_section");

    add_settings_field(
        "punkcoder_email_show",
        __('显示电邮', 'punkcoder'),
        "punkcoder_email_show_form",
        "punkcoder_profiles",
        "punkcoder_profiles_section");

    add_settings_field(
        "punkcoder_instagram",
        __('Instagram', 'punkcoder'),
        "punkcoder_instagram_form",
        "punkcoder_profiles",
        "punkcoder_profiles_section");

    add_settings_field(
        "punkcoder_instagram_show",
        __('显示 Instagram', 'punkcoder'),
        "punkcoder_instagram_show_form",
        "punkcoder_profiles",
        "punkcoder_profiles_section");

    add_settings_field(
        "punkcoder_pinterest",
        __('Pinterest', 'punkcoder'),
        "punkcoder_pinterest_form",
        "punkcoder_profiles",
        "punkcoder_profiles_section");

    add_settings_field(
        "punkcoder_pinterest_show",
        __('显示 Pinterest', 'punkcoder'),
        "punkcoder_pinterest_show_form",
        "punkcoder_profiles",
        "punkcoder_profiles_section");

    add_settings_field(
        "punkcoder_linkedin",
        __('Linkedin', 'punkcoder'),
        "punkcoder_linkedin_form",
        "punkcoder_profiles",
        "punkcoder_profiles_section");

    add_settings_field(
        "punkcoder_linkedin_show",
        __('显示 Linkedin', 'punkcoder'),
        "punkcoder_linkedin_show_form",
        "punkcoder_profiles",
        "punkcoder_profiles_section");

    add_settings_field(
        "punkcoder_youtube",
        __('Youtube', 'punkcoder'),
        "punkcoder_youtube_form",
        "punkcoder_profiles",
        "punkcoder_profiles_section");

    add_settings_field(
        "punkcoder_youtube_show",
        __('显示 Youtube', 'punkcoder'),
        "punkcoder_youtube_show_form",
        "punkcoder_profiles",
        "punkcoder_profiles_section");

    add_settings_field(
        "punkcoder_quora",
        __('Quora', 'punkcoder'),
        "punkcoder_quora_form",
        "punkcoder_profiles",
        "punkcoder_profiles_section");

    add_settings_field(
        "punkcoder_quora_show",
        __('显示 Quora', 'punkcoder'),
        "punkcoder_quora_show_form",
        "punkcoder_profiles",
        "punkcoder_profiles_section");

    add_settings_field(
        "punkcoder_stackoverflow",
        __('Stackoverflow', 'punkcoder'),
        "punkcoder_stackoverflow_form",
        "punkcoder_profiles",
        "punkcoder_profiles_section");

    add_settings_field(
        "punkcoder_stackoverflow_show",
        __('显示 Stackoverflow', 'punkcoder'),
        "punkcoder_stackoverflow_show_form",
        "punkcoder_profiles",
        "punkcoder_profiles_section");

    add_settings_field(
        "punkcoder_zhihu",
        __('Zhihu', 'punkcoder'),
        "punkcoder_zhihu_form",
        "punkcoder_profiles",
        "punkcoder_profiles_section");

    add_settings_field(
        "punkcoder_zhihu_show",
        __('显示 Zhihu', 'punkcoder'),
        "punkcoder_zhihu_show_form",
        "punkcoder_profiles",
        "punkcoder_profiles_section");


    add_settings_field(
        "punkcoder_rss_show",
        __('显示 RSS', 'punkcoder'),
        "punkcoder_rss_show_form",
        "punkcoder_profiles",
        "punkcoder_profiles_section");
}

function punkcoder_settings()
{
    add_settings_section(
            "punkcoder_settings_section",
            __('系统设置', 'punkcoder'),
            "punkcoder_options_header_html",
            "punkcoder_settings");

    add_settings_field(
        "punkcoder_logo_image",
        __('LOGO', 'punkcoder'),
        "punkcoder_logo_form",
        "punkcoder_settings",
        "punkcoder_settings_section");

    add_settings_field(
        "punkcoder_logo_image_show",
        __('显示LOGO', 'punkcoder'),
        "punkcoder_logo_show_form",
        "punkcoder_settings",
        "punkcoder_settings_section");

    add_settings_field(
        "punkcoder_bg_image",
        __('背景图片', 'punkcoder'),
        "punkcoder_bg_image_form",
        "punkcoder_settings",
        "punkcoder_settings_section");

    add_settings_field(
        "punkcoder_bg_image_show",
        __('显示背景图片', 'punkcoder'),
        "punkcoder_bg_image_show_form",
        "punkcoder_settings",
        "punkcoder_settings_section");

    add_settings_field(
        "punkcoder_custom_code",
        __('自定义代码', 'punkcoder'),
        "punkcoder_custom_code_form",
        "punkcoder_settings",
        "punkcoder_settings_section");

    add_settings_field(
        "punkcoder_custom_code_show",
        __('显示自定义代码', 'punkcoder'),
        "punkcoder_custom_code_show_form",
        "punkcoder_settings",
        "punkcoder_settings_section");

    add_settings_field(
        "punkcoder_beian",
        __('备案编号', 'punkcoder'),
        "punkcoder_beian_form",
        "punkcoder_settings",
        "punkcoder_settings_section");

    add_settings_field(
        "punkcoder_beian_show",
        __('显示备案编号', 'punkcoder'),
        "punkcoder_beian_show_form",
        "punkcoder_settings",
        "punkcoder_settings_section");

    add_settings_field(
        "punkcoder_copyright",
        __('版权信息', 'punkcoder'),
        "punkcoder_copyright_form",
        "punkcoder_settings",
        "punkcoder_settings_section");

    add_settings_field(
        "punkcoder_copyright_show",
        __('显示版权信息', 'punkcoder'),
        "punkcoder_copyright_show_form",
        "punkcoder_settings",
        "punkcoder_settings_section");

    add_settings_field(
        "punkcoder_theme_copyright_show",
        __('显示主题版权', 'punkcoder'),
        "punkcoder_theme_copyright_show_form",
        "punkcoder_settings",
        "punkcoder_settings_section");

    add_settings_field(
        "punkcoder_wp_copyright_show",
        __('显示WORDPRESS版权', 'punkcoder'),
        "punkcoder_wp_copyright_show_form",
        "punkcoder_settings",
        "punkcoder_settings_section");
}

function punkcoder_init_profile_options()
{
    register_setting("punkcoder_profiles", "punkcoder_profiles",
        [
            'sanitize_callback' => 'punkcoder_profiles_validate'
        ]);

    punkcoder_profiles();
}

function punkcoder_init_setting_options()
{
    register_setting("punkcoder_settings", "punkcoder_settings",
        [
            'sanitize_callback' => 'punkcoder_settings_validate'
        ]);

    punkcoder_settings();
}

function punkcoder_options_page()
{

    if(isset($_GET['tab']) && $_GET['tab'] == 'profiles' || isset($_POST['option_page']) && $_POST['option_page'] == 'punkcoder_profiles')
    {
       punkcoder_init_profile_options();
    }

    else if(isset($_GET['tab']) && $_GET['tab'] == 'settings' || isset($_POST['option_page']) && $_POST['option_page'] == 'punkcoder_settings')
    {
        punkcoder_init_setting_options();
    }

    else
    {
        punkcoder_init_profile_options();
    }
}

function punkcoder_avatar_form()
{
    $default = punkcoder_get_url('images', 'default-avatar-image.jpg');
    $image = esc_html(punkcoder_get_options('punkcoder_profiles', 'avatar', $default));

    ?>
    <div class="punkcoder-options-avatar">
        <img src="<?php echo $image; ?>" alt="" class="rounded mw-100 punkcoder-options-avatar" id="punkcoder-options-avatar-image">
        <input type="hidden" name="punkcoder_profiles[avatar]" id="punkcoder-options-avatar-input" value="<?php echo $image; ?>">
    </div>
    <div>
        <button class="button-primary" id="punkcoder-avatar-upload-button"><?php _e('上传', 'punkcoder')?></button>
    </div>
    <?php
}

function punkcoder_nickname_form()
{
    $default = __('申延刚', 'punkcoder');
    $name = esc_html(punkcoder_get_options('punkcoder_profiles', 'nickname', $default));
    ?>
    <input type="text" class="punkcoder-option-form-input" name="punkcoder_profiles[nickname]" id="punkcoder-options-nickname" value="<?php echo $name; ?>" />
    <?php
}

function punkcoder_cellphone_form()
{
    $defalt = '';
    $cellphone = esc_html(punkcoder_get_options('punkcoder_profiles', 'cellphone', $defalt));

    ?>
    <input class="punkcoder-option-form-input" type="text" name="punkcoder_profiles[cellphone]" id="punkcoder-options-cellphone" value="<?php echo $cellphone; ?>" />
    <?php
}

function punkcoder_cellphone_show_form()
{
    ?>
    <input type="checkbox"
           class="punkcoder-option-form-input"
           name="punkcoder_profiles[cellphone_show]"
           id="punkcoder-options-cellphone-show"
           value="yes"
        <?php
        if(punkcoder_get_options('punkcoder_profiles', 'cellphone_show', 'yes') == 'yes')
        {
            ?>
            checked="checked"
            <?php
        }
        ?>
    />
    <?php
}

function punkcoder_qq_form()
{
    $defalt = '';
    $qq = esc_html(punkcoder_get_options('punkcoder_profiles', 'qq', $defalt));

    ?>
    <input class="punkcoder-option-form-input" type="text" name="punkcoder_profiles[qq]" id="punkcoder-options-qq" value="<?php echo $qq; ?>" />
    <?php
}

function punkcoder_qq_show_form()
{
    ?>
    <input type="checkbox"
           class="punkcoder-option-form-input"
           name="punkcoder_profiles[qq_show]"
           id="punkcoder-options-qq-show"
           value="yes"
        <?php
        if(punkcoder_get_options('punkcoder_profiles', 'qq_show', 'yes') == 'yes')
        {
            ?>
            checked="checked"
            <?php
        }
        ?>
    />
    <?php
}

function punkcoder_whatsapp_form()
{
    $defalt = '';
    $whatsapp = esc_html(punkcoder_get_options('punkcoder_profiles', 'whatsapp', $defalt));

    ?>
    <input class="punkcoder-option-form-input" type="text" name="punkcoder_profiles[whatsapp]" id="punkcoder-options-whatsapp" value="<?php echo $whatsapp; ?>" />
    <?php
}

function punkcoder_whatsapp_show_form()
{
    ?>
    <input type="checkbox"
           class="punkcoder-option-form-input"
           name="punkcoder_profiles[whatsapp_show]"
           id="punkcoder-options-whatsapp-show"
           value="yes"
        <?php
        if(punkcoder_get_options('punkcoder_profiles', 'whatsapp_show', 'yes') == 'yes')
        {
            ?>
            checked="checked"
            <?php
        }
        ?>
    />
    <?php
}

function punkcoder_skype_form()
{
    $defalt = '';
    $skype = esc_html(punkcoder_get_options('punkcoder_profiles', 'skype', $defalt));

    ?>
    <input class="punkcoder-option-form-input" type="text" name="punkcoder_profiles[skype]" id="punkcoder-options-skype" value="<?php echo $skype; ?>" />
    <?php
}

function punkcoder_skype_show_form()
{
    ?>
    <input type="checkbox"
           class="punkcoder-option-form-input"
           name="punkcoder_profiles[skype_show]"
           id="punkcoder-options-skype-show"
           value="yes"
        <?php
        if(punkcoder_get_options('punkcoder_profiles', 'skype_show', 'yes') == 'yes')
        {
            ?>
            checked="checked"
            <?php
        }
        ?>
    />
    <?php
}


function punkcoder_bio_form()
{
    $defalt = '';
    $bio = esc_html(punkcoder_get_options('punkcoder_profiles', 'bio', $defalt));

    ?>
    <input class="punkcoder-option-form-input" type="text" name="punkcoder_profiles[bio]" id="punkcoder-options-bio" value="<?php echo $bio; ?>" />
    <?php
}

function punkcoder_bio_show_form()
{
    ?>
    <input type="checkbox"
           class="punkcoder-option-form-input"
           name="punkcoder_profiles[bio_show]"
           id="punkcoder-options-bio-show"
           value="yes"
        <?php
        if(punkcoder_get_options('punkcoder_profiles', 'bio_show', 'yes') == 'yes')
        {
            ?>
            checked="checked"
            <?php
        }
        ?>
    />
    <?php
}

function punkcoder_github_form()
{
    $default = '';
    $github = esc_html(punkcoder_get_options('punkcoder_profiles', 'github', $default));
    ?>
    <input class="punkcoder-option-form-input" type="text" name="punkcoder_profiles[github]" id="punkcoder-options-github" value="<?php echo $github;?>" />
    <?php
}

function punkcoder_github_show_form()
{
    ?>
    <input type="checkbox"
           class="punkcoder-option-form-input"
           name="punkcoder_profiles[github_show]"
           id="punkcoder-options-github-show"
           value="yes"
        <?php
        if(punkcoder_get_options('punkcoder_profiles', 'github_show', 'yes') == 'yes')
        {
            ?>
            checked="checked"
            <?php
        }
        ?>
    />
    <?php
}

function punkcoder_email_form()
{
    $default = '';
    $email = esc_html(punkcoder_get_options('punkcoder_profiles', 'email', $default));
    ?>

    <input class="punkcoder-option-form-input" type="text" name="punkcoder_profiles[email]" id="punkcoder-options-wechat" value="<?php echo $email; ?>" />
    <?php
}

function punkcoder_email_show_form()
{
    ?>
    <input type="checkbox"
           class="punkcoder-option-form-input"
           name="punkcoder_profiles[email_show]"
           id="punkcoder-options-email-show"
           value="yes"
        <?php
        if(punkcoder_get_options('punkcoder_profiles', 'email_show', 'yes') == 'yes')
        {
            ?>
            checked="checked"
            <?php
        }
        ?>
    />
    <?php
}

function punkcoder_weibo_form()
{
    $default = '';
    $weibo = esc_html(punkcoder_get_options('punkcoder_profiles', 'weibo', $default));
    ?>
    <input class="punkcoder-option-form-input" type="text" name="punkcoder_profiles[weibo]" id="punkcoder-options-weibo" value="<?php echo $weibo;?>" />
    <?php
}

function punkcoder_weibo_show_form()
{
    ?>
    <input type="checkbox"
           class="punkcoder-option-form-input"
           name="punkcoder_profiles[weibo_show]"
           id="punkcoder-options-weibo-show"
           value="yes"
        <?php
        if(punkcoder_get_options('punkcoder_profiles', 'weibo_show', 'yes') == 'yes')
        {
            ?>
            checked="checked"
            <?php
        }
        ?>
    />
    <?php
}

function punkcoder_wechat_qr_image_form()
{
    $default = punkcoder_get_url('images', 'wechat-qr-image.jpg');
    $image = esc_html(punkcoder_get_options('punkcoder_profiles', 'wechat_qr_image', $default));
?>
    <div class="punkcoder-options-wechat-qr-image">
        <img src="<?php echo $image; ?>" alt="" class="rounded mw-100 punkcoder-options-wechat-qr-image" id="punkcoder-options-wechat-qr-image">
        <input type="hidden" name="punkcoder_profiles[wechat_qr_image]" id="punkcoder-options-wechat-qr-image-input" value="<?php echo $image; ?>">
    </div>
    <div>
        <button class="button-primary" id="punkcoder-wechat-upload-button"><?php _e('上传', 'punkcoder')?></button>
    </div>
    <?php
}

function punkcoder_wechat_qr_image_show_form()
{
    ?>
    <input type="checkbox"
           class="punkcoder-option-form-input"
           name="punkcoder_profiles[wechat_qr_image_show]"
           id="punkcoder-options-wechat-qr-image-show"
           value="yes"
        <?php
        if(punkcoder_get_options('punkcoder_profiles', 'wechat_qr_image_show', 'yes') == 'yes')
        {
            ?>
            checked="checked"
            <?php
        }
        ?>
    />
    <?php
}

function punkcoder_twitter_form()
{
    $default = '';
    $twitter = esc_html(punkcoder_get_options('punkcoder_profiles', 'twitter', $default));
    ?>
    <input class="punkcoder-option-form-input" type="text" name="punkcoder_profiles[twitter]" id="punkcoder_options_twitter" value="<?php echo $twitter;?>" />
    <?php
}

function punkcoder_twitter_show_form()
{
    ?>
    <input type="checkbox"
           class="punkcoder-option-form-input"
           name="punkcoder_profiles[twitter_show]"
           id="punkcoder-options-twitter-show"
           value="yes"
        <?php
        if(punkcoder_get_options('punkcoder_profiles', 'twitter_show', 'yes') == 'yes')
        {
            ?>
            checked="checked"
            <?php
        }
        ?>
    />
    <?php
}

function punkcoder_instagram_form()
{
    $default = '';
    $instagram = esc_html(punkcoder_get_options('punkcoder_profiles', 'instagram', $default));
    ?>
    <input class="punkcoder-option-form-input punkcoder-profiles-instagram-input" type="text" name="punkcoder_profiles[instagram]" id="punkcoder-profiles-instagram-input" value="<?php echo $instagram;?>" />
    <?php
}

function punkcoder_instagram_show_form()
{
    ?>
    <input type="checkbox"
           class="punkcoder-option-form-input punkcoder-profiles-instagram-show-input"
           name="punkcoder_profiles[instagram_show]"
           id="punkcoder-profiles-instagram-show"
           value="yes"
        <?php
        if(punkcoder_get_options('punkcoder_profiles', 'instagram_show', 'yes') == 'yes')
        {
            ?>
            checked="checked"
            <?php
        }
        ?>
    />
    <?php
}

function punkcoder_pinterest_form()
{
    $default = '';
    $pinterest = esc_html(punkcoder_get_options('punkcoder_profiles', 'pinterest', $default));
    ?>
    <input class="punkcoder-option-form-input punkcoder-profiles-pinterest-input" type="text" name="punkcoder_profiles[pinterest]" id="punkcoder-profiles-pinterest-input" value="<?php echo $pinterest;?>" />
    <?php
}

function punkcoder_pinterest_show_form()
{
    ?>
    <input type="checkbox"
           class="punkcoder-option-form-input punkcoder-profiles-pinterest-show-input"
           name="punkcoder_profiles[pinterest_show]"
           id="punkcoder-profiles-pinterest-show"
           value="yes"
        <?php
        if(punkcoder_get_options('punkcoder_profiles', 'pinterest_show', 'yes') == 'yes')
        {
            ?>
            checked="checked"
            <?php
        }
        ?>
    />
    <?php
}

function punkcoder_linkedin_form()
{
    $default = '';
    $linkedin = esc_html(punkcoder_get_options('punkcoder_profiles', 'linkedin', $default));
    ?>
    <input class="punkcoder-option-form-input punkcoder-profiles-linkedin-input" type="text" name="punkcoder_profiles[linkedin]" id="punkcoder-profiles-linkedin-input" value="<?php echo $linkedin;?>" />
    <?php
}

function punkcoder_linkedin_show_form()
{
    ?>
    <input type="checkbox"
           class="punkcoder-option-form-input punkcoder-profiles-linkedin-show-input"
           name="punkcoder_profiles[linkedin_show]"
           id="punkcoder-profiles-linkedin-show"
           value="yes"
        <?php
        if(punkcoder_get_options('punkcoder_profiles', 'linkedin_show', 'yes') == 'yes')
        {
            ?>
            checked="checked"
            <?php
        }
        ?>
    />
    <?php
}

function punkcoder_youtube_form()
{
    $default = '';
    $youtube = esc_html(punkcoder_get_options('punkcoder_profiles', 'youtube', $default));
    ?>
    <input class="punkcoder-option-form-input punkcoder-profiles-youtube-input" type="text" name="punkcoder_profiles[youtube]" id="punkcoder-profiles-youtube-input" value="<?php echo $youtube;?>" />
    <?php
}

function punkcoder_youtube_show_form()
{
    ?>
    <input type="checkbox"
           class="punkcoder-option-form-input punkcoder-profiles-youtube-show-input"
           name="punkcoder_profiles[youtube_show]"
           id="punkcoder-profiles-youtube-show"
           value="yes"
        <?php
        if(punkcoder_get_options('punkcoder_profiles', 'youtube_show', 'yes') == 'yes')
        {
            ?>
            checked="checked"
            <?php
        }
        ?>
    />
    <?php
}

function punkcoder_quora_form()
{
    $default = '';
    $quora = esc_html(punkcoder_get_options('punkcoder_profiles', 'quora', $default));
    ?>
    <input class="punkcoder-option-form-input punkcoder-profiles-quora-input" type="text" name="punkcoder_profiles[quora]" id="punkcoder-profiles-quora-input" value="<?php echo $quora;?>" />
    <?php
}

function punkcoder_quora_show_form()
{
    ?>
    <input type="checkbox"
           class="punkcoder-option-form-input punkcoder-profiles-quora-show-input"
           name="punkcoder_profiles[quora_show]"
           id="punkcoder-profiles-quora-show"
           value="yes"
        <?php
        if(punkcoder_get_options('punkcoder_profiles', 'quora_show', 'yes') == 'yes')
        {
            ?>
            checked="checked"
            <?php
        }
        ?>
    />
    <?php
}

function punkcoder_stackoverflow_form()
{
    $default = '';
    $stackoverflow = esc_html(punkcoder_get_options('punkcoder_profiles', 'stackoverflow', $default));
    ?>
    <input class="punkcoder-option-form-input punkcoder-profiles-stackoverflow-input" type="text" name="punkcoder_profiles[stackoverflow]" id="punkcoder-profiles-stackoverflow-input" value="<?php echo $stackoverflow;?>" />
    <?php
}

function punkcoder_stackoverflow_show_form()
{
    ?>
    <input type="checkbox"
           class="punkcoder-option-form-input punkcoder-profiles-stackoverflow-show-input"
           name="punkcoder_profiles[stackoverflow_show]"
           id="punkcoder-profiles-stackoverflow-show"
           value="yes"
        <?php
        if(punkcoder_get_options('punkcoder_profiles', 'stackoverflow_show', 'yes') == 'yes')
        {
            ?>
            checked="checked"
            <?php
        }
        ?>
    />
    <?php
}

function punkcoder_zhihu_form()
{
    $default = '';
    $zhihu = esc_html(punkcoder_get_options('punkcoder_profiles', 'zhihu', $default));
    ?>
    <input class="punkcoder-option-form-input punkcoder-profiles-zhihu-input" type="text" name="punkcoder_profiles[zhihu]" id="punkcoder-profiles-zhihu-input" value="<?php echo $zhihu;?>" />
    <?php
}

function punkcoder_zhihu_show_form()
{
    ?>
    <input type="checkbox"
           class="punkcoder-option-form-input punkcoder-profiles-zhihu-show-input"
           name="punkcoder_profiles[zhihu_show]"
           id="punkcoder-profiles-zhihu-show"
           value="yes"
        <?php
        if(punkcoder_get_options('punkcoder_profiles', 'zhihu_show', 'yes') == 'yes')
        {
            ?>
            checked="checked"
            <?php
        }
        ?>
    />
    <?php
}

function punkcoder_rss_show_form()
{
    ?>
    <input type="checkbox"
           class="punkcoder-option-form-input punkcoder-profiles-rss-show-input"
           name="punkcoder_profiles[rss_show]"
           id="punkcoder-profiles-rss-show"
           value="yes"
        <?php
        if(punkcoder_get_options('punkcoder_profiles', 'rss_show', 'yes') == 'yes')
        {
            ?>
            checked="checked"
            <?php
        }
        ?>
    />
    <?php
}

function punkcoder_logo_form()
{
    $default = punkcoder_get_url('images', 'default-logo.png');
    $logo = esc_html(punkcoder_get_options('punkcoder_settings', 'logo', $default));
    ?>
    <div class="punkcoder-options-logo">
        <img src="<?php echo $logo; ?>" alt="" class="rounded mw-100 punkcoder-options-logo" id="punkcoder-options-logo-image">
        <input type="hidden" name="punkcoder_settings[logo]" id="punkcoder-options-logo-input" value="<?php echo $logo; ?>">
    </div>
    <div>
        <button class="button-primary" id="punkcoder-logo-upload-button"><?php _e('上传', 'punkcoder')?></button>
    </div>
    <?php
}

function punkcoder_logo_show_form()
{
    ?>
    <input type="checkbox"
           class="punkcoder-option-form-input"
           name="punkcoder_settings[logo_show]"
           id="punkcoder-options-logo-show"
           value="yes"
        <?php
        if(punkcoder_get_options('punkcoder_settings', 'logo_show', 'yes') == 'yes')
        {
            ?>
            checked="checked"
            <?php
        }
        ?>
    />
    <?php
}

function punkcoder_bg_image_form()
{
    $default = punkcoder_get_url('images', 'default-bg-image.png');
    $bg = esc_html(punkcoder_get_options('punkcoder_settings', 'bg_image', $default));;
    ?>
    <div class="punkcoder-options-logo">
        <img src="<?php echo $bg; ?>" alt="" class="rounded mw-100 punkcoder-options-bg-image" id="punkcoder-options-bg-image">
        <input type="hidden" name="punkcoder_settings[bg_image]" id="punkcoder-options-bg-image-input" value="<?php echo $bg; ?>">
    </div>
    <div>
        <button class="button-primary" id="punkcoder-bg-image-upload-button"><?php _e('上传', 'punkcoder')?></button>
    </div>
    <?php
}

function punkcoder_bg_image_show_form()
{
    ?>
    <input type="checkbox"
           class="punkcoder-option-form-input"
           name="punkcoder_settings[bg_image_show]"
           id="punkcoder-options-bg-image-show"
           value="yes"
        <?php
        if(punkcoder_get_options('punkcoder_settings', 'bg_image_show', 'yes') == 'yes')
        {
            ?>
            checked="checked"
            <?php
        }
        ?>
    />
    <?php
}

function punkcoder_custom_code_form()
{
    ?>
    <textarea name="punkcoder_settings[custom_code]" id=""  cols="35" rows="10" class="punskcoder-option-form-input">
        <?php echo trim(esc_html(punkcoder_get_options('punkcoder_settings', 'custom_code')))?>
    </textarea>
    <?php
}

function punkcoder_custom_code_show_form()
{
    ?>
    <input type="checkbox"
           class="punkcoder-option-form-input"
           name="punkcoder_settings[custom_code_show]"
           id="punkcoder-options-custom-code-show"
           value="yes"
        <?php
        if(punkcoder_get_options('punkcoder_settings', 'custom_code_show', 'no') == 'yes')
        {
            ?>
            checked="checked"
            <?php
        }
        ?>
    />
    <?php
}

function punkcoder_beian_form()
{
    ?>
    <input class="punkcoder-option-form-input" type="text" name="punkcoder_settings[beian]" id="punkcoder_options_beian" value="<?php echo esc_html(punkcoder_get_options('punkcoder_settings', 'beian'));?>" />
    <?php
}

function punkcoder_beian_show_form()
{
    ?>
    <input type="checkbox"
           class="punkcoder-option-form-input"
           name="punkcoder_settings[beian_show]"
           id="punkcoder-options-beian-show"
           value="yes"
        <?php
        if(punkcoder_get_options('punkcoder_settings', 'beian_show', 'no') == 'yes')
        {
            ?>
            checked="checked"
            <?php
        }
        ?>
    />
    <?php
}

function punkcoder_copyright_form()
{
    ?>
    <input class="punkcoder-option-form-input" type="text" name="punkcoder_settings[copyright]" id="punkcoder_options_copyright" value="<?php echo esc_html(punkcoder_get_options('punkcoder_settings', 'copyright', '版权 <a href="https://creativecommons.org/licenses/by/4.0/deed.zh" target="_blank"> 署名 4.0 国际 (CC BY 4.0) </a>'));?>" />
    <?php
}

function punkcoder_copyright_show_form()
{
    ?>
    <input type="checkbox"
           class="punkcoder-option-form-input"
           name="punkcoder_settings[copyright_show]"
           id="punkcoder-options-copyright-show"
           value="yes"
        <?php
        if(punkcoder_get_options('punkcoder_settings', 'copyright_show', 'yes') == 'yes')
        {
            ?>
            checked="checked"
            <?php
        }
        ?>
    />
    <?php
}

function punkcoder_theme_copyright_show_form()
{
    ?>
    <input type="checkbox"
           class="punkcoder-option-form-input"
           name="punkcoder_settings[theme_copyright_show]"
           id="punkcoder-options-theme_copyright-show"
           value="yes"
        <?php
        if(punkcoder_get_options('punkcoder_settings', 'theme_copyright_show', 'yes') == 'yes')
        {
            ?>
            checked="checked"
            <?php
        }
        ?>
    />
    <?php
}

function punkcoder_wp_copyright_show_form()
{
    ?>
    <input type="checkbox"
           class="punkcoder-option-form-input"
           name="punkcoder_settings[wp_copyright_show]"
           id="punkcoder-options-wp-copyright-show"
           value="yes"
        <?php
        if(punkcoder_get_options('punkcoder_settings', 'wp_copyright_show', 'yes') == 'yes')
        {
            ?>
            checked="checked"
            <?php
        }
        ?>
    />
    <?php
}

function punkcoder_admin_enqueue_js() {
    wp_enqueue_media();

    // admin.js
    $url = punkcoder_get_url('/vendor/dist/js', 'admin.min.js');
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
}

function punkcoder_enqueue_js()
{
    $url = punkcoder_get_url('vendor/dist/js', 'ajax.min.js');
    wp_register_script('punkcoder-ajax', $url);

    wp_enqueue_script( 'punkcoder-ajax');

    wp_localize_script( 'punkcoder-ajax', 'ajax_object',
        array( 'url' => admin_url( 'admin-ajax.php' )
        , 'nonce' => wp_create_nonce( 'punkcoder-ajax-nonce' ),) );
}

add_action("admin_menu", "punkcoder_menu_items");
add_action('admin_enqueue_scripts', 'punkcoder_admin_enqueue_js');
add_action('wp_enqueue_scripts', 'punkcoder_enqueue_js');
add_action("admin_init", "punkcoder_options_page");