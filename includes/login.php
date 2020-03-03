<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login</h5>
        <button type="button" class="close" id="close-login" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="users/actions/login.php" method="POST" id="login-form">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name = 'email' class="form-control" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name = 'password' class="form-control">
          </div>
          <button name="login" type="submit" class="btn btn-success">Login</button>
        </form>
        <!-- Validate form error -->
        <?php
         echo (isset($_GET['error'])? '<p class = "text-danger text-center" id = "login-error">'.$_GET['error'].'</p>':'');
        ?>
      </div>
    </div>
  </div>
</div>