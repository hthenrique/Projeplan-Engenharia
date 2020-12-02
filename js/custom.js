/* ============================================================
 * bootstrap-portfilter.js for Bootstrap v2.3.1
 * ============================================================*/
! function (d) {
	var c = "portfilter";
	var b = function (e) {
		this.$element = d(e);
		this.stuff = d("[data-tag]");
		this.target = this.$element.data("target") || ""
	};
	b.prototype.filter = function (g) {
		var e = [],
			f = this.target;
		this.stuff.fadeOut("fast").promise().done(function () {
			d(this).each(function () {
				if (d(this).data("tag") == f || f == "all") {
					e.push(this)
				}
			});
			d(e).show()
		})
	};
	var a = d.fn[c];
	d.fn[c] = function (e) {
		return this.each(function () {
			var g = d(this),
				f = g.data(c);
			if (!f) {
				g.data(c, (f = new b(this)))
			}
			if (e == "filter") {
				f.filter()
			}
		})
	};
	d.fn[c].defaults = {};
	d.fn[c].Constructor = b;
	d.fn[c].noConflict = function () {
		d.fn[c] = a;
		return this
	};
	d(document).on("click.portfilter.data-api", "[data-toggle^=portfilter]", function (f) {
		d(this).portfilter("filter")
	})
}(window.jQuery);

/* ============================================================
   When the user clicks anywhere outside of the modal, close it
 * ============================================================*/



mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
	scrollFunction()
};

function scrollFunction() {
	if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
		mybutton.style.display = "block";
	} else {
		mybutton.style.display = "none";
	}
}

// When the user clicks on the button, scroll to the top of the document

function topFunction() {
	document.body.scrollTop = 0; // For Safari
	document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

//When the user click on the link and hide,scroll to the document

$(function () {
	var navMain = $(".navbar-collapse");

	navMain.on("click", "a", null, function () {
		navMain.collapse('hide');
	});
});


// header fixed on scroll

$(window).on("scroll", function () {
	if ($(window).scrollTop() > 50) {
		$("header").addClass("active");
	} else {
		//remove the background property so it comes transparent again (defined in your css)
		$("header").removeClass("active");
	}
});


//animate.aos

$(document).ready(function ($) {
	if (screen.width > 1024) {
		AOS.init({
			easing: 'ease-in-out-sine',
			once: true,
		});
	}
});


//services-owl-carousel

jQuery(document).ready(function ($) {
	$('.loop').owlCarousel({
		center: true,
		loop: true,
		nav: false,
		dots: true,
		margin: 150,
		// autoplay: true,
		// slideTransition: 'linear',
		// autoplayTimeout: 2000,
		// autoplaySpeed: 1000,
		// autoplayHoverPause: true,
		responsive: {
			0: {
				items: 1
			},
			1024: {
				items: 2
			},
			1920: {
				items: 3
			},
		}
	});
});





// owl-carousel

$(document).ready(function () {
	$('.owl-carousel').owlCarousel({
		loop: true,
		margin: 10,
		nav: true,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 3
			},
			1024: {
				items: 4
			},
			1366: {
				items: 5
			}
		}
	});
});


// carousel

$('.carousel.carousel-multi-item.v-2 .carousel-item').each(function () {
	var next = $(this).next();
	if (!next.length) {
		next = $(this).siblings(':first');
	}
	next.children(':first-child').clone().appendTo($(this));

	for (var i = 0; i < 4; i++) {
		next = next.next();
		if (!next.length) {
			next = $(this).siblings(':first');
		}
		next.children(':first-child').clone().appendTo($(this));
	}
});




//Lightbox (Modal Image Gallery)
function openModal() {
	document.getElementById('myModal').style.display = "block";
}

function closeModal() {
	document.getElementById('myModal').style.display = "none";
}
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
	showSlides(slideIndex += n);
}

function currentSlide(n) {
	showSlides(slideIndex = n);
}

function showSlides(n) {
	var i;
	var slides = document.getElementsByClassName("mySlides");
	var dots = document.getElementsByClassName("demo");
	var captionText = document.getElementById("caption");
	if (n > slides.length) {
		slideIndex = 1
	}
	if (n < 1) {
		slideIndex = slides.length
	}
	for (i = 0; i < slides.length; i++) {
		slides[i].style.display = "none";
	}
	for (i = 0; i < dots.length; i++) {
		dots[i].className = dots[i].className.replace(" active");
	}
	slides[slideIndex - 1].style.display = "block";
}
