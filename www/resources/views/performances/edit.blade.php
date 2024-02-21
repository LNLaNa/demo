@extends('layout')

@section('content')
    <div class="container">
        <form action="{{route('performances.store')}}" enctype="multipart/form-data" style="max-width: 600px; margin: auto; display: flex; flex-wrap: wrap; gap: 20px;">
        @csrf
            <h2 style="margin: auto">Добаить постановку</h2>
            <input type="text" class="form-control" name="name" placeholder="навзание">
            <input type="number" class="form-control" name="price" placeholder="Цена">
            <input type="number" class="form-control" name="age_limit" placeholder="Возрастное ограничение">
            <input type="text" class="form-control" name="image" placeholder="Картинка">
            <input type="date" class="form-control" name="date" placeholder="Дата">
            <button class="btn btn-primary">Добавить</button>
        </form>
    </div>
@endsection
