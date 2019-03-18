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

function sanitize_interger_field()
{

}

function punkcoder_profile_options_html()
{
    // check user capabilities
    if (!current_user_can('manage_options')) {
        return;
    }
    ?>
    <div class="wrap">
        <h1><?php echo(esc_html(get_admin_page_title())) ?></h1>
        <form action="options.php" method="post" enctype="multipart/form-data">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row"><?php echo(__("昵称", "punkcoder")); ?></th>
                    <td><input type="text" name="punkcoder_profile_nickname"
                               value="<?php echo esc_attr(get_option('punkcoder_profile_nickname')); ?>"/></td>
                </tr>

                <tr valign="top">
                    <th scope="row"><?php echo(__("头像", "punkcoder")); ?></th>
                    <td><input type="text" name="punkcoder_profile_avatar"
                               value="<?php echo esc_attr(get_option('punkcoder_profile_avatar')); ?>"/></td>
                </tr>

                <tr valign="top">
                    <th scope="row"><?php echo(__("年龄", "punkcoder")); ?></th>
                    <td><input type="text" name="punkcoder_profile_age" value="<?php echo esc_attr(get_option('punkcoder_profile_age')); ?>" placeholder="30"/>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php echo(__("手机", "punkcoder")); ?></th>
                    <td><input type="text" name="punkcoder_profile_cellphone" value="<?php echo esc_attr(get_option('punkcoder_profile_cellphone')); ?>"/>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php echo(__("微信", "punkcoder")); ?></th>
                    <td><input type="text" name="punkcoder_profile_wechat" value="<?php echo esc_attr(get_option('punkcoder_profile_wechat')); ?>"/>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php echo(__("Github", "punkcoder")); ?></th>
                    <td><input type="text" name="punkcoder_profile_github" value="<?php echo esc_attr(get_option('punkcoder_profile_github')); ?>"/>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php echo(__("微博", "punkcoder")); ?></th>
                    <td><input type="text" name="punkcoder_profile_weibo" value="<?php echo esc_attr(get_option('punkcoder_profile_weibo')); ?>"/>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php echo(__("微信二维码", "punkcoder")); ?></th>
                    <td><input type="text" name="punkcoder_profile_wechat_qr_image" value="<?php echo esc_attr(get_option('punkcoder_profile_wechat_qr_image')); ?>"/>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row"><?php echo(__("Twitter", "punkcoder")); ?></th>
                    <td><input type="text" name="punkcoder_profile_twitter" value="<?php echo esc_attr(get_option('punkcoder_profile_twitter')); ?>"/>
                    </td>
                </tr>
            </table>
            <?php
            // output security fields for the registered setting "wporg_options"
            settings_fields('punkcoder');
            // output setting sections and their fields
            // (sections are registered for "wporg", each field is registered to a specific section)
            do_settings_sections('punkcoder');
            // output save settings button
            submit_button(__('Save', "punkcoder"));
            ?>
        </form>
    </div>
    <?php
}


function punkcoder_options_html()
{
    if (!current_user_can('manage_options')) {
        return;
    }
    ?>
    sfd

    <?php
}

function punkcoder_options_page()
{
    add_menu_page(
        __('个人信息', "punkcoder"),
        __('主题设置', "punkcoder"),
        'manage_options',
        'punkcoder',
        'punkcoder_profile_options_html',
        '',
        20
    );

    add_submenu_page( "punkcoder",
        __('其他设置', "punkcoder"),
        __('其他设置', "punkcoder"),
        "manage_options",
        "punkcoder-settings",
        "punkcoder_options_html");

}

function punkcoder_register_settings()
{
    register_setting('punkcoder', 'punkcoder_profile_nickname', ['type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => "Younger Shen",]);
    register_setting('punkcoder', 'punkcoder_profile_avatar', ['type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => NULL,]);

    $args =array(
        'type' => 'number',
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 1,
    );

    register_setting('punkcoder', 'punkcoder_profile_age', $args);

    register_setting('punkcoder', 'punkcoder_profile_cellphone', ['type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => "13811754531",]);
    register_setting('punkcoder', 'punkcoder_profile_wechat', ['type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => "13811754531",]);
    register_setting('punkcoder', 'punkcoder_profile_github', ['type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => "https://github.com/youngershen",]);
    register_setting('punkcoder', 'punkcoder_profile_weibo', ['type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => "https://weibo.com/shenyangang",]);
    register_setting('punkcoder', 'punkcoder_profile_wechat_qr_image', ['type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => NULL,]);
    register_setting('punkcoder', 'punkcoder_profile_twitter', ['type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => "https://twitter.com/youngershen",]);


    add_settings_section('wptuts_settings_header', __( 'Logo Options', 'wptuts' ), 'test_sdf', 'punkcoder');
    add_settings_field('wptuts_setting_fav',  __( 'fav', 'wptuts' ), 'wptuts_setting_logo', 'punkcoder', 'wptuts_settings_header');

}
function wptuts_setting_logo() {
    $wptuts_options = get_option( 'theme_wptuts_options' );
    ?>
    <input type="hidden" id="logo_url" name="theme_wptuts_options[logo]" value="<?php echo esc_url( $wptuts_options['logo'] ); ?>" />
    <input id="upload_logo_button" type="button" class="button" value="<?php _e( 'Upload Logo', 'wptuts' ); ?>" />
    <?php if ( '' != $wptuts_options['logo'] ): ?>
        <input id="delete_logo_button" name="theme_wptuts_options[delete_logo]" type="submit" class="button" value="<?php _e( 'Delete Logo', 'wptuts' ); ?>" />
    <?php endif; ?>
    <span class="description"><?php _e('Upload an image for the banner.', 'wptuts' ); ?></span>
    <?php
}
wp_enqueue_script('jquery');

wp_enqueue_script('thickbox');
wp_enqueue_style('thickbox');

wp_enqueue_script('media-upload');
wp_enqueue_script('wptuts-upload');


function test_sdf()
{
    echo "sfsdf";
    return "abcdef";
}

add_action('admin_menu', 'punkcoder_options_page');
add_action('admin_init', 'punkcoder_register_settings');
add_theme_support('post-thumbnails');
