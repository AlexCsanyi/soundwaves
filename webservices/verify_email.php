<?php 
    header('Content-type: application/json');
    require_once '../config/connection.php';
?>

<?php 

    $user_email = $_POST['input_email_verification'];

    $sql_verify_email = mysqli_query($con, "SELECT * FROM users WHERE email='$user_email'");

    if(mysqli_num_rows($sql_verify_email) > 0){
        $response_array['status'] = 'success';
    } else {
        $response_array['status'] = 'fail';
    }

    echo json_encode($response_array)

?>