<?php
$log = fopen('../inc/oc.err.log','a');
include('../config.php');
$parent_id = $_POST['parent_id'];
$title = $_POST['job_title'];
$en_name = $_POST['english'];
$kh_name = $_POST["khmer"];
$ch_name = $_POST["chine"];
//////image insert into
    $path = '../img';
    $file_name = $_FILES["name_file"]["name"];
    $file_size = $_FILES["name_file"]["size"];
    $file_tmp = $_FILES["name_file"]["tmp_name"];
    $file_type = $_FILES["name_file"]["type"];
    $file_name_name = $_FILES["name_file"]["name"];
    $explode = explode(".",$file_name_name);
    $end = end($explode);
    $file_ext = strtolower($end);
    $expensions = array("jpeg","jpg","png","jfif","GIF","TIF");
    if (in_array($file_ext,$expensions) === false) {
        $error[] = "extesion not allowd, please choose a JPEG of PNG file";
    }
    if ($file_size > 2097483) {
        $error[] = "file size must be excately 2 MB";
    }
            move_uploaded_file( $file_tmp,"src/".$file_name);
            $conn = new mysqli($server, $dbusr, $dbpw, $db);
            if ($conn->connect_error) {
                $now = date("Y-m-d H:i:s");
                $err = "[" . $now . "] Database Connection Failed: " . $conn->connect_error ."\n";
                fwrite($log,$err);
                die($err);
            }else{
                $now = date("Y-m-d H:i:s");
	            fwrite($log,"[" . $now . "] Database Connection Successful\n");
                $sqli= "INSERT INTO `ym_positions`(`title`, `parent_id` ) VALUES ('$title','$parent_id')";
                $sqli1 = "INSERT INTO `ym_user_profiles`(`en_name`, `kh_name`, `ch_name`, `img_url` ) VALUES('$en_name','$kh_name','$ch_name','$file_name')";
                if ($sqli == true && $sqli1 == true){
                    $conn->query($sqli);
                    $conn->query($sqli1);
                    header("Location:".'../index.php');
                    exit();
                }else{
                echo "Error: ". $sqli ."
                ". $conn->error;
            }
            }
            $conn->close();
