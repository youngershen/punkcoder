<?php
/**
 * PROJECT : punkcoder
 * FILE    : index.php
 * TIME    : 2019/3/6 15:14
 * AUTHOR  : Younger Shen
 * EMAIL   : younger.x.shen@gmail.com
 * PHONE   : 13811754531
 * WECHAT  : 13811754531
 * WEBSIT  : https://www.punkcoder.cn
 */
?>

<!doctype html>

<html <?php language_attributes(); ?>>

<?php get_header(); ?>

<body class="<?php body_class(); ?>" style="min-width: 500px">
    <?php pc_get_template('navbar'); ?>

    <div class="container-fluid home-posts-list">
        <div class="row mt-3">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <?php
                if ( have_posts() ) {

                    // Load posts loop.
                    while ( have_posts() ) {
                        the_post();
                        get_template_part("contents");
                    }

                } else {

                    // If no content, include the "No posts found" template.
//                    get_template_part( 'template-parts/content/content', 'none' );

                }
                ?>

            </div>
            <div class="col-lg-4">
                <?php pc_get_template("sidebar");?>
            </div>
        </div>
    </div>

</body>

<?php get_footer(); ?>

</html>


