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

	
	$('.nyroModal').nyroModal();

	if ($('#yamap_container').length)
	{
		$.getScript("https://api-maps.yandex.ru/2.1/?lang=ru_RU", function(){
	
			ymaps.ready(function() {

				var LocationMap = new ymaps.Map("yamap_container", {
					center: [55.815320,37.037163],
					type: 'yandex#map',
					zoom: 15,
					controls: ["zoomControl", "searchControl", "routeEditor", "trafficControl", "typeSelector"]
				});
				
				LocationMap.behaviors.disable("scrollZoom");

				var LocationMark = new ymaps.Placemark([55.814927,37.037018], {
					balloonContentHeader: '<div class="title">Международная школа Wunderpark</div>',
					balloonContentBody: '<div class="body"><p>23 км от МКАД <br />по Новорижскому шоссе</p> <p>+ 7 (495) 122-000-2</p></div>',
					balloonContentFooter: '<a rel="nofollow" href="http://wunderpark.ru/uploads/map_print_rus.pdf" target="_blank">Распечатать карту</a>'
				}, {
					preset: 'islands#clusterIcon',
					iconColor: '#3B73B9',
					iconLayout: "default#image",
					iconImageHref: "assets/images/wp-mark.png",
					iconImageSize: [51, 81],
					iconImageOffset: [-25, -68]
				});

				LocationMap.geoObjects.add(LocationMark);
			});
		});
	}
	
});