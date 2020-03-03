<!-- Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registerModalLabel">Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="users/actions/register.php" method="POST" id="register-form">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name = 'name' class="form-control" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name = 'email' class="form-control" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name = 'password' class="form-control" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="confirm password">Confirm Password</label>
            <input type="password" name = 'confirmpassword' class="form-control" autocomplete="off">
          </div>
          <button name="users" type="submit" class="btn btn-success">Post</button>
        </form>
        <p class="response"></p>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>