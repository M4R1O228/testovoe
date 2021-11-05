<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo $title; ?></title>
  <link rel="stylesheet" href="/public/styles/bootstrap.min.css">
  <link rel="stylesheet" href="/public/styles/styles.css">

</head>
<body>
<div class="container">
  <div class="row mb-3 bg-secondary text-white rounded-bottom">
    <div class="col-5 py-4">
      <a class="btn btn-primary" href="/">main page</a>
      <a class="btn btn-primary" href="/questions">all questions</a>
      <?php if (isset($_SESSION['authorize']['id'])): ?>
        <a class="btn btn-primary" href="/account/notes">notes</a>
        <a class="btn btn-success" href="/account/add">add</a>
      <?php endif; ?>

    </div>
    <div class="col d-flex justify-content-end py-4">
      <?php if (isset($_SESSION['authorize']['id'])): ?>
        <span class="btn text-white mr-2">Hello: <?php echo $_SESSION['userName'] ?></span>
      <?php endif; ?>
      <?php if (isset($_SESSION['admin'])): ?>
        <a class="mr-2 btn btn-success" href="/admin/panel">admin panel</a>
      <?php endif; ?>
      <a class="mr-2 btn btn-info" href="/account/login">login</a>
      <a class="mr-2 btn btn-info" href="/account/register">register</a>
      <?php if (isset($_SESSION['authorize']['id'])): ?>
        <a class="btn btn-danger" href="/account/logout">logout</a>
      <?php endif; ?>
    </div>
  </div>
  <?php echo $content; ?>
</div>
<script src="/public/js/bootstrap.min.js"></script>
</body>
</html>
