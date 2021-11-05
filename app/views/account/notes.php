<div class="d-flex justify-content-center">
  <span class="h1">My notes</span>
</div>
<div class="row ">
  <div class="col-10 offset-1 ">
    <?php foreach ($notes as $note): ?>
      <h3 class="text-break"><?php echo $note['title'] ?></h3>
      <p class="text-break"><?php echo $note['description'] ?></p>
      <p class="border-bottom pb-3 mb-4 text-break">Category: <?php echo $note['category'] ?> |
        Created: <?php echo $note['timeCreated'] ?></p>
    <?php endforeach; ?>

  </div>
</div>


