@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="wrapper">
            <div class="title"><span>Reset Password</span></div>
            @include('_messages')
            <form action="{{ url('reset_post/'.$token) }}" method="post">
                @csrf

                <div class="row">
                    <i class="fas fa-user"></i>
                    <input type="password" value="{{ old('password') }}" placeholder="Password" required name="password">
                    <div style="color:red">{{ $errors->first('password') }}</div>

                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" value="" placeholder="Confirm Password" required name="confirm_password">
                    <div style="color:red">{{ $errors->first('confirm_password') }}</div>

                </div>


                <div class="row button">
                    <input type="submit" value="Reset">
                </div>


            </form>

    </div>
</div>
</body>
</html>
@endsection
