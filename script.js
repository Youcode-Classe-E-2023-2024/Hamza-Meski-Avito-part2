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

// submit with sign-in form using fetch API
const signin_form = document.getElementById('signin_form');
signin_form.addEventListener('submit', function(event) {
    event.preventDefault(); 
    submitForm2();
})
function submitForm2() {
    const formData = new FormData(signin_form);

    fetch('signIn.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        // console.log(data);
        if (data.includes('</html>')) {
            body.innerHTML = data;
            // Create a promise that resolves when the personal_icon button is clicked
            const personalIconPromise = new Promise((resolve) => {
            const personal_icon = document.getElementById('personal_icon');
            personal_icon.addEventListener('click', async function () {
                // Fetch 'userSection.html' content
                const userSectionResponse = await fetch('userSection.php');
                const userSectionData = await userSectionResponse.text();

                // Resolve the promise with the content of 'userSection.html'
                resolve(userSectionData);
            });
        });

        // Wait for the personal_icon button to be clicked
        return personalIconPromise;
        }else {
            alert(data);
        }
    })
    .then(data => {
        body.innerHTML = data;
    })
    .catch(error => {
        console.error('Error:', error);
    });
}