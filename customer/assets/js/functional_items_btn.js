$(document).ready(function($) {
	$(".btn_add_to_cart").click(function(event) {//console.log("btn_add");
  		event.preventDefault();

		let id = $(this).data('id');
		let type = $(this).data('type');
		let size = $("#item-" + id +" .item-size input:checked").val();
		let ice = $("#item-" + id +" .item-ice input:checked").val();
		let sugar = $("#item-" + id +" .item-sugar input:checked").val();
		
		$.ajax({
			url: '../backend/progress_add_to_cart.php',
			type: 'GET',
			dataType: 'html',
			data: {id, size, ice, sugar},
		})
		.done(function(response) {
			if(response.includes('success')){
				update_cart_icon("+1");
			};
			if(response.includes('error')){
				$("#flash_msg").html(response.substr(8));
			};
		})
		
	});
});