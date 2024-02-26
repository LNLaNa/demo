@extends('layout')

@section('content')


    <div class="container d-flex flex-column justify-content-center"  >
        <h1 class="text-center p-4">Редактировать спектакль</h1>
        <form action="{{route('performances.update', $performance)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <h1>Название</h1>
                <input type="text" name="name" class="form-control" value="{{$performance->name}}">
            </div>
            <div class="mb-3">
                <h1>Дата</h1>
                <input type="date" name="date" class="form-control" value="{{$performance->date}}">
            </div>
            <div class="mb-3">
                <h1>Возраст</h1>
                <input type="number" name="age" class="form-control" value="{{$performance->age}}">
            </div>
            <div class="mb-3">
                <h1>Фото</h1>
                <input type="file" name="img" class="form-control">
            </div>
            <div class="mb-3">
                <h1>Жанры</h1>
                <select class="form-select" name="genre[]" multiple>
                    @foreach($genres as $genre)
                        <option value="{{$genre->id}}" @foreach($performance->genres as $genreId) @if($genre->id == $genreId->id) selected @endif @endforeach>{{$genre->name}}</option>
                    @endforeach

                </select>
            </div>
            <div class="mb-3">
                <h1>Цена</h1>
                <input type="text" name="price" class="form-control" value="{{$performance->price}}">
            </div>
            <button class="btn btn-primary" type="submit">Создать</button>
        </form>
    </div>
@endsection
