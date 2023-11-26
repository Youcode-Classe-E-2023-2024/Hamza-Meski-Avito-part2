<?php 
    // Create connection
    $conn = mysqli_connect('localhost', 'root', '', 'avito');
    $product_id = filter_input(INPUT_POST, 'product_id', FILTER_SANITIZE_SPECIAL_CHARS);
    
    // SQL products query
    $delete_product = "DELETE FROM products WHERE id = $product_id";
    mysqli_query($conn, $delete_product);
    mysqli_close($conn);
?>

