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


/**
 * @param $option
 * @param $name
 * @param $default
 * @return string
 */
function punkcoder_get_options($option, $name, $default=null)
{
    $options = get_option($option);

    if($options && array_key_exists($name, $options))
    {
        return $options[$name];
    }
    else
    {
        if(isset($default))
        {
            return $default;
        }
        else
        {
            return "";
        }
    }
}

/**
 * @param $type
 * @param $name
 * @return string
 */
function punkcoder_get_url($type, $name)
{
    $url = get_template_directory_uri() . '/assets/'. $type .'/' . $name;
    return $url;
}

function punkcoder_menu_items()
{
    add_menu_page(
        __('主题设置', 'punkcoder'),
        __('主题设置', 'punkcoder'),
        "manage_options",
        "punkcoder",
        "punkcoder_options_page",
        "",
        99
    );

}

function punkcoder_options_page()
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

        <form method="post" action="options.php">
            <?php

            settings_fields("punkcoder");

            do_settings_sections("punkcoder");

            submit_button();

            ?>
        </form>
    </div>
    <?php
}

add_action("admin_menu", "punkcoder_menu_items");

function punkcoder_display_profile_options_validate($args)
{
    $default_avatar = punkcoder_get_url('images', 'avatar-default.jpg');
    $default_wechat_qr_image = punkcoder_get_url('image', 'wechat-qr-image.jpg');


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
            add_settings_error('punkcoder_messages','punkcoder_options_profile_age',__('年龄输入非法', 'punkcoder'),'error');
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

    return apply_filters( 'sanitize_option_punkcoder_options', $filtered );
}

function punkcoder_display_profile_options()
{
    add_settings_section("punkcoder_option_section", __('个人资料', 'punkcoder'), "display_header_options_content", "punkcoder");

    add_settings_field(
        "punkcoder_profile_avatar",
        __('头像', 'punkcoder'),
        "display_profile_avatar_form_element",
        "punkcoder",
        "punkcoder_option_section");

    add_settings_field(
        "punkcoder_profile_nickname",
        __('昵称', 'punkcoder'),
        "display_profile_nickname_form_element",
        "punkcoder",
        "punkcoder_option_section");

    add_settings_field(
        "punkcoder_profile_age",
        __('年龄', 'punkcoder'),
        "display_profile_age_form_element",
        "punkcoder",
        "punkcoder_option_section");

    add_settings_field(
        "punkcoder_profile_cellphone",
        __('手机', 'punkcoder'),
        "display_profile_cellphone_form_element",
        "punkcoder",
        "punkcoder_option_section");

    add_settings_field(
        "punkcoder_profile_email",
        __('电邮', 'punkcoder'),
        "display_profile_email_form_element",
        "punkcoder",
        "punkcoder_option_section");

    add_settings_field(
        "punkcoder_profile_github",
        __('Github', 'punkcoder'),
        "display_profile_github_form_element",
        "punkcoder",
        "punkcoder_option_section");

    add_settings_field(
        "punkcoder_profile_weibo",
        __('微博', 'punkcoder'),
        "display_profile_weibo_form_element",
        "punkcoder",
        "punkcoder_option_section");


    add_settings_field(
        "punkcoder_profile_wechat_qr_image",
        __('微信二维码', 'punkcoder'),
        "display_profile_wechat_qr_image_form_element",
        "punkcoder",
        "punkcoder_option_section");


    add_settings_field(
        "punkcoder_profile_twitter",
        __('微博', 'punkcoder'),
        "display_profile_twitter_form_element",
        "punkcoder",
        "punkcoder_option_section");

    register_setting(
        "punkcoder",
        "punkcoder_profile_options",
        [
                'sanitize_callback' => 'punkcoder_display_profile_options_validate'
        ]);
}

function punkcoder_display_setting_options()
{
    add_settings_section("punkcoder_option_section", __('系统设置', 'punkcoder'), "display_header_options_content", "punkcoder");

    add_settings_field(
        "advertising_code",
        "Ads Code",
        "display_ads_form_element",
        "punkcoder",
        "punkcoder_option_section");

    register_setting(
        "punkcoder",
        "punkcoder_setting_options");
}

function punkcoder_display_options()
{

    //here we display the sections and options in the settings page based on the active tab
    if(isset($_GET["tab"]))
    {
        if($_GET["tab"] == "profile")
        {
            punkcoder_display_profile_options();
        }
        else
        {
            punkcoder_display_setting_options();
        }
    }
    else
    {
        punkcoder_display_profile_options();
    }

}

function display_header_options_content()
{
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
    wp_enqueue_style('punkcoder-bootstrap');
    wp_enqueue_style('punkcoder-fontawesome');

}

add_action('admin_enqueue_scripts', 'punkcoder_enqueue_js');

function display_profile_avatar_form_element()
{
    ?>
    <div class="punkcoder-options-profile-avatar">
        <img src="<?php echo esc_html(punkcoder_get_options('punkcoder_profile_options', 'avatar')); ?>" alt="" class="rounded mw-100" id="punkcoder-options-profile-avatar-image">
        <input type="hidden" name="punkcoder_profile_options[avatar]" id="punkcoder-options-profile-avatar-input" value="<?php echo esc_html(punkcoder_get_options('punkcoder_profile_options', 'avatar')); ?>">
    </div>
    <div>
        <button class="button-primary" id="punkcoder-avatar-upload-button"><?php _e('上传', 'punkcoder')?></button>
    </div>

    <?php
}

function display_profile_nickname_form_element()
{
    ?>
    <input type="text" name="punkcoder_profile_options[nickname]" id="punkcoder_profile_options_nickname" value="<?php echo esc_html(punkcoder_get_options('punkcoder_profile_options', 'nickname')); ?>" />
    <?php
}


function display_profile_age_form_element()
{
    ?>
    <input type="text" name="punkcoder_profile_options[age]" id="punkcoder_profile_options_age" value="<?php echo esc_html(punkcoder_get_options('punkcoder_profile_options', 'age')); ?>" />
    <?php
}

function display_profile_cellphone_form_element()
{
    ?>
    <input type="text" name="punkcoder_profile_options[cellphone]" id="punkcoder_profile_options_cellphone" value="<?php echo esc_html(punkcoder_get_options('punkcoder_profile_options', 'cellphone')); ?>" />
    <?php
}

function display_profile_email_form_element()
{
    ?>
    <input type="text" name="punkcoder_profile_options[email]" id="punkcoder_profile_options_wechat" value="<?php echo esc_html(punkcoder_get_options('punkcoder_profile_options', 'email'));?>" />
    <?php
}

function display_profile_github_form_element()
{
    ?>
    <input type="text" name="punkcoder_profile_options[github]" id="punkcoder_profile_options_github" value="<?php echo esc_html(punkcoder_get_options('punkcoder_profile_options', 'github'));?>" />
    <?php
}

function display_profile_weibo_form_element()
{
    ?>
    <input type="text" name="punkcoder_profile_options[weibo]" id="punkcoder_profile_options_weibo" value="<?php echo esc_html(punkcoder_get_options('punkcoder_profile_options', 'weibo'));?>" />
    <?php
}

function display_profile_wechat_qr_image_form_element()
{
    ?>
    <input type="text" name="punkcoder_profile_options[wechat_qr_image]" id="punkcoder_profile_options_wechat_qr_image" value="<?php echo esc_html(punkcoder_get_options('punkcoder_profile_options', 'wechat_qr_image'));?>" />
    <?php
}

function display_profile_twitter_form_element()
{
    ?>
    <input type="text" name="punkcoder_profile_options[twitter]" id="punkcoder_profile_options_twitter" value="<?php echo esc_html(punkcoder_get_options('punkcoder_profile_options', 'twitter'));?>" />
    <?php
}


function display_ads_form_element()
{
    ?>
<!--    <input type="text" name="advertising_code" id="advertising_code" value="--><?php //echo get_option('advertising_code'); ?><!--" />-->
    <?php
}

add_action("admin_init", "punkcoder_display_options");