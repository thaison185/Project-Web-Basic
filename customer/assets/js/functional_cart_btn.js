$(document).ready(function() {
	$('.btn').click(function() {
		let id = $(this).data('id');
		let type = $(this).data('type');
		$.ajax({
			url: '../backend/progress_update_cart.php',
			type: 'GET',
			dataType: 'html',
			data: {
				id,
				type
			},
		})
		.done(function(response) {
			if (response.includes('success')) {
				if (response.includes('inc')) {
					update_cart_icon("+1");
					let quantity = parseInt($('#item-' + id + ' .span_quantity').html())+1;
					$('#item-' + id + ' .span_quantity').html(quantity);
				};
				if (response.includes('dec')) {
					update_cart_icon("-1");
					let quantity = parseInt($('#item-' + id + ' .span_quantity').html())-1;
					$('#item-' + id + ' .span_quantity').html(quantity);
					if (quantity == 0) {
						$("tr#item-" + id).remove();
					}
				};
				if (response.includes('del')) {
					let quantity = parseInt($('#item-' + id + ' .span_quantity').html());
					update_cart_icon("-" + quantity);
					$("tr#item-" + id).remove();
				};
				update_price_display();
			}
			if(response.includes('error')){
				$("#flash_msg").html(response.substr(8));
			};
		})
		
	});
});
	