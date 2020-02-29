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
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <form>
                <div class="form-group">
                    <label for="InputUsername">Username</label>
                    <input type="text" class="form-control" id="InputUsername">
                </div>
                <div class="form-group">
                    <label for="InputEmail1">Email address</label>
                    <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">
                        <i class="fas fa-lock"></i>
                        We'll never share your email with anyone.
                    </small>
                </div>
                <div class="form-group">
                    <label for="InputPassword2">Password</label>
                    <input type="password" class="form-control" id="Password2">
                </div>
            </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Sign up</button>
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
                    <label for="InputEmail1">Email address</label>
                    <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp">
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