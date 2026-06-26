@extends('layout_guest')
@section('content')
<h2>Login</h2>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <label>Email</label>
    <input type="email" name="email" value="{{ old('email') }}" required autofocus>
    <label>Senha</label>
    <input type="password" name="password" required>
    <label style="font-weight:normal; display:flex; align-items:center; gap:8px; margin-bottom:14px">
        <input type="checkbox" name="remember" style="width:auto; margin:0"> Lembrar-me
    </label>
    <button type="submit">Entrar</button>
</form>
@endsection
