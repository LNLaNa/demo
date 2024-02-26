@php
    use App\Enums\RoleEnum;
    use Illuminate\Support\Facades\Storage;
@endphp
@extends('layout')
@section('style')
    <style>
        .age{
            background-color: #000000;
            color: white;
            border-radius: 50%;
            width: 48px;
            height: 48px;
            position: absolute;
            left: 235px;
            top: 5px;
            padding: 5px;
            box-shadow: -5px 8px 8px rgba(34, 60, 80, 0.32);
            /*font-size: 20px;*/
        }
    </style>
@endsection
@section('content')
    @if(auth()->user()?->role == RoleEnum::ADMIN->value)
    <a class="btn btn-dark" style="text-decoration: none;" href="{{route('performances.create')}}">Добавить
        спектакль</a>
    @endif
    <div class="container d-flex flex-row gap-4 flex-wrap ">


        @foreach($performances as $performance)
            <div class="card mt-3" style="width: 18rem;">
                <div class="age">{{$performance->age}}+</div>
                <img src="{{Storage::url($performance->img)}}" class="card-img-top" style="height: 300px">
                <div class="card-body">
                    <h5 class="card-title">{{$performance->name}}</h5>
                    <p class="card-text" style="font-size: 16px">Жанр(ы): {{$performance->genres()->implode('name',', ')}}</p>
                    <p class="card-text" style="font-size: 16px">Цена: {{$performance->price}} руб.</p>
                    <p class="card-text" style="font-size: 16px">Кол-во билетов: {{$performance->tickets}} шт.</p>
                    <div class="buttons d-flex gap-2">
                        <a href="{{route('performances.show', $performance)}}" class="btn btn-dark">Подробнее</a>
                        @if(auth()->user()?->role == RoleEnum::ADMIN->value)
                            <form action="{{route('performances.destroy', $performance)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">Удалить</button>
                            </form>
                        @endif
                        @if(auth()->user()?->role == RoleEnum::USER->value)
{{--                            <form action="{{route('addPerformance')}}" method="post">--}}
{{--                                @csrf--}}
                                <a href="{{route('addPerformance', $performance)}}" class="btn btn-dark">В корзину</a>
{{--                            </form>--}}
                        @endif
                    </div>
                </div>
            </div>
        @endforeach

            @if(auth()->user()?->role == RoleEnum::USER->value)
            <!-- Modal -->
            <div class="modal fade" id="cart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Корзина</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @foreach($performancesInCart as $performance)
                                <div class="performance d-flex justify-content-between">
                                    <h5>{{$performance->name}}</h5>
{{--                                    <p>Кол-во: {{->name}}</p>--}}
                                    <h5>{{$performance->price}} руб.</h5>
                                </div>

                            @endforeach
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark">Заказать</button>
                        </div>
                    </div>
                </div>
            </div>
            @endif
    </div>
@endsection
