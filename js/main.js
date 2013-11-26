$(function() {
	//init indicator
	var activeIndex = 0,
		$currentMenu = [];
	if ( ($currentMenu = $('.current-menu-item', '#nav-menu')) && $currentMenu.length > 0 ) {
		activeIndex = $currentMenu.index();
	} else if ( ($currentMenu = $('.current-post-ancestor', '#nav-menu')) && $currentMenu.length > 0 ) {
		activeIndex = $currentMenu.index();
	}
	$('#indicator').css('left', activeIndex * 100 + 'px').css('display', 'block');

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

	//go to top
	var $goTop = $("#go-top"),
		dis = 400,				//滑动距离
		isFadeIn = false;

	$(window).scroll(function() {
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

	$goTop.click(function() {
		$("html, body").animate({scrollTop: 0});
	});

});