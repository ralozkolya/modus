$(function(){
	
	$('.slider').unslider({
		autoplay: true,
		arrows: false,
		delay: 7000,
	});

	$('.grid').isotope({
		layoutMode: 'masonry',
	});
});