<?php
/**
 * PROJECT : punkcoder
 * FILE    : searchform.php
 * TIME    : 2019/3/14 15:42
 * AUTHOR  : Younger Shen
 * EMAIL   : younger.x.shen@gmail.com
 * PHONE   : 13811754531
 * WECHAT  : 13811754531
 * WEBSIT  : https://www.punkcoder.cn
 */
 
 ?>
<form role="search" class="form-inline my-2 my-lg-0 searchform" method="get" id="searchform" action="http://localhost/">
    <input class="form-control mr-sm-2" type="search" placeholder="<?php _e("手气不错", "punkcoder"); ?>"
           aria-label="Search"  value="" name="s" id="s">
    <button class="btn btn-outline-dark myd-2 my-sm-0"
            type="submit" id="searchsubmit" value="Search"><?php _e("搜索", "punkcoder"); ?></button>
</form>

