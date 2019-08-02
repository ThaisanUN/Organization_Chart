<?php
$log = fopen('../src/oc.err.log','a');
include('../config.php');
$id = $_GET['id'];
// echo $_GET['id'];
$conn = new mysqli($server, $dbusr, $dbpw, $db);
            if ($conn->connect_error) {
                $now = date("Y-m-d H:i:s");
                $err = "[" . $now . "] Database Connection Failed: " . $conn->connect_error ."\n";
                fwrite($log,$err);
                die($err);
            }else{
                $now = date("Y-m-d H:i:s");
	            fwrite($log,"[" . $now . "] Database Connection Successful\n");
                $sqli= "DELETE FROM ym_positions
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