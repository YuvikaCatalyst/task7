<?php

 include('database.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = $_POST['first_name_val'];
        $middle_name = $_POST['middle_name_val'];
        $last_name = $_POST['last_name_val'];

       $file_name = '';
        if (isset($_FILES['upload_file'])) {
            $file_name = $_FILES['upload_file']['name'];
            $file_tmp = $_FILES['upload_file']['tmp_name'];
            move_uploaded_file($file_tmp, "assets/uploads/" . $file_name);
        }


        
       // $sql = "INSERT INTO table1 (first_name, middle_name, last_name, file_name) VALUES ('$first_name', '$middle_name',' $last_name', '$file_name')";
      
       $sql = "SELECT * FROM table1 WHERE first_name = '$first_name' AND middle_name = '$middle_name' AND last_name = '$last_name' AND file_name='$file_name'";
       $check = mysqli_query($conn, $sql);

       if (mysqli_num_rows($check) > 0) {
        $update = "UPDATE table1 SET first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name', file_name = '$file_name' WHERE first_name = '$first_name' AND middle_name = '$middle_name' AND last_name = '$last_name' AND file_name = '$file_name'";
        mysqli_query($conn, $update);
    } else {
        $insert = "INSERT INTO table1 (first_name, middle_name, last_name, file_name) VALUES ('$first_name', '$middle_name', '$last_name', '$file_name')";
        mysqli_query($conn, $insert);
    }
    }
?>

