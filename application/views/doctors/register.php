<div class="container-fluid">

<div class="row mt-2">
	<div class="col-md-12 col-sm-12">

		<div class="card">
		<article class="card-body">
			<h4 class="card-title mb-4 mt-1">Sign Up</h4>
			<!-- <p>
				<a href="" class="btn btn-block btn-outline-info"> <i class="fab fa-google"></i>Register via Google</a>
				<a href="" class="btn btn-block btn-outline-primary"> <i class="fab fa-facebook-f"></i>   Register via facebook</a>
			</p>
			<hr> -->
			<form class="needs-validation" action="<?= base_url('doctor/register') ?>" enctype="multipart/form-data" method="post" novalidate>
			<!-- row start -->
			<div class="row">
			<div class="col-md-6 col-sm-12">
			<div class="form-group">
				<input name="name" class="form-control" placeholder="Enter Your Name" type="text" required>
			</div> 
            <!-- form-group// -->
			<div class="form-group">
				<input name="fname" class="form-control" placeholder="Enter Your Father's Name" type="text" required>
			</div> 
            <!-- form-group// -->
			<div class="form-group">
				<input name="reg_id" class="form-control" placeholder="Enter Your registeration ID" type="text" required>
			</div> 
            <!-- form-group// -->  
			<div class="form-group">
                <label for="speciality">Your District</label>
                <select name="district" class="form-control">
				<?php foreach($districts as $dist) { ?>
                    <option value="<?= $dist['district_id'] ?>"><?= $dist['name'] ?></option>
				<?php } ?>
                </select>
			</div>
            <!-- form-group// -->	
			<div class="form-group">
				<input name="state" class="form-control" placeholder="Enter Your State or province" type="text" required>
			</div> 
			<!-- form-group// -->
			<!-- form-group// -->
            <div class="form-group">
				<textarea name="qualifications" class="form-control" placeholder="Enter Your Qualifications" required></textarea>
			</div> 
			<!-- form-group// -->
			<div class="form-group">
                <label for="speciality">Your Speciality</label>
                <select name="cat_id" class="form-control" id="speciality">
				<?php foreach($categories as $category) { ?>
                    <option value=<?= $category['id'] ?>><?= $category['name'] ?></option>
				<?php } ?>
                </select>
			</div>
            <!-- form-group// -->	
			<div class="form-group">
				<input name="address" class="form-control" placeholder="Enter Your clinic address" type="text" required>
			</div> 
			<!-- form-group// --> 
			<div class="form-group">
				<input name="contact" class="form-control" placeholder="Enter Your Contact Number" type="tel" required>
			</div> 
            <!-- form-group// -->
            <div class="form-group">
				<input name="email" class="form-control" placeholder="Enter Your Email" type="email" required>
			</div>
            <!-- form-group// -->
			<div class="form-group">
					<label for="image">Upload Your Picture</label>
				<input name="userfile" id="userfile" class="form-control" type="file" required>
			</div>
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
			</div>

			<!-- Appointment schedule -->
			<div class="col-md-6 col-sm-12 mt-5">
			<h4 class="text-center text-info">Make Appointment Schedule</h4>
			Open Days: <br>
			<div class="form-check-inline">
			<label class="form-check-label">
				<input name="mon" type="checkbox" class="form-check-input" value="1">Mon
			</label>
			</div>
			<div class="form-check-inline">
			<label class="form-check-label">
				<input name="tue" type="checkbox" class="form-check-input" value="1">Tue
			</label>
			</div>
			<div class="form-check-inline">
			<label class="form-check-label">
				<input name="wed" type="checkbox" class="form-check-input" value="1">Wed
			</label>
			</div>
			<div class="form-check-inline">
			<label class="form-check-label">
				<input name="thu" type="checkbox" class="form-check-input" value="1">Thu
			</label>
			</div>
			<div class="form-check-inline">
			<label class="form-check-label">
				<input name="fri" type="checkbox" class="form-check-input" value="1">Fri
			</label>
			</div>
			<div class="form-check-inline">
			<label class="form-check-label">
				<input name="sat" type="checkbox" class="form-check-input" value="1">Sat
			</label>
			</div>
            <div class="form-group">
				<input name="fee" class="form-control" placeholder="Your Fee" type="number" required>
			</div> 
			<!-- form-group// -->
			Appointments Time:
			<div class="form-group">
				<input name="time" class="form-control" placeholder="Appointments Time" type="time" required>
			</div> 
            <!-- form-group// -->  
			<div class="form-group">
				<input name="slots" class="form-control" placeholder="Number of Appointments per day" type="number" required>
			</div> 
			<!-- form-group// -->  
			</div>
			</div>
			<!-- row end -->

			                               
			<div class="row">
				<div class="offset-2 col-md-8">
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