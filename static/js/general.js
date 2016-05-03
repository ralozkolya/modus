$(function(){

	$('.dropdown-menu a').click(function(){
		$('.search-toggle').html($(this).html());
	});

	$('#login-link').click(function(){
		$('.login-overlay').fadeIn();
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

		$('input[name="category"]').val($(this).attr('data-category'));

		$('#filter-form').submit();

		return false;
	});

	$('.sidebar-category > .fa').click(function(e){
		$(this).toggleClass('open');
		$(this).next('ul').stop().slideToggle();
	});

	$('.fa.expanded').click();

	$('.category-link.expanded').parent().parent().prev().click();

});