<?php
/**
 * PROJECT : punkcoder
 * FILE    : attachment.php
 * TIME    : 2019/4/20 16:51
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
<?php get_template_part('template-parts/navbar'); ?>

<main class="container-fluid home-post-list">
    <div class="row mt-3 justify-content-center">
        <div class="col-lg-2">
            <?php get_template_part("template-parts/sidebar");?>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12">
            <?php
                the_post();
                get_template_part("template-parts/post-attachment");
            ?>
        </div>
    </div>
</main>
</body>
<span class="d-block mt-5"></span>
<?php get_footer(); ?>
</html>
