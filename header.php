<?php
/**
 * PROJECT : wordpress-5.0.3
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
    <link rel="stylesheet" href="<?php echo(get_template_directory_uri()); ?>/vendor/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <!-- load font awesome css-->
    <link rel="stylesheet" href="<?php echo(get_template_directory_uri()); ?>/vendor/fontawesome-free-5.7.2-web/css/all.min.css">

    <!-- load jquery -->
    <script src="<?php echo(get_template_directory_uri()); ?>/vendor/jquery-3.3.1.min.js"></script>
    <!-- load bootstrap js -->
    <script src="<?php echo(get_template_directory_uri()); ?>/vendor/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
    <!-- load fontawesome js-->
    <link rel="stylesheet" href="<?php echo(get_template_directory_uri()); ?>/vendor/fontawesome-free-5.7.2-web/js/all.min.js">

    <?php wp_head(); ?>
</head>