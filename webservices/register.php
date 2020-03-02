<?php 

    header('Content-type: application/json');
    require_once '../config/connection.php';

    $user = $_POST["user_name"];
    $email = $_POST["user_email"];
    $password = $_POST["user_password"];

    $sql_verify = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
    
    if(mysqli_num_rows($sql_verify) > 0){
        $response_array['status'] = "fail";
    } else {
        $sql_insert = 
            mysqli_query($con, "INSERT INTO users(name,email,password)VALUES('$user', '$email', '$password')");
        
        if($sql_insert){
            $response_array['status'] = "success";
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql_insert . "" . mysqli_error($con);
        };
    }


    echo json_encode($response_array);
?>