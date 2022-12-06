<?php  

session_start();

include '../database/env.php';


if(isset($_POST['register'])){

    $first_name = $_POST['fName'];
    $last_name = $_POST['lName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $enc_password = sha1($password);



    $errors = [];
if(empty($first_name)){
$errors['fName_error'] = "Insert First Name";
}

if(empty($last_name)){
    $errors['lName_error'] = "Insert Last Name";
    }

    if(empty($email)){
        $errors['email_error'] = " Insert Email Address ";
        } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
           $errors['email_error'] = "Enter Validate Email Address";
        }

        if(empty($password)){
            $errors['password_error'] = "Insert Password";
            }

            if(empty($confirm_password)){
                $errors['confirm_password_error'] = "Insert Confirm_password ";
                }
                
                if(count($errors) > 0) {
                         $_SESSION['error'] = $errors;
                            header(" location: ../backend/register.php");
                } else {
                   $querry = "INSERT INTO account( first_name, last_name, email, password )VALUES('$first_name', '$last_name', '$email', '$enc_password')";

                    $store = mysqli_query($conn, $querry);

                    $_SESSION['success'] = "Successfully Registered!";
                    
            header("location: ../backend/login.php");

                }

}