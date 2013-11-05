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
?>