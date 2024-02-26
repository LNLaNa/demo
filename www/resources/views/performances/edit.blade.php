@extends('layout')

@section('content')
    <div class="container">
        <form action="{{route('performances.update',$performance)}}" method="post" enctype="multipart/form-data" style="max-width: 600px; margin: auto; display: flex; flex-wrap: wrap; gap: 20px;">
        @csrf
            @method('put')
            <h2 style="margin: auto">Редактировать постановку</h2>
            <input type="text" class="form-control" name="name" value="{{$performance->name}}" placeholder="название">
            <input type="number" class="form-control" name="price" value="{{$performance->price}}" placeholder="Цена">
            <input type="number" class="form-control" name="age_limit" value="{{$performance->age_limit}}" placeholder="Возрастное ограничение">
            <input type="file" class="form-control" name="image" >
            <input type="date" class="form-control" name="date" value="{{$performance->date}}">
            <select class="form-select" name="genre[]" multiple>
                <option selected disabled>Жанры</option>
                @foreach($genres as $genre)
                    <option value="{{$genre->id}}" @foreach($performance->genres as $genreId) @if($genre->id == $genreId->id) selected @endif @endforeach>{{$genre->name}}</option>
                @endforeach
            </select>
            <button class="btn btn-outline-info m-auto">Редактировать</button>
        </form>
    </div>
@endsection
