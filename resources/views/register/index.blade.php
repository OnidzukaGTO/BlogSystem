@extends('layouts.auth')

@section('auth.content')
<x-card>
    <x-card-header>
        <x-card-title>
            {{__('Register')}}
        </x-card-title>
        <x-slot name="right">
            <a href="{{route('login')}}">
                {{__('Login')}}
            </a>
        </x-slot>
    </x-card-header>

    <x-card-body>
        <x-form action="{{route('register.store')}}" method="POST">
            <x-form-item>
                <x-label require>{{__('Name')}}</x-label>
                <x-input name="name" autofocus />
            </x-form-item>

            <x-form-item>
                <x-label require>{{__('Email')}}</x-label>
                <x-input type="email" name="email" />
            </x-form-item>

            <x-form-item>
                <x-label require>{{__('Password')}}</x-label>
                <x-input type="password" name="password" />
            </x-form-item>

            <x-form-item>
                <x-label>{{__('Password Confimation')}}</x-label>
                <x-input type="Password" name="password_confimation" />
            </x-form-item>

            <x-form-item>
                <x-checkbox name="agreement">
                    {{__('Agreement')}}
                </x-checkbox>
            </x-form-item>
            <x-button type='submit'>
                {{__('Register')}}
            </x-button>
        </x-form>
    </x-card-body>
</x-card>
@endsection