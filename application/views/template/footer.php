   
   
<!-- footer section --> 

<footer>
<div class="container-fluid">
	<div class="row fsection">
		<div class="col-lg-4 col-md-4" id="contact">
			<p>Category</p> <hr>
		
			<ul class="nav">
				<li class="nav-item">
					<a class="nav-link" href="#">Search for Doctors</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Contact with Doctors</a>
				</li>
			</ul>
		</div>
			<div class="col-lg-4 col-md-4">
				<p>Contact: </p> <hr>
				<p>Anwar khan<br>
				dev@gmail.com <br>
				Cell: 973869824232</p>
				<span style="color: red;font-size: 15px">&copy;<?php echo date('Y'); ?>-All Rights Reserved</span>
			</div>
			<div class="col-lg-4 col-md-4">
				<p>Connect with Us</p> <hr>
				<a href="" ><img src="<?= base_url()?>assets/img/fb-free.png" alt="facebok"></a>
				<a href=""><img src="<?= base_url()?>assets/img/gogle-plud-free.png" alt="google-plus"></a>
				<a href=""><img src="<?= base_url()?>assets/img/twitter.png" alt="twitter"></a>
				
			</div>
	</div>
		
	</div>
</footer>

<!-- footer section Ends--> 

        <!-- <script>
      // Initialize and add the map
      function initMap() {
        // The location of Uluru
        const uluru = { lat: 35.222710, lng: 72.425812 };
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 12,
          center: uluru,
        });
        // The marker, positioned at Uluru
        const marker = new google.maps.Marker({
          position: uluru,
          map: map,
        });
      }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIXCURzmOWQn1sKd7OAPbs4oHWgeMQBIE&callback=initMap"
  type="text/javascript"></script> -->
  
  <!-- jQuery library -->
<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>

<!-- Popper JS -->
<script src="<?= base_url('assets/js/popper.min.js') ?>"></script>

<!-- Latest compiled JavaScript -->
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>

<!-- my Script -->
<script src="<?= base_url('assets/js/myScript.js') ?>"></script>


</body>
</html>
