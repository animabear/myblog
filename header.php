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
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<?php wp_head(); ?> <!-- 输出插件依赖的头信息 -->
</head>

<body <?php body_class(); ?> > <!-- 根据页面类型动态生成class -->
	
</body>
</html>