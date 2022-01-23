function update_price_display() {
	let item_price_per_item_list = $(".item_price_per_item .span_price_per_item");
	let item_quantity_list = $(".item_quantity .span_quantity");
	let item_price_list = $(".item_price .span_price");
	let total = 0;
	let total_quantity = 0;

	for (var index = 0; index < item_price_list.length; index++) {
		item_price_list[index].innerHTML = item_price_per_item_list[index].innerHTML 
												* item_quantity_list[index].innerHTML;
		total += parseInt(item_price_list[index].innerHTML);
		total_quantity += parseInt(item_quantity_list[index].innerHTML);
	}
	if (total_quantity == 0) {
		location.reload();
	}

	$(".span_total").html(total);


	let cart_quantity = $(".cart-quantity").html();
	if(parseInt(cart_quantity) == 9 || cart_quantity == "9+")
		cart_quantity = "9+";
	else
		cart_quantity++;
	if ($(".cart i").hasClass('ti-shopping-cart')) {
		$(".cart-quantity").html(cart_quantity);
		$(".cart i").removeClass('ti-shopping-cart');
		$(".cart i").addClass('ti-shopping-cart-full');
		$(".cart-quantity").css({
			display: 'block'
		});
	}
}

function update_cart_icon(arg) {//console.log(arg);
	if (arg.includes("+")) {
		let quantity = parseInt(arg.substr(1));
		let cart_quantity = parseInt($(".cart-quantity").attr("value"))+quantity;
		$(".cart-quantity").attr("value",cart_quantity);
		
		if(cart_quantity > 9)
			$(".cart-quantity").html("9+");
		else
			$(".cart-quantity").html(cart_quantity);

		if ($(".cart i").hasClass('ti-shopping-cart')) {
			$(".cart i").removeClass('ti-shopping-cart');
			$(".cart i").addClass('ti-shopping-cart-full');
			$(".cart-quantity").css({
				display: 'block'
			});
		}
	};
	if (arg.includes("-")) {
		let quantity = parseInt(arg.substr(1));
		let cart_quantity = parseInt($(".cart-quantity").attr("value"))-quantity;
		$(".cart-quantity").attr("value",cart_quantity);
		
		if(parseInt(cart_quantity) > 9)
			$(".cart-quantity").html("9+");
		else
			$(".cart-quantity").html(cart_quantity);

		// if ($(".cart i").hasClass('ti-shopping-cart-full') && cart_quantity == 0) {
		// 	$(".cart-quantity").html(cart_quantity);
		// 	$(".cart i").removeClass('ti-shopping-cart');
		// 	$(".cart i").addClass('ti-shopping-cart-full');
		// 	$(".cart-quantity").css({
		// 		display: 'block'
		// 	});
		// }
	}
}