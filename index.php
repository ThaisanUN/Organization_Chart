<?php
//includes
include('create_chart.php');
include('create_skill_list.php');
include('get_info.php');
?>
<!DOCTYPE >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<!-- <link rel="stylesheet" href="style.css"> -->
    <link type="text/css" rel="stylesheet" href="index.css"/>

</head>
<body>
	<!-- <button onclick="myFunction()">clike me</button> -->
<div id="container">
<!-- <div class="appBanner">appbanner</div>
<div id="test" >Click Me</div> -->
<?php
//array creation
	echo '<div id="right" class="orgchart ">';
	// var_dump($data);
	PHPtoOrgChart($data);
	echo '</div>';
	
//Skill Chart. We use the display: types of CSS and some clever java OnClick events to hide/show the needed divs.
	// echo '<div id="left" class="skills">';
	// echo create_list($list);
	// var_dump($list);	
	// echo '</div>';
?>
</div>
<!-- <script>
function noFunction(){
	document.getElementsByClassName('appBanner').style.visibility='hidden';
}
function myFunction() {
  var x = document.getElementById("edit");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script> -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
