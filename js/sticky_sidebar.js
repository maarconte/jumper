	// activate if window is wider than...
var stickyWindowWidth = 767;

var stickyActiveDown = false;
var activeSticky = false;
var bottomedOut = false;

$(window).on('scroll resize load', function() {
	// only activate sticky sidebar if the window is bigger than 767px
	if ($(window).width() > stickyWindowWidth) {

		var contentHeight = $("#primary").outerHeight();
		var sidebarHeight = $("#secondary").outerHeight();

		var windowTop = $(window).scrollTop() - $(".site-header").outerHeight() - 50;

		var contentTop = $("#primary").offset().top;
		var sidebarTop = $("#secondary").offset().top;

		var contentBottom = $("#primary").offset().top + contentHeight;
		var sidebarBottom = $("#secondary").offset().top + sidebarHeight;

		if (activeSticky === true && bottomedOut === false) {
			$("#secondary").css({
				top: windowTop + 'px'
			});
		}

		// while scrolling DOWN(from above the content), placing the sidebar in its FIXED position. 
		if (stickyActiveDown === false && windowTop > contentTop) {
			stickyActiveDown = true;
			activeSticky = true;
			bottomedOut = false;
			$("#secondary").addClass("sticky");
		}
		// while scrolling UP(from below the bottom of the content), placing the sidebar in its FIXED position.
		if (windowTop < sidebarTop && windowTop < contentBottom) {
			stickyActiveDown = false;
			activeSticky = true;
			$("#secondary").addClass("sticky");
			$("#secondary").removeClass("stickyBottom");
			$("#secondary").css({
				top: windowTop + 'px'
			});
		}
		// while scrolling DOWN(past the bottom of the content), if the sidebarBottom touches the contentBottom 
		if (stickyActiveDown === true && sidebarBottom >= contentBottom) {
			if(bottomedOut === false){
				console.log("BOTTMED OUT");
			
				stickyActiveDown = false;
				activeSticky = false;
				bottomedOut = true;
				movePos = contentBottom - sidebarHeight;
				$("#secondary").addClass("stickyBottom");
				$("#secondary").css({
					top: movePos + 'px'
				});
			}
		}
		// while scrolling UP(back above the top of the content), placing the sidebar in its "NATURAL" position.
		if (stickyActiveDown === false && contentTop >
				windowTop) {
			stickyActiveDown = false;
			activeSticky = false;
			bottomedOut = false;
			$("#secondary").removeAttr("style");
			$("#secondary").removeClass("sticky");
		}
	}
});