<!DOCTYPE html>
<html>
<head>
    <title>PaderMeet</title>
    {{-- Only for locations --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
    body {
        font-family: 'Source Sans Pro', sans-serif;
        background-color: #edeff0;
        color:#333;
        font-size:2em;
    }
    .logo{
        width: auto;
        display: block;
        margin-top: 1em;
        z-index: 0;
    }
    .modal{
        position: fixed;
        top: 0; left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .8);
        display: flex;
        align-items: center;
        justify-content: center;
        pointer-events: none;
    }
    .modal__container{
        border-radius: 50px;
        background-color: #fff;
        padding: 40px;
        max-width: 400px;
        margin: 20px;
        pointer-events: all;
    }
    @media (max-width: 768px) {
        .modal {
            align-items: flex-start;
        }
    }
    </style>
</head>
<body>
    <script src="https://unpkg.com/vue@2.5.13/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/locale/de.js"></script>
    
    <div id="app">
        <div class="navigation">
            <button href="#" class="login-button" @click="showLoginModal = true">Login</button>
        </div>

        <div class="logo">
            <img src="img/logo.png" alt="">
        </div>

        <div class="start-button">
            <span>Finde deine Location!</span>
        </div>

        <div class="result">
            <div class="result__content">
                <div class="location">
                    <h1>Klara</h1>
                    <div class="location__map">
                        <iframe
                          width="300"
                          height="200"
                          frameborder="0" style="border:0"
                          src="https://maps.google.com/?cid=5427443445385247679" allowfullscreen>
                        </iframe>
                    </div>
                    <div class="location__photos">
                        <div class="swipe-carousell">
                            <img src="https://lh3.googleusercontent.com/p/AF1QipOdqX2fI-6geEFXjvivVzuuji4OHWawAEpSIlZy=s1600-w500-h500" alt="">
                            <img src="https://lh3.googleusercontent.com/p/AF1QipOZa9cjuV7wmHQp7Os0zwpm2bAr-w-UY1L7bU9t=s1600-w500-h500" alt="">
                            <img src="https://lh3.googleusercontent.com/p/AF1QipPYS1losQiYuNQDUmcBt7vNnUGi7poUvqBHfVru=s1600-w500-h500" alt="">
                        </div>
                    </div>
                    <div class="location__info">
                        <a href="https://www.facebook.com/karlamachtmichan">Link zur Location</a>
                    </div>
                </div>
            </div>
        </div>    

        <div class="modal" :show="showLoginModal">
            <div class="modal__container">
                <div class="login-modal" style="display: flex; flex-direction: column; align-items: center; max-width: inherit;">
                    <h2>Lege Los!</h2>
                    <div class="logo">
                        <img src="img/logo-small.png"  style="transform: scale(0.5, 0.5);;" alt="">
                    </div>
                    <h3>Logge dich ein:</h3>
                    
                   <div class="button-group" style="display: flex; flex-direction: column;" >
                        <button class="facebook-login" style="width: 300px; margin-top: 1em; border-radius: 100px; background-color: skyblue; padding: 1em 2em; font-size: 16px;">Mit Facebook</button>
                        <button class="email-toggle" style="width: 300px; margin-top: 1em; border-radius: 100px; background-color: skyblue; padding: 1em 2em; font-size: 16px;">mit Email</button>
                   </div>
                </div>
            </div>
        </div>
    </div><-- #app -->
      

        {{-- <div id="app" :style="style.appStyle">
            <navigation></navigation>
            <logo path="img/logo.png"></logo>
            <start-button></start-button>
            <result-location></result-location>
        </div> --}}
    {{-- <script src="{{ asset('js/vue.js') }}"></script> --}}
    <script>
        let bus = new Vue()
        let Modal = {
            template:`
                <div class="modal" :style="modal">
                    <div class="modal__container" :style="modal-container">
                        
                    </div>
                </div>
            `, 
            data(){
                return {
                    modal: {
                        position: 'fixed',
                        top: '0',
                        left: '0', 
                        width: '100%',
                        height: '100%',
                        backgroundColor: 'rgba(0, 0, 0, .5)',
                        display: 'flex',
                        alignItems: 'center',
                        justifyContent: 'center',
                        pointerEvetns: 'none'
                    },
                    modal-container:{
                        backgroundColor: '#fff',
                        padding: '40px',
                        maxWithd: '400px',
                        margin: '20px',
                        pointerEvetns: 'all'
                    }

                }
            }
        }

        let LoginButton = {
            template:`
                <div>
                    <a href="#" :style="loginButton">Login</a>
                </div>
            `,
            data(){
                return {
                    loginButton: {
                        padding: '0.75em 2em',
                        backgroundColor: 'tomato',
                        borderRadius: '0.5em',
                        textDecoration: 'none',
                        color: 'white'
                    }
                }
            }
        }
        let Navigation = {
            components: {
                'login-button': LoginButton
            },
            data(){
                return {
                    navigationStyle: {
                        display: 'flex',
                        justifyContent: 'flex-end',
                        flexDirection: 'row',
                        marginTop: '3em',
                        width: '75%',
                        zIndex: '1',
                    }
                }
            },
            template:`
                <div class="navigtaion-space" :style="navigationStyle">
                    <login-button></login-button>
                </div>
            `
        }
        let Logo = {
            props: ['path'],
            data(){
                return {
                    logoStyle: {
                        width: 'auto',
                        display: 'block',
                        marginTop: '1em',
                        zIndex: '0',
                    }
                }
            },
            template:`
                <img :src="path" :style="logoStyle" alt="">
            `
            }
        let StartButton = {
            template:`
                <div :style="startButton" @click="getLocation">
                    <span>Finde eine Location!</span>
                </div>
            `,
            data(){
                return {
                    startButton: {
                        marginTop: '1em',
                        backgroundColor: 'skyblue',
                        color: 'white',
                        borderRadius: '100px',
                        padding: '0.75em 1em',
                        fontSize: '1em'
                    }
                }
            },
            methods: {
                getLocation(){
                    return {}
                }
            }
        }
        let Resutl = {
            template:`
                <div>
                    <span>Hier kommt das Resutlat hin!</span>
                </div>
            `
        }

        let app = new Vue({
            el: '#app',
            components: {
                'navigation': Navigation,
                'logo': Logo,
                'start-button': StartButton,
                'result-location': Resutl

            },
            data:{
                style: {
                    appStyle:{
                        display: 'flex',
                        width: '100%',
                        backgroundColor: 'white',
                        alignItems: 'center',
                        flexDirection: 'column',
                        
                        flex: '1 1',
                        height: '80vh',
                    }
                }
            }

        })
    </script>
</body>
</html>