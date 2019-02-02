	<script src="jquery.js"></script>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	
		<script>
			//log in vs sign up//
			$(".toggleForm").click(function(){
				$("#SignUpForm").toggle();
				$("#LogInForm").toggle();
			});			
			//update the content
			$("#notebook").on('input propertychange', function() {
				$.ajax({
					  method: "POST",
					  url: "updatedatabase.php",
					  data: {content: $("#notebook").val()}
					})
					.done(function(msg) {
					  alert("Data Saved: " + msg);
					})
					.error(function(err){
					  console.log(err.statusText)
					})
				})
		</script>
	</body>
</html>