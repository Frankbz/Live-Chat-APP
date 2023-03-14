<?php
    $conn = mysqli_connect("localhost", "root", "", "chat2");
    if (!$conn){
        echo "Database Connection Error".mysqli_connect_error();
    }
?>