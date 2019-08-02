<?php
//Includes & log file
$log = fopen('./oc.err.log','a');
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

//queries to build arrays of information
///Positions
// $query = "select * from ym_positions"; //this query pulls more information than is absolutely needed, and could probably be limited to id,name,parentid
$query = "SELECT 
	u.en_name,u.img_url, p.*
	FROM ym_user_profiles u 
	INNER JOIN ym_positions p ON p.user_id=u.id";
$info = $conn->query($query,MYSQLI_STORE_RESULT);

///users
$query2 = "select * from ym_user_profiles"; 
$user = $conn->query($query2,MYSQLI_STORE_RESULT);

//Building the array for positions from the query. 
$data = array();
$id = array();
$refs = array();
$list = array();
while ($result = mysqli_fetch_assoc($info)){
	$self_id = $result['id'];
	$title = $result['title'];
	$parent_id = $result['parent_id'];
	$en_name = $result['en_name'];
	$img =$result['img_url'];
	$user_set = $result['user_id'];
	if ( empty($en_name) ) {
		$image = null;
		$p[]=$image;
		// var_dump($p);
		
	}else{
		$image = '<a href = "img/'.$img.'">
		<img src="img/'.$img.'"   class="image"/></a><br>';
		// var_dump($self_id. ".   .".$en_name ."    . have postion    .".$title.'   ++++'.$img);
	}
	// $image = '<a href = "img/'.$img.'">
	// 	<img src="img/'.$img.'"   class="image"/></a><br>';
	$en_names = "<div style='color:#000000;padding:-3px 2px;'  >$en_name</div>";
	$job_name = "<div style='color:#000000; background-color:#EAE9F3'  onclick='myFunction()'><b>$title<b></div>";
	// var_dump($en_names);
	$br = "<br>";
	$update = "<a href=\"src/updates.php?id=$user_set\" id='edit'>Edit</a>";
	$add = "<a href=\"src/add.php?id=$self_id\" id='add'>Delete</a>";
	$d[] = $en_name;
	$self[] = array($self_id,$image.''.$job_name.''.$br.' '.$en_names.' '.$br.''.$update.''.$add, $parent_id);
	$user_sets[$self_id] = $user_set;
}
// var_dump($d);

//now we check recusively for parentage
$pre_data = tree($self, array(0));

//cleanup so everything looks correct and can be parsed properly
fixArrayKey($user_sets);
$pass1 = removeRecursive($pre_data,0);
$pass2 = removeRecursive($pass1,1);
$data = removeRecursive($pass2,2);

//Building Skill array
 while ($result = mysqli_fetch_assoc($user)){
	 $id = $result['id'];
	 $khname = $result['kh_name'];
	 $enname = $result['en_name'];
	 $chname = $result['ch_name'];
	 $parent = $result['parent_id'];
	 $img = $result['img_url'];
	 $user_list[] = array($id,$enname,$parent_id,$img);
	//  $self[] = array($id, $khname ,$enname,$chname, $parent_id,$img);
	
 }
	
// $users = tree($user_list, array(0));

while($position = mysqli_fetch_assoc($user)) {
	// Assign by reference
	$thisref = &$refs[ $position['id'] ];
	// add the the menu parent
	$thisref['parent_id'] = $position['parent_id'];
	$thisref['id'] = $position['id'];
	// if there is no parent id
	if ($position['parent_id'] == 0) {
		$list[ $position['id'] ] = &$thisref;
	}
	else {
		$refs[ $position['parent_id'] ]['children'][ $position['id'] ] = &$thisref;
	}	
}

$conn->close();
?>
