<?php

session_start();

if(isset($_POST["submit"])) {
    $file = $_FILES["file"];
    $fileName = $file["name"];
    $fileTmpName = $file["tmp_name"];
    $error = $file["error"];

    $splitedFileName = explode(".",$fileName);
    $fileType = strtolower(end($splitedFileName));

    $allowed = ["jpg","jpeg","png","gif"];

    if($error===0){
        if(in_array($fileType,$allowed)) {
            $fileNewName = uniqid("", true) . "." . $fileType;
            $fileNewPath = "uploads/" . $fileNewName;
            move_uploaded_file($fileTmpName, $fileNewPath);
            $_SESSION['response'] = "file uploaded";
            $_SESSION['responseStatusColor'] = "green";
        } else {
            $_SESSION['response'] = "wrong file";
            $_SESSION['responseStatusColor'] = "red";
        };
    } else {
        $_SESSION['response'] = "something is wrong";
        $_SESSION['responseStatusColor'] = "red";
    }
    header("location:Index.php");
}