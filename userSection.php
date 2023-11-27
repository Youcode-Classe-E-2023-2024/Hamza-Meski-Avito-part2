<form id="myForm"></form>
<?php
    // data coming from adminSection.php: 
    // echo '<pre>'; 
    // print_r($_POST); 
    // echo '</pre>';

    if(isset($_POST['user_id'])) {
        $me[0] = $_POST['user_id'];
    }else {
        session_start(); 
        $me = $_SESSION['me'];
        $_SESSION['myName'] = $me[1];
        $_SESSION['myImage'] = $me[4];
    }
    
    // Create connection
    $conn = mysqli_connect('localhost', 'root', '', 'avito');
    // SQL products query
    $select_products = "SELECT * FROM products";
    $result_products = mysqli_query($conn, $select_products);
    $products = mysqli_fetch_all($result_products);
    // SQL products query
    $select_users = "SELECT * FROM users";
    $result_users = mysqli_query($conn, $select_users);
    $users = mysqli_fetch_all($result_users);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>userSection</title>
    <style>
        .HIDDEN {
            display: none;
        }
    </style>
</head>
<body>
    <section id="user_section" class="p-2 h-screen">
        <nav class="pb-2 flex justify-between items-center border-b border-solid border-black">
            <div class="flex gap-1 items-center">
                <?php 
                if(isset($_POST['user_id'])) {
                ?>
                <div class="h-12 w-12 bg-black rounded-full"></div>
                <div class="">ADMIN</div>
                <?php 
                }else {
                ?>
                <div class="h-12 w-12 rounded-full" style="background-image: url(<?php echo '' . $me[4] . '' ?>);background-size:cover;"></div>
                <div class=""><?php echo $me[1] ?></div>
                <?php }?>
            </div>
            <div class="flex items-center gap-6">
                <?php if(isset($_POST['user_id'])) { ?>
                        <div id="admin_panel" class="flex gap-1 items-center bg-black text-white px-2 py-1 cursor-pointer rounded-md">
                            ADMIN PANEL
                        </div>
                    <?php }else { ?>
                        <div id="add_product" class="flex gap-1 items-center bg-black text-white px-2 py-1 cursor-pointer rounded-md">
                            <div>Add product</div>
                            <ion-icon name="add-outline" class="text-3xl cursor-pointer"></ion-icon>
                        </div>
                    <ion-icon id="userSection_exit" name="home" class="text-3xl cursor-pointer"></ion-icon>
                <?php } ?>
            </div>
        </nav>

        <!-- products section -->
        <?php
        if(isset($_POST['user_id'])) {
        foreach($users as $user) {
            if($user[0] == $_POST['user_id']) {          
            echo <<<HERDOC
                <h1 class="text-center text-xl bg-red-500 p-2 m-1"> $user[1] Section</h1>
                HERDOC;
            }
        }
        }?>
        <section>
            <section class="px-2 py-4 grid grid-cols-5 gap-x-4 gap-y-8">
                <?php 
                $main = '';
                foreach($products as $product) {
                    if($product[1] == $me[0]) {
                        $main .= <<<HERDOC
                        <main class="shadow-md bg-slate-300 h-96 flex flex-col justify-between p-2 transform hover:scale-105 transition-all duration-500">
                            <div class="h-52" style="background-image: url('$product[5]');background-size: cover;background-position: center"></div>
                            <div>$product[3]</div>
                            <div class="flex justify-between font-bold">
                                <div>$product[2]</div>
                                <div>$product[4]$</div>
                            </div>
                            <div class="product_id $product[0] edit_button bg-green-400 font-bold text-sm p-2 text-center cursor-pointer text-white">
                                Edit
                            </div>
                            <div class="product_id $product[0] delete_button bg-red-500 font-bold text-sm p-2 text-center cursor-pointer text-white">
                                Delete
                            </div>
                        </main>
                        HERDOC;
                    }
                }
                echo $main;
                ?>
            </section>
        </section>
    </section>
    <!-- add_product section -->
    <section id="add_product_section" class="HIDDEN p-2 bg-cyan-400 h-screen w-full">
        <nav class="pb-2 flex justify-between items-center border-b border-solid border-black">
            <div class="flex gap-1 items-center">
                <div class="h-12 w-12 bg-black rounded-full"></div>
                <div class="">Hamza meski</div>
            </div>
            <ion-icon id="add_product_exit" name="close-outline" class="text-3xl cursor-pointer"></ion-icon>
        </nav>
        <section class="h-full flex justify-center items-center">
            <!-- add_product form -->
            <form id="add_product_form" class="shadow-md bg-slate-300 px-8 py-4 flex flex-col gap-2 rounded-md w-80">
                <div>
                    <label>Product name</label><br>
                    <input id="" type="text" name="product_name" class="px-4 py-2 rounded-md w-full" required><br>
                </div>
                <div>
                    <label>Product description</label><br>
                    <input id="" type="text" name="description" class="px-4 py-2 rounded-md w-full" required><br>
                </div>
                <div>
                    <label>Product price</label><br>
                    <input id="" type="text" name="price" class="px-4 py-2 rounded-md w-full" required><br>
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="bg-green-400 w-24 rounded-md p-2">submit</button>
                </div>
            </form>
        </section>
    </section>
    <!-- Scripts: -->
    <!-- tailwind cdn -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- local script -->
    <script src="script.js"></script>
</body>
</html>