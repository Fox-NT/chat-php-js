const signup = document.querySelector('#signup-form');
const signupConfirm = document.querySelector('#signup-submit');
const errorText = document.querySelector('.signup__error');
const passLabel = document.querySelector('.password label');
const passConfirmLabel = document.querySelector('.signup__password--confirm label');
const pass = document.querySelector('.password input');
const passConfirm = document.querySelector('.signup__password--confirm input');
const emailLabel = document.querySelector('.signup__email label');
const email = document.querySelector('.signup__email input');
signup.addEventListener('submit', (e) => {
    e.preventDefault();
})

signupConfirm.addEventListener('click', (e) => {
    // e.preventDefault();
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/signup.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === 'Выполнено') {
                    console.log('Confirm')
                    errorText.style.display = 'none';
                    location.href = 'users.php'
                } else {
                    errorText.textContent = data;
                    errorText.style.display = 'block';
                    pass.style.borderColor = '';
                    passConfirm.style.borderColor = '';
                    passLabel.style.color = '';
                    passConfirmLabel.style.color = '';
                    email.style.borderColor = '';
                    emailLabel.style.color = '';
                    if (data === 'Пароли не совпадают') {
                        pass.style.borderColor = '#f93f3f';
                        passConfirm.style.borderColor = '#f93f3f';
                        passLabel.style.color = '#f93f3f';
                        passConfirmLabel.style.color = '#f93f3f';
                    }
                    if (data === 'Этот адрес электронной почты неверный!') {
                        email.style.borderColor = '#f93f3f';
                        emailLabel.style.color = '#f93f3f';
                    }
                }
            }
        }
    }
    // if (pass.value !== passConfirm.value) {
    //     errorText.textContent = `Пароли не совпадают!`;
    //     errorText.style.display = 'block';
    //     return;
    // }
    errorText.textContent = ``;
    errorText.style.display = 'none';
    let formData = new FormData(signup);
    xhr.send(formData);
})