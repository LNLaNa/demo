@extends('layout')

@section('content')
    <div class="container">
        <form action="{{route('performances.store')}}" method="post" enctype="multipart/form-data" style="max-width: 600px; margin: auto; display: flex; flex-wrap: wrap; gap: 20px;">
        @csrf
            <h2 style="margin: auto">Добаить постановку</h2>
            <input type="text" class="form-control" name="name" placeholder="название">
            <input type="number" class="form-control" name="price" placeholder="Цена">
            <input type="number" class="form-control" name="age_limit" placeholder="Возрастное ограничение">
            <input type="file" required class="form-control" name="image" placeholder="Картинка">
            <select class="form-select" name="genre[]" multiple>
                @foreach($genres as $genre)
                    <option value="{{$genre->id}}">{{$genre->name}}</option>
                @endforeach

            </select>
            <input type="date" class="form-control" name="date" placeholder="Дата">
            <button class="btn btn-outline-info m-auto">Добавить</button>
        </form>
    </div>
@endsection
