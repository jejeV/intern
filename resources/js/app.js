import './bootstrap';
import '../css/app.css';

import {
    createApp
} from "vue/dist/vue.esm-bundler";
import App from './components/App.vue';

const app = createApp({
    components: {
        'messages': App
    }
})
app.mount("#app")

// JS CHATS BOX

// TOGGLE CHATBOX
const chatboxToggle = document.querySelector('.chatbox-toggle')
const chatboxMessage = document.querySelector('.chatbox-message-wrapper')
const Body = document.body;
// console.log(chatboxMessage);

chatboxToggle.addEventListener('click', function () {
    chatboxMessage.classList.toggle('show');
    chatboxToggle.classList.toggle('show');
    Body.style.overflow = "hidden";
});

// TOGGLE CLOSSE
const chatboxClose = document.querySelector('.chatbox-x')

chatboxClose.addEventListener('click', function () {
    chatboxMessage.classList.toggle('show');
    chatboxToggle.classList.toggle('show');
    Body.style.overflow = "";
})

// End Js Chats Box

// MESSAGE INPUT
const textarea = document.querySelector('.chatbox-message-input')
const chatboxForm = document.querySelector('.chatbox-message-form')

// console.log(chatboxForm);
textarea.addEventListener('input', function () {
    let line = textarea.value.split('\n').length

    if (textarea.rows < 6 || line < 6) {
        textarea.rows = line
    }

    if (textarea.rows > 1) {
        chatboxForm.style.alignItems = 'flex-end'
    } else {
        chatboxForm.style.alignItems = 'center'
    }

});
