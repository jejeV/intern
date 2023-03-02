<template>
    <div class="chatbox-toggle" @click="scrollToElement">
        <i class='bx bx-message-dots'></i>
    </div>
    <div class="chatbox-message-wrapper">
        <div class="chatbox-message-header">
            <div class="chatbox-message-profile">
                <div>
                    <h4 class="chatbox-message-name text-dark">{{ Ticket.t_ticket }}</h4>
                    <p class="chatbox-message-status">{{ Ticket.status }}</p>
                </div>
            </div>
            <div class="chatbox-x">
                <i class='bx bx-x'></i>
            </div>
        </div>
        <div class="chatbox-message-content" ref="scrollToMe">
            <div class="chatbox-message" v-for="message in Messages" v-if="Messages.length > 0">
                <div class="chatbox-message-item sent" v-if = "User == message.user_id">
                    <div class="chatbox-message-item-header">
                        <i class='bx bxs-user text-white chatbox-message-item-icon'></i>
                        <p class="chatbox-message-item-name">{{ message.user.name }}</p>
                    </div>
                    <span class="chatbox-message-item-text">
                        <p>
                            {{ message.komentar }}
                        </p>
                    </span>
                    <span class="chatbox-message-item-time">{{ moment(message.created_at).format("h:mm:ss a") }}</span>
                </div>
                <div class="chatbox-message-item received" v-if = "User != message.user_id">
                    <div class="chatbox-message-item-header">
                        <i class='bx bxs-user chatbox-message-item-icon'></i>
                        <p class="chatbox-message-item-name text-dark">{{ message.user.name }}</p>
                    </div>
                    <span class="chatbox-message-item-text">
                        <p>
                            {{ message.komentar }}
                        </p>
                    </span>
                    <span class="chatbox-message-item-time">{{ moment(message.created_at).format("h:mm:ss a") }}</span>
                </div>
            </div>
            <div class="chatbox-message" v-else>
                <div class="chatbox-message-item-0">
                    <div class="chatbox-message-item-content-0">
                        <i class='bx bxs-chat'></i>
                        <br>
                        <span>Obrolan belum ada, silahkan memulai obrolan</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="chatbox-message-bottom">
            <form action="" class="chatbox-message-form" @submit.prevent="store">
                <div class="chatbox-message-background">
                    <textarea name="" id="" rows="1" placeholder="Type message..." class="chatbox-message-input" v-model="newMessage"></textarea>
                </div>
                <button type="submit" class="chatbox-message-submit"><i class='bx bx-send' ></i></button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import moment from "moment";
var id = window.location.href.split('/').pop();

    export default{

        props: ['user'],

        data(){
            return{
                moment: moment,
                Ticket: '',
                Messages: [],
                Users: '',
                User: this.user.id,

                newMessage: '',
            }
        },

        methods: {
            scrollToElement() {
                
                setTimeout(() => {
                    const container = this.$refs.scrollToMe;
                    container.lastElementChild.scrollIntoView({behaviour:'smooth'})
                }, 50);
            },
            async getTicket(){
                await axios.get(`/ticketapi/${id}`)
                .then(response => {
                    this.Ticket = response.data.data;
                }).catch( error => {
                    console.log(error)
                })
            },
            async getMessage(){
                await axios.get(`/ticket/${id}/message/`)
                .then(response => {
                    // console.log(response)
                    this.Messages = response.data.data;
                }).catch( error => {
                    console.log(error)
                })
            },
            async getUser(){
                await axios.get(`/userapi`)
                .then(response => {
                    this.Users = response.data.data
                }).catch( error => {
                    console.log(error)
                })
            },
            async store(){
                if(this.newMessage == ''){
                    alert('Input Your Message...')
                }else{
                    axios({
                        method: 'post',
                        url: `/ticket/${id}/message/`,
                        data:{
                            komentar: this.newMessage,
                        },
                        headers:{
                            'X-Socket-Id': window.Echo.socketId()
                        }
                    });
                    this.newMessage = ''
                    await this.getMessage();
                    this.scrollToElement();
                }
            }
        },

        mounted(){
            this.getTicket();
            this.getMessage();
            window.Echo.channel('message').listen('MessageCreated', (event) => {
                // console.log(event);
                this.Messages.push({
                    user: event.message.user,
                    komentar: event.message.komentar
                });
                this.scrollToElement();
            });           
            this.getUser();
            this.scrollToElement();
        }
    }

</script>