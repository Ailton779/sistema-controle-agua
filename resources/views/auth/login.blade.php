@extends('layout')
@section('content')
<h2>Login</h2>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <label>Email</label>
    <input type="email" name="email" value="{{ old('email') }}" required autofocus>
    <label>Senha</label>
    <input type="password" name="password" required>
    <div style="margin: 10px 0">
        <label><input type="checkbox" name="remember"> Lembrar-me</label>
    </div>
    <button type="submit">Entrar</button>
</form>
@endsection
