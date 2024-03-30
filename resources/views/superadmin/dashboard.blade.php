@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="wrapper">
            <div class="title"><span>Super Admin Dashboard</span></div>
            <form action="">
                <div class="row">
                    <p><b>Name -</b>{{ $getRecord->name }}</p>
                    <p><b>Email -</b>{{ $getRecord->email }}</p>
                </div>
                <div class="signup-link">Logout ? <a href="{{ url('logout') }}">Logout</a></div>
                <div class="signup-link">Home Page ? <a href="{{ url('/') }}">Welcome Page (Home)</a></div>

            </form>
        </div>
    </div>
</body>
</html>
@endsection
