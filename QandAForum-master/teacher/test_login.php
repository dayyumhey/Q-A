<?php

include('../databases/connection.php');
session_start();

if (isset($_POST['login_button_teacher'])) {
    $u_srn_t=strtolower(mysqli_real_escape_string($conn, $_POST['user_srn_teacher']));
    echo $u_srn_t;
    $u_password_t= $_POST['user_password_teacher'];
}

    $sql="SELECT * FROM professor WHERE teacher_id='$u_srn_t'";
    $result=mysqli_query($conn, $sql);
    $result_check=mysqli_num_rows($result);

    if($result_check < 1){
        echo  "chutiya kata";
        exit();
    }
    else{
        if ($row=mysqli_fetch_assoc($result)) {
            $hash_password_check=strcmp($u_password_t, $row['teacher_password']);
            echo $hash_password_check;
        }
    }

?>