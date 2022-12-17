@extends('layouts.empty')

@section('content')
    <div class="w-100 h-100 d-flex align-items-center justify-content-center">
        <div class="w-25 d-flex flex-column bg-light p-5 border border-secondary rounded">

            @foreach($errors as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{$error}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endforeach

            <div class="d-flex justify-content-center mb-2">
                <img src="{{ asset('images/logo200x200.png') }}" style="height: 100px; padding-right: 10px;" class="rounded float-left" alt="{{ env('APP_NAME') }}">
            </div>

            <div>
                <form method="POST" action="{{ route('login.send') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="backUri" value="{{ $backUri }}">
                    <div class="form-group">
                        <label for="email">Email address or username</label>
                        <input name="email" type="text" class="form-control" id="email" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" type="password" class="form-control" id="password">
                    </div>
                    <div class="form-group form-check">
                        <input name="checked" type="checkbox" class="form-check-input" id="check">
                        <label class="form-check-label" for="check">Check me out</label>
                    </div>
                    <div class="d-flex flex-column align-items-center pt-2">
                        <button type="submit" class="btn btn-primary w-50">Login</button>
                        <a href="{{ route('register') }}" class="link-primary mt-3">Sign Up?</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

