<?php
	/* simplify wp_head() output */
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'start_post_rel_link');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'adjacent_posts_rel_link');

	/* 开启菜单功能 - dashboard 可见 */
	register_nav_menus(array('primary' => '一级导航'));

	/* 浏览次数统计 */
	/* 加到single.php的主循环中 */
	function setPostViews ($postID) {
		$count_key = 'post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if($count == ''){ //没有内容返回
			$count = 0;
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
		}else{
			$count++;
			update_post_meta($postID, $count_key, $count);
		}
	}
	/* 加到需要获取浏览数的地方 */
	function getPostViews ($postID) {
		$count_key = 'post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if($count == ''){ //没有内容返回
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, 0);
			return 0;
		}
		return $count;
	}

?>