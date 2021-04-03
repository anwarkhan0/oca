<div class="jumbotron p-1 pl-5">
<?php if($a_num == 0) { ?>
     <h1 class="text-danger">No Appointment Slots available for this week</h1>
<?php }else{ ?>
     <h1>Appointment Number <span class="badge badge-success"><?= $a_num ?></span></h1>
     <p class="text-info">on <?= $dayName ?></p>
<?php } ?>
</div>
<!-- info SECTION -->
<section id="contact" class="parallax-section mb-5">
     <div class="container mt-2">
          <div class="row">

               <div class="col-md-7 col-sm-8">
                   <!-- SECTION TITLE -->
                   <div class="wow fadeInUp section-title text-capitalize" data-wow-delay="0.2s">
                         <h2>Dr. <?= $doctor->name ?></h2>
                         <p><?= $doctor->qualifications ?></p>
                    </div>
                    <!-- CONTACT INFO -->
                    <div class="wow fadeInUp contact-info" data-wow-delay="0.4s">
                         <div class="section-title">
                              <h2>Info</h2>
                         </div>
                         <p><i class="fas fa-hand-holding-usd"></i> <?= $doctor->fee ?></p>
                         <p><i class="fas fa-door-open"></i> <?= $doctor->time ?></p>
                         <p><i class="fa fa-map-marker"></i> <?= $doctor->address ?></p>
                         <p><i class="fa fa-comment"></i> <a href="mailto:info@company.com"><?= $doctor->email ?></a></p>
                         <p><i class="fa fa-phone"></i> <?= $doctor->contact ?></p>
                    </div>
               </div>

               <div class="col-md-3 col-sm-12">
                    <!-- appointment FORM HERE -->
                    <div class="wow fadeInUp" data-wow-delay="0.4s">
                        <form id="contact-form" action="<?= base_url('appointment/book') ?>" method="post">
                                <div class="col-md-12 col-sm-12">
                                    <img class="rounded-circle img-fluid" src="<?= base_url('assets/photo/').$doctor->pic ?>"  style="height: 250px" alt="">
                                </div>
                                   <input type="hidden" name="dname" value="<?= $doctor->name ?>" required>
                                   <input type="hidden" name="district" value="<?= $doctor->district ?>" required>
                                   <input type="hidden" name="dcontact" value="<?= $doctor->contact ?>" required>
                                   <input type="hidden" name="daddress" value="<?= $doctor->address ?>" required>
                                   <input type="hidden" name="time" value="<?= $doctor->time ?>" required>
                                   <input type="hidden" name="doc_id" value="<?= $doctor->doc_id ?>" required>
                                   <input type="hidden" name="day" value="<?= $day ?>" required>
                                   <input type="hidden" name="dayName" value="<?= $dayName ?>" required>
                                   <input type="hidden" name="a_num" value="<?= $a_num ?>" required>
                              <div class="col-md-12 col-sm-12">
                                   <button class="btn btn-primary btn-block font-weight-bolder mt-1" id="submit" type="submit"  name="submit" style="font-size: 24px;" <?php if($a_num == 0) echo 'disabled'; ?>>Book Appointment</button>
                              </div>
                        </form>
                    </div>
               </div>

          </div>
     </div>
     
</section>
