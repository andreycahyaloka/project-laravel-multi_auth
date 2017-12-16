<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

<!-- jquery -->
<script src="{{ asset('storage/jquery/jquery-3.2.1.min.js') }}" crossorigin="anonymous"></script>

<!-- jquery ui -->
<script src="{{ asset('storage/jquery/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}" crossorigin="anonymous"></script>

<!-- popper -->
<script src="{{ asset('storage/jquery/popper.min.js') }}" crossorigin="anonymous"></script>

<!--bootstrap javascript-->
<script src="{{ asset('storage/bootstrap/bootstrap-4.0.0-beta.2-dist/js/bootstrap.min.js') }}" crossorigin="anonymous"></script>

<script>
// button go to top
	// When the user scrolls down 100px from the top of the document, show the button
	window.onscroll = function() {scrollFunction()};
	function scrollFunction() {
		if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
			document.getElementById("btnGoToTop").style.display = "block";
		} else {
			document.getElementById("btnGoToTop").style.display = "none";
		}
	}
	// When the user clicks on the button, scroll to the top of the document
	function topFunction() {
		document.body.scrollTop = 0; // For Chrome, Safari and Opera 
		document.documentElement.scrollTop = 0; // For IE and Firefox
	}

// sidenav
	/* Set the width of the side navigation to 250px */
	function openNav() {
		document.getElementById("mySidenav").style.width = "250px";
		document.getElementById("mySidenav").style.opacity = "1";
	}
	// side navbar background
	function openNavBG() {
		document.getElementById("mySidenavBG").style.width = "100%";
		document.getElementById("mySidenavBG").style.opacity = "0.5";
	}

	/* Set the width of the side navigation to 0 */
	function closeNav() {
		document.getElementById("mySidenav").style.width = "0%";
		document.getElementById("mySidenav").style.opacity = "0";
		document.getElementById("mySidenavBG").style.width = "0%";
		document.getElementById("mySidenavBG").style.opacity = "0";
	}
</script>