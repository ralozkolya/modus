$(function(){

	$('.order-button').click(function(){

		if(isLoggedIn) {
			$('.cart-overlay').fadeIn();
		}

		else {
			$('#login-link').click();
		}

		return false;
	});

	$('#invoice-form').submit(function(){

		var data = formToObject(this);
		data.order = getOrder();

		post(data);

		return false;
	});
});

function getOrder() {

	var items = [];

	$('.amount').each(function(){
		items.push({
			id: $(this).attr('data-product-id'),
			amount: $(this).val(),
		});
	});

	return items;
}

function formToObject(form) {

	form = $(form);

    var o = {};
    var a = form.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};

function post(data) {

	var form = $('<form></form>');

    form.attr("method", "post");

    data.order = JSON.stringify(data.order);

    $.each(data, function(key, value) {
        var field = $('<input></input>');

        field.attr("type", "hidden");
        field.attr("name", key);
        field.attr("value", value);

        form.append(field);
    });

    $(document.body).append(form);
    form.submit();
}