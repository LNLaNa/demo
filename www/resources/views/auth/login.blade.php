@extends('layout')

@section('content')
    <div class="container">
{{--        <h1>Войти</h1>--}}
        <form action="{{route('login')}}" method="post" style="max-width: 600px; margin: auto">
            @csrf
            <div class="mb-3">
                <label for="inputLogin" class="form-label">Логин</label>
                <input type="text" class="form-control" id="inputLogin" name="login" required>
            </div>
            <div class="mb-3">
                <label for="inputPassword1" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="inputPassword1" name="password" required>
            </div>

            <button class="btn btn-primary">Войти</button>
        </form>
    </div>
@endsection
