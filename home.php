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
 
?>

<!doctype html>

<html <?php language_attributes(); ?>>

<?php get_header("template-parts/header.php"); ?>

<body class="<?php body_class(); ?>">
<?php get_template_part('template-parts/navbar'); ?>

<div class="container-fluid home-post-list">
    <div class="row mt-3">
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
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><?php _e("<<"); ?></a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><?php _e("<"); ?></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>

                        <li class="page-item">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><?php _e(">"); ?></a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#"><?php _e(">>"); ?></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="col-lg-4">
            <?php get_template_part("template-parts/sidebar");?>
        </div>
    </div>
</div>
</body>
<?php get_footer(); ?>
</html>



