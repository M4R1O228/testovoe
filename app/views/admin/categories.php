<div class="d-flex justify-content-center mb-4">
  <span class="h1">Categories</span>
</div>
<form class="mb-4" action="/admin/create" method="post">
  <div class="form-group">
    <label for="category">Category</label>
    <input class="form-control" required type="text" id="category" name="category">
  </div>
  <button class="btn btn-primary" type="submit" name="enter">Add category</button>
</form>





<div class="row">
  <div class="col-10 offset-1">
    <table class="table">
      <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">title</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
      </thead>
      <tbody>
      <?php foreach ($categories as $category): ?>
        <tr>
          <th scope="row"><p><?php echo $category['id']?></p></th>
          <th><p><?php echo $category['category']?></p></th>
          <td><a class="btn btn-info" href="/admin/edit/<?php echo $category['id'] ?>">edit</a></td>
          <td><a class="btn btn-danger" href="/admin/remove/<?php echo $category['id'] ?>">remove</a></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
