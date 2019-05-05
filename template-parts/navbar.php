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
    'posts_per_page' => 5,

);
$query = new WP_Query($args);

$logo = punkcoder_get_options('punkcoder_settings', 'logo', punkcoder_get_url('images', 'default-logo.png'));
$show_logo = punkcoder_get_options('punkcoder_settings', 'logo_show', 'yes');

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top punkcoder-navbar">
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
                if($query->have_posts())
                {
                    global $post;

                    while($query->have_posts())
                    {
                        $query->the_post();
                        ?>
                        <li class="nav-item">
                            <a href="<?php echo(get_page_link())?>" class="nav-link"><?php echo($post->post_title); ?></a>
                        </li>
                        <?php
                    }
                }
            ?>
        </ul>
        <?php get_search_form(); ?>
    </div>
</nav>
<div id="pk-slogan" class="container-fluid d-none d-lg-block">
    <div class="row justify-content-center bg-secondary slogan-bg" style="background-image: url('<?php echo punkcoder_get_options('punkcoder_options', 'bg_image', punkcoder_get_url('images', 'default-bg-image.png'))?>') !important;">
        <div class="col-6 align-content-center my-5 text-light">
            <h1 class="text-center "><?php bloginfo('name'); ?></h1>
            <h2 class="text-center mt-5"><?php bloginfo('description'); ?></h2>
        </div>
    </div>
</div>
