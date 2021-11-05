<?php if (isset($_SESSION['authorize']['id'])): ?>

<div class="row py-4">
  <div class="offset-1 col">
    <form class="form-inline" action="/" method="post">
      <div class="form-group mb-2">
        <input class="form-check-input" type="checkbox" id="dateSort" name="dateSort">
        <label class="form- check-label" for="dateSort">Sort by date</label>
      </div>
      <div class="form-group mx-3 mb-2">
        <input placeholder="search" class="form-control" type="text" name="searchWords">
      </div>
      <button class="btn btn-success mb-2" type="submit">Sort</button>
    </form>
  </div>
</div>

<div class="row">
  <div class="col-7">
    <?php foreach ($questionsByUser as $questionByUser): ?>
      <h3 class="text-break"><?php echo $questionByUser['title'] ?></h3>
      <p class="border-bottom pb-3 mb-4 text-break">Category: <?php echo $questionByUser['category'] ?> | Created: <?php echo $questionByUser['timeCreated'] ?></p>
    <?php endforeach; ?>

  </div>
  <div class="offset-1 col-3">
    <ul class="list-group">
      <li class="list-group-item active">Categories:</li>
      <?php foreach ($categoriesByUser as $categoryByUser): ?>
        <li class="list-group-item text-break " style="overflow: hidden">
          <?php echo $categoryByUser['category'] ?>
        </li>
      <?php endforeach; ?>
      <?php endif; ?>
    </ul>
  </div>
</div>

