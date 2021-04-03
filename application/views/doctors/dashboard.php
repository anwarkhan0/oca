
<!-- info SECTION -->
<section id="contact" class="parallax-section mb-5">
     <div class="container mt-2">
          <div class="row">

               <div class="col-md-7 col-sm-8">
                   <!-- SECTION TITLE -->
                   <div class="wow fadeInUp section-title text-capitalize" data-wow-delay="0.2s">
                         <h2>Dr. <?= $record->name ?></h2>
                         <p><?= $record->qualifications ?></p>
                    </div>
                    <!-- CONTACT INFO -->
                    <div class="wow fadeInUp contact-info" data-wow-delay="0.4s">
                         <div class="section-title">
                              <h2>Info</h2>
                         </div>
                         
                         <p><i class="fa fa-map-marker"></i> <?= $record->address ?></p>
                         <p><i class="fa fa-comment"></i> <a href="mailto:info@company.com"><?= $record->email ?></a></p>
                         <p><i class="fa fa-phone"></i> <?= $record->contact ?></p>
                    </div>
               </div>

               <div class="col-md-3 col-sm-12">
                    <!-- appointment FORM HERE -->
                    <div class="wow fadeInUp" data-wow-delay="0.4s">
                    <img class="rounded-circle img-fluid" src="<?= base_url('assets/photo/').$record->pic ?>"  alt="">
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <a href="<?= base_url('doctor/account') ?>" class="btn btn-primary btn-block font-weight-bolder mt-1" style="font-size: 24px;">Edit Account</a>
                    </div>
               </div>

          </div>
     </div>
     
</section>

<div class="container">
    <div class="row mb-4" id="doc_dash">

        <div class="col-lg-6 col-md-6 col-sm-12">
        <a class="btn btn-block btn-dark  text-decoration-none" href="<?= base_url('doctor/appointments') ?>">My appointments</a>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12">
        <a class="btn btn-block btn-dark  text-decoration-none" href="<?= base_url('doctor/search-patient') ?>">Search Patients</a>
        </div>

    </div>
</div>