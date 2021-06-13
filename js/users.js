const usersList = document.querySelector('.users__list');
const search = document.querySelector('#search');
const searchBtn = document.querySelector('.search--btn');

search.addEventListener('input', () => {
    let searchTerm = search.value;
    if (searchTerm != '') {
        search.classList.add('active');
    } else {
        search.classList.remove('active')
    }
    let xhr = new XMLHttpRequest();
    xhr.open("POST", 'php/search.php', true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                usersList.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
    xhr.send("searchTerm=" + searchTerm);

})
setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", 'php/users.php', true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (!search.classList.contains('active')) {
                    usersList.innerHTML = data;
                }
            }
        }
    }
    xhr.send();
}, 500)