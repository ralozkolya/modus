$(function(){

	$('.glyphicon-remove').click(function(){

		var t = $(this);
		var id = t.attr('data-id');

		$.get(removeFromCartUrl + id, function(r){
			if(r.status === 'success') {
				var cart = $('.cart').html();

				cart = cart.replace(/\(([^)]+)\)/, '('+r.item_count+')');

				$('.cart').html(cart);

				$('.added-to-cart').removeClass('added-to-cart')
					.addClass('add-to-cart');

				$('.fa-check').removeClass('fa-check').addClass('fa-plus');

				t.parent().parent().remove();
			}
		});
	});

});