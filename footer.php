<?php
/**
 * PROJECT : punkcoder
 * FILE    : footer.php
 * TIME    : 2019/3/6 15:33
 * AUTHOR  : Younger Shen
 * EMAIL   : younger.x.shen@gmail.com
 * PHONE   : 13811754531
 * WECHAT  : 13811754531
 * WEBSIT  : https://www.punkcoder.cn
 */

$copyright = punkcoder_get_options('punkcoder_settings', 'copyright', '版权<a href="https://creativecommons.org/licenses/by/4.0/deed.zh" target="_blank"> 署名 4.0 国际 (CC BY 4.0) </a>');
$copyright_show = punkcoder_get_options('punkcoder_settings', 'copyright_show', 'yes');

$beian = punkcoder_get_options('punkcoder_settings', 'beian');
$beian_show = punkcoder_get_options('punkcoder_settings', 'beian_show', 'no');

$wordpress_copyright = punkcoder_get_options('punkcoder_settings', '', 'Powered By <a href="https://wordpress.org/" target="_blank">WordPress.org</a>');
$wordpress_copyright_show = punkcoder_get_options('punkcoder_settings', 'wp_copyright_show', 'yes');

$theme_copyright = punkcoder_get_options('punkcoder_settings', 'sfsdf','Theme By <a href="https://punkcoder.cn" target="_blank">PunkCoder</a>');
$theme_copyright_show = punkcoder_get_options('punkcoder_settings','theme_copyright_show', 'yes');

?>


<footer class="container-fluid punkcoder-footer d-none d-lg-block fixed-bottom">
    <div class="row justify-content-center">
        <div class="col-10 justify-content-center text-center">
            <?php
            if('yes' == $copyright_show && $copyright)
            {
            ?>
                <span class="punkcoder-footer-item">
                    <?php echo($copyright);?>
                </span>
            <?php
            }
            ?>

            <?php
            if('yes' == $beian_show && $beian)
            {
                ?>
                <span class="punkcoder-footer-item">
                    <?php echo($beian);?>
                </span>
                <?php
            }
            ?>

            <?php
            if('yes' == $wordpress_copyright_show && $wordpress_copyright)
            {
                ?>
                <span class="punkcoder-footer-item">
                    <?php echo($wordpress_copyright);?>
                </span>
                <?php
            }
            ?>
            <?php
            if('yes' == $theme_copyright_show && $theme_copyright)
            {
                ?>
                <span class="punkcoder-footer-item">
                    <?php echo($theme_copyright);?>
                </span>
                <?php
            }
            ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
