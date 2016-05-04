$(function(){

	$('.add-to-cart').click(function(){
		var id = $(this).attr('data-id');

		$.get(addToCartUrl + id, function(r){
			if(r.status === 'success') {
				var cart = $('.cart').html();

				cart = cart.replace(/\(([^)]+)\)/, '('+r.item_count+')');

				$('.cart').html(cart);
			}
		});

		return false;
	});
});