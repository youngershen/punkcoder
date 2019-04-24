<?php
/**
 * PROJECT : punkcoder
 * FILE    : class-walker-comment.php
 * TIME    : 2019/4/22 12:06
 * AUTHOR  : Younger Shen
 * EMAIL   : younger.x.shen@gmail.com
 * PHONE   : 13811754531
 * WECHAT  : 13811754531
 * WEBSIT  : https://www.punkcoder.cn
 */
 
 class Punkcoder_Walker_Comment extends Walker_Comment
{
     public function start_lvl( &$output, $depth = 0, $args = array() ) {
         $GLOBALS['comment_depth'] = $depth + 1;
         $output .= '<ol class="post-comment-reply-item row post-comment-list">';
     }

     public function end_lvl( &$output, $depth = 0, $args = array() ) {
         $GLOBALS['comment_depth'] = $depth + 1;
         $output .= '</ol>';
     }

    protected function comment($comment, $depth, $args)
    {
        $this->punkcoder_comment($comment, $depth, $args);
    }

    protected  function html5_comment( $comment, $depth, $args )
    {
        $this->punkcoder_comment($comment, $depth, $args);
    }

    private function punkcoder_comment($comment, $depth, $args)
    {
?>




<?php

    }
 }