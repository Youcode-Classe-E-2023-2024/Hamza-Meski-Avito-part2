<?php 
    // Create connection
    $conn = mysqli_connect('localhost', 'root', '', 'avito');
    
    session_start(); 
    $user_id = $_SESSION['me'][0];
    $product_name = filter_input(INPUT_POST, 'product_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
    $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_SPECIAL_CHARS);
    
    // SQL products query
    $insert_product = "INSERT INTO `products` (`user_id`, `product_name`, `description`, `price`) VALUES ('$user_id', '$product_name', '$description', '$price')";
    mysqli_query($conn, $insert_product);

    mysqli_close($conn);
?>