<?php include_once 'templates/header.php'; ?>

<div class="container text-center">
    <div class="row">
        <div class="col-sm-4"></div>

        <div class="col-sm-4" id="login">
            <h3 class="font-weight-bold">Welcome to SoundWaves</h3>
            <i class="fas fa-headphones fa-4x mb-3"></i>
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">
                        <i class="fas fa-lock"></i>
                        We'll never share your email with anyone.
                    </small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
            <span>
                <a 
                    class="float-left mt-2 text-muted text-decoration-none" 
                    href="javascript:void(0)" data-toggle="modal" 
                    data-target="#register">
                        New here?
                </a>
                <a 
                    class="float-right mt-2 text-muted text-decoration-none" 
                    href="javascript:void(0)"
                    data-toggle="modal" data-target="#forgotPassword">
                      Forgot password?
                </a>
            </span>
        </div>

        <div class="col-sm-4"></div>
    </div>
</div>

<!-- Register Modal -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="signUpToSoundWaves" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signUpToSoundWaves">Welcome to SoundWaves</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modal_close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <form id="register_form">
                <div class="form-group">
                    <label for="user_name">Username</label>
                    <input required type="text" class="form-control" name="user_name" id="user_name">
                    <span id="name_error"></span>
                </div>
                <div class="form-group">
                    <label for="user_email">Email address</label>
                    <input required type="email" class="form-control" name="user_email" id="user_email" aria-describedby="emailHelp">
                    <span id="email_error"></span>
                    <small id="emailHelp" class="form-text text-muted">
                        <i class="fas fa-lock"></i>
                        We'll never share your email with anyone.
                    </small>
                </div>
                <div class="form-group">
                    <label for="user_password">Password</label>
                    <input required type="password" class="form-control" name="user_password" id="user_password">
                    <span id="password_error"></span>
                </div>
            </form>
        </div>
      </div>
      <div class="modal-footer">
        <p class="float-left" id="success_msg"></p>
        <button type="button" class="btn btn-primary" id="verify_ajax">Sign up</button>
        <button class="btn btn-success" type="button" disabled id="spinner">
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Please wait...
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Forgot Password Modal -->
<div class="modal fade" id="forgotPassword" tabindex="-1" role="dialog" aria-labelledby="resetSoundWavesPassword" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="resetSoundWavesPassword">Reset Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <form>
                <div class="form-group">
                    <label for="InputEmail2">Email address</label>
                    <input type="email" class="form-control" id="InputEmail2" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="InputNewPassword">New Password</label>
                    <input type="password" class="form-control" id="InputNewPassword">
                </div>
            </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Reset Password</button>
      </div>
    </div>
  </div>
</div>

<?php include_once 'templates/footer.php'; ?>