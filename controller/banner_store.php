<?php 
session_start();
include "../database/env.php";
if(isset($_POST['submit'])) {


    $request = $_POST;
   



    $title = $request['title'];
    $detail = $request['detail'];
    $video = $request['video'];
    $banner_img = $_FILES['banner_img'];
    $extension = pathinfo($banner_img['name'])['extension'];
    $accepted_extension = ['jpg', 'png','webp','jepg','svg'];

    //var_dump($banner_img);
    //exit();
    


    $errors = [];
    if(empty($title)){
$errors['title'] = "enter a Banner Title";
    }


    if(empty($detail)){
        $errors['detail'] = "enter a Banner detail";
            }

            if(empty($video)) {
                $errors['video'] = "enter a Banner video";
                    }
                    if($banner_img['size'] == 0){
                        $errors['banner_img'] = "enter a banner image";
                    } else if(in_array($extension, $accepted_extension) == false){
                        $errors['banner_img'] = "enter a proper image";
                    }


                    
if(count($errors) > 0){
    $_SESSION['errors'] = $errors;
    header("location:../backend/add_banner.php");
} else {
    
$new_image_name = 'Banner-' . uniqid() . '.' .  $extension ;
  $upload =  move_uploaded_file($banner_img['tmp_name'],"../uploads/$new_image_name");

if($upload){

$querry = "INSERT INTO banners(banner_img, title, detail, video) VALUES ('$new_image_name', '$title', '$detail', '$video')";
 
$store = mysqli_query($conn, $querry);

if($store) {
    header("location:../backend/add_banner.php");
}

}

}

}