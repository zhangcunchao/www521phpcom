<?php get_header(); ?>
<div id="content">
    <?php if (have_posts()) { ?>
        <?php the_post(); ?>
        <div class="post" id="post-<?php the_ID(); ?>">
            <h2><?php the_title(); ?>[<?php if (function_exists('the_views')) {
        the_views();
        echo '/';
    } ?><?php comments_number('0评', '1评', '%评'); ?>]</h2>
            <div class="post-info">
                <p>文章作者: <?php the_author(); ?></p>
                <p>文章分类: <?php the_category(','); ?></p>
                <p>发表时间: <?php the_time('Y-m-d H:i:s'); ?></p>
                <p><?php the_tags('文章标签: ', ','); ?></p>
            </div>
            <div class="entry">
    <?php the_content(); ?>
    <?php link_pages('<p><code>Pages:</strong> ', '</p>', 'number'); ?>
            </div>
        </div>
        <div id="related-posts">
            <h3>+++相关文章+++</h3>
            <ul>
                <?php
                $post_num = 5;
                $exclude_id = get_the_ID();
                $posttags = get_the_tags();
                $i = 0;
                if ($posttags) {
                    $tags = '';
                    foreach ($posttags as $tag)
                        $tags .= $tag->term_id . ','; //zww: edit
                    $args = array(
                        'post_status' => 'publish',
                        'tag__in' => explode(',', $tags), // 只选 tags 的文章. //zww: edit
                        'post__not_in' => explode(',', $exclude_id), // 排除已出现过的文章.
                        'caller_get_posts' => 1,
                        'orderby' => 'comment_date', // 依评论日期排序.
                        'posts_per_page' => $post_num
                    );
                    query_posts($args);
                    while (have_posts()) {
                        the_post();
                        echo '<li>',$i+1,'.';
                        echo '<a rel="bookmark" href="', get_permalink(), '" title="查看相关文章《', get_the_title(), '》(已有' . get_comments_number() . '条评论)">' . get_the_title() . '</a>';
                        echo '</li>';
                        $exclude_id .= ',' . $post->ID;
                        $i++;
                    }
                    wp_reset_query();
                }
                if ($i < $post_num) { // 当tags 文章数量不足, 再取 category 补足.
                    $cats = '';
                    foreach (get_the_category() as $cat)
                        $cats .= $cat->cat_ID . ',';
                    $args = array(
                        'category__in' => explode(',', $cats), // 只选 category 的文章.
                        'post__not_in' => explode(',', $exclude_id),
                        'caller_get_posts' => 1,
                        'orderby' => 'comment_date',
                        'posts_per_page' => $post_num - $i
                    );
                    query_posts($args);
                    while (have_posts()) {
                        the_post();
                        echo '<li>',$i+1,'.';
                        echo '<a href="', get_permalink(), '" title="查看相关文章《', get_the_title(), '》(已有' . get_comments_number() . '条评论)">' . get_the_title() . '</a>';
                        echo '</li>';
                        $i++;
                    }
                    wp_reset_query();
                }
                if ($i == 0)
                    echo '<li>没有相关文章!</li>';
                ?>
            </ul>
        </div>
        <div class="prev-next">
            <p class="prev-post"><?php previous_post_link('上一篇: %link'); ?></p>
            <p class="next-post"><?php next_post_link('下一篇: %link'); ?></p>
        </div>
        <div class="comments-template">
        <?php comments_template(); ?>
        </div>
<?php }else { ?>
        <div class="post" id="notfound">
            <p>
                抱歉，没有找到文章!
            </p>
        </div>
<?php } ?>
</div>
<?php get_footer(); ?>