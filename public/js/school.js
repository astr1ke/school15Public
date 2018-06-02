$(document).ready(function(){
	
	$('#main_menu li').hover(
		function () {
			clearTimeout($.data(this,'timer'));
			$('ul',this).stop(true,true).fadeIn(300);
		},
		function() {
			$.data(this,'timer', setTimeout($.proxy(function() {
			$('ul',this).stop(true,true).fadeOut(200);
		}, this), 100));
	});

	
	var $header = $('#header');
	var headerHeight = $header.outerHeight();
	var topOffset = 0;
	
	$(window).scroll(function(){

		// fixed header
		if ($(this).scrollTop() > headerHeight && !$header.hasClass('fixed') && !$header.hasClass('static-imp')) {
			$('body').offset({top:headerHeight});
			$header.addClass('fixed').hide().fadeIn(500);
		} else if ($(this).scrollTop() <= topOffset && $header.hasClass('fixed')) {
			$('body').offset({top:0});
			$header.removeClass('fixed');	
		}

		// scrollToTop button appear
		if ($(this).scrollTop() > $(this).height() / 2) {
			$('.up-button').fadeIn();
		} else {
			$('.up-button').fadeOut();
		}
	});

	// top offset when anchor click
	var locationHash = location.hash.match(/#/);

	if (locationHash != null)
	{
		$(window).load(function () {

			var headerOffset = $(this).scrollTop() - $header.height();
			$(this).scrollTop(headerOffset);
			
		});
	}

	
});