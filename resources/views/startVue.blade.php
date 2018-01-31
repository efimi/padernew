<!DOCTYPE html>
<html>
<head>
    <title>PaderMeet</title>
    {{-- Only for locations --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <script src="https://unpkg.com/vue@2.5.13/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/locale/de.js"></script>
    {{-- <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script> --}}


    {{-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script> --}}
    
    <div id="app" >
        <div class="navigation">
            <button href="#" class="login-button" >Login</button>
        </div>
       {{--  <login-modal v-show="isModalVisible" @close="closeModal"></login-modal> --}}

        <div class="logo">
            <img src="img/logo.png" alt="">
        </div>
    <input type="checkbox" id="checkbox" v-model="checked">
<label for="checkbox" v-text="(checked? 'zu zweit' : 'alleine')"> <br></label>
    <div class="start-button nonselect" @click="getlocation" :text="buttonText">
            <span>Finde deine Location!</span>
        </div>

       
            <div class="result__content">
                <div class="location">
                    <transition name="fade">
                        <h1 v-if="data.name" v-text="data.name"></h1>
                    </transition>

                    <transition name="fade">
                        <h2 v-if="data.address" v-text="data.address"></h2>
                    </transition>
                        
                    <transition-group name="fade">
                            <div class="location__photos" v-for="(photo, photoIndex) in data.photos" :key="photoIndex">
                                   <img v-if="photoIndex < 2" :src="photo.url" :alt="data.name + ' Bild ' + photoIndex">
                            </div>
                    </transition-group> 
                    <transition name="fade">
                        <div class="location__info" v-if="data.website">
                            <span v-text="'Derzeit kommen '+ data.used + ' Personen!'"></span>
                            <br>
                            <div @click="confirmLocation" :class="{'start-button': data}" v-text="'Ich gehe hier hin!'">
                            </div>
                            <br>
                            <a :href="data.website" v-text="'Link zur Location'"></a>
                        </div>
                    </transition>   
                </div>
            </div>
    </div>    
    <script src="/js/vue.js"></script>
</body>
</html>