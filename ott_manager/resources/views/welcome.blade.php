@extends('layouts.header')
<div class="row">
    <div class="col-md-5 login_bg text-center">
        <img src="assets/images/logo-w.png" alt="OTT Play" />
    </div>
</div>
<div class="col-md-7 d-flex align-items-center justify-content-center">
    <div class="text-center"><img src="assets/images/logo_icon.png" alt="OTT Play" /></div>
    <h1 class="text-center font-36">Welcome</h1>
    <br>
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
            <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}"
                class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
            @endauth
        </div>
        @endif
    </div>
</div>