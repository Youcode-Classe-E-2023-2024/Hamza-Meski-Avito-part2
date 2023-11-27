<?php 
    // Create connection
    $conn = mysqli_connect('localhost', 'root', '', 'avito');
    // SQL users query
    $select_users = "SELECT * FROM users";
    $result_users = mysqli_query($conn, $select_users);
    $users = mysqli_fetch_all($result_users);

    // SQL products query
    $select_products = "SELECT * FROM products";
    $result_products = mysqli_query($conn, $select_products);
    $products = mysqli_fetch_all($result_products);

    session_start();
    // IMPORTANT! I did handle this logic because of the back into the userSection.php page So keeping the same informations of $_POST array
    if ($_SESSION['init'] == 0) {
        $_SESSION['SIGNIN_POST'] = $_POST;
    }
    $_SESSION['init']++;

    $checker = 0;
    $isAdmin = 0;
    // let's check if the in_email and in_password are for the admin
    if($_SESSION['SIGNIN_POST']['in_email'] == 'admin@gmail.com' && $_SESSION['SIGNIN_POST']['in_password'] == 'admin') {
        $isAdmin = 1;
        $checker = 1;
    }
    foreach($users as $user) {
        if($isAdmin == 1 || $user[2] == $_SESSION['SIGNIN_POST']['in_email'] && $user[3] == $_SESSION['SIGNIN_POST']['in_password']) {
            $checker = 1;
            // 1nd session item
            $_SESSION['me'] = $user;// I will need that value in the userSection.php page
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Home</title>
            </head>
            <body>
                <section id="home" class="p-2 h-screen">
                    <nav class="flex justify-between items-center border-b border-solid border-black">
                        <img src="img/avito-logo.svg" alt="avito-logo" class="w-24">
                        <?php
                            if($isAdmin == 1) {
                                echo '  
                                    <div id="admin_icon" class="flex items-center gap-1 cursor-pointer">
                                        <div>Admin</div>
                                        <ion-icon name="clipboard" class="text-3xl"></ion-icon>
                                    </div>';
                            }else {
                                echo '<ion-icon id="personal_icon" name="person" class="text-3xl cursor-pointer"></ion-icon>';
                            }
                        ?>
                    </nav>

                    <!-- products section -->
                    <section class="">
                        <h1 class="text-2xl text-center p-2">Products Section</h1>
                        <section class="p-2 grid grid-cols-5 gap-x-4 gap-y-8">
            <?php
            $main = '';
            foreach($products as $product) {
                foreach($users as $user) {
                    if ($user[0] == $product[1]) {
                        $main .= <<<HERDOC
                        <main class="shadow-md bg-slate-300 h-96 flex flex-col justify-between p-2 transform hover:scale-105 transition-all duration-500">
                            <div class="flex gap-1 items-center">
                                <div class="h-12 w-12 rounded-full" style="background-image: url('$user[4]');background-size: cover;"></div>
                                <div class="">{$user[1]}</div>
                            </div>
                            <div class="h-52" style="background-image: url('$product[5]');background-size: cover;background-position: center"></div>
                            <div>$product[3]</div>
                            <div class="flex justify-between font-bold">
                                <div>$product[2]</div>
                                <div>$product[4]$</div>
                            </div>
                        </main>
                        HERDOC;
                    }
                }
            }
            echo $main;
            ?>
                        </section>
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
            <?php
            if ($isAdmin == 1) break;
        }
    }
    if ($checker == 0) die('Invalid email or password');
    mysqli_close($conn);
?>