@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="/auth/register" enctype="multipart/form-data">
    {!! csrf_field() !!}

    <div>
        First name
        <input type="text" name="first_name" value="{{ old('first_name') }}">
    </div>
    <div>
        Last name
        <input type="text" name="last_name" value="{{ old('last_name') }}">
    </div>
    <div>
        Email
        <input type="text" name="email" value="{{ old('email') }}">
    </div>

    <div>
        Password
        <input type="password" name="password">
    </div>

    <div>
        Confirm Password
        <input type="password" name="password_confirmation">
    </div>
    <input type="file" name="file" id="file">

    <div>
        <button type="submit">Register</button>
    </div>
</form>
