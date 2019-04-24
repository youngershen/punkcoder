<?php
/**
 * PROJECT : punkcoder
 * FILE    : comments.php
 * TIME    : 2019/4/22 9:39
 * AUTHOR  : Younger Shen
 * EMAIL   : younger.x.shen@gmail.com
 * PHONE   : 13811754531
 * WECHAT  : 13811754531
 * WEBSIT  : https://www.punkcoder.cn
 */

if (post_password_required()) {
    return;
}

?>

<?php
if(have_comments())
{
    require_once ('template-parts/class-walker-comment.php');

    $args = [
        'walker' => new Punkcoder_Walker_Comment(),
//        'max_depth' => 3,
        'style' => 'ol',
//        'per_page' =>3,
        'avatar_size' => '',
        'reverse_top_level' => true,
        'reverse_children'=> true,
        'format' => 'html5'
    ];

?>
<!--    <div class="row justify-content-center punkcoder-post-comments">-->
<!--        <ol id="post-comments" class="post-comments-list col-12">-->
<!--            <li class="row post-comment-list-item">-->
<!--                <div class="col-md-1 col-sm-2 post-comment-list-item-head">-->
<!--                    <img src="http://localhost/wp-content/uploads/2019/03/11191354_1098524393497935_847263551_n.jpg" alt=""-->
<!--                         class="rounded post-comment-list-item-avatar d-block mw-100">-->
<!--                    <a href="" class="d-block post-comment-list-item-reply">回复</a>-->
<!--                </div>-->
<!--                <div class="col-md-11 col-sm-10 post-comment-list-item-body">-->
<!--                    <span class="d-block post-comment-list-item-nickname">申延刚</span>-->
<!--                    <span class="d-block post-comment-list-item-time">2018-12-12 20:52:55</span>-->
<!--                    <span class="d-block post-comment-list-item-content">你说的好像很有道理 你说的好像很有道理 你说的好像很有道理 你说的好像很有道理 你说的好像很有道理 你说的好像很有道理 你说的好像很有道理 你说的好像很有道理  你说的好像很有道理 你说的好像很有道理 你说的好像很有道理 你说的好像很有道理</span>-->
<!--                </div>-->
<!--                <div class="post-comment-reply-item row post-comment-list-item">-->
<!--                    <div class="col-md-1 col-sm-2 post-comment-list-item-head">-->
<!--                        <img src="http://localhost/wp-content/uploads/2019/03/11191354_1098524393497935_847263551_n.jpg" alt=""-->
<!--                             class="rounded post-comment-list-item-avatar d-block mw-100">-->
<!--                        <a href="" class="d-block post-comment-list-item-reply">回复</a>-->
<!--                    </div>-->
<!--                    <div class="col-md-11 col-sm-10 post-comment-list-item-body">-->
<!--                        <span class="d-block post-comment-list-item-nickname">申延刚</span>-->
<!--                        <span class="d-block post-comment-list-item-time">2018-12-12 20:52:55</span>-->
<!--                        <span class="d-block post-comment-list-item-content">你说的好像很有道理 你说的好像很有道理 你说的好像很有道理 你说的好像很有道理 你说的好像很有道理 你说的好像很有道理 你说的好像很有道理 你说的好像很有道理  你说的好像很有道理 你说的好像很有道理 你说的好像很有道理 你说的好像很有道理</span>-->
<!--                    </div>-->
<!--                    <div class="post-comment-reply-item row post-comment-list-item">-->
<!--                        <div class="col-md-1 col-sm-2 post-comment-list-item-head">-->
<!--                            <img src="http://localhost/wp-content/uploads/2019/03/11191354_1098524393497935_847263551_n.jpg" alt=""-->
<!--                                 class="rounded post-comment-list-item-avatar d-block mw-100">-->
<!--                            <a href="" class="d-block post-comment-list-item-reply">回复</a>-->
<!--                        </div>-->
<!--                        <div class="col-md-11 col-sm-10 post-comment-list-item-body">-->
<!--                            <span class="d-block post-comment-list-item-nickname">申延刚</span>-->
<!--                            <span class="d-block post-comment-list-item-time">2018-12-12 20:52:55</span>-->
<!--                            <span class="d-block post-comment-list-item-content">你说的好像很有道理 你说的好像很有道理 你说的好像很有道理 你说的好像很有道理 你说的好像很有道理 你说的好像很有道理 你说的好像很有道理 你说的好像很有道理  你说的好像很有道理 你说的好像很有道理 你说的好像很有道理 你说的好像很有道理</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </li>-->
<!--            <li class="row post-comment-list-item">-->
<!--                <div class="col-md-1 col-sm-2 post-comment-list-item-head">-->
<!--                    <img src="http://localhost/wp-content/uploads/2019/03/11191354_1098524393497935_847263551_n.jpg" alt=""-->
<!--                         class="rounded post-comment-list-item-avatar d-block mw-100">-->
<!--                    <a href="" class="d-block post-comment-list-item-reply">回复</a>-->
<!--                </div>-->
<!--                <div class="col-md-11 col-sm-10 post-comment-list-item-body">-->
<!--                    <span class="d-block post-comment-list-item-nickname">申延刚</span>-->
<!--                    <span class="d-block post-comment-list-item-time">2018-12-12 20:52:55</span>-->
<!--                    <span class="d-block post-comment-list-item-content">你说的好像很有道理 你说的好像很有道理 你说的好像很有道理 你说的好像很有道理 你说的好像很有道理 你说的好像很有道理 你说的好像很有道理 你说的好像很有道理  你说的好像很有道理 你说的好像很有道理 你说的好像很有道理 你说的好像很有道理</span>-->
<!--                </div>-->
<!--            </li>-->
<!--        </ol>-->
<!--    </div>-->

    <?php
    wp_list_comments([]);
    ?>

<?php
}?>



<?php
$req = get_option( 'require_name_email' );
$commenter = wp_get_current_commenter();
//
$fields   =  array(
    'author'  => '<div class="form-row"><div class="form-group col-md-6"><label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label><input type="text" class="form-control" placeholder="' . __('张三', 'punkcoder') . '" id="author" name="author" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . ($req ? 'required="required"' : ''). '></div>',

    'email'  => '<div class="form-group col-md-6"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label><input type="email" class="form-control" placeholder="' . __('zhangsan@gmail.com', 'punkcoder') . '" id="email" name="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" ' . ($req ? 'required="required"' : '') .  '></div></div>'
);

$comment_field = '<div class="form-group"><label for="comment">' .__('留言', 'punkcoder').'</label><textarea class="form-control" id="comment" rows="3" name="comment"  maxlength="65525" required="required">'. __('内容不错！', 'punkcoder') .'</textarea></div>';

$args = [
    'title_reply' => __('发表评论', 'punkcoder'),
    'title_reply_to' => __( '向 %s 回复评论', 'punkcoder'),
    'comment_notes_before' => '<h5>'. __('电子邮件地址不会被公开 必填项已用 * 标注', 'punkcoder') . '</h5>',
    'comment_notes_after' => '',
    'comment_field' => $comment_field,
    'fields' => $fields,
    'submit_field' => '%1$s %2$s',
    'submit_button' => '<input name="%1$s" type="submit" id="%2$s" class="%3$s btn btn-primary" value="%4$s" />',
];

comment_form($args);
?>

<?php the_punkcoder_comments_navigation(); ?>
