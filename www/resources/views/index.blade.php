@extends('layout')

@section('content')
    <div class="container">
        <h1>О нас</h1>

        <h2>Лучшие спектаки у нас - в "Омега"</h2>

        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('image/5f8410c42fa84dcaa496db8346e9.jpg')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('image/5f8410c42fa84dcaa496db8346e9.jpg')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('image/2896447f6c3c0afd19ba8eb78bf5b7b1c62f60e4.jpeg')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('image/2896447f6c3c0afd19ba8eb78bf5b7b1c62f60e4.jpeg')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('image/5f8410c42fa84dcaa496db8346e9.jpg')}}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>



@endsection
