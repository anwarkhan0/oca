<div class="container">

<div class="row mt-4 mb-5">
	<div class="offset-md-4 col-md-4 col-sm-12">
		<div class="card">
		<article class="card-body">
			<a href="<?= base_url('doctor/register-form') ?>" class="float-right btn btn-outline-primary">Sign up</a>
			<h4 class="card-title mb-4 mt-1">Doctor Sign in</h4>
			<!-- <p>
				<a href="" class="btn btn-block btn-outline-info"> <i class="fab fa-google"></i>   Login via google</a>
				<a href="" class="btn btn-block btn-outline-primary"> <i class="fab fa-facebook-f"></i>   Login via facebook</a>
			</p>
			<hr> -->
			<form action="<?= base_url('doctor/doc_login') ?>" method="post">
			<div class="form-group">
				<input name="regID" class="form-control" placeholder="Registiration ID" type="text">
			</div> <!-- form-group// -->
			<div class="form-group">
				<input name="password" class="form-control" placeholder="******" type="password">
			</div> <!-- form-group// -->                                      
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block"> Login  </button>
					</div> <!-- form-group// -->
				</div>
				<div class="col-md-6 text-right">
					<a class="small" href="#">Forgot password?</a>
				</div>                                            
			</div> <!-- .row// -->                                                                  
		</form>
		</article>
		</div> <!-- card.// -->

	</div>
</div>

</div>
