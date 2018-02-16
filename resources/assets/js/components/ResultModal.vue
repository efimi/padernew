<template id="modal-template">
    <div>
        <div class="Modal" v-show="active">
            <div class="Modal__overlay" @click="close()"></div>
            <div class="Modal__content">
                <div class="Modal__title"><h1>{{data.name}}</h1></div>
                <div class="Modal__pictures">
                    <carousel :perPage="1" :autoplay="true" :autoplayTimeout="2000" :loop="true" :paginationActiveColor="'#89f7fe'" >
                        <slide class="crop" v-for="(photo, photoIndex) in data.photos" :key="photoIndex" v-if="photoIndex < 3">
                            <img :src="photo.url" :alt="data.name + ' Bild ' + photoIndex">
                        </slide>
                    </carousel>
                </div>
                <div class="Modal__body">
                    <slot></slot>
                </div>
                <div class="Modal__footer">
                    <button class="btn" @click="onCancel()">später versuchen</button>
                    <button class="btn btn-ok" @click="onConfirm">hey das passt!</button>
                </div>
            </div>
        </div>
        <div class="Modal__outside">
            <div>
                <span>Ich komme heute</span> <toggle-button :value="true" v-model="checked" :color="{checked: 'skyblue', unchecked: 'lightgrey'}" :sync="true" :lables="true" :labels="{checked: 'zu zweit', unchecked: 'alleine'}" :width="150" :height="40" id="changed-font"/> <span>auf mein PaderMeet treffen!</span>
            </div>
            <div>
                <input type="text" v-model="attribute" placeholder="Gib eine Attribut ein">
                Man kann {{ checked? 'uns' : 'mich'}} an <span v-text="attribute == '' ? ' . . . ' : attribute"></span> erkennen.
            </div>
            
            <a class="start-button" href="#" @click="open()">Let's go!!!</a>
        </div>
    </div>
</template>

<script>
import { Carousel, Slide } from 'vue-carousel';
import axios from 'axios';

export default {
    data: function() {
        return {
            active: false,
            checked: false,
            data:[],
            loadimages: false,
            attribute: '',
        }
    },
    components:{
        Carousel,
        Slide
    },
    props: ['btnText'],
    methods: {
        open: function() {
            this.getlocation()
        },
        close: function() {
            this.active = false
        },
        onCancel: function() {
            this.close();
        },
        onConfirm: function() {
            this.close();
        },
        mounted(){

        },
        getlocation: function() {
            this.data = []
            var vm = this
            axios.get('/api/getlocation/' + (this.checked? 2 : 1)).then(response => vm.data = response.data)
            vm.$nextTick(function(){ vm.active = true })
            console.log('Es sind soviele regestiert worden' + this.checked)

        },
        confirmLocation: function() {
            axios.get('/api/confirmThatICome/' + (this.data.id)).then(resonse =>this.confirmationText)
        }
    }
}
</script>
<style>

</style>