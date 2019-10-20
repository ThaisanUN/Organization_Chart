    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link type="text/css" rel="stylesheet" href="../index.css"/>

        <title>Insert Page</title>
    </head>
    <body class= ' body'>
    <div class="container" style="width:500px;">
            <h3 style="padding:10px;">Insert User</h3>
            <form action="add.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="parent_id" value=<?php echo $_GET['parent_id'];?>>
            <Label for="job_title">Position</Label>
            <input type="text" name="job_title" class="form-control" placeholder="Input Position " required>
            <Label for="english">English Name</Label>
            <input type="text" name="english" class="form-control" placeholder="input Name in english">
            <Label for='khmer'>Khmer Name</Label>
            <input type="text" name="khmer" class="form-control" placeholder="input Name in khmer">
            <Label for='chine'>Chinese Name</Label>
            <input type="text" name="chine" class="form-control" placeholder="input name in china">
            <Label for='image'>Image</Label><br>
            <input type="file" name ='name_file' name="files[]" multiple><br> 
            <a href="../index.php" class= "btn btn-primary ">Cancel</a>
            <input type="submit" name="submit" value="Insert" class="btn btn-primary ">
        </form>
        </div>
    </body>
    </html>

