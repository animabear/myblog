<?php
	/* simplify wp_head() output */
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'start_post_rel_link');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'adjacent_posts_rel_link');

	/* 开启菜单功能 - dashboard 可见 */
	if (function_exists('register_nav_menus')) {
		register_nav_menus(array('primary' => '一级导航'));
	}

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

	/* 添加文章缩略图支持 */
	if (function_exists('add_theme_support')) {
		add_theme_support('post-thumbnails');
		//生成默认特色图片,在后台添加时显示(图片上传时生成)
		set_post_thumbnail_size(150, 150); 
	}
	if (function_exists('add_image_size')) {
		//生成指定类型的特色图片,在页面显示(图片上传时生成)
		add_image_size('homepage-thumb', 300, 178, true); //hard crop mode
	}

	/* 截取中文字符串 */
	function chinese_excerpt ($excerpt, $length = 200) {
		return mb_strlen($excerpt) > 200 ? mb_substr($excerpt, 0, $length).' ...' : $excerpt;
	}
	//filter hook
	add_filter('the_excerpt', 'chinese_excerpt');

	/* 开启边栏 Call on "widgets_init" action */
	if (function_exists('register_sidebar')) {
		$args = array(
			'name' => __('Main Sidebar', 'animabear'),
			'id' => 'right-sidebar',
			'description' => '左边栏',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		);
		register_sidebar($args);
	}

	//设置标签云参数
	function set_number_tags($args) {
		$args = array(
			'number' => 20,
			'smallest' => 14,
			'largest' => 25,
			'unit' => 'px'
		);
		return $args;
	}
	add_filter('widget_tag_cloud_args','set_number_tags');

?>