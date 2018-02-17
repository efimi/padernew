
<h2>Logge dich mit Facebook ein</h2>

<a href="{{url('/login/facebook')}}" class="btn-login">Facebook</a>

               
<h2>Oder mit deiner Email</h2>
   
<form class="" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email">E-Mail Addresse</label>

            
            <input class="btn-login" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password">Password</label>

            <input class="btn-login" id="password" type="password" name="password" required>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div>
            <label for="checkbox" hidden>
                <input class="btn-login" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} checked> bleibe eingeloggt
            </label>
           
            <button type="submit" class="btn-login">
                Login
            </button>

            <a href="{{ route('password.request') }}">
                Passwort vergessen?
            </a>
        </div>

</form>