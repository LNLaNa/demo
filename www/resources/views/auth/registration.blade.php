@extends('layout')

@section('content')
    <div class="container">
        <form action="{{route('registration')}}" method="post" style="width: 600px; margin: auto">
            @csrf
            <div class="mb-3">
                <label for="inputSurName" class="form-label">Фамилия</label>
                <input type="text" class="form-control" id="inputSurName" name="surname" required>
            </div>
            <div class="mb-3">
                <label for="inputName" class="form-label">Имя</label>
                <input type="text" class="form-control" id="inputName" name="name" required>
            </div>

            <div class="mb-3">
                <label for="inputPatronymic" class="form-label">Отчество</label>
                <input type="text" class="form-control" id="inputPatronymic" name="patronymic">
            </div>
            <div class="mb-3">
                <label for="inputLogin" class="form-label">Логин</label>
                <input type="text" class="form-control" id="inputLogin" name="login" required>
            </div>
            <div class="mb-3">
                <label for="inputEmail" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="inputEmail" name="email" required>
            </div>
            <div class="mb-3">
                <label for="inputPassword1" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="inputPassword1" name="password" required>
            </div>
            <div class="mb-3">
                <label for="inputPassword2" class="form-label">Повторите пароль</label>
                <input type="password" class="form-control" id="inputPassword2" name="passwordTwo" required>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="check" required>
                <label class="form-check-label" for="check">Согласен с правами регистрации</label>
            </div>
            <button class="btn btn-primary">Зарегистрироваться</button>
        </form>
    </div>

@endsection
