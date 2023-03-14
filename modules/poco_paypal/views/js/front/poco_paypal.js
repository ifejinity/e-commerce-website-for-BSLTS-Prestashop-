$(function(){
	$('#payment_paypal_express_checkout').click(function() {
		$('#paypal_payment_form').submit();
		return false;
	});

	$('#paypal_payment_form').on('submit', function() {
		var nb = $('#quantity_wanted').val();

		$('#paypal_payment_form input[name=quantity]').val(nb);
	});

	prestashop.on('updatedProduct', function (event) {
		$('[name=id_p_attr]').val(event.id_product_attribute);
		var id_product = $('input[name="id_product"]').val();
		$.ajax({
			type: "GET",
			url: prestashop.urls.base_url+'/modules/poco_paypal/express_checkout/ajax.php',
			data: { get_qty: "1", id_product: id_product, id_product_attribute: event.id_product_attribute },
			cache: false,
			success: function(result) {
				if (result >= '1')
					$('#container_express_checkout').slideDown();
				else
					$('#container_express_checkout').slideUp();
				return true;
			}
		});
	});
});