<div class="jumbotron jumbotron-fluid p-2 pl-5">
    <h1>Search Result</h1>
    </div>
<div class="container mb-3">
<?php foreach($found_docs as $doc) { ?>
  <div class="row mt-3 border border-light shadow-lg  bg-light">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row">
        <div class="col-md-2">
          <img class="img-fluid rounded w-100 m-0" src="<?= base_url('assets/photo/'). $doc['pic'] ?>" alt="Card image" style="height: 200px;">
        </div>
        <div class="col-md-6 p-0 pt-2">
          <h4>Dr. <?= $doc['name'] ?></h4>
          <p><?= $doc['address'].', '.$district->name ?></p>
          <p><?= $doc['qualifications'] ?></p>
          <p>
          <?php
          $flag = true;
          foreach($slots_info as $slot) {
              if ($slot['doc_id'] == $doc['doc_id']) {
                $flag = false;
                ?>
              <span class="badge badge-success" style="font-size: 26px">Appointment  Number: <?= $slot['a_num'] ?> available on <?= $slot['dayName'] ?></span> 
              <?php break; }
          }
          if($flag){ ?>
            <span class="badge badge-danger" style="font-size: 26px">No Appointment available for this week</span> 
          <?php }
          ?>
          </p>
        </div>
        <div class="col-md-4 p-5">
          <!-- form -->
          <form action="<?= base_url('appointment/doc') ?>" method="post">
                    <input name="doc_id" type="hidden" value="<?= $doc['doc_id'] ?>">
                    <button type="submit" class="btn btn-primary btn-lg">
                    Get Appointment
                    </button>
                  </form>
        </div>
        </div>
      </div>
  </div>
<?php } ?>

</div>