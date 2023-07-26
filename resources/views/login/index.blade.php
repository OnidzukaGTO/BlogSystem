@extends('layouts.auth  ')

@section('auth.content')
<x-card>
    <x-card-header>
        <x-card-title>
            {{__('Login')}}
        </x-card-title>

        <x-slot name='right'>
            <a href="{{route('register')}}">
                {{__('Register')}}
            </a>
        </x-slot>
    </x-card-header>

    <x-card-body>
        <x-form action="{{route('login.store')}}" method="POST">
            <x-form-item>
                <x-label require>{{__('Email')}}</x-label>
                <x-input type="email" name="email" autofocus />
            </x-form-item>
            <x-form-item>
                <x-label>{{__('Password')}}</x-label>
                <x-input type="Password" name="password" />
            </x-form-item>
            <x-form-item>
                <x-checkbox name="remember">
                    {{__('Remember Me')}}
                </x-checkbox>
            </x-form-item>
            <x-button type='submit'>
                {{__('Login')}}
            </x-button>
        </x-form>
    </x-card-body>
</x-card>
@endsection