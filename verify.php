<?php require_once 'templates/header.php'; ?>

<?php 

    if(isset($_GET['id'])){
        $user_email = base64_decode($_GET['id']);
        $sql_update_account = mysqli_query($con, "UPDATE users set acc_verify=1 WHERE email='$user_email'");
        $success_msg = $user_email;
    } else {
        header('location: index.php');
    }
    
?>

<div class="container text-center">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4" id="verification_msg">
            <i class="fas fa-headphones fa-4x mb-5"></i>
            <p><?php echo $success_msg; ?></p>
            <h4>Thank you for signing up. Your account is verified</h4>
            <a href="index.php"><button class="btn btn-success">Login</button></a>
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>

<?php require_once 'templates/footer.php'; ?>