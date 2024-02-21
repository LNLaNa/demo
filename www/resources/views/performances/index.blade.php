@extends('layout')

@section('content')
    <div class="container">
        <h1>Афиша</h1>

        <div>
            <div class="card" style="width: 18rem;">
                <img src="{{asset('image/5f8410c42fa84dcaa496db8346e9.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">ч</h5>
                    <p class="card-text">Цена: </p>
                    <p class="card-text">Дата: </p>
{{--                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>--}}
                    @if(auth()->user()?->isAdmin == 1)
                        <a href="#" class="btn btn-primary">Редактировать</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
