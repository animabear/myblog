$(function() {
	//init indicator
	var activeIndex = 0,
		$currentMenu = [];
	if ( ($currentMenu = $('.current-menu-item', '#nav-menu')) && $currentMenu.length > 0 ) {
		activeIndex = $currentMenu.index();
	} else if ( ($currentMenu = $('.current-post-ancestor', '#nav-menu')) && $currentMenu.length > 0 ) {
		activeIndex = $currentMenu.index();
	}
	$('#indicator').css('left', activeIndex * 100 + 'px');

	//listen mouse action
	$('#nav-menu li a').on('mouseenter', function(e) {
		var index = $(this).parent().index();
		$('#indicator').animate({
			left: index * 100 + 'px'
		}, 200);
	});
	$('#nav-menu').on('mouseleave', function() {
		$('#indicator').animate({
			left: activeIndex * 100 + 'px'
		}, 200);
	});
	/** todo: 优化效率
	  * 对于文章页面的处理
	  * 多次操作 动画变得迟钝
	  */
});