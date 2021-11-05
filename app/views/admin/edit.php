<div class="d-flex justify-content-center mb-4">
  <span class="h1">Edit category</span>
</div>

<form action="/admin/edit/<?php echo $category[0]['id'] ?>" method="post">
  <div class="form-group">
    <label for="category"></label>
    <input class="form-control" type="text" id="category" name="category" value="<?php echo $category[0]['category'] ?>">
  </div>

  <button class="btn btn-primary" type="submit" name="enter">Edit</button>
</form>

