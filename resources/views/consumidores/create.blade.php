@extends('layout')
@section('content')
<h2>Novo Consumidor</h2>
<form method="POST" action="/consumidores">
    @csrf
    <label>Nome</label>
    <input type="text" name="nome" value="{{ old('nome') }}" required>
    <label>Endereço</label>
    <input type="text" name="endereco" value="{{ old('endereco') }}" required>
    <label>Número do Medidor</label>
    <input type="text" name="numero_medidor" value="{{ old('numero_medidor') }}" required>
    <label>Telefone</label>
    <input type="text" name="telefone" value="{{ old('telefone') }}" required>
    <button type="submit">Cadastrar</button>
</form>
@endsection
