$(function() {
	//init indicator
	var
		activeIndex = 0,
		$currentMenu = [];

	if ( ($currentMenu = $('.current-menu-item', '#nav-menu')) && $currentMenu.length ) {
		activeIndex = $currentMenu.index();
	} else if ( ($currentMenu = $('.current-post-ancestor', '#nav-menu')) && $currentMenu.length ) {
		activeIndex = $currentMenu.index();
	}
	$('#indicator')
		.css('left', activeIndex * 100 + 'px')
		.css('display', 'block');

	//listen mouse action
	$('#nav-menu li a')
		.on('mouseenter', function(e) {
			var index = $(this).parent().index();
			$('#indicator')
				.stop()
				.animate({
					left: index * 100 + 'px'
				}, 200);
		});
	$('#nav-menu')
		.on('mouseleave', function() {
			$('#indicator')
				.stop()
				.animate({
					left: activeIndex * 100 + 'px'
				}, 200);
		});

	//go to top
	var
		$goTop = $('#go-top'),
		dis = 400,				//滑动距离
		isFadeIn = false;

	$(window)
		.on('scroll', function() {
			var top = document.documentElement.scrollTop || document.body.scrollTop;
			if (top > dis) {
				if (!isFadeIn) { //未显示
					isFadeIn = true;
					$goTop.fadeIn();
				}
			} else {
				if (isFadeIn) { //显示中
					isFadeIn = false;
					$goTop.stop().fadeOut();  //stop停止之前的动画
				}
			}
		});

	$goTop
		.on('click', function() {
			$('html, body')
				.animate({scrollTop: 0});
		});

});