

<h2 class="p-1 m-0">Patients</h2>
<div class="table-responsive">
<!-- filter form-->
<div class="row p-0 m-0">
  <form action="#" method="post" class="offset-4 col-md-4 p-0">
  <div class="form-group">
    <select class="form-control" name='filter'>
      <option value="0" selected dispabled>District</option>
      <option value="1">swat</option>
      <option value="2">peshawer</option>
      <option value="3">mardan</option>
    </select>
    <button type="submit" class="btn btn-success btn-block">Filter</button>
  </form>
  </div>
<table class="table table-striped table-hover" >
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>District</th>
      <th>Email</th>
      <th>contact</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($patients as $pat) { ?>
  <?php if(isset($_POST['filter'])){?>
  <?php if($_POST['filter'] == $pat['district']) : ?>
    <tr>
      <th scope="row">1</th>
      <td><?= $pat['name'] ?></td>
      <td><?= $pat['district'] ?></td>
      <td><?= $pat['email'] ?></td>
      <td><?= $pat['contact'] ?></td>
      <td>
      <a href="<?= base_url('admin/delete?id=').$pat['id'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
      </td>
    </tr>
      <?php endif; ?>
  <?php }else { ?>
    <tr>
      <th scope="row">1</th>
      <td><?= $pat['name'] ?></td>
      <td><?= $pat['district'] ?></td>
      <td><?= $pat['email'] ?></td>
      <td><?= $pat['contact'] ?></td>
      <td>
      <a href="<?= base_url('admin/delete?id=').$pat['id'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
      </td>
    </tr>
      <?php } ?>
  <?php } ?>
  </tbody>
</table>
</div>