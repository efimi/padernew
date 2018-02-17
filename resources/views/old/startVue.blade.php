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
    
    <div id="app" >
        <div class="navigation">
            <button href="#" class="login-button" >Login</button>
        </div>

        <div class="logo">
            <img src="img/logo.png" alt="">
        </div>
    {{-- <div class="start-button nonselect" @click="getlocation" :text="buttonText">
            <span>Finde deine Location!</span>
        </div> --}}
        {{-- <div v-if="!user" v-text="Super das du das bist! Logge dich zunächst ein um auf den Button zu klicken!"></div> --}}
        <modal :checked="checked"> <h1 slot="title"></h1></modal>
        <transition name="plop">
         <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
        </transition>
            {{-- <div class="result__content">
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
            </div> --}}

    </div>
    
    

    <script src="/js/vue.js"></script>
</body>
</html>