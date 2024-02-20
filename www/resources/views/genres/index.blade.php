@extends('layout')

@section('content')
    <div class="container">
        <h1>Жанры</h1>

        <h3>Добавить</h3>
        <form action="{{route('genres.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" name="name" placeholder="Название" required>
                </div>
                <div class="col">
                    <button class="btn btn-outline-info">Добавить</button>
                </div>
            </div>

        </form>

        <h3>Все</h3>
        <table>
            <thead>
            <tr>
                <td>Название</td>
            </tr>
            </thead>
            <tbody>
            @foreach($genres as $genre)
                <tr>
                    <td>{{$genre->name}}</td>
                    <td><a href="{{route('genres.destroy',$genre)}}" class="btn btn-outline-danger">Удалить</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
