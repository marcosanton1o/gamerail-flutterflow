import './bootstrap';

import Alpine from 'alpinejs';
import $ from 'jquery';

window.Alpine = Alpine;
window.$ = $;
window.jQuery = $;

Alpine.start();

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('form');
    if (form) {
        $(form).parsley();
    }
});

window.showDropD = function () {
    let dropD = document.querySelector('.dropD');
    let dropDbutton = document.querySelector('.dropDbutton');
    if (dropD.classList.contains('hidden')) {
        dropD.classList.remove('hidden');
        dropDbutton.classList.remove('bx-chevron-down');
        dropDbutton.classList.add('bx-chevron-up');
    } else {
        dropD.classList.add('hidden');
        dropD.classList.remove('flex');
        dropDbutton.classList.add('bx-chevron-down');
        dropDbutton.classList.remove('bx-chevron-up');
    }
}