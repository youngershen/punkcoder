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

$copyright = punkcoder_get_options('punkcoder_options', 'copyright', '版权 <a href="https://creativecommons.org/licenses/by/4.0/deed.zh" target="_blank"> 署名 4.0 国际 (CC BY 4.0) </a>');
$beian = punkcoder_get_options('punkcoder_options', 'beian', '备案号 冀ICP备19005058号');
$wordpress_copyright = punkcoder_get_options('', '', 'Powered By <a href="https://wordpress.org/" target="_blank">WordPress.org</a>');
$theme_copyright = punkcoder_get_options('punkcoder_options', 'sfsdf','Theme By <a href="https://punkcoder.cn" target="_blank">PunkCoder</a>');
?>


<footer class="container-fluid punkcoder-footer d-none d-lg-block fixed-bottom">
    <div class="row justify-content-center">
        <div class="col-10 justify-content-center text-center">
            <span class="punkcoder-footer-item">
                <?php echo($copyright);?>
            </span>
            <span class="punkcoder-footer-item">
                <?php echo($beian);?>
            </span>
            <span class="punkcoder-footer-item">
                <?php echo($wordpress_copyright) ?>
            </span>
            <span class="punkcoder-footer-item">
                <?php echo($theme_copyright)?>
            </span>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
