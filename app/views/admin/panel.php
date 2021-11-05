<div class="d-flex justify-content-center mb-4">
  <span class="h1">ALL USERS</span>
</div>
<div class="d-flex justify-content-end mb-4">
  <a class="btn btn-primary" href="/admin/categories">edit categories</a>
</div>

<div class="row">
  <div class="col-10 offset-1">
    <table class="table">
      <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Login</th>
        <th scope="col">Password</th>
      </tr>
      </thead>
      <tbody>
      <?php foreach ($users as $user): ?>
        <tr>
          <th scope="row"><?php echo $user['id']?></th>
          <td><?php echo $user['name']?></td>
          <td><?php echo $user['password']?></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>


