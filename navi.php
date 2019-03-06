<?php
/**
 * PROJECT : wordpress-5.0.3
 * FILE    : menu.php
 * TIME    : 2019/3/6 16:31
 * AUTHOR  : Younger Shen
 * EMAIL   : younger.x.shen@gmail.com
 * PHONE   : 13811754531
 * WECHAT  : 13811754531
 * WEBSIT  : https://www.punkcoder.cn
 */

?>

<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <a class="navbar-brand" href="<?php echo(home_url());?>"><?php echo(get_bloginfo());?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content"
                aria-controls="navbar-content" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar-content">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#"><?php _e( 'Home', 'punkcoder' ); ?> <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbar-dropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php _e('Pages', 'punkcoder');?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbar-dropdown">
                        <a class="dropdown-item" href="#">page 1</a>
                        <a class="dropdown-item" href="#">page 2</a>
                        <a class="dropdown-item" href="#">page 3</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="<?php _e("Search","punkcoder"); ?>" aria-label="Search">
                <button class="btn btn-outline-dark my-2 my-sm-0" type="submit"><?php _e("Search","punkcoder"); ?></button>
            </form>
        </div>
    </nav>
</div>
