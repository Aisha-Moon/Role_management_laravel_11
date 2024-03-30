@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="wrapper">
            <div class="title"><span>Login</span></div>
            @include('_messages')
            <form action="{{ url('login_post') }}" method="post">
                @csrf

                <div class="row">
                    <i class="fas fa-user"></i>
                    <input type="email" value="{{ old('email') }}" placeholder="Email" required name="email">
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" value="" placeholder="Password" required name="password">
                </div>


                <div class="pass"><a href="{{ url('forgot') }}">Forgot Password</a></div>
                <div class="row button">
                    <input type="submit" value="Login">
                </div>
                <div class="signup-link">
                    Join Now ? <a href="{{ url('registration') }}">Registration</a>
                </div>
                <div class="signup-link">
                    Welcome Page ? <a href="{{ url('/') }}">Welcome page</a>
                </div>
            </form>

    </div>
</div>

@endsection
