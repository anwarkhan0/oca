<!-- first block of appointment getting -->
<h1 class="text-center mt-4">Appointments Tracker</h1>
<section class="search-sec">
    <div class="container">
        <form action="<?= base_url('available-doctors') ?>" method="post" novalidate="novalidate">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        
                         <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                            <select class="form-control search-slt" id="expertise" name="cat_id">
                              <?php foreach($categories as $category) { ?>
                              <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                              <?php } ?>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                            <select class="form-control search-slt" name="district">
                                <option value="<?= $this->session->district ?>">district</option>
                                <option value="1">swat</option>
                                <option value="2">peshawer</option>
                                <option value="3">mardan</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                            <button type="submit" class="btn btn-info wrn-btn" id="getAppointment"><i class="fas fa-crosshairs" style="font-size: 26px;"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- second block of search doc by name -->
<div id="homeSearchbody">
    OR <br>
    <h2>Search Doctor by Name</h2>
<div class="container h-100">
      <div class="d-flex justify-content-center h-100">
          <form action="<?= base_url('doctor/search_doc') ?>" method="post">
          <div class="searchbar">
            <input class="search_input" type="text" name="doc_name" placeholder="Enter Doctor Name here">
            <button id="search" class="search_icon" type="submit"><i class="fas fa-search text-info"></i></button>
            </div>
          </form>
        
      </div>
    </div>
</div>


<!-- knwon docs sections -->
<section> 

  
<div class="container mb-2">
<h2>Known Doctors in your District</h2>
    <div class="row">
    <?php $count = 1; ?>
    <?php foreach($docs as $doc) { ?>
      <div class="col-lg-3 col-md-3 col-sm-12">
              <div class="card text-center border shadow-lg" style="width:100%">
                  <img class="card-img-top img-fluid rounded-circle" src="<?= base_url('assets/photo/'). $doc['pic'] ?>" alt="Card image" style="height: 250px;">
                  <div class="card-body">
                  <h4 class="card-title">Dr. <?= $doc['name'] ?></h4>
                  <p><?php foreach($categories as $cat){
                      if ($cat['id'] == $doc['cat_id']) {
                          echo $cat['name'];
                      }
                  } ?></p>
                  <p class="card-text"><?= $doc['qualifications'] ?></p>
                  <!-- form -->
                  <form action="<?= base_url('appointment/doc') ?>" method="post">
                    <input name="doc_id" type="hidden" value="<?= $doc['doc_id'] ?>">
                    <button type="submit" class="btn btn-info wrn-btn">
                    View Profile
                    </button>
                  </form>
                  </div>
              </div>
          </div>
          <?php $count++; if($count == 5){ break; } ?>
      <?php } ?>
    </div>
    
    
</div>
</section>

