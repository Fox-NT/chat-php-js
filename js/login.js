const login = document.querySelector('#login-form');
const loginConfirm = document.querySelector('#login-submit');
const errorText = document.querySelector('.login__error');
login.addEventListener('submit', (e) => {
    e.preventDefault();
})

loginConfirm.addEventListener('click', (e) => {
    // e.preventDefault();
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/login.php", true);
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
                }
                // console.log(data);
            }
        }
    }
    let formData = new FormData(login);
    xhr.send(formData);
})