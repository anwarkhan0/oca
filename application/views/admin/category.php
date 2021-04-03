

<div class="container">
<form class="form-inline m-2 bg-dark text-white" action="<?= base_url('admin/add_category/') ?>" method="post">
  <div class="form-group p-2">
    <label for="email">Add Doctor Category: </label>
    <input name="category" type="text" class="form-control" id="category" required>
  </div>
  <button type="submit" class="btn btn-primary btn-lg">Add</button>
</form> 


  <h2>Categories</h2>          
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($categories as $category) { ?>
      <tr>
      <form action="#">
        <td><input type="text" value="<?= $category['name'] ?>" name="cat_name"></td>
        <td>
        <button href="#" class="btn btn-primary border-0">Save</button>
        <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
        </td>
      </form>
        
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>