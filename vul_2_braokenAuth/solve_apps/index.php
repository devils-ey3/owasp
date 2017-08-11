<?php require_once('../../header.html') ?>

<form  action="admin/index.php" method="post">
  <div class="form-group" >
    <label for="email">Username:</label>
    <input input type="text" name="user" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" name="pass"  class="form-control" id="pwd">
  </div>

  <button type="submit" name="submit" value="submit"  class="btn btn-default">Submit</button>
</form>