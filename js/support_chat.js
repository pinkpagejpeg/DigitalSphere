/* selecting elements from a HTML document */

var btn_support_chat = document.querySelector('.support_chat_open');
var block_hidden_support_chat = document.querySelector('.support_chat');
var btn_support_chat_close = document.querySelector('.support_chat_close');

/* function responsible for displaying the modal window */

function show_feedback_block() {
    block_hidden_support_chat.classList.add('support_chat_show');
}

/* function responsible for hiding the modal window */

function hide_feedback_block() {
    block_hidden_support_chat.classList.remove('support_chat_show');
}

/* calling functions with event listeners */

btn_support_chat.addEventListener('click', show_feedback_block);
btn_support_chat_close.addEventListener('click', hide_feedback_block);