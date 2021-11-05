<?php
if (!empty($vars)) :?>
  <div class="d-flex justify-content-center">
    <?php if ($_POST['name'] == 'admin'): ?>
      <span class="h1 text-primary"> Welcome GENERAL</span>
    <?php else: ?>
      <span class="h1 text-primary"> Welcome <?php echo $_POST['name']; ?></span>
    <?php endif; ?>
  </div>
<?php else: ?>
  <div class="d-flex justify-content-center mb-4">
    <span class="h1 text-danger"><?php echo $_SESSION['message']; ?></span>
  </div>
  <div class="d-flex justify-content-end mb-4">
    <a class="btn btn-primary mr-4" href="login">Login again</a>
    <a class="btn btn-primary" href="register">Register if you are not</a>
  </div>

<?php endif; ?>


