$(document).ready(function() {
	var slideCounter;
	const slides = $('#slider input');
	// console.log(slides);
	setInterval(function () {
		for(var i = 0; i < slides.length; i++) {
			if (slides[i].checked == true) {
				slideCounter = i + 1;
				if (slideCounter == slides.length) {
					slideCounter = 0;
				}
				// console.log(i);
				slides[slideCounter].checked = true;
				break;
			}
		}
	},5000)
});