$(function(){

	$('.dropdown-menu a').click(function(){
		$('.search-toggle').html($(this).html());
	});
});