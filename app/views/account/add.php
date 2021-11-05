<form action="/account/add" method="post">
  <div class="d-flex justify-content-center">
    <span class="h1">Ask a question</span>
  </div>

  <div class="form-group">
    <label for="title">Title</label>
    <input class="form-control" required type="text" id="title" name="title">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea rows="7" class="form-control" required id="description" type="text" name="description"></textarea>
  </div>
  <div class="form-group">

    <select class="custom-select" name="category" id="category">
      <?php foreach ($categories as $category): ?>
        <option value="<?php echo $category['id'] ?>"><?php echo $category['category'] ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <input class="custom-checkbox" type="checkbox" id="checkNotes" name="checkNotes">
    <label for="checkNotes">Publish this only in notes?</label>
  </div>

  <button class="btn btn-primary" type="submit" name="enter">Add</button>
</form>
