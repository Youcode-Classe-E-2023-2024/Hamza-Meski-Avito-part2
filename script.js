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
const userSection_exit = document.getElementById('userSection_exit'); 
if (userSection_exit) {
    userSection_exit.addEventListener('click', function() {
        window.location.href = 'signIn.php';
    })
}

// Back into userSection.php page
const add_product_exit = document.getElementById('add_product_exit'); 
if (add_product_exit) {
    add_product_exit.addEventListener('click', function() {
        window.location.href = 'userSection.php';
    })
}
// edit buttons handling 
let product_id;
const edit_button = document.querySelectorAll('.edit_button'); 
if (edit_button) {
    for (const button of edit_button)
    button.addEventListener('click', function(event) {
        const closestEelement = event.target.closest('.product_id');
        const otherClassNames = Array.from(closestEelement.classList);
        console.log(otherClassNames[1]);
        product_id = otherClassNames[1];

        // Save product_id in localStorage
        localStorage.setItem('product_id', product_id);

        window.location.href = 'editProductSection.php';
    })
}
const edit_product_form = document.getElementById('edit_product_form'); 
if (edit_product_form) {
    edit_product_form.addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(edit_product_form);
    
        // Retrieve product_id from localStorage
        product_id = localStorage.getItem('product_id');

        formData.append('product_id', Number(product_id));
        fetch('updateProduct.php', {
            method: 'POST',
            body: formData
        })
        alert('product Updated Successfully');
    })
}
const edit_product_exit = document.getElementById('edit_product_exit'); 
if (edit_product_exit) {
    edit_product_exit.addEventListener('click', function() {
        window.location.href = 'userSection.php';
    })
}

// Delete buttons handling
const delete_button = document.querySelectorAll('.delete_button'); 
for(const button of delete_button) {
    button.addEventListener('click', function(event) {
        const closestEelement = event.target.closest('.product_id');
        const otherClassNames = Array.from(closestEelement.classList);
        // console.log(otherClassNames[1]);
        const formData = new FormData();
        formData.append('product_id', Number(otherClassNames[1]));
        fetch('deleteProduct.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(()=> {
            window.location.reload();
            alert('product Was Deleted Successfully');
        })
    })
}

// admin section handling 
const admin_icon = document.getElementById('admin_icon'); 
if (admin_icon) {
    // console.log(admin_icon);
    admin_icon.addEventListener('click', function() {
        
    })
}