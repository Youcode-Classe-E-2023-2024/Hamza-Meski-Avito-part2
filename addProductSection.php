<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addProductSection</title>
</head>
<body>
    <!-- add_product section -->
    <section id="add_product_section" class="p-2 h-screen w-full">
        <nav class="pb-2 flex justify-between items-center border-b border-solid border-black">
            <div class="flex gap-1 items-center">
                <div class="h-12 w-12 rounded-full" style="background-image: url(<?php echo '' . $_SESSION['myImage'] . '' ?>);background-size:cover;"></div>
                <div class=""><?php echo $_SESSION['myName'] ?></div>
            </div>
            <ion-icon id="add_product_exit" name="close-outline" class="text-3xl cursor-pointer"></ion-icon>
        </nav>
        <section class="h-full flex justify-center items-center">
            <!-- add_product form -->
            <form id="add_product_form" class="shadow-md bg-slate-300 px-8 py-4 flex flex-col gap-2 rounded-md w-80" enctype="multipart/form-data">
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
                <div>
                    <label>Select product image</label><br>
                    <input type="file" name="file" required><br>
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