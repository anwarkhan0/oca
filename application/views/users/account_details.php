<div class="row mt-4 mb-5">
	<div class="offset-4 col-md-4 col-sm-12">
        <h2>Account Details</h2>
		<div class="card">
		<article class="card-body">
			<form  action="<?= base_url('user/update_profile') ?>"  method="post">
			<div class="form-group">
                <label for="name">Name:</label>
				<input name="name" class="form-control" value="<?= $record->name ?>" type="text">
			</div> <!-- form-group// -->
            <div class="form-group">
                <label for="cellNo">Phone No:</label>
				<input name="contact" class="form-control" value="<?= $record->contact ?>" type="number">
			</div> <!-- form-group// -->
            <div class="form-group">
                <label for="addr">district:</label>
				<input name="district" class="form-control" value="<?= $record->district ?>" type="text">
			</div> <!-- form-group// -->
			<div class="form-group">
                <label for="addr">state:</label>
				<input name="state" class="form-control" value="<?= $record->state ?>" type="text">
			</div> <!-- form-group// -->
            <div class="form-group">
                <label for="email">Email:</label>
				<input name="email" class="form-control" value="<?= $record->email ?>" type="email">
			</div> <!-- form-group// -->    
			<input type="hidden" name="id" value="<?= $record->id ?>">                            
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">Save Changes</button>
					</div> <!-- form-group// -->
				</div>
				                                         
			</div> <!-- .row// -->                                                                  
		</form>
		</article>
		</div> <!-- card.// -->

	</div>
</div>
