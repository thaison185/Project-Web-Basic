document.addEventListener('DOMContentLoaded', () => {
var slideCounter;
const slides = document.querySelectorAll('#slider input');
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
})