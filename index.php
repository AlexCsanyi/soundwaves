<?php include_once 'templates/header.php'; ?>

<div class="container text-center">
    <div class="row">
        <div class="col-sm-5"></div>

        <div class="col-sm-2" id="login">
           <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone.
                    </small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
        </div>

        <div class="col-sm-5"></div>
    </div>
</div>

<?php include_once 'templates/footer.php'; ?>