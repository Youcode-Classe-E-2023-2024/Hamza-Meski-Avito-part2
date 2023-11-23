<?php 
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "your_database_name";
    
    // Establish a connection
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

    // SQL query to insert data
    $sql = "INSERT INTO users (username, email) VALUES ('$username', '$email')";

    mysqli_query($conn, $sql);
    mysqli_close($conn);
?>