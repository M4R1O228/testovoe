<div class="d-flex justify-content-center mb-4">
  <span class="h1">Questions</span>
</div>

<div class="row ">
  <div class="col-10 offset-1  ">
    <?php foreach ($questions as $question): ?>

      <h3 class="text-break"><a class="link-primary" href="/question/<?php echo $question['id'] ?>"><?php echo $question['title'] ?></a></h3>
      <p class="text-break">Category: <?php echo $question['category'] ?> | Created: <?php echo $question['timeCreated'] ?></p>
      <p class="pb-3 border-bottom text-break"><?php echo $question['description'] ?></p>


    <?php endforeach; ?>
  </div>
</div>


