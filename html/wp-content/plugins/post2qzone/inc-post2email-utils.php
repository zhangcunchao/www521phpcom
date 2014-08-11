<?php
Class Post2EmailUtils {
	
	// Constructor
	public function Post2EmailUtils() {
	}
	
	/**
	 * 检查给定的Post是否符合发布规则的要求.
	 * @param $post
	 * @param $catRules
	 * @return unknown_type
	 */
	public static function isPostInCatList($post, $catRules) {
		if(empty($catRules)) {
			return true;
		}else {
			
			$arrayCatIDs = wp_get_post_categories($post->ID);
			
			$arrayCatAllowed = array();
			$arrayCatAllowed = split(",", $catRules);
			
			$postNeedRepost =  self::hasCommonItem($arrayCatIDs, $arrayCatAllowed);
			// echo "<br />是否符合条件: ".$postNeedRepost."<br />";
			return $postNeedRepost;
		}
		return false;
	}
	
	/**
	 * 根据Post及字数限制截取内容, 字符截取考虑使用utf-expert插件, 使用is_callable()检查.
	 * @param $post 
	 * @param $numberLimit
	 * @return unknown_type
	 */
	public static function getContents($post, $lengthLimit, $plainText = 0) {
		$debug = false;
		if($debug) {
			echo "<br />Post内容: ";
			var_dump($post);
			echo "<br />截取长度: ".$lengthLimit;
		}
		
		$contents;
		$post_content_raw = $post->post_content;
		
		if($lengthLimit > 0) { // 设置了字数限制
			$excerpt = trim($post->post_excerpt); // 摘要
			
			// 1.1 摘要为空, 则寻找<!--more-->标签
			if(empty($excerpt)) {  
				$indexOfMoreTag = mb_strpos($post_content_raw, '<!--more-->', 0, 'utf-8');
				if($indexOfMoreTag > 0) { // 1.1.1 含有MoreTag, 截取More之前的
					$contents = mb_substr($post_content_raw, 0, $indexOfMoreTag, 'utf-8');
					if($debug) {
						echo "<br />找到More标签, 位置: ".$indexOfMoreTag;
					}
				}else { // 1.1.2 无MoreTag使用字数截取内容
					$contents = mb_substr($post_content_raw, 0, $lengthLimit, 'utf-8');
					if($debug) {
						echo "<br />无More标签, 截取字符, 长度: ".$lengthLimit;
					}
				}
			// 1.2 摘要不为空, 则使用摘要.
			}else { 
				$contents = $excerpt;
				if($debug) {
					echo "<br />已有摘要 使用摘要";
				}
			}
			
			if($plainText > 0) {
				$contents = strip_tags($contents);
			}
			
		}else { // 未设置字数限制, 全文输出.
			$contents = $post->post_content;
			if($debug) {
				echo "<br />无限制, 全文输出.";
			}
		}
		
		return $contents;
	}
	
	
	/**
	 * 检查给定的两个数组是否具有相等的元素.
	 * @param $array1
	 * @param $array2
	 * @return unknown_type
	 */
	public static function hasCommonItem($array1, $array2) {
		foreach ($array1 as $item1) {
			foreach($array2 as $item2) {
				if($item1 == $item2) {
					return true;
				}
			}
		}
		return false;
	}
}
?>