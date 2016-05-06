$(function(){

	$('.add-to-cart, .added-to-cart').click(function(){

		var id = $(this).attr('data-id');

		if($(this).hasClass('add-to-cart')) {
			$.get(addToCartUrl + id, function(r){
				if(r.status === 'success') {
					var cart = $('.cart').html();

					cart = cart.replace(/\(([^)]+)\)/, '('+r.item_count+')');

					$('.cart').html(cart);

					$('.add-to-cart').removeClass('add-to-cart')
						.addClass('added-to-cart');
					
					$('.lbl').html(lang.added);

					$('.fa-plus').removeClass('fa-plus').addClass('fa-check');
				}
			});
		}

		else {
			$.get(removeFromCartUrl + id, function(r){
				if(r.status === 'success') {
					var cart = $('.cart').html();

					cart = cart.replace(/\(([^)]+)\)/, '('+r.item_count+')');

					$('.cart').html(cart);

					$('.added-to-cart').removeClass('added-to-cart')
						.addClass('add-to-cart');
					
					$('.lbl').html(lang.add);

					$('.fa-check').removeClass('fa-check').addClass('fa-plus');
				}
			});
		}

		return false;
	});

	$('.thumb').click(function(){
		$('.preview').attr('src', $(this).attr('src'));
	});

	$('#zoom').anythingZoomer({
		edit: true,
		clone: true,
	});
});