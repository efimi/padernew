<a href="{{url('/login/facebook')}}" class="pure-button pure-button-primary">Facebook</a>
               
<div class="form-box">
<form class="pure-form pure-form-aligned" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
    <fieldset>
        <div class="pure-control-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email">E-Mail Address</label>

            
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="pure-control-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password">Password</label>

            <input id="password" type="password" name="password" required>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="pure-controls">
            <label for="checkbox" class="pure-checkbox">
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
            </label>
           
            <button type="submit" class="pure-button pure-button-primary">
                Login
            </button>

            <a class="pure-button" href="{{ route('password.request') }}">
                Forgot Your Password?
            </a>
        </div>
    </fieldset>
</form>
</div>