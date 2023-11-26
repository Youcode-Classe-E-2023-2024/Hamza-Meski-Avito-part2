<?php
    require_once 'createDB.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>landingPage</title>
    <style>
        .HIDDEN {
            display: none;
        }
    </style>
</head>
<body>
    <!-- User Register Section -->
    <section>
        <!-- Sign in Section -->
        <section id="signin_section" class=" p-2 h-screen ">
            <nav class="flex justify-between items-center border-b border-solid border-black">
                <img src="img/avito-logo.svg" alt="avito-logo" class="w-24">
                <button id="signup_button" class="bg-green-400 py-1 px-2 rounded-md">Sign-up</button>
            </nav>
    
            <!-- sign-in form: -->
            <section class="h-full w-full flex justify-center items-center">
                <form id="signin_form" action="signIn.php" method="post" class="shadow-md bg-slate-300 px-8 py-4 flex flex-col gap-2 rounded-md w-80">
                    <div>
                        <label>Your email</label><br>
                        <input id="in_email" type="email" name="in_email" placeholder="hamzameski@gmail.com" class="px-4 py-2 rounded-md w-full" required><br>
                    </div>
                    <div>
                        <label>Your password</label><br>
                        <input id="in_password" type="password" name="in_password" placeholder="*******************" class="px-4 py-2 rounded-md w-full" required><br>
                    </div>
                    <div class="flex justify-center">
                        <button type="submit" class="bg-green-400 w-24 rounded-md p-2">Sign in</button>
                    </div>
                </form>
            </section>
        </section>

        <!-- Sign up Section -->
        <section id="signup_section" class="HIDDEN p-2  h-screen">
            <nav class="flex justify-between">
                <div></div>
                <ion-icon id="close_icon" name="close" class="text-2xl cursor-pointer"></ion-icon>
            </nav>
            <!-- sign-up form: -->
            <section class="h-full w-full flex justify-center items-center">
                <form id="signup_form" class="shadow-md bg-slate-300 px-8 py-4 flex flex-col gap-2 rounded-md w-80">
                    <div>
                        <label>Username</label><br>
                        <input id="username" type="text" name="username" placeholder="hamza meski" class="px-4 py-2 rounded-md w-full" required><br>
                    </div>
                    <div>
                        <label>Your email</label><br>
                        <input id="up_email" type="email" name="up_email" placeholder="hamzameski@gmail.com" class="px-4 py-2 rounded-md w-full" required><br>
                    </div>
                    <div>
                        <label>Your password</label><br>
                        <input id="up_password" type="password" name="up_password" placeholder="*******************" class="px-4 py-2 rounded-md w-full" required><br>
                    </div>
                    <div>
                        <label>Confirm password</label><br>
                        <input id="up_confirm" type="password" name="up_confirm" placeholder="*******************" class="px-4 py-2 rounded-md w-full" required><br>
                    </div>
                    <div class="flex justify-center">
                        <button type="submit" id="signup_button2" class="bg-green-400 w-24 rounded-md p-2">Sign up</button>
                    </div>
                </form>
            </section>
        </section>
    </section>

    <!-- Scripts: -->
    <!-- tailwind cdn --> 
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- local scripts: -->
    <script src="script.js"></script>

</body>
</html>