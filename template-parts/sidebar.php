<?php
/**
 * PROJECT : punkcoder
 * FILE    : sidebar.php
 * TIME    : 2019/3/6 17:11
 * AUTHOR  : Younger Shen
 * EMAIL   : younger.x.shen@gmail.com
 * PHONE   : 13811754531
 * WECHAT  : 13811754531
 * WEBSIT  : https://www.punkcoder.cn
 */

?>


<div class="d-none d-lg-block punkcoder-sidebar container-fluid">
    <div class="row punkcoder-sidebar-profile justify-content-center">
        <div class="col-10">
            <div class="text-center punkcoder-sidebar-profile-avatar">
                <img src="<?php echo(get_template_directory_uri()); ?>/assets/images/avatar-default.jpg" class="rounded mw-100" alt="...">
            </div>
            <div class="punkcoder-sidebar-profile-item">
                <div>
                    <span>昵称:</span>
                    <span>Younger Shen</span>
                </div>
                <div>
                    <span>年龄:</span>
                    <span>30</span>
                </div>
                <div>
                    <span>手机:</span>
                    <span><a href="tel:13811754531">13811754531</a></span>
                </div>
                <div>
                    <span>微信:</span>
                    <span>13811754531</span>
                </div>
                <div class="punkcoder-sidebar-profile-item-social justify-content-center">
                    <a href="https://github.com/youngershen" target="_blank">
                        <i class="fab fa-github fa-2x"></i>
                    </a>
                    <a href="https://weibo.com/shenyangang" target="_blank">
                        <i class="fab fa-weibo fa-2x"></i>
                    </a>
                    <a href="">
                        <i class="fab fa-weixin fa-2x"></i>
                    </a>
                    <a href="https://twitter.com/youngershen" target="_blank">
                        <i class="fab fa-twitter fa-2x"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row punkcoder-sidebar-hot">
        <div class="col-10 ">
            <div>
                <span>热门文章</span>
            </div>
            <ul class="list-group mx-auto">
            <ul class="list-group mx-auto">
                <li class="list-group-item">Cras justo odio</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Morbi leo risus</li>
                <li class="list-group-item">Porta ac consectetur ac</li>
                <li class="list-group-item">Vestibulum at eros</li>
            </ul>
        </div>


    </div>

</div>
