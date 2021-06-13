const form = document.querySelector('.chat__send');
const incoming_id = form.querySelector(".incoming_id").value;
const input = form.querySelector('#send');
const btn = form.querySelector('.send-btn');
const msgList = document.querySelector('.chat__container');

form.addEventListener('submit', (e) => {
    e.preventDefault();
})

btn.addEventListener('click', () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", 'php/insert-message.php', true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                input.value = '';
                let data = xhr.response;
                console.log(data);
            }

        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
})

setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", 'php/get-messages.php', true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let res = xhr.response;
                msgList.innerHTML = res;
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("incoming_id="+incoming_id);
}, 500)