const passField = document.querySelectorAll('.pass-field'),
      showbtn = document.querySelectorAll('.show-pass-btn');

showbtn.forEach((el, i) => {
    el.addEventListener('click', e => {
        if(e.currentTarget === el) {
            togglePass(i);
        }
    })
})

function togglePass (i) {
    if(passField[i].type === 'text') {
        passField[i].type = 'password';
        showbtn[i].classList.add('fa-eye');
        showbtn[i].classList.remove('fa-eye-slash');
        showbtn[i].style.color = '';
    } else if (passField[i].type === 'password') {
        passField[i].type = 'text';
        showbtn[i].classList.remove('fa-eye');
        showbtn[i].classList.add('fa-eye-slash');
        showbtn[i].style.color = '#000';
    }
}


