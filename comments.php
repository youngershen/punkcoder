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

if(post_password_required())
{
    return;
}

?>
<div class="row justify-content-center">
    <div id="post-comments" class="post-comments col-md-12 col-lg-12 col-sm-12" >
        <div class="container">
            <div>
                <div class="row">
                    <div class="col-lg-1 col-md-1 col-sm-2">
                        <img src="http://localhost/wp-content/uploads/2019/03/11191354_1098524393497935_847263551_n.jpg" alt="申延刚" class="rounded mw-100">

                    </div>
                    <div class="col-lg-10">
                        <div class="">
                            <span>张三</span>
                            <br>
                            <span>2018-12.21 19:12:23</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        你说的很有道理
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>

    <div id="post-comments-form" class="col-md-8 col-sm-12 <?php echo comments_open() ? 'post-comments' : 'post-comments post-comments-closed'; ?>">

        <h3 class="">发表评论</h3>
        <h5>电子邮件地址不会被公开。 必填项已用 * 标注</h5>
        <br>
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">姓名(*)</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="张三">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">邮箱(*)</label>
                    <input type="email" class="form-control" id="inputPassword4" placeholder="zhangsan@gmail.com">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">留言(*)</label>
                <textarea class="form-control" id="inputAddress" rows="3">内容不错！</textarea>
            </div>
           
            <button type="submit" class="btn btn-primary">提交</button>
        </form>
    </div>
</div>






