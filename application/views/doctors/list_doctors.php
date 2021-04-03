<div class="container">
  <div class="row mt-3">
  <?php foreach($record as $doc) { ?>
      <div class="col-lg-3 col-md-3 col-sm-12">
              <div class="card mb-3 text-center shadow-sm" style="width:100%">
                  <img class="card-img-top img-fluid rounded-circle" src="<?= base_url('assets/photo/'). $doc['pic'] ?>" alt="Card image" style="height: 250px;">
                  <div class="card-body">
                  <h4 class="card-title">Dr. <?= $doc['name'] ?></h4>
                  <p>
                    <?php foreach ($categories as $cat) {
                      if ($cat['id'] == $doc['cat_id']) {
                        echo $cat['name'];
                      }
                    } ?>
                  </p>
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
      <?php } ?>
  </div>
  <?= $links ?>

</div>
