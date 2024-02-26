@extends('layout')

@section('content')
    <div class="container">
        <h1>Админ панель</h1>

        <a href="{{route('genres.index')}}">Жанры</a>
        <a href="{{route('performances.index')}}">Постановки</a>
    </div>

@endsection

