var addToCartUrl = baseUrl + 'add_to_cart/';
var removeFromCartUrl = baseUrl + 'remove_from_cart/';

var slideDuration = 400;

$(function(){

	$('.dropdown-menu a').click(function(){
		$('.search-toggle').html($(this).html());
	});

	$('#login-link').click(function() {
		$('.login-overlay').fadeIn();
		$('#login-form #email').focus();
		return false;
	});

	$('.login-overlay').click(function(e){
		if($(e.target).hasClass('login-overlay')) {
			$(this).fadeOut();
		}
	});

	$('.close-button').click(function(){
		$('.login-overlay').fadeOut();
	});

	$('.category-link').click(function(){
		$('.sidebar-category').val($(this).attr('data-category'));
		filterProducts();
		return false;
	});

	$('.category-dropdown').click(function(){
		$('.header-category').val($(this).attr('data-id'));
	});

	$('.brand-check').change(filterProducts);

	$('.price-input').change(filterProducts);

	$('.sidebar-category > .fa').click(function(e){
		$(this).toggleClass('open');
		$(this).next('ul').stop().slideToggle(slideDuration);
		slideDuration = 400;
	});

	init();

});

function init() {

	slideDuration = 0;

	$('.fa.active').click();

	$('.category-link.active').parent().parent().prev().click();

	$('input[name="category"]').val($('.category-link.active').attr('data-category'));

	slideDuration = 400;

	if(window.category && !isNaN(+category)) {
		$('.category-dropdown[data-id=' + category + ']').click();
	}
}

function filterProducts() {

	$('#filter-form').submit();

	return false;
}