<div id="sidebar">
	<!-- 新浪微博 -->
	
	<?php 
		if (function_exists('dynamic_sidebar') && is_active_sidebar('right-sidebar')):
			dynamic_sidebar('right-sidebar');
		endif;
	?>
</div>

