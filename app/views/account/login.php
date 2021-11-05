<form action="/account/signin" method="post">
  <div class="d-flex justify-content-center">
    <span class="h1">Login</span>
  </div>

  <div class="form-group">
    <label for="name">Login</label>
    <input class="form-control" required type="text" id="name" name="name">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input id="password" class="form-control" required type="password" name="password">
  </div>
  <button class="btn btn-primary" type="submit" name="enter">Login</button>
</form>
