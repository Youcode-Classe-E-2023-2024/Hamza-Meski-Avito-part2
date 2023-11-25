const body = document.querySelector('body');
// register switching
function registerSwitching() {
    const close_icon = document.getElementById('close_icon');
    const signup_button = document.getElementById('signup_button');
    const signin_section = document.getElementById('signin_section'); 
    const signup_section = document.getElementById('signup_section');
    
    function registerHandler() {
        signin_section.classList.toggle('HIDDEN'); 
        signup_section.classList.toggle('HIDDEN');
    }
    close_icon.addEventListener('click', registerHandler);
    signup_button.addEventListener('click', registerHandler);
}
registerSwitching();

// submit with sign-up form with fetch API 
const signup_form = document.getElementById('signup_form'); 
signup_form.addEventListener('submit', function(event) {
    event.preventDefault(); 
    submitForm();
})
function submitForm() {
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