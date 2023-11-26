<?php
    // Create connection
    $conn = mysqli_connect('localhost', 'root', '', 'avito');
    // SQL query
    $select_query = "SELECT * FROM users";
    $result = mysqli_query($conn, $select_query);
    $data = mysqli_fetch_all($result);

    if($_POST['up_password'] != $_POST['up_confirm']) {
        die('Not identic passwords');
    }

    foreach($data as $user) {
        if($user[1] == $_POST['username'] || $user[2] == $_POST['up_email']) {
            die('username or email already exist, make sure to enter a valid data');
        }
    }
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'up_email', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'up_password', FILTER_SANITIZE_SPECIAL_CHARS);
    // File handling
    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileError = $file['error'];

    $uploadDir = 'img/';
    $uploadPath = $uploadDir . $fileName;
    // Check if a file was uploaded without errors
    if ($fileError === 0) {
        move_uploaded_file($fileTmpName, $uploadPath);
        $insert_query = "INSERT INTO `users` (`username`, `email`, `password`, `path`) VALUES ('$username', '$email', '$password', '$uploadPath')";
        mysqli_query($conn, $insert_query);
    }

    echo('You signed Seccussefully');
    mysqli_close($conn);
?>