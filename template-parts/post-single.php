<?php
/**
 * PROJECT : punkcoder
 * FILE    : post.php
 * TIME    : 2019/3/12 10:31
 * AUTHOR  : Younger Shen
 * EMAIL   : younger.x.shen@gmail.com
 * PHONE   : 13811754531
 * WECHAT  : 13811754531
 * WEBSIT  : https://www.punkcoder.cn
 */
?>

    <article class="single-article <?php post_class(); ?>" id="post-<?php the_ID(); ?>">
        <header class="single-article-header justify-content-center">
            <h2 class="justify-content-center single-article-title"><?php echo($post->post_title) ?></h2>
        </header>
        <div class="single-article-meta">
            <?php get_template_part('template-parts/post-meta') ?>
        </div>
        <hr>
        <div class="single-article-content">
            <?php
            the_content();
            ?>
        </div>
    </article>

    <nav aria-label="Page navigation " class="justify-content-center">
        <ul class="pagination justify-content-center">
            <li class="page-item"><a class="page-link" href="#">首页</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">末页</a></li>
        </ul>
    </nav>

<?php
wp_link_pages(array(
    'before' => '<nav aria-label="Page navigation" class="justify-content-center"><ul class="pagination justify-content-center">',
    'after' => '</ul></nav>',
    'link_before' => '',
    'link_after' => '',
));
?>