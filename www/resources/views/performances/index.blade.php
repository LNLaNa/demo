@extends('layout')

@section('content')
    <div class="container">
        <h1>Афиша</h1>
        @if(auth()->user()?->isAdmin == 1)
            <a href="{{route('performances.create')}}" class="btn btn-outline-info mb-3">Добавить постановку</a>
        @endif
        <div style="display: flex; flex-wrap: wrap; gap: 20px;">
            @foreach($performances as $performance)
            <div class="card" style="width: 18rem; position: relative;  padding-bottom: 30px;" >
                <a style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 9;" href="{{route('performances.show',$performance->id)}}"></a>
                    <img src="{{\Illuminate\Support\Facades\Storage::url($performance->image)}}" class="card-img-top" alt="...">

                    <div class="card-body">
                        <h5 class="card-title">{{$performance->name}}</h5>
                        <p class="card-text">Цена: {{$performance->price}}</p>
                        <p class="card-text">Дата: {{$performance->date}}</p>
                        {{--                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>--}}
                        <div style="z-index: 99; position: absolute;">
                            @if(auth()->user()?->isAdmin == 1)
                                <a href="{{route('performances.edit',$performance)}}"  class="btn btn-outline-info">Редактировать</a>
                                <a href="{{route('performances.destroy',$performance)}}"  class="btn btn-outline-danger">Удалить</a>
                            @else
                                @auth()
                                    @if($performance->carts()->where('performance_id', $performance->id)?->where('cart_id',$cart->id)->first()?->pivot->count > 0)
                                        <p><a href="{{route('removePerformance',$performance)}}"  class="btn btn-outline-info">-</a>
                                            {{$performance->carts()->where('performance_id', $performance->id)?->where('cart_id',$cart->id)->first()->pivot->count}}
                                            <a href="{{route('addPerformance',$performance)}}"  class="btn btn-outline-info">+</a></p>
                                    @else
                                        <a href="{{route('addPerformance',$performance)}}"  class="btn btn-outline-info">В корзину</a>
                                    @endif
                                @endauth

                                @guest()
                                    <a href="{{route('addPerformance',$performance)}}" class="btn btn-outline-info">В корзину</a>
                                @endguest
                            @endif
                        </div>
                    </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection
