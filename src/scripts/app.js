"use strict"

const trigger = document.querySelectorAll('.aside__trigger');
const form = document.querySelectorAll('.aside__addform');
const submit = document.querySelectorAll('.aside__addsubmit');

for (let i = 0; i < trigger.length; i++) {
  trigger[i].addEventListener("click", show);
  function show() {
    if (form[i].classList.contains('aside__addform--active')) {
      form[i].classList.remove('aside__addform--active');
    } else {
      form[i].classList.add('aside__addform--active');
    }
  }
}

for (let i = 0; i < submit.length; i++) {
  submit[i].addEventListener("click", deshow);
  function deshow() {
    form[i].classList.add('aside__addform--active');
  }
}

document.addEventListener("click", damn())

function damn() {
  console.log('bonjour')
}