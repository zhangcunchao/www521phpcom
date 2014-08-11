<?php
//取消加载l10n的js
wp_deregister_script('l10n');

//添加自定义菜单支持
add_theme_support('nav-menus');
register_nav_menu('wap-nav', 'Wap基本导航');

//解决单双引号过滤问题
remove_filter('the_content', 'wptexturize');

//禁用WP-Postviews的JS
remove_action('wp_head', 'process_postviews');

//禁用无觅相关文章插件的JS
if (class_exists('WumiiRelatedPosts')) {
    global $wumii_related_posts;
    if (is_object($wumii_related_posts)) {
        remove_action('wp_head', array($wumii_related_posts, 'echoVerificationMeta'));
        remove_action('wp_footer', array($wumii_related_posts, 'echoWumiiScript'));
        remove_action('the_content', array($wumii_related_posts, 'addWumiiContent'));
    }
}

//禁用Some Chinese Please!的js
if(function_exists('scp_front')){
    remove_action('wp', 'scp_front');
}

//实现彩色标签云
function colorCloud($text) {
    $text = preg_replace_callback('|<a (.+?)>|i', 'colorCloudCallback', $text);
    return $text;
}

function colorCloudCallback($matches) {
    $text = $matches [1];
    $color = dechex(rand(0, 16777215));
    $pattern = '/style=(\'|\")(.*)(\'|\")/i';
    $text = preg_replace($pattern, "style=\"color:#{$color};$2;\"", $text);
    return "<a $text>";
}

add_filter('wp_tag_cloud', 'colorCloud', 1);

//判断日志是否为最新日志(1天内)
function is_new_post() {
    global $post;
    $post_time = strtotime($post->post_date);
    $time = time();
    $diff = ($time - $post_time) / 86400;
    if ($diff < 1) {
        return TRUE;
    } else {
        return FALSE;
    }
}

//中文截断
function messense_cut_str($string, $sublen, $start = 0, $code = 'UTF-8') { //中文截断专用函数
    if ($code == 'UTF-8') {
        $pa = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";
        preg_match_all($pa, $string, $t_string);
        if (count($t_string [0]) - $start > $sublen)
            return join('', array_slice($t_string [0], $start, $sublen));
        return join('', array_slice($t_string [0], $start, $sublen));
    } else {
        $start = $start * 2;
        $sublen = $sublen * 2;
        $strlen = strlen($string);
        $tmpstr = '';
        for ($i = 0; $i < $strlen; $i++) {
            if ($i >= $start && $i < ($start + $sublen)) {
                if (ord(substr($string, $i, 1)) > 129)
                    $tmpstr .= substr($string, $i, 2);
                else
                    $tmpstr .= substr($string, $i, 1);
            }
            if (ord(substr($string, $i, 1)) > 129)
                $i++;
        }
        return $tmpstr;
    }
}

//以下是部分SEO优化,页面描述和关键词
function messense_description($echo = TRUE) {
    $description = get_bloginfo('description');
    if (is_single()) {
        global $post;
        if ($post->post_excerpt) {
            $description = $post->post_excerpt;
        } elseif (get_post_meta($post->ID, 'description', true)) {
            $description = get_post_meta($post->ID, 'description', true);
        } else {
            $description = messense_cut_str(strip_tags($post->post_content), 100); //截取文章内容的前100个字作为页面描述
        }
    }
    if ($echo) {
        echo $description;
    } else {
        return $description;
    }
}

function messense_keywords($echo = TRUE) {
    $keywords = 'messense,乱了感觉,php,java,wap,wap开发,wordpress,音乐,折腾,心情,主题,模板';
    if (is_single()) {
        global $post;
        if (get_post_meta($post->ID, 'keywords', true)) {
            $keywords = get_post_meta($post->ID, 'keywords', true);
        } else {
            $tags = wp_get_post_tags($post->ID);
            if ($tags) {
                $keywords = '';
                foreach ($tags as $tag) {
                    $keywords = $keywords . $tag->name . ',';
                }
                $keywords = substr($keywords, 0, - 1); //去除最后一个关键字后的半角逗号
            }
        }
    }
    if ($echo) {
        echo $keywords;
    } else {
        return $keywords;
    }
}

function pageCount() {
    global $posts_per_page, $query_string;
    $query = new WP_Query($query_string . '&posts_per_page=-1');
    $total = $query->post_count;
    unset($query);
    return ceil($total / $posts_per_page);
}

//数字分页导航
function messense_pagination() {
    global $posts_per_page, $paged, $query_string;
    $my_query = new WP_Query($query_string . '&posts_per_page=-1');
    $total_posts = $my_query->post_count;
    if (empty($paged))
        $paged = 1;
    $prev = $paged - 1;
    $next = $paged + 1;
    $range = 2;
    $showitems = ($range * 2) + 1;
    $pages = ceil($total_posts / $posts_per_page);
    if ($pages != 1) {
        echo ($paged > 2 && $paged + $range + 1 > $pages && $showitems < $pages) ? "<a href=\"" . get_pagenum_link(1) . "\" title=\"首页\">首页</a>" : "";
        echo ($paged > 1 && $showitems < $pages) ? "<a href=\"" . get_pagenum_link($prev) . "\" title=\"上页\">上页</a>" : "";
        for ($i = 1; $i <= $pages; $i++) {
            if (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems) {
                echo ($paged == $i) ? "<span class=\"current\">{$i}</span>" : "<a href=\"" . get_pagenum_link($i) . "\" title=\"第{$i}页\" class=\"inactive\">{$i}</a>";
            }
        }
        echo ($paged < $pages - 1 && $showitems < $pages) ? "<a href=\"" . get_pagenum_link($next) . "\" title=\"下页\">下页</a>" : "";
        echo ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages) ? "<a href=\"" . get_pagenum_link($pages) . "\" title=\"尾页\">尾页</a>" : "";
    }
}

function my_smilies_src($img_src, $img, $siteurl) {
    return get_bloginfo('template_directory') . '/images/smilies/' . $img;
}

add_filter('smilies_src', 'my_smilies_src', 1, 10);

function no_self_ping(&$links) {
    $home = get_option('home');
    foreach ($links as $l => $link)
        if (0 === strpos($link, $home))
            unset($links[$l]);
}

add_action('pre_ping', 'no_self_ping');

function comment_mail_notify($comment_id) {
    $admin_notify = '0';
    $admin_email = 'wapdevelop@gmail.com';
    $comment = get_comment($comment_id);
    $comment_author_email = trim($comment->comment_author_email);
    $parent_id = $comment->comment_parent ? $comment->comment_parent : '';
    global $wpdb;
    if ($wpdb->query("Describe {$wpdb->comments} comment_mail_notify") == '')
        $wpdb->query("ALTER TABLE {$wpdb->comments} ADD COLUMN comment_mail_notify TINYINT NOT NULL DEFAULT 0;");
    if (($comment_author_email != $admin_email && isset($_POST['comment_mail_notify'])) || ($comment_author_email == $admin_email && $admin_notify == '1'))
        $wpdb->query("UPDATE {$wpdb->comments} SET comment_mail_notify='1' WHERE comment_ID='$comment_id'");
    $notify = $parent_id ? get_comment($parent_id)->comment_mail_notify : '0';
    $spam_confirmed = $comment->comment_approved;
    if ($parent_id != '' && $spam_confirmed != 'spam' && $notify == '1') {
        $wp_email = 'wapdevelop@gmail.com';
        $to = trim(get_comment($parent_id)->comment_author_email);
        $subject = 'Messense.Me 向您发来被围观通知！';
        $message = '
<div style="margin:1em 40px 1em 40px;background-color:#eef2fa;border:1px solid #d8e3e8;color:#111;padding:0 15px;font-family:Microsoft YaHei,Verdana;font-size:12.5px;">
<p><strong>@' . trim(get_comment($parent_id)->comment_author) . '</strong> 童鞋，您在 <strong>《' . get_the_title($comment->comment_post_ID) . '》</strong> 上的评论被围观了！</p>
</div>
<div style="margin:1em 40px 1em 40px;background-color:#eef2fa;border:1px solid #d8e3e8;color:#111;padding:0 15px;font-family:Microsoft YaHei,Verdana;font-size:12.5px;">
<p><strong>您</strong> 说: ' . trim(get_comment($parent_id)->comment_content) . '</p>
<p><strong>' . trim($comment->comment_author) . '</strong> 回: ' . trim($comment->comment_content) . '</p>
<p><small><em>反围观，请猛击： <a href="' . htmlspecialchars(get_permalink($comment->comment_post_ID) . "#comment-" . $comment->comment_ID) . '">' . htmlspecialchars(get_permalink($comment->comment_post_ID) . "#comment-" . $comment->comment_ID) . '</a></em></small></p>
<p style="float:right"><strong> —— By <a href="http://messense.me">Messense.Me</a></strong></p>
</div>
';
        $message = convert_smilies($message);
        $from = "From: \"" . get_option('blogname') . "\" <$wp_email>";
        $headers = "$from\nContent-Type: text/html; charset=" . get_option('blog_charset') . "\n";
        wp_mail($to, $subject, $message, $headers);
    }
}

add_action('comment_post', 'comment_mail_notify');

//短代码[login]，登录可见内容
function login_to_read($atts, $content=null) {
    extract(shortcode_atts(array("notice" => '<p class="login-to-read">温馨提示: 此处内容需要<a href="' . wp_login_url(get_permalink()) . '" title="登录">登录</a>后才能查看.</p>'), $atts));
    if (is_user_logged_in()) {
        return $content;
    } else {
        return $notice;
    }
}

add_shortcode('login', 'login_to_read');

//短代码[reply]，评论可见内容
function reply_to_read($atts, $content=null) {
    extract(shortcode_atts(array("notice" => '<p class="reply-to-read">温馨提示: 此处内容需要<a href="' . get_permalink() . '#respond" title="评论本文">评论本文</a>后才能查看.</p>'), $atts));
    $email = null;
    $user_ID = (int) wp_get_current_user()->ID;
    if ($user_ID > 0) {
        $email = get_userdata($user_ID)->user_email;
    } else if (isset($_COOKIE['comment_author_email_' . COOKIEHASH])) {
        $email = str_replace('%40', '@', $_COOKIE['comment_author_email_' . COOKIEHASH]);
    } else {
        return $notice;
    }
    if (empty($email)) {
        return $notice;
    }
    global $wpdb;
    $post_id = get_the_ID();
    $query = "SELECT `comment_ID` FROM {$wpdb->comments} WHERE `comment_post_ID`={$post_id} and `comment_approved`='1' and `comment_author_email`='{$email}' LIMIT 1";
    if ($wpdb->get_results($query)) {
        return $content;
    } else {
        return $notice;
    }
}

add_shortcode('reply', 'reply_to_read');

// Custom Comments List.
function mytheme_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    //主评论计数器初始化 begin - by zwwooooo
    global $commentcount;
    if (!$commentcount) { //初始化楼层计数器
        $page = (!empty($in_comment_loop) ) ? get_query_var('cpage') : get_page_of_comment($comment->comment_ID, $args); //zww
        if(isset($args['per_page']) && $args['per_page']>0){
            $cpp=$args['per_page'];
        }else{
            $cpp = get_option('comments_per_page'); //获取每页评论显示数量
        }
        if ($page > 1) {
            $commentcount = $cpp * ($page - 1);
        } else {
            $commentcount = 0; //如果评论还没有分页，初始值为0
        }
    }
    //主评论计数器初始化 end - by zwwooooo
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>" <?php if ($depth < 5 && $depth > 1)
        echo ' style="margin-left: ' . ceil(10 / sqrt($depth)) . 'px; "'; ?>>
                                      <?php
                                      //用于判断该留言的ID是否为管理员的留言
                                      if ($comment->user_id > 0) {
                                          $admin_comment = '<span style="color:#ED539F">' . _e('  ') . '</span>';
                                      } else {
                                          $admin_comment = __(' ');
                                      }
                                      ?>
        <div id="comment-<?php comment_ID() ?>" class="comment-body">
            <?php if ($comment->comment_approved == '0') : ?>
                <em><?php _e('Your comment is awaiting moderation.'); ?></em>
                <br />
            <?php endif; ?>
            <div class="comment-author vcard"><span class="floor"><?php
                if (!$parent_id = $comment->comment_parent) {
                    printf('%1$s楼.', ++$commentcount);
                } elseif ($depth > 1 && $depth < 8) {
                    printf('B%1$s.', $depth - 1);
                } else {
                    printf('^Heal^');
                }
                    ?></span>
                <?php printf(__('<cite class="fn">%s</cite><span class="says">%s</span>'), get_comment_author_link(), $admin_comment) ?>
                <span class="comment-time"><?php echo get_comment_date('m-d'), ' ', get_comment_time('H:i'); ?></span>
                <span class="reply">
                    <a href="?replytocom=<?php comment_ID() ?>#respond" class="comment-reply-link" rel="nofollow">回复</a>
                </span>
            </div>	
            <div class="comment-text"><?php comment_text(); ?></div>
        </div>
        <?php
    }
    ?>