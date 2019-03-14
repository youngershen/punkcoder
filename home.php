<?php
/**
 * PROJECT : punkcoder
 * FILE    : home.php
 * TIME    : 2019/3/12 10:28
 * AUTHOR  : Younger Shen
 * EMAIL   : younger.x.shen@gmail.com
 * PHONE   : 13811754531
 * WECHAT  : 13811754531
 * WEBSIT  : https://www.punkcoder.cn
 */

$pagination = punkcoder_pagination();

$prev_link = get_pagenum_link($pagination['prev']);
$next_link = get_pagenum_link($pagination['next']);
$first_link = get_pagenum_link($pagination['first']);
$last_link = get_pagenum_link($pagination['last']);
$current = $pagination['current'];
$total = $pagination['last'];

?>

<!doctype html>

<html <?php language_attributes(); ?>>

<?php get_header(); ?>

<body class="<?php body_class(); ?>">
<?php get_template_part('template-parts/navbar'); ?>

<main class="container-fluid home-post-list">
    <div class="row mt-3 justify-content-center">
        <div class="col-lg-2">
            <?php get_template_part("template-parts/sidebar");?>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12">
            <?php
            if ( have_posts() ) {
                // Load posts loop.
                while ( have_posts() ) {
                    the_post();
                    get_template_part("template-parts/post-list");
                }
            } else {

                get_template_part("template-parts/post-none");

            }
            ?>
            <div class="home-post-pagination">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item <?php

                        if($current == 1)
                        {
                            echo ("disabled");
                        }

                        ?>">
                            <a class="page-link" href="<?php echo($first_link);?>" tabindex="-1" aria-disabled="true"><?php _e("<<"); ?></a>
                        </li>
                        <li class="page-item <?php
                            if($current == 1)
                            {
                                echo("disabled");
                            }

                        ?>">
                            <a class="page-link" href="<?php echo($prev_link); ?>" tabindex="-1" aria-disabled="true"><?php _e("<"); ?></a>
                        </li>

                        <?php
                            foreach ($pagination['pages'] as $page)
                            {
                                ?>

                                    <li class="page-item <?php

                                        if($current == $page)
                                        {
                                            echo ("disabled");
                                        }


                                    ?>"><a class="page-link" href="<?php echo(get_pagenum_link($page)) ?>"><?php echo($page); ?></a>
                                    </li>
                                <?php
                            }
                        ?>


                        <li class="page-item <?php

                        if($current == $total)
                        {
                            echo("disabled");
                        }

                        ?>">
                            <a class="page-link" href="<?php echo($next_link); ?>" tabindex="-1" aria-disabled="true"><?php _e(">"); ?></a>
                        </li>
                        <li class="page-item  <?php

                        if($current == $total)
                        {
                            echo("disabled");
                        }

                        ?>">
                            <a class="page-link" href="<?php echo($last_link); ?>"><?php _e(">>"); ?></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</main>
</body>
<span class="d-block mt-5"></span>
<?php get_footer(); ?>
</html>



