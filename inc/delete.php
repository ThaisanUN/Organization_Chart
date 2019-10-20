<?php
$log = fopen('../inc/oc.err.log','a');
include('../config.php');
$id = $_GET['id'];
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
                                WHERE user_id='$id'";
                                 $sqli1= "DELETE FROM ym_user_profiles
                                 WHERE id='$id'";
                if ($conn->query($sqli) && $conn->query($sqli1)){
                    
                    echo '<script type="text/javascript">
                                        // confirm("Are you sure you want to delete this item?"); 
                                        if (  confirm("Are you sure you want to delete this item?") ==  true) {
                                            window.location="../index.php";
                                        }else{
                                            window.location="../index.php";
                                        }
                                        </script>';
                    exit();
                }else{
                echo "Error: ". $sqli ."
                ". $conn->error;
            }
            }
            $conn->close();