<!DOCTYPE html>
<html>
<head>
    <title>PaderMeet</title>
    {{-- <link rel="stylesheet" href="https://unpkg.com/blaze"> --}}
    {{-- Only for locations --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
    body {
        font-family: 'Source Sans Pro', sans-serif;
        background-color: #edeff0;
        color:#333;
        font-size:2em;

    }
    </style>
</head>
<body>
    <script src="https://unpkg.com/vue@2.5.13/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/locale/de.js"></script>
        <div id="app" :style="style.appStyle">
            {{-- tutorial-swipe --}}
            <navigation></navigation>
            <logo path="img/logo.png"></logo>
            <start-button></start-button>
            <result-location></result-location>
            {{-- <h1> Willkommen bei PaderMeet</h1>
            <h2> Drücke auf den Button und finde heraus wo es für dich hingeht!</h2>
            <invite-text></invite-text>
            <count-down-today time="16" v-show=></count-down-today>
            <location-box></location-box> --}}
        </div>
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script src="{{ asset('js/vue.js') }}"></script>
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