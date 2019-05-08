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

    <article <?php post_class('single-article justify-content-center'); ?> id="post-<?php the_ID(); ?>">
        <div class="single-article-meta">
            <?php get_template_part('template-parts/post-meta') ?>
        </div>
        <hr>
        <div class="punkcoder-post-single-thumbnail d-none d-lg-block">
            <?php
            $id = get_post_thumbnail_id();
            $image = wp_get_attachment_image_src($id, 'single-post-thumbnail');

            if($image)
            {
                $image = $image[0];
            }
            else
            {
                $image = punkcoder_get_url('images', 'default-feature-image.jpg');
            }

            ?>
            <img src="<?php echo(esc_html($image)); ?>" alt="" class="punkcoder-post-single-thumbnail-image rounded">
        </div>

        <div class="single-article-content">
            <?php
            the_content();
            ?>
        </div>
    </article>

<?php
wp_link_pages(array(
    'before' => '<nav aria-label="Page navigation" class="justify-content-center"><ul class="pagination justify-content-center">',
    'after' => '</ul></nav>',
    'link_before' => '',
    'link_after' => '',
));
?>