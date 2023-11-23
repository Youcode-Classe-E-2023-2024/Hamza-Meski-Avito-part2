const close_icon = document.getElementById('close_icon'); 
const signin_section = document.getElementById('signin_section'); 
const signup_section = document.getElementById('signup_section'); 

close_icon.addEventListener('click', function() {
    signin_section.classList.toggle('HIDDEN'); 
    signup_section.classList.toggle('HIDDEN');
})