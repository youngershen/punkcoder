<?php
/**
 * PROJECT : punkcoder
 * FILE    : navbar.php
 * TIME    : 2019/3/6 16:31
 * AUTHOR  : Younger Shen
 * EMAIL   : younger.x.shen@gmail.com
 * PHONE   : 13811754531
 * WECHAT  : 13811754531
 * WEBSIT  : https://www.punkcoder.cn
 */

$args = array(
    'post_type' => 'page',
    'orderby' => 'name',
    'order' => 'DESC',
    'posts_per_page' => -1,

);
$query = new WP_Query($args);

$logo = punkcoder_get_options('punkcoder_settings', 'logo', punkcoder_get_url('images', 'default-logo.png'));
$show_logo = punkcoder_get_options('punkcoder_settings', 'logo_show', 'yes');
$bg_image = punkcoder_get_options('punkcoder_settings', 'bg_image', punkcoder_get_url('images', 'default-bg-image.png'));

$about_page_query = new WP_Query(['name' => 'about', 'post_type' => 'page', 'order' => 'DESC']);
$link_page_query = new WP_Query(['name' => 'link' , 'post_type' => 'page', 'order' => 'DESC']);
$album_page_query = new WP_Query(['name' => 'album', 'post_type' => 'page', 'order' => 'DESC']);
$project_page_query = new WP_Query(['name' => 'project', 'post_type' => 'page', 'order' => 'DESC']);
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top punkcoder-navbar punkcoder-navbar">
    <a class="navbar-brand" href="<?php echo(home_url()); ?>">
        <?php

        if('yes' == $show_logo)
        {
        ?>
            <img src="<?php echo(esc_html($logo));?>" width="40" height="40" alt="">
        <?php
        }

        ?>
        <?php echo(get_bloginfo()); ?>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content"
            aria-controls="navbar-content" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar-content">
        <ul class="navbar-nav ml-auto">
            <?php

            $show_about_page = punkcoder_get_options('punkcoder_about', 'show_page', 'no');

            if( 'no' == $show_about_page && $about_page_query->have_posts())
            {
                global $post;
                $about_page_query->the_post();
                ?>
                <li class="nav-item punkcoder-nav-item">
                    <a href="<?php echo(get_page_link());?>" class="punkcoder-nav-item-about"><?php _e('关于', 'punkcoder');?></a>
                </li>
            <?php
            }
            ?>

            <?php

            $show_link_page = punkcoder_get_options('punkcoder_link', 'show_page', 'no');

            if( 'no' == $show_link_page && $link_page_query->have_posts())
            {
                global $post;
                $link_page_query->the_post();
                ?>
                <li class="nav-item punkcoder-nav-item">
                    <a href="<?php echo(get_page_link());?>" class="punkcoder-nav-item-about"><?php _e('友链', 'punkcoder');?></a>
                </li>
                <?php
            }
            ?>

            <?php
            $show_album_page = punkcoder_get_options('punkcoder_album', 'show_page', 'no');

            if( 'no' == $show_album_page && $album_page_query->have_posts())
            {
                global $post;
                $album_page_query->the_post();
                ?>
                <li class="nav-item punkcoder-nav-item">
                    <a href="<?php echo(get_page_link());?>" class="punkcoder-nav-item-about"><?php _e('相册', 'punkcoder');?></a>
                </li>
                <?php
            }
            ?>

            <?php
            $show_project_page = punkcoder_get_options('punkcoder_project', 'show_page', 'no');

            if( 'no' == $show_project_page && $project_page_query->have_posts())
            {
                global $post;
                $project_page_query->the_post();
                ?>
                <li class="nav-item punkcoder-nav-item">
                    <a href="<?php echo(get_page_link());?>" class="punkcoder-nav-item-about"><?php _e('项目', 'punkcoder');?></a>
                </li>
                <?php
            }
            ?>

            <li class="d-none d-lg-block nav-item punkcoder-nav-item punkcoder-nav-item-menu ">
                <a class="punkcoder-nav-item-menu-head icon"><?php _e('其他', 'punkcoder');?></a>
                <ul class="punkcoder-nav-item-menu-sub">
                    <?php
                    global $post;
                    while($query->have_posts())
                    {
                        $query->the_post();

                        if('about' == $post->post_name || 'link' == $post->post_name ||'album' == $post->post_name || 'project' == $post->post_name )
                        {
                            continue;
                        }
                        ?>
                        <li class="punkcoder-nav-item-menu-sub-item ml-auto">
                            <a href="<?php echo(get_page_link());?>" class="unkcoder-nav-item-menu-sub-item-link"><?php echo($post->post_title); ?></a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </li>
        </ul>
        <?php get_search_form(); ?>
    </div>

</nav>
<div id="pk-slogan" class="container-fluid d-none d-lg-block">
    <div class="row justify-content-center bg-secondary slogan-bg" style="background-image: url('<?php echo(esc_html($bg_image)); ?>') !important;">
        <div class="col-6 align-content-center my-5 text-light">
            <h1 class="text-center "><?php bloginfo('name'); ?></h1>
            <h2 class="text-center mt-5">
                <?php

                    if(is_single())
                    {
                        the_post();
                        echo($post->post_title);
                    }

                    if(is_page())
                    {
                        echo($post->post_title);
                    }

                    if(is_category())
                    {
                        the_archive_title();
                    }

                    if(is_tag())
                    {
                        the_archive_title();
                    }

                    if(is_home())
                    {
                        bloginfo('description');
                    }
                ?>
            </h2>
        </div>
    </div>
</div>
