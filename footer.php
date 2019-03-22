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
?>


<footer class="container-fluid punkcoder-footer d-none d-lg-block fixed-bottom">
    <div class="row justify-content-center">
        <div class="col-10 justify-content-center text-center">
            <span class="punkcoder-footer-item">
                <?php _e("版权"); ?>
                <?php echo punkcoder_get_options('punkcoder_options', 'copyright')?>
            </span>

            <?php
                $beian = punkcoder_get_options('punkcoder_options', 'beian');
                if($beian)
                {
                    ?>
                        <span class="punkcoder-footer-item">
                            <?php _e("备案编号"); ?>
                            <a href="" target="_blank"><?php echo $beian;?></a>
                        </span>
                    <?php
                }
            ?>

            <span class="punkcoder-footer-item">
                <?php _e("Powered By"); ?>
                <a href="https://wordpress.org/" target="_blank">WordPress.org</a>
            </span>

            <span class="punkcoder-footer-item">
                <?php _e("Theme By"); ?>
                <a href="https://punkcoder.cn" target="_blank">PunkCoder</a>
            </span>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
