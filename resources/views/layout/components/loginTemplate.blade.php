<h2>Logge dich mit Facebook ein</h2>

<a href="{{url('/login/facebook')}}" class="btn-login">Facebook</a>
               
{{-- <h2>Oder mit deiner Email</h2>
   
<form class="" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
    <fieldset>
        <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email">E-Mail Addresse</label>

            
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password">Password</label>

            <input id="password" type="password" name="password" required>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="">
            <label for="checkbox" class="">
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> bleibe eingeloggt
            </label>
           
            <button type="submit" class="btn-login">
                Login
            </button>

            <a class="btn-grey" href="{{ route('password.request') }}">
                Passwort vergessen?
            </a>
        </div>
    </fieldset>

</form> --}}