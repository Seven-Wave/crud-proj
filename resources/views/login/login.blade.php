@extends('layouts.app')

@section('content')
    <div style="height: 100vh; width: 100%; display: flex; justify-content: center; align-items: center; flex-direction: column">
        <h1>Авторизация</h1>
        <form action="{{ route('login_process') }}" style="width: 400px" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail2">Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Введите email">
                @error('email')
                    <label id="emailHelp" style="color: red" class="form-text text-muted">{{ $message }}</label>

                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword2">Пароль</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword2" placeholder="Пароль">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
    </div>

@endsection

@section('ext_scripts')

@endsection
