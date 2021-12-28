document.addEventListener('DOMContentLoaded', () => {
var slideCounter;
const slides = document.querySelectorAll('#slider input');
// console.log(slides);
setInterval(function () {
	slides.forEach((input, index) => {
		if (input.checked == true) {
			slideCounter = index + 1;
			if (slideCounter = 4) {
				slideCounter = 1;
			}
			slides[slideCounter].checked = true;
		}
	}
			)
},5000)
})