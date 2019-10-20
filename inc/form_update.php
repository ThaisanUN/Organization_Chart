<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="../index.css"/>

    <title>Edit Page</title>
</head>
<body class="body">
<div class="container" style="width:500px;">
    <h3  style="padding:10px;">Edit Information</h3>
    <form action="update.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
    <Label for="english">English Name</Label>
    <input type="text" name="english" class="form-control" placeholder="input name in english" >
    <Label for='khmer'>Khmer Name</Label>
    <input type="text" name="khmer" class="form-control" placeholder="input name in khmer">
    <Label for='chine'>Chinese Name</Label>
    <input type="text" name="chine" class="form-control" placeholder="input name in china" >
    <Label for='image'>Image</Label><br>
    <input type="file" name="name_file" ><br>
    <a href="../index.php" class= "btn btn-primary">Cancel</a> 
      <input type="submit" name="submit" value="Edit" class="btn btn-primary button">
   
    </form>
    </div>
</body>
</html>

