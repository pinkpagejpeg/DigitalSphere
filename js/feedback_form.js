/* selecting elements from a HTML document */

var btn_feedback_header = document.querySelector('.menu_item_button');
var btn_feedback_block_feedback = document.querySelector('.feedback_open_button');
var block_hidden_feedback = document.querySelector('.feedback');
var btn_feedback_close = document.querySelector('.feedback_close');

/* function responsible for displaying the modal window */

function show_feedback_block() {
    block_hidden_feedback.classList.add('feedback_form_show');
}

/* function responsible for hiding the modal window */

function hide_feedback_block() {
    block_hidden_feedback.classList.remove('feedback_form_show');
}

/* calling functions with event listeners */

btn_feedback_header.addEventListener('click', show_feedback_block);
btn_feedback_block_feedback.addEventListener('click', show_feedback_block);
btn_feedback_close.addEventListener('click', hide_feedback_block);