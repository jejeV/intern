<template>
    <div class="col-lg-7">
        <div class="card">
            <div class="d-flex">
                <h5 class="card-header flex-fill" style="margin-bottom: -1.2rem !important; padding: -1.5rem !important;">Message</h5>
            </div>
            <hr>
            <form method="POST" >
                <div class="card-body " style="margin-top: -1.2rem !important; margin-bottom: -1.2rem !important">
                    <textarea style="" class="form-control mb-2" rows="3" name="komentar" v-model="newMessage"></textarea>
                    <div class="d-flex justify-content-end mt-2">
                        <button type="submit" class="btn btn-primary mb-3">Kirim</button>
                    </div>
                </div>
            </form>
            <button class="btn btn-outline-primary" id="btn-komentar"><i class='bx bxs-chat me-2'></i>Komentar</button>
            <div class="card" id="komentar-utama">
                <div class="card-body bg-default" style="overflow-y: auto; max-height: 500px !important;height: 500px !important; background-color: #f0f2f5;">    
                    <div class="card mb-2 shadow" v-for="message in Messages">
                            <div class="card-body" v-if="user.id == message.id">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row align-items-center">
                                        <i class='bx bxs-user'></i>
                                        <p class="small mb-0 ms-2 text-primary">{{ message.user.name }}</p>
                                    </div>
                                    <div class="d-flex flex-row align-items-center">
                                        <p class="small text-muted mb-0">{{ moment(message.created_at).format("h:mm:ss a") }}</p>
                                    </div>
                                </div>
                                <p class="mt-2">{{ message.komentar }}</p>
                                <!-- <div class="d-flex justify-content-end mt-2">
                                    <button class="btn btn-primary btn-xs" id="btn-balas">Balas</button>
                                </div> -->
                                <!-- <form action="" method="POST" class="mt-2" style="display: none;" id="btn-kedua">
                                    @csrf
                                    <input type="hidden" name="ticket_id" value="{{ $data->id }}">
                                    <input type="hidden" name="parent" value="{{ $komentar->id }}">
                                    <input type="text" name="komentar" class="form-control">
                                    <button type="submit" class="btn btn-primary btn-xs mt-1">Kirim</button>
                                </form> -->
                                <hr>
                                <!-- @foreach ($komentar->childs()->orderBy('created_at', 'desc')->get() as $child)
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex flex-row align-items-center">
                                            <i class='bx bxs-user'></i>
                                            <p class="small mb-0 ms-2 text-primary">{{ $komentar->user->name }}</p>
                                        </div>
                                        <div class="d-flex flex-row align-items-center">
                                            <p class="small text-muted d-flex justify-content-end">{{ $child->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                    <p class="">{{ $child->komentar }}</p>
                                @endforeach -->
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from 'vuex'
import axios from 'axios';
import moment from "moment";
var id = window.location.href.split('/').pop();

    export default{
        computed: {
            ...mapGetters({
                user: 'auth/user'
            })
        },
        data(){
            return{
                moment: moment,
                Ticket: [],
                Messages: [],

                newMessage: [],
            }
        },

        methods: {
            async getTicket(){
                await axios.get(`/ticketapi/`)
                    .then(response => {
                        this.Ticket = response.data.data;
                        // const e = response.data.data.map(val => val.id);
                        // console.log(response.data.data);
                    }).catch( error => {
                        console.log(error)
                    })
            },
            async getMessage(){
                await axios.get(`/ticket/${id}/message/`)
                .then(response => {
                    this.Messages = response.data.data;
                    // console.log(response.data)
                })
            },
            store(){
                if(this.newMessage == ''){
                    alert('Input Your Message...')
                }
                axios.post(`/ticket/${id}/message/`,{
                    komentar: this.newMessage,
                })
                this.newMessage = ''
                this.getMessage();
            }
        },

        mounted(){
            this.getTicket()
            this.getMessage()
        },
    }

</script>