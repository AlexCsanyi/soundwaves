<?php 
    header('Content-type: application/json');
    require_once '../config/connection.php';
?>

<?php 
    $user_email = $_POST['input_email_verification'];
    $user_pass = $_POST['new_password_input'];

    $sql_update = mysqli_query($con, "UPDATE users set password = '$user_pass' WHERE email='$user_email'");
    if($sql_update){
        $response_array['status'] = 'success';
    } else {
        $response_array['status'] = 'fail';
    }

    echo json_encode($response_array)
?>