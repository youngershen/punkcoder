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

    if($current - $range_step >= 1)
    {
        $page = $current - $range_step;

        while($page < $current)
        {
            array_push($pages, $page);
            $page += 1;
        }
    }
    else
    {
        $page = 1;

        while($page < $current){
            array_push($pages, $page);
            $page += 1;
        }
    }

    array_push($pages, $current);

    if($current + $range_step <= $total_pages)
    {
        $page = $current + 1;

        while($page <= $current + $range_step)
        {
            array_push($pages, $page);
            $page += 1;
        }
    }
    else
    {
        $page = $current + 1;

        while($page <= $total_pages)
        {
            array_push($pages, $page);
            $page += 1;
        }
    }



    $p = [
        'prev' => $prev,
        'next' => $next,
        'first' => 1,
        'last' => $total_pages,
        'current'=> $current,
        'pages' => $pages
    ];

    echo("fuck");
    echo($current);

    return $p;
}

function punkcoder_get_page_url($page)
{
    return "";
}