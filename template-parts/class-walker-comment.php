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
     public function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
         $depth++;
         $GLOBALS['comment_depth'] = $depth;
         $GLOBALS['comment'] = $comment;

         if ( !empty( $args['callback'] ) ) {
             ob_start();
             call_user_func( $args['callback'], $comment, $args, $depth );
             $output .= ob_get_clean();
             return;
         }

         if ( ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) && $args['short_ping'] ) {
             ob_start();
             $this->ping( $comment, $depth, $args );
             $output .= ob_get_clean();
         } elseif ( 'html5' === $args['format'] ) {
             ob_start();
             $this->html5_comment( $comment, $depth, $args );
             $output .= ob_get_clean();
         } else {
             ob_start();
             $this->comment( $comment, $depth, $args );
             $output .= ob_get_clean();
         }
     }

    public function end_el( &$output, $comment, $depth = 0, $args = array() ) {
        if ( !empty( $args['end-callback'] ) ) {
            ob_start();
            call_user_func( $args['end-callback'], $comment, $args,   $depth );
            $output .= ob_get_clean();
            return;
        }
        $output .= "</li><!-- #comment-## -->\n";
    }

     public function start_lvl( &$output, $depth = 0, $args = array() ) {
         $GLOBALS['comment_depth'] = $depth + 1;
         $output .= '<ol class="post-comment-list row  punkcoder-post-comments punkcoder-post-comments-children">';
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
        $args = array_merge( $args, [
            'add_below' => 'div-comment',
            'depth'     => $depth,
            'max_depth' => $args['max_depth'],
            'before'    => '',
            'after'     => ''
        ]);

        $reply_link = get_comment_reply_link($args);

?>
        <li id="comment-<?php comment_ID(); ?>" class="col-12 post-comment-list-item">
            <div class="col-smd-1 cosl-sm-2 post-comment-list-item-head">
                <div class="d-inline-block post-comment-list-item-avatar-wrap">
                    <img src="<?php if ( 0 != $args['avatar_size'] ) {echo get_avatar( $comment, $args['avatar_size'] );} else {echo 'http://localhost/wp-content/uploads/2019/03/11191354_1098524393497935_847263551_n.jpg'; } ?>" alt="" class="rounded post-comment-list-item-avatar">
                </div>
                <div class="d-inline-block post-comment-meta-content">
                    <div>
                        <span class="d-inline-bslock post-comment-list-item-nickname">
                            <?php echo get_comment_author_link( $comment );?>
                        </span>
                        <span class="d-inline-bslock post-comment-list-item-reply">
                            <?php echo $reply_link; ?>
                        </span>
                    </div>
                    <div>
                        <a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>" class="post-comment-list-item-time">
                            <time datetime="<?php comment_time( 'c' ); ?>">
                                <?php
                                printf( __( '%1$s at %2$s' ), get_comment_date( '', $comment ), get_comment_time() );
                                ?>
                            </time>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-1s1 cols-sm-10 post-comment-list-item-body">
                <?php comment_text(); ?>
            </div>
<?php
    }
 }