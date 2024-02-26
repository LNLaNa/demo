@extends('layout')

@section('content')
    <div class="container">
        <h1>Спектакль</h1>

        <div style="display: flex; flex-wrap: wrap; gap: 20px;">

            <div class="card" style="width: 18rem;">
                <img src="{{\Illuminate\Support\Facades\Storage::url($performance->image)}}" class="card-img-top" alt="...">

                    <div class="card-body">
                        <h5 class="card-title">{{$performance->name}}</h5>
                        <p class="card-text">Цена: {{$performance->price}}</p>
                        <p class="card-text">Дата: {{$performance->date}}</p>
                        <p class="card-text">Возрастное ограничение: {{$performance->age_limit}}+</p>
                        <p class="card-text">Осталось билетов: {{$performance->tickets}}</p>
                        {{--                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>--}}
                        @if(auth()->user()?->isAdmin == 1)
                            <a href="{{route('performances.edit',$performance)}}" class="btn btn-primary">Редактировать</a>
                            <a href="{{route('performances.destroy',$performance)}}" class="btn btn-danger">Удалить</a>
                        @endif
                    </div>
            </div>

        </div>
    </div>

@endsection
