<div class="row mt-2">
	<div class="offset-4 col-md-4 col-sm-12">
    <h2>change password</h2>
		<div class="card">
		<article class="card-body">
			<form class="needs-validation" novalidate>
            
			<div class="form-group">
            <label for="newpass">New Password:</label>
				<input class="form-control"  type="password" required>
			</div> <!-- form-group// -->    
            <div class="form-group">
            <label for="cnfmpass">Confirm Password</label>
				<input class="form-control" type="password" required>
			</div> <!-- form-group// -->                                   
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block"> Register </button>
					</div> <!-- form-group// -->
				</div>                                         
			</div> <!-- .row// -->                                                                  
		</form>
		</article>
		</div> <!-- card.// -->

	</div>
</div>

<script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>