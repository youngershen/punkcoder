<?php
/**
 * PROJECT : wordpress-5.0.3
 * FILE    : functions.php
 * TIME    : 2019/3/6 16:30
 * AUTHOR  : Younger Shen
 * EMAIL   : younger.x.shen@gmail.com
 * PHONE   : 13811754531
 * WECHAT  : 13811754531
 * WEBSIT  : https://www.punkcoder.cn
 */
 
 function get_navi()
 {
     $templates = array();

     $templates[] = 'navi.php';

     locate_template( $templates, true );
 }