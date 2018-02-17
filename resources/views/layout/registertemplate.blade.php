<form  method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}

    <div  class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name">Name</label>
            <input class="btn-login" id="name" type="text" name="name" value="{{ old('name') }}" autofocus>
            @if ($errors->has('name'))
                <span>
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email">E-Mail Address</label>

            <input class="btn-login" id="email" type="email" name="email" value="{{ old('email') }}">

            @if ($errors->has('email'))
                    <strong>{{ $errors->first('email') }}</strong>
            @endif
    </div>

    <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" >Passwort</label>

        <div>
            <input class="btn-login" id="password" type="password" name="password">

            @if ($errors->has('password'))
                    <strong>{{ $errors->first('password') }}</strong>
            @endif
        </div>
    </div>

    <div class="form-group">
        <label for="password-confirm">Passwort bestätigen</label>
        <input id="password-confirm" type="password" class="btn-login" name="password_confirmation">
    </div>

   
            <button type="submit" class="btn-middle">
                registrieren
            </button>
      
</form>