const body = document.querySelector('body');
// register switching
const signin_section = document.getElementById('signin_section'); 
const signup_section = document.getElementById('signup_section');
const close_icon = document.getElementById('close_icon');
const signup_button = document.getElementById('signup_button');
if (signin_section) {
    function registerSwitching() {
        function registerHandler() {
            signin_section.classList.toggle('HIDDEN'); 
            signup_section.classList.toggle('HIDDEN');
        }
        close_icon.addEventListener('click', registerHandler);
        signup_button.addEventListener('click', registerHandler);
    }
    registerSwitching();

    // submit with sign-up form using fetch API 
    const signup_form = document.getElementById('signup_form'); 
    signup_form.addEventListener('submit', function(event) {
        event.preventDefault(); 
        submitForm1();
    })
    function submitForm1() {
        const formData = new FormData(signup_form);

        fetch('signUp.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log(data);
            alert(data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
    
}

const personal_icon = document.getElementById('personal_icon'); 
if (personal_icon) {
    personal_icon.addEventListener('click', function() {
        window.location.href = 'userSection.php';
    })
}
// switch into addProductSection.php page
const add_product = document.getElementById('add_product');
if(add_product) {
    add_product.addEventListener('click',  function () {
        window.location.href = 'addProductSection.php';
    });
}
// addProductSection.php logic
const add_product_form = document.getElementById('add_product_form'); 
if (add_product_form) {
    add_product_form.addEventListener('submit', function(event) {
        event.preventDefault(); 
        const formData = new FormData(add_product_form);
        fetch('insertProduct.php', {
            method: 'POST',
            body: formData
        })
        alert('product added Successfully');
    })
}

// userSection_exit handling
// const userSection_exit = document.getElementById('userSection_exit'); 
// if (userSection_exit) {
//     window.location.href = 'signIn.php';
// }

// Back into userSection.php page
const add_product_exit = document.getElementById('add_product_exit'); 
if (add_product_exit) {
    add_product_exit.addEventListener('click', function() {
        window.location.href = 'userSection.php';
    })
}
