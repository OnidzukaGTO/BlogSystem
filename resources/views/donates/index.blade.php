@extends('layouts.main')

@section('page.title', 'List Donates')

@section('main.content')
    <x-title>
        {{__('List Donates')}}
    </x-title>
    @include('donates.stats')
@endsection