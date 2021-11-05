
<?php
if (!empty($vars)):?>
  <div class="d-flex justify-content-center">
      <span class="h1 text-primary"> Welcome our new user <?php echo $_POST['name']; ?></span>
    <a class="btn btn-primary" href="/">lets go to main page</a>
  </div>
  <a class="btn btn-primary" href="/">lets go todasdasd main page</a>
<? endif; ?>
<div class="d-flex justify-content-center">
  <span class="h1 text-primary"><?php echo $_SESSION['message']; ?></span>
</div>



