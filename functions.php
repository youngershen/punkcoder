<?php
/**
 * PROJECT : punkcoder
 * FILE    : functions.php
 * TIME    : 2019/3/6 16:30
 * AUTHOR  : Younger Shen
 * EMAIL   : younger.x.shen@gmail.com
 * PHONE   : 13811754531
 * WECHAT  : 13811754531
 * WEBSIT  : https://www.punkcoder.cn
 */
function punkcoder_pagination()
{
    $range_step = 3;
    $current = (get_query_var('paged')) ? get_query_var('paged') : 1;

    global $wp_query;
    $total_pages = $wp_query->max_num_pages;

    $prev = ($current > 1) ? $current - 1 : 0;
    $next = ($current < $total_pages) ? $current + 1 : $total_pages;

    $pages = [];

    if ($current - $range_step >= 1) {
        $page = $current - $range_step;

        while ($page < $current) {
            array_push($pages, $page);
            $page += 1;
        }
    } else {
        $page = 1;

        while ($page < $current) {
            array_push($pages, $page);
            $page += 1;
        }
    }

    array_push($pages, $current);

    if ($current + $range_step <= $total_pages) {
        $page = $current + 1;

        while ($page <= $current + $range_step) {
            array_push($pages, $page);
            $page += 1;
        }
    } else {
        $page = $current + 1;

        while ($page <= $total_pages) {
            array_push($pages, $page);
            $page += 1;
        }
    }

    $p = [
        'prev' => $prev,
        'next' => $next,
        'first' => 1,
        'last' => $total_pages,
        'current' => $current,
        'pages' => $pages,
    ];

    return $p;
}

/**
 * @param $option
 * @param $name
 * @param $default
 * @return string
 */
function punkcoder_get_options($option, $name, $default = null)
{
    $options = get_option($option);

    if($options && array_key_exists($name, $options) && $options[$name] != '' && $options[$name] != null)
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
            return '';
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
    $url = get_template_directory_uri() . '/assets/' . $type . '/' . $name;
    return $url;
}

function punkcoder_update_post_read_counts($content)
{
    global $post;
    $meta_key = 'read_count';

    if(is_singular())
    {
        $count = get_post_meta($post->ID, $meta_key, true);
        update_post_meta($post->ID, $meta_key, (int)$count + 1);
    }
    return $content;
}

function punkcoder_the_view_count() {
    $id = get_the_ID();
    $meta_key = 'read_count';
    $page_view = get_post_meta($id, $meta_key, true);
    echo $page_view;
}

function punkcoder_the_like_count()
{
    global $post;
    $meta_key = 'like_count';
    $like_count = get_post_meta($post->ID, $meta_key, true);

    if($like_count)
    {
        echo $like_count;
    }
    else
    {
        echo '0';
    }
}

function punkcoder_post_like_handler()
{
    check_ajax_referer( 'punkcoder-ajax-nonce', 'nonce' );

    $post_id = $_POST['post_id'];
    $meta_key = 'like_count';

    $count = get_post_meta($post_id, $meta_key, true);
    update_post_meta($post_id, $meta_key, (int)$count + 1);

    echo json_encode([
        'status'=> true,
        'data' => [
            'count'=> get_post_meta($post_id, $meta_key, true),
        ]
    ]);

    wp_die();
}

function punkcoder_post_page_link($link)
{
    if(preg_match('/^[0-9]+$/', $link))
    {
        $link = '<li class="page-item disabled"><a class="page-link" href="#">' . $link . '</a></li>';
    }
    else
    {
        $link = substr_replace($link, 'class="page-link" ', 3, 0);
    }
    return '<li class="page-item">' . $link . '</li>';
}

function punkcoder_post_comment_form_before()
{
    echo '<div id="post-comments-form" class="col-md-12 col-sm-12 punkcoder-post-comment-form post-comments-form">';
}

function punkcoder_post_comment_form_after()
{
    echo '</div>';
}

function punkcoder_comment_form_fields($fields)
{
    $comment_field = array_shift($fields);
    $fields = array_merge($fields, ['comment' => $comment_field]);
    return $fields;
}

function punkcoder_get_comments_page_link($page)
{
    $cpage = get_query_var('cpage');

    if ( ! $page ) {
        $page = 1;
    }

    if($page == $cpage)
    {
        $link  = '<li class="page-item disabled"><a class="page-link" href=" ' . esc_url(get_comments_pagenum_link($page)) . '">'. $page . '</a></li>';
    }
    else
    {
        $link = '<li class="page-item"><a class="page-link" href="' . esc_url(get_comments_pagenum_link($page)) . '">'. $page . '</a></li>';
    }

    return $link;
}

function the_punkcoder_comments_navigation()
{
    echo (punkcoder_comments_navigation());
}

function punkcoder_comments_navigation()
{
    $navigation = '';
    $total = get_comment_pages_count();
    $links = '';

    // Are there comments to navigate through?
    if ( $total > 1 ) {
        for($i = 0 ; $i < $total ; $i ++)
        {
            $link = punkcoder_get_comments_page_link($i + 1);
            $links  = $links . $link;
        }

        $navigation = '<div class="row punkcoder-post-comments-pagination"><nav aria-label="Page navigation " class="col-12 "><ul class="pagination justify-content-center">' . $links . ' </ul></nav></div>';
    }

    return $navigation;
}

function theme_queue_js(){
    if ( (!is_admin()) && is_singular() && comments_open() && get_option('thread_comments') )
        wp_enqueue_script( 'comment-reply' );
}

function load_punkcoder_textdomain() {
    load_theme_textdomain( 'punkcoder', get_template_directory() . '/languages' );
}

add_action('after_setup_theme', 'load_punkcoder_textdomain');
add_action('wp_print_scripts', 'theme_queue_js');
add_filter('comment_form_fields', 'punkcoder_comment_form_fields');
add_action('comment_form_after', 'punkcoder_post_comment_form_after');
add_action('comment_form_before', 'punkcoder_post_comment_form_before');
add_filter('wp_link_pages_link', 'punkcoder_post_page_link');
add_filter('the_content', 'punkcoder_update_post_read_counts');
add_action('wp_ajax_post_like', 'punkcoder_post_like_handler' );
add_theme_support( 'post-thumbnails' );

add_image_size( 'list-post-thumbnail', 300, 200);
add_image_size( 'single-post-thumbnail', 600, 300);
add_image_size( 'avatar-image', 150, 150);
add_image_size( 'bg-image', 590, 180);
add_image_size( 'logo-image', 100, 100);

require_once("punkcoder.php");
