$(function(){
	$('.slider').unslider({
		autoplay: true,
		arrows: false,
		delay: 7000,
	});

	$('.dropdown-menu a').click(function(){
		$('.search-toggle').html($(this).html());
	});
});