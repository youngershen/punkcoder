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
    $filtered = [
        'nickname' => __('申延刚', 'punkcoder'),
        'age' => '30',
        'cellphone' => '13811754531',
        'wechat' => '13811754531'
    ];

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

    if($args['wechat'])
    {
        $filtered['wechat'] = $args['wechat'];
    }

    return apply_filters( 'sanitize_option_punkcoder_options', $filtered );
}

function punkcoder_display_profile_options()
{
    add_settings_section("punkcoder_option_section", __('个人资料', 'punkcoder'), "display_header_options_content", "punkcoder");

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
        "punkcoder_profile_wechat",
        __('微信', 'punkcoder'),
        "display_profile_wechat_form_element",
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

function display_profile_nickname_form_element()
{
    $options = get_option( 'punkcoder_profile_options' );

    ?>
    <input type="text" name="punkcoder_profile_options[nickname]" id="punkcoder_profile_options_nickname" value="<?php echo esc_html($options['nickname']); ?>" />
    <?php
}

function display_profile_age_form_element()
{
    $options = get_option( 'punkcoder_profile_options' );
    ?>
    <input type="text" name="punkcoder_profile_options[age]" id="punkcoder_profile_options_age" value="<?php echo esc_html($options['age']); ?>" />
    <?php
}

function display_profile_cellphone_form_element()
{
    $options = get_option( 'punkcoder_profile_options' );

    ?>
    <input type="text" name="punkcoder_profile_options[cellphone]" id="punkcoder_profile_options_cellphone" value="<?php echo esc_html($options['cellphone']); ?>" />
    <?php
}

function display_profile_wechat_form_element()
{
    $options = get_option( 'punkcoder_profile_options' );

    ?>
    <input type="text" name="punkcoder_profile_options[wechat]" id="punkcoder_profile_options_wechat" value="<?php echo esc_html($options['wechat']);?>" />
    <?php
}


function display_ads_form_element()
{
    ?>
<!--    <input type="text" name="advertising_code" id="advertising_code" value="--><?php //echo get_option('advertising_code'); ?><!--" />-->
    <?php
}

add_action("admin_init", "punkcoder_display_options");