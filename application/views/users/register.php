<div class="container-fluid">

<div class="row mt-2">
	<div class="offset-4 col-md-4 col-sm-12">

		<div class="card">
		<article class="card-body">
			<h4 class="card-title mb-4 mt-1">Sign Up</h4>
			<!-- <p>
				<a href="" class="btn btn-block btn-outline-info"> <i class="fab fa-google"></i>Register via Google</a>
				<a href="" class="btn btn-block btn-outline-primary"> <i class="fab fa-facebook-f"></i>   Register via facebook</a>
			</p>
			<hr> -->
			<form class="needs-validation" action="<?= base_url('user/register') ?>" enctype="multipart/form-data" method="post" novalidate>
			<div class="form-group">
				<input name="name" class="form-control" placeholder="Enter Your Name" type="text" required>
			</div> 
            <!-- form-group// -->
			<div class="form-group">
				<input name="district" class="form-control" placeholder="Enter Your District" type="text" required>
			</div> 
            <!-- form-group// -->
			<div class="form-group">
				<input name="state" class="form-control" placeholder="Enter Your State or province" type="text" required>
			</div> 
            <!-- form-group// -->
            <div class="form-group">
				<input name="contact" class="form-control" placeholder="Enter Your Contact Number" type="number" required>
			</div> 
            <!-- form-group// -->
            <div class="form-group">
				<input name="email" class="form-control" placeholder="Enter Your Email" type="email" required>
			</div>
            <!-- form-group// -->
			<!-- <div class="form-group">
					<label for="image">Upload Your Picture</label>
				<input name="userfile" id="userfile" class="form-control" type="file" required>
			</div> -->
            <!-- form-group// -->  		
			<div class="form-group">
			<label for="pass">Password:</label>
				<input name="pass" class="form-control"  type="password" required>
			</div> 
            <!-- form-group// -->    
            <div class="form-group">
				<input class="form-control" placeholder="confirm password" type="cnfm-password" required>
			</div> 
            <!-- form-group// -->                                   
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block"> Register </button>
					</div> 
                    <!-- form-group// -->
				</div>                                         
			</div> <!-- .row// -->                                                                  
		</form>
		</article>
		</div> <!-- card.// -->

	</div>
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