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

<body class="<?php body_class(); ?>">
    <?php pc_get_template('navbar'); ?>

    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-8 col-md-12">
                <?php pc_get_template("contents");?>
            </div>
            <div class="col-lg-4">
                <?php pc_get_template("sidebar");?>
            </div>
        </div>
    </div>

</body>

<?php get_footer(); ?>

</html>


