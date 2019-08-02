
<?php
$log = fopen('../src/oc.err.log','a');
include('../config.php');
$conn = new mysqli($server, $dbusr, $dbpw, $db);
if ($conn->connect_error) {
	$now = date("Y-m-d H:i:s");
	$err = "[" . $now . "] Database Connection Failed: " . $conn->connect_error ."\n";
	fwrite($log,$err);
	die($err);
}
else {
	$now = date("Y-m-d H:i:s");
	fwrite($log,"[" . $now . "] Database Connection Successful\n");
}

if (isset($_FILES["name_file"])) {
    $error = array();
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
        if (empty($error) == true) {
                move_uploaded_file( __FILE__,'/../../img/'. $_FILES["name_file"]['name']);
                
            $path = $file_name;
            $khmer_name = $_POST["khmer"];
            $enlish_name = $_POST["english"];
            $chine_name = $_POST["chine"];
            $id = $_POST['id'];
            $conn = new mysqli($server, $dbusr, $dbpw, $db);
            if ($conn->connect_error) {
                $now = date("Y-m-d H:i:s");
                $err = "[" . $now . "] Database Connection Failed: " . $conn->connect_error ."\n";
                fwrite($log,$err);
                die($err);
            }else{
                $now = date("Y-m-d H:i:s");
	            fwrite($log,"[" . $now . "] Database Connection Successful\n");
                $sqli= "UPDATE ym_user_profiles SET 
                en_name = '$enlish_name' ,
                kh_name = '$khmer_name' ,
                ch_name = '$chine_name',
                img_url  = '$path'
                WHERE id='$id'";
                if ($conn->query($sqli)){
                    echo $path;
                    header("Location:".'../index.php');
                    exit();
                }else{
                echo "Error: ". $sqli ."
                ". $conn->error;
            }
            }
            $conn->close();
    }else {
        print_r($error);
    }
}else{
    echo "It is not set.";
}
?>
