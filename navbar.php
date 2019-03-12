<?php
/**
 * PROJECT : punkcoder
 * FILE    : menu.php
 * TIME    : 2019/3/6 16:31
 * AUTHOR  : Younger Shen
 * EMAIL   : younger.x.shen@gmail.com
 * PHONE   : 13811754531
 * WECHAT  : 13811754531
 * WEBSIT  : https://www.punkcoder.cn
 */

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top punkcoder-navbar">
    <a class="navbar-brand" href="<?php echo(home_url()); ?>"><?php echo(get_bloginfo()); ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content"
            aria-controls="navbar-content" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar-content">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#"><?php _e('Home', 'punkcoder'); ?> <span
                            class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">About</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">Services</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="<?php _e("Search", "punkcoder"); ?>"
                   aria-label="Search">
            <button class="btn btn-outline-dark myd-2 my-sm-0"
                    type="submit"><?php _e("Search", "punkcoder"); ?></button>
        </form>
    </div>
</nav>
<div id="pk-slogan" class="container-fluid d-none d-lg-block">
    <div class="row justify-content-center bg-secondary slogan-bg">
        <div class="col-6 align-content-center my-5 text-light">
            <h1 class="text-center "><?php bloginfo('name'); ?></h1>
            <h2 class="text-center mt-5"><?php bloginfo('description'); ?></h2>
        </div>
    </div>
</div>
