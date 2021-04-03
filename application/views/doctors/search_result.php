<div class="jumbotron jumbotron-fluid p-2 pl-5">
    <h1>Search Result</h1>
    </div>
<div class="container mb-3">
<?php foreach($found_docs as $doc) { ?>
  <div class="row mt-3 border bg-light shadow-lg">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row">
        <div class="col-md-2 p-1">
          <img class="img-fluid rounded w-100 m-0" src="<?= base_url('assets/photo/'). $doc['pic'] ?>" alt="Card image" style="height: 200px;">
        </div>
        <div class="col-md-6 pt-3 pl-5">
          <h4>Dr. <?= $doc['name'] ?></h4>
          <p><?= $doc['qualifications'] ?></p>
        </div>
        <div class="col-md-4 p-5">
          <!-- form -->
          <form action="<?= base_url('appointment/doc') ?>" method="post">
                    <input name="doc_id" type="hidden" value="<?= $doc['doc_id'] ?>">
                    <button type="submit" class="btn btn-info btn-lg">
                    View Profile
                    </button>
                  </form>
        </div>
        </div>
      </div>
  </div>
<?php } ?>

</div>