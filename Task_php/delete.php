<?php
include('database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $deleteId = $_POST['delete_id'];

    $deleteQuery = "DELETE FROM table1 WHERE id = '$deleteId'";
    mysqli_query($conn, $deleteQuery);
}
?>
