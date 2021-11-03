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

		// Docs Table Filter
		var jobCount = $('.docs-list .in').length;
		$('.docs-list-count').text(jobCount + ' items');

		$("#search-text").keyup(function () {
			//$(this).addClass('hidden');

			var searchTerm = $("#search-text").val();
			var listItem = $('.docs-list').children('li');

			var searchSplit = searchTerm.replace(/ /g, "'):containsi('")

			//extends :contains to be case insensitive
			$.extend($.expr[':'], {
				'containsi': function(elem, i, match, array)
				{
					return (elem.textContent || elem.innerText || '').toLowerCase()
						.indexOf((match[3] || "").toLowerCase()) >= 0;
				}
			});


			$(".docs-list li .doc-title").not(":containsi('" + searchSplit + "')").each(function(e)   {
				$(this).parent().addClass('hiding out').removeClass('in');
				setTimeout(function() {
					$('.out').addClass('hidden');
				}, 300);
			});

			$(".docs-list li .doc-title:containsi('" + searchSplit + "')").each(function(e) {
				$(this).parent().removeClass('hidden out').addClass('in');
				setTimeout(function() {
					$('.in').removeClass('hiding');
				}, 1);
			});


			var jobCount = $('.docs-list .in').length;
			$('.docs-list-count').text(jobCount + ' items');

			//shows empty state text when no jobs found
			if(jobCount == '0') {
				$('.docs-list').addClass('empty');
			}
			else {
				$('.docs-list').removeClass('empty');
			}
		});

	});
})( jQuery );




