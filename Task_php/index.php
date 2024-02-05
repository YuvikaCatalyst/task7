<?php 
include('database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php_task1</title>
    <link rel="stylesheet" type="text/css" href="assets/css/index.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
   <script src="assets/js/index.js"></script>
</head>
<body>

<form id="myForm" method="post" action="#" enctype="multipart/form-data" autocomplete="off">
    <label for=" first_name">First name:</label><br>
    <input type="text" id="first_name" name="first_name"><br>

    <label for="middle_name">Middle name:</label><br>
    <input type="text" id="middle_name" name="middle_name"><br>

    <label for="last_name">Last name:</label><br>
    <input type="text" id="last_name" name="last_name"><br>

   <input type="file" name="upload_file" id="upload_file">
    <input type="submit" value="upload file" id="uploadButton" name="submit">

    <input type="submit" class="form" id="fetchButton" value="submit">
</form>

<?php 
$sql="SELECT id,first_name,middle_name,last_name,file_name from table1";
$res = mysqli_query($conn, $sql);
if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        echo '<div>';
        echo '<h2> THE DATA ENTERED BY YOU IS: </h2>';
        echo '<p>First Name: ' . $row['first_name'] . '</p>';
        echo '<p>Middle Name: ' . $row['middle_name'] . '</p>';
        echo '<p>Last Name: ' . $row['last_name'] . '</p>';
        echo '<img src="assets/uploads/' . $row['file_name'] . '" alt="Uploaded Image">';
        echo '<input type="submit" class="delete-button" name="delete_id" value="DELETE" data-id="' . $row['id'] . '">';
        echo '</div>';
    }
} 
?>
</body>
</html>


