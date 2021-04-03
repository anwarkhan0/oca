
<div class="container"> 
<h2>Your Appointments</h2>       
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Patient Name</th>
        <th>Contact</th>
        <th>Appointment Number</th>
        <th>Time</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php if(isset($message)) : ?>
    <tr>
      <td colspan="5" class="text-info"><?= $message;?></td>
    </tr>
    <?php endif; ?>
    <?php foreach($appointments as $appointment) { ?>
      <tr>
        <td><?= $appointment['pname'] ?></td>
        <td><?= $appointment['pcontact'] ?></td>
        <td><?= $appointment['a_num'] ?></td>
        <td><?= $appointment['time'] ?></td>
        <td><a href="<?= base_url('appointment/cancel?b_id=').$appointment['booking_id'] ?>" class="btn btn-danger">Cancel</a></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
