
<!-- latest jquery-->
<script src="../assets/js/jquery-3.3.1.min.js"></script>

<!-- popper js-->
<script src="../assets/js/popper.min.js"></script>

<!-- slick js-->
<script src="../assets/js/slick.js"></script>

<!-- menu js-->
<script src="../assets/js/menu.js"></script>

<!-- lazyload js-->
<script src="../assets/js/lazysizes.min.js"></script>

<!-- Bootstrap js-->
<script src="../assets/js/bootstrap.js"></script>

<!-- Bootstrap Notification js-->
<script src="../assets/js/bootstrap-notify.min.js"></script>

<!-- Theme js-->
<script src="../assets/js/script.js"></script>

<!-- Angular JS -->
<script src="../assets/js/angular1.7.9.min.js"></script>
<script src="../controllers/mainCTRL.js"></script>

<!--script sweet alert-->
<script src="../assets/js/sweet-alert.min.js"></script>

<!-- Utils -->
<script src="../utils/config.js"></script>
<script src="../utils/request.js"></script>
<script src="../utils/cookies.js"></script>
<script src="../utils/date_utils.js"></script>


<script>
	$(window).on('load', function() {
		$('#exampleModal').modal('show');
	});

	function openSearch() {
		window.location.href='search_product.html'
		// document.getElementById("search-overlay").style.display = "block";
	}

	function closeSearch() {
		document.getElementById("search-overlay").style.display = "none";
	}
</script>
</body>

</html>
