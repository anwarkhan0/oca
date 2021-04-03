
<div class="row mt-4 mb-5">
	<div class="offset-2 col-md-8 col-sm-12">
        <h2>Account Details</h2>
		<div class="card">
		<article class="card-body">
			<form enctype="multipart/form-data" method="post"  action="<?= base_url('doctor/update_profile')?>">
            
            <div class="form-group">
			<div class="text-center">
				<img class="img-fluid rounded-circle w-25" src="<?= base_url('assets/photo/').$record->pic ?>" alt="">
				<p>Upload New Image:</p>
				<input name="userfile" type="file" class="form-control-file border">
			</div>
                
			</div> <!-- form-group// -->
			<div class="form-group">
                <label for="name">Name:</label>
				<input name="name" class="form-control" value="<?= $record->name ?>" type="text">
			</div> <!-- form-group// -->
			<div class="form-group">
                <label for="fname">Father Name:</label>
				<input name="fname" class="form-control" value="<?= $record->father_name ?>" type="text">
			</div> <!-- form-group// -->
			<div class="form-group">
                <label for="regID">Registeration ID:</label>
				<input name="reg_id" class="form-control" value="<?= $record->reg_id ?>" type="number">
			</div> <!-- form-group// -->
            <div class="form-group">
                <label for="cellNo">Phone No:</label>
				<input name="contact" class="form-control" value="<?= $record->contact ?>" type="number">
			</div> <!-- form-group// -->
            <div class="form-group">
				<label for="district">District:</label>
				<input name="district" class="form-control" value="<?= $record->district ?>" type="text">
				<label for="district">State or Province:</label>
				<input name="state" class="form-control" value="<?= $record->state ?>" type="text">
			</div> <!-- form-group// -->
			<div class="form-group">
				<label for="address">Address:</label>
				<input name="address" class="form-control" value="<?= $record->address ?>" type="text">
			</div> <!-- form-group// -->
            <div class="form-group">
                <label for="email">Email:</label>
				<input name="email" class="form-control" value="<?= $record->email ?>" type="email">
			</div> <!-- form-group// -->            
            <div class="form-group">
                <label for="speciality">Your Speciality</label>
                <select name="cat_id" class="form-control" id="speciality">
				<?php foreach($categories as $category) { ?>
                    <option value="<?= $category['id'] ?>" <?php if($category['id']==$record->cat_id)echo 'selected'; ?>><?= $category['name'] ?></option>
				<?php } ?>
                </select>
			</div>
            <!-- form-group// -->	
			<div class="form-group">
                <label for="qualification">Qualification:</label>
				<input name="qualifications" class="form-control" value="<?= $record->qualifications ?>" type="text">
			</div> <!-- form-group// -->
            <div class="form-group">
                <label for="Fee">Fee:</label>
				<input name="fee" class="form-control" value="<?= $record->fee ?>" type="number">
			</div> <!-- form-group// -->  
			Meeting Days: <br>
			<?php $days = array(
				'mon' => '<div class="form-check-inline">
				<label class="form-check-label">
					<input name="mon" type="checkbox" class="form-check-input" value="1">Mon
				</label>
				</div>',
				'tue' => '<div class="form-check-inline">
				<label class="form-check-label">
					<input name="tue" type="checkbox" class="form-check-input" value="1">Tue
				</label>
				</div>',
				'wed' => '<div class="form-check-inline">
				<label class="form-check-label">
					<input name="wed" type="checkbox" class="form-check-input" value="1">Wed
				</label>
				</div>',
				'thu' => '<div class="form-check-inline">
				<label class="form-check-label">
					<input name="thu" type="checkbox" class="form-check-input" value="1">Thu
				</label>
				</div>',
				'fri' => '<div class="form-check-inline">
				<label class="form-check-label">
					<input name="fri" type="checkbox" class="form-check-input" value="1">Fri
				</label>
				</div>',
				'sat' => '<div class="form-check-inline">
				<label class="form-check-label">
					<input name="sat" type="checkbox" class="form-check-input" value="1">Sat
				</label>
				</div>'
			); ?>
			<?php foreach($slots as $slot){ 
				if ($slot['day'] == 1) {
					$days['mon'] = '<div class="form-check-inline">
					<label class="form-check-label">
						<input name="mon" type="checkbox" class="form-check-input" value="1" checked>Mon
					</label>
					</div>';
				 } elseif($slot['day'] == 2) { 
					 $days['tue'] = '<div class="form-check-inline">
					 <label class="form-check-label">
						 <input name="tue" type="checkbox" class="form-check-input" value="1" checked>Tue
					 </label>
					 </div>';
				  }elseif($slot['day'] == 3) { 
					  $days['wed'] = '<div class="form-check-inline">
					  <label class="form-check-label">
						  <input name="wed" type="checkbox" class="form-check-input" value="1" checked>Wed
					  </label>
					  </div>';
				   }elseif($slot['day'] == 4) { 
					   $days['thu'] = '<div class="form-check-inline">
					   <label class="form-check-label">
						   <input name="thu" type="checkbox" class="form-check-input" value="1" checked>Thu
					   </label>
					   </div>';
				    }elseif($slot['day'] == 5) { 
						$days['fri'] = '<div class="form-check-inline">
						<label class="form-check-label">
							<input name="fri" type="checkbox" class="form-check-input" value="1" checked>Fri
						</label>
						</div>';
					 }elseif($slot['day'] == 6){ 
						 $days['sat'] = '<div class="form-check-inline">
						 <label class="form-check-label">
							 <input name="sat" type="checkbox" class="form-check-input" value="1" checked>Sat
						 </label>
						 </div>';
					 } } ?>
			
			<?php foreach($days as $day){
				echo $day;
			} ?>
			 
			<!-- form-group// -->
			<div class="form-group">
                <label for="week appointments">Appointments per week:</label>
				<input name="slots" class="form-control" value="<?= $slots[0]['total_slots'] ?>" type="number">
			</div> <!-- form-group// -->     
			<div class="form-group">
                <label for="time">Time:</label>
				<input name="time" class="form-control" value="<?= $record->time ?>" type="time">
			</div> <!-- form-group// -->         
			<input name="picture" type="hidden" value="<?= $record->pic ?>">    
			<input type="hidden" name="id" value="<?= $record->doc_id ?>">         
			<div class="row">
				<div class="offset-2 col-md-8">
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
