<?php 
    // Create connection
    $conn = mysqli_connect('localhost', 'root', '', 'avito');
    
    session_start(); 
    $user_id = $_SESSION['me'][0];
    $product_name = filter_input(INPUT_POST, 'product_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
    $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_SPECIAL_CHARS);
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
        // SQL products query
        $insert_product = "INSERT INTO `products` (`user_id`, `product_name`, `description`, `price`, `path`) VALUES ('$user_id', '$product_name', '$description', '$price', '$uploadPath')";
        mysqli_query($conn, $insert_product);
    }

    mysqli_close($conn);
?>