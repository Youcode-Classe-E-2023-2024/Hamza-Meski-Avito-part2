<?php 
    // Create connection
    $conn = mysqli_connect('localhost', 'root', '', 'avito');
    
    session_start(); 
    $product_id = filter_input(INPUT_POST, 'product_id', FILTER_SANITIZE_SPECIAL_CHARS);
    $product_name = filter_input(INPUT_POST, 'product_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
    $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_SPECIAL_CHARS);
    
    // SQL products query
    $update_product = "UPDATE products SET product_name='$product_name', description='$description', price='$price' WHERE id=$product_id";
    mysqli_query($conn, $update_product);

    mysqli_close($conn);
?>