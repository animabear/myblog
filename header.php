<!DOCTYPE html>
<html>
<head>
<title>
<?php
	if (is_home()):
		bloginfo('name'); echo " | "; bloginfo('description');
	else: 
		wp_title('|', true, right); bloginfo('name');
	endif;
?>
</title>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/normalize.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.min.css" type="text/css" media="screen" />
<!--[if lt IE 9]>
<script src="<?php bloginfo('template_directory'); ?>/js/html5.js"></script>
<![endif]-->

<?php wp_head(); ?> <!-- 输出插件依赖的头信息 -->
</head>

<body <?php body_class(); ?> > <!-- 根据页面类型动态生成class -->
<div id="page">
	<header>
		<hgroup>
			<h1 class="site-title"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo( 'name' ); echo " · "; bloginfo('description'); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo('description'); ?></h2>
		</hgroup>
		<nav id="site-nav">
			<!-- 调用第一个菜单 -->
			<?php wp_nav_menu(array(
				'theme_location' => 'primary',
				'container_class' => 'nav-menu-container',
				'menu_class' => 'nav-menu',
				'menu_id' => 'nav-menu'
			));
			?>
			<div id="indicator"></div>
		</nav>
	</header>
	<div id="main" class="wrapper">