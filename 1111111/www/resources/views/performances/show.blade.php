@php
    use App\Enums\RoleEnum;
    use Illuminate\Support\Facades\Storage;
@endphp
@extends('layout')
@section('content')
{{--    <div class="card" style="width: 50rem;">--}}
{{--        <img src="{{Storage::url($performance->img)}}" class="card-img-top" alt="...">--}}
{{--        <div class="card-body">--}}
{{--            <h5 class="card-title">{{$performance->name}}</h5>--}}
{{--            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>--}}
{{--            <a href="#" class="btn btn-dark">Подробнее</a>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="container d-flex gap-4 mt-5">
        <img src="{{Storage::url($performance->img)}}" class="card-img-top" alt="..." style="width: 250px" >
        <div class="description">
            <h3>Название: {{$performance->name}}</h3>
            <p>Жанр(ы): {{$performance->genres()->implode('name',', ')}}</p>
            <p>Дата: {{$performance->date}}</p>
            <p>Возрастной ценз: {{$performance->age}}+</p>
            <p>Цена: {{$performance->price}} руб.</p>
            @if(auth()->user()?->role == RoleEnum::ADMIN->value)
                <a href="{{route('performances.edit', $performance)}}" class="btn btn-dark">Редактировать</a>
            @endif
        </div>
    </div>
@endsection
