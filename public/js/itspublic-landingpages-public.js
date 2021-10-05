(function( $ ) {
	$( document ).ready(function() {
		// Implementing Slider on City Landing Page sections
		$('.lp-section-slider').slick({
			dots: false,
			infinite: true,
			speed: 300,
			slidesToShow: 5,
			prevArrow: '<button class="slide-arrow prev-arrow"><i class="fas fa-arrow-left"></i></button>',
			nextArrow: '<button class="slide-arrow next-arrow"><i class="fas fa-arrow-right"></i></button>',
			responsive: [
				{
					breakpoint: 1200,
					settings: {
						slidesToShow: 4
					}
				},
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: 3
					}
				},
				{
					breakpoint: 768,
					settings: {
						slidesToShow: 2
					}
				},
				{
					breakpoint: 575,
					settings: {
						slidesToShow: 2
					}
				},
				{
					breakpoint: 481,
					settings: {
						slidesToShow: 1
					}
				}
			]
		});
		// City Landing Page Members z-index Fix
		const lpMembers = document.querySelectorAll(".lp-contact-person-box");
		let lpMembersCount = lpMembers.length;
		lpMembers.forEach(member);
		function member(key,val){
			lpMembers[val].style.zIndex = lpMembersCount;
			lpMembersCount--;
		}
	});
})( jQuery );


