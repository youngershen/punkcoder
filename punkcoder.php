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

function punkcoder_options_html()
{
    // check user capabilities
    if (!current_user_can('manage_options')) {
        return;
    }
    ?>
    <div class="wrap">
        <h1><?php echo(esc_html(get_admin_page_title())) ?></h1>
        <form action="options.php" method="post">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row"><?php echo(__("Nick Name", "punkcoder")); ?></th>
                    <td><input type="text" name="punkcoder_nickname"
                               value="<?php echo esc_attr(get_option('punkcoder_nickname')); ?>"/></td>
                </tr>

                <tr valign="top">
                    <th scope="row"><?php echo(__("Avatar", "punkcoder")); ?></th>
                    <td><input type="text" name="punkcoder_avatar"
                               value="<?php echo esc_attr(get_option('punkcoder_avatar')); ?>"/></td>
                </tr>

                <tr valign="top">
                    <th scope="row"><?php echo(__("Age", "punkcoder")); ?></th>
                    <td><input type="text" name="punkcoder_age" value="<?php echo esc_attr(get_option('punkcoder_age')); ?>"/>
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

function punkcoder_options_page()
{
    add_menu_page(
        'Punkcoder Options',
        'Punkcoder',
        'manage_options',
        'punkcoder',
        'punkcoder_options_html',
        '',
        20
    );
}

function punkcoder_register_settings()
{
    register_setting('punkcoder', 'punkcoder_nickname', ['type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => "Younger Shen",]);
    register_setting('punkcoder', 'punkcoder_avatar', ['type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => NULL,]);
    register_setting('punkcoder', 'punkcoder_age', ['type' => 'number', 'sanitize_callback' => 'sanitize_text_field', 'default' => 30,]);
    register_setting('punkcoder', 'punkcoder_cellphone', ['type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => NULL,]);
    register_setting('punkcoder', 'punkcoder_wechat', ['type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => NULL,]);
    register_setting('punkcoder', 'punkcoder_github', ['type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => NULL,]);
    register_setting('punkcoder', 'punkcoder_weibo', ['type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => NULL,]);
    register_setting('punkcoder', 'punkcoder_wechat_image', ['type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => NULL,]);
    register_setting('punkcoder', 'punkcoder_twitter', ['type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => NULL,]);
}

add_action('admin_menu', 'punkcoder_options_page');
add_action('admin_init', 'punkcoder_register_settings');
add_theme_support('post-thumbnails');
