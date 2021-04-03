<div class="container">
  <h2>Your Appointments</h2>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Doctor Name</th>
        <th>District</th>
        <th>Address</th>
        <th>Contact NO</th>
        <th>Appointment Number</th>
        <th>Date</th>
        <th>Time</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($appointments as $appointment) { ?>
      <tr>
        <td><?= $appointment['dname'] ?></td>
        <td>district Name here</td>
        <td><?= $appointment['daddress'] ?></td>
        <td><?= $appointment['dcontact'] ?></td>
        <td><?= $appointment['a_num'] ?></td>
        <td><?= $appointment['day'] ?></td>
        <td><?= $appointment['time'] ?></td>
        <td><a href="<?= base_url('appointment/cancel?b_id=').$appointment['booking_id'] ?>" class="btn btn-danger">Cancel</a></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
