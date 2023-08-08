@extends('layouts.guest')

@section('content')
<form method="POST" action="{{ route('login') }}" class="form">
    @csrf
    <div class="form-group not_icon">
        <span class="placeholder">Email</span>
        <input id="email" name="email" type="email" value="{{ old('email') }}"
            class="input form-control @error('email') is-invalid @enderror" required="">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group not_icon">
        <span class="placeholder">Password</span>
        <input id="password" name="password" type="password"
            class="input form-control @error('password') is-invalid @enderror" required="">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div id="response_status"></div>
    <div class="d-flex">
        <button id='loader_msg' type="submit" class="btn btn-blue btn-lg m-auto w-100">Lets go</button><br><br>
    </div>
</form>

@endsection