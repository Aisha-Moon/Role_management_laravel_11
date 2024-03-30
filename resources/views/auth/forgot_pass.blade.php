@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="wrapper">
            <div class="title"><span>Forgot Password</span></div>
            <form action="{{url('forgot_post')}}" method="post" >
                @include('_messages')

                @csrf

                <div class="row">
                    <i class="fas fa-user"></i>
                    <input type="email" value="" placeholder="Email" required name="email">
                </div>



                <div class="pass"><a href="{{ url('login') }}">Login</a></div>

                <div class="row button">
                    <input type="submit" value="Reset Password">
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
</body>
</html>
@endsection
