<?php
$log = fopen('../inc/oc.err.log','a');
include('../config.php');
$khmer_name = $_POST["khmer"];
$enlish_name = $_POST["english"];
$chine_name = $_POST["chine"];
var_dump($khmer_name);
$id = $_POST['id'];
$conn = new mysqli($server, $dbusr, $dbpw, $db);
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
        if (isset($_FILES["name_file"]["name"]) ) {
            var_dump($file_tmp);
            exit();
            move_uploaded_file( $file_tmp,"src/".$file_name);
            if ($conn->connect_error) {
                $now = date("Y-m-d H:i:s");
                $err = "[" . $now . "] Database Connection Failed: " . $conn->connect_error ."\n";
                fwrite($log,$err);
                die($err);
            }else{
                $now = date("Y-m-d H:i:s");
	            fwrite($log,"[" . $now . "] Database Connection Successful\n");
                $sqli= "UPDATE ym_user_profiles SET en_name = '$enlish_name' ,  kh_name = '$khmer_name' ,
                ch_name = '$chine_name',  img_url  = '$file_name' WHERE id='$id'";
                
                if ($conn->query($sqli)){
                    echo 'succefully';
                    header("Location:".'../index.php');
                    exit();
                }else{
                echo "Error: ". $sqli ;
            }
        }
            $conn->close();
    }else {
        if ($conn->connect_error) {
            $now = date("Y-m-d H:i:s");
            $err = "[" . $now . "] Database Connection Failed: " . $conn->connect_error ."\n";
            fwrite($log,$err);
            die($err);
        }else{
            $now = date("Y-m-d H:i:s");
            fwrite($log,"[" . $now . "] Database Connection Successful\n");
            $sqli= "UPDATE ym_user_profiles SET en_name = '$enlish_name' ,  kh_name = '$khmer_name' ,
            ch_name = '$chine_name' WHERE id='$id'";
            if ($conn->query($sqli)){
                echo "succefully not image.";
                header("Location:".'../index.php');
                exit();
            }else{
            echo "Error: ". $sqli ;
        }
    }
        $conn->close();
    }

?>
