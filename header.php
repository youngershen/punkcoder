<?php
/**
 * PROJECT : punkcoder
 * FILE    : header.php
 * TIME    : 2019/3/6 15:33
 * AUTHOR  : Younger Shen
 * EMAIL   : younger.x.shen@gmail.com
 * PHONE   : 13811754531
 * WECHAT  : 13811754531
 * WEBSIT  : https://www.punkcoder.cn
 */

?>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Younger Shen">
    <meta name="email" content="younger.x.shen@gmail.com">
    <link rel="profile" href="https://gmpg.org/xfn/11" />

    <!-- load bootstrap css -->
    <link rel="stylesheet" href="<?php echo(get_template_directory_uri()); ?>/assets/vendor/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <!-- load font awesome css-->
    <link rel="stylesheet" href="<?php echo(get_template_directory_uri()); ?>/assets/vendor/fontawesome-free-5.7.2-web/css/all.min.css">
    <!-- load custom css -->
    <link rel="stylesheet" href="<?php echo(get_template_directory_uri())?>/assets/css/punkcoder.css">

    <!-- load jquery -->
    <script src="<?php echo(get_template_directory_uri()); ?>/assets/vendor/jquery-3.3.1.min.js"></script>
    <!-- load bootstrap js -->
    <script src="<?php echo(get_template_directory_uri()); ?>/assets/vendor/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
    <!-- load fontawesome js-->
    <script src="<?php echo(get_template_directory_uri()); ?>/assets/vendor/fontawesome-free-5.7.2-web/js/all.min.js"></script>
    <!-- load custom js -->
    <script src="<?php echo(get_template_directory_uri())?>/assets/dist/js/punkcoder.min.js"></script>

    <!-- custom code is here -->
    <?php echo punkcoder_get_options('punkcoder_options', 'custom_code');?>
    <?php wp_head(); ?>
</head>