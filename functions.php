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

    if ($options && array_key_exists($name, $options)) {
        return $options[$name];
    } else {
        if (isset($default)) {
            return $default;
        } else {
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
    $url = get_template_directory_uri() . '/assets/' . $type . '/' . $name;
    return $url;
}

function update_post_read_counts($content)
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

function the_view_count() {
    $id = get_the_ID();
    $meta_key = 'read_count';
    $page_view = get_post_meta($id, $meta_key, true);
    echo $page_view;
}

function the_like_count()
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

function post_like_handler()
{
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

add_filter('the_content', 'update_post_read_counts');
add_action('wp_ajax_post_like', 'post_like_handler' );

add_filter('wp_link_pages_link', function($l, $s){

    $l = substr_replace($l, 'class="page-link" ', 3, 0);
    echo($i);
    return '<li class="page-item">' . $l . '</li>';
});

require_once("punkcoder.php");
