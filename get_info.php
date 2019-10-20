<?php
//Includes & log file
$log = fopen('inc/oc.err.log','a');
include('./config.php');
include('./functions.php');
//Connect to DB
$conn = new mysqli($server, $dbusr, $dbpw, $db);
//Check the connection, throw error if any and write to the log file
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
$query = "SELECT 
	u.en_name,u.kh_name,u.ch_name,u.img_url, p.*
	FROM ym_user_profiles u 
	INNER JOIN ym_positions p ON p.user_id=u.id";
$info = $conn->query($query,MYSQLI_STORE_RESULT);
$data = array();
$id = array();
$refs = array();
$list = array();
while ($result = mysqli_fetch_assoc($info)){
	$self_id = $result['user_id'];
	$title = $result['title'];
	$parent_id = $result['parent_id'];
	$en_name = $result['en_name'];
	$kh_name = $result['kh_name'];
	$ch_name = $result['ch_name'];
	// var_dump($ch_name);
	// var_dump($kh_name);
	$img =$result['img_url'];
	$user_set = $result['user_id'];
	if (empty($en_name) || empty($img)) {
		$image = null;
		
	}else{
		$image = '<a href = "inc/src/'.$img.'">
		<img src="inc/src/'.$img.'"   class="image"/></a><br>';
	}
	$kh_names = "<div onclick='myFunction()'>$kh_name</div>";
	$ch_names = "<div>$ch_name</div>";
	$en_names = "<div style='margin:-9px 2px;'>$en_name</div>";
	if (empty($en_name) || empty($img)) {
		$job_name = "<div style=' font-size:25px; background-color:rgba(0, 0, 0, 0.274)' onclick='myFunction()' ><b>$title<b></div>";
	}else{
		
		$job_name = "<div style='  background-color:rgba(0, 0, 0, 0.274)'  ><b>$title<b></div>";
	}
	
	// var_dump($en_names);
	$br = "<br>";
	$update = "<a href=\"inc/form_update.php?id=$user_set\" id='edit' style='padding:2px 5px;'>Edit</a>";
	$add = "<a href=\"inc/form_add.php?parent_id=$self_id\" id='add' style='padding:2px 5px;'>Add</a>";
	$delete = "<a href=\"inc/delete.php?id=$self_id\" id='delete' style='padding:2px 5px;'>Delete</a>";
	$d[] = $en_name;
	$self[] = array($self_id,$image.''.$job_name.''.$br.' '.$en_names.''.$br.''.$kh_name.' '.$br.''.$ch_name.' '.$br.''.$update.''.$add.''.$delete, $parent_id);
	// var_dump($self);
	$user_sets[$user_set] = $self_id;
}
// var_dump($user_sets);
$pre_data = tree($self, array(0));
fixArrayKey($user_sets);
$pass1 = removeRecursive($pre_data,0);
$pass2 = removeRecursive($pass1,1);
$data = removeRecursive($pass2,2);
$conn->close();
?>
