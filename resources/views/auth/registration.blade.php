@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="wrapper">
            <div class="title"><span>Registration</span></div>
            <form action="{{ url('registration_post') }}" method="post">
                @csrf
                <div class="row">
                    <i class="fas fa-user"></i>
                    <input type="text" value="{{ old('name') }}" placeholder="Username" required name="name">
                    <div style="color:red">{{ $errors->first('name') }}</div>
                </div>
                <div class="row">
                    <i class="fas fa-user"></i>
                    <input type="email" value="{{ old('email') }}" placeholder="Email" required name="email">
                    <div style="color:red">{{ $errors->first('email') }}</div>

                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" value="" placeholder="Password" required name="password">
                    <div style="color:red">{{ $errors->first('password') }}</div>

                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" value="" placeholder="Confirm Password" required name="confirm_password">
                    <div style="color:red">{{ $errors->first('confirm_password') }}</div>

                </div>
                <div class="row">
                    <select name="is_role" class="selectbox">
                        <option value="">Select Role</option>
                        <option {{ old('is_role') == '2' ? 'selected' : '' }} value="2">Super Admin</option>
                        <option {{ old('is_role') == '1' ? 'selected' : '' }} value="1">Admin</option>
                        <option {{ old('is_role') == '0' ? 'selected' : '' }} value="0">User</option>
                    </select>
                    <div style="color:red">{{ $errors->first('is_role') }}</div>

                </div>
                <div class="pass"><a href="{{ url('forgot') }}">Forgot Password</a></div>
                <div class="row button">
                    <input type="submit" value="Register">
                </div>
                <div class="signup-link">
                    Sign In ? <a href="{{ url('login') }}">Login</a>
                </div>
                <div class="signup-link">
                    Welcome Page ? <a href="{{ url('/') }}">Welcome page</a>
                </div>
            </form>

    </div>
</div>
</body>
</html>
@endsection
