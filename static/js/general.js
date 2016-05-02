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

	$('.sidebar-category').click(function(e){
		$(this).toggleClass('open');
		$('ul', this).stop().slideToggle();
	});

});