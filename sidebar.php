<div id="sidebar">
	<!-- 新浪微博 -->
	<aside class="widget">
		<h3>新浪微博</h3>
		<iframe width="100%" height="550" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=0&height=550&fansRow=2&ptype=0&speed=0&skin=1&isTitle=0&noborder=0&isWeibo=1&isFans=0&uid=1801486485&verifier=985d08b5&dpc=1"></iframe>
	</aside>
	<?php 
		if (function_exists('dynamic_sidebar') && is_active_sidebar('right-sidebar')):
			dynamic_sidebar('right-sidebar');
		endif;
	?>
</div>

