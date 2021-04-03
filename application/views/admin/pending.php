

<h2 class="p-1 m-0">Doctors</h2>
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
      <th>Father Name</th>
      <th>RegistrationID</th>
      <th>District</th>
      <th>Address</th>
      <th>Email</th>
      <th>contact</th>
      <th>Speciality</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php $c = 1; ?>
  <?php foreach($docs as $doc) { ?>
  <?php if($doc['approved'] == 1) continue; ?>
  <?php if(isset($_POST['filter'])){?>
  <?php if($_POST['filter'] == $doc['district']) : ?>
    <tr>
      <th scope="row"><?= $c ?></th>
      <td><?= $doc['name'] ?></td>
      <td><?= $doc['father_name'] ?></td>
      <td><?= $doc['reg_id'] ?></td>
      <td><?= $doc['district'] ?></td>
      <td><?= $doc['address'] ?></td>
      <td><?= $doc['email'] ?></td>
      <td><?= $doc['contact'] ?></td>
      <td>
      <?php foreach ($categories as $cat) {
        if ($doc['cat_id'] == $cat['id']) {
          echo $cat['name'];
        }
      }?>
      </td>
      <td>
      <?php if($doc['approved'] == 0) { ?>
      <a href="<?= base_url('admin/approve?id=').$doc['doc_id'] ?>" class="btn btn-sm btn-success">Approve</a>
      <?php }else { ?>
        <a href="<?= base_url('admin/disapprove?id=').$doc['doc_id'] ?>" class="btn btn-sm btn-warning">Disapprove</a>
      <?php }?>
      <a href="<?= base_url('admin/delete?id=').$doc['doc_id'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
      </td>
    </tr>
      <?php endif; ?>
  <?php }else { ?>
    <tr>
      <th scope="row"><?= $c ?></th>
      <td><?= $doc['name'] ?></td>
      <td><?= $doc['father_name'] ?></td>
      <td><?= $doc['reg_id'] ?></td>
      <td><?= $doc['district'] ?></td>
      <td><?= $doc['address'] ?></td>
      <td><?= $doc['email'] ?></td>
      <td><?= $doc['contact'] ?></td>
      <td>
      <?php foreach ($categories as $cat) {
        if ($doc['cat_id'] == $cat['id']) {
          echo $cat['name'];
        }
      }?>
      </td>
      <td>
      <?php if($doc['approved'] == 0) { ?>
      <a href="<?= base_url('admin/approve?id=').$doc['doc_id'] ?>" class="btn btn-sm btn-success">Approve</a>
      <?php }else { ?>
        <a href="<?= base_url('admin/disapprove?id=').$doc['doc_id'] ?>" class="btn btn-sm btn-warning">Disapprove</a>
      <?php }?>
      <a href="<?= base_url('admin/delete?id=').$doc['doc_id'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
      </td>
    </tr>
      <?php } $c++; ?>
  <?php } ?>
  </tbody>
</table>
</div>