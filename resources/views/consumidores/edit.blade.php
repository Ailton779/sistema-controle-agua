@extends('layout')
@section('content')
<h2>Editar Consumidor</h2>
<form method="POST" action="/consumidores/{{ $consumidor->id }}">
    @csrf
    @method('PUT')
    <label>Nome</label>
    <input type="text" name="nome" value="{{ $consumidor->nome }}" required>
    <label>Endereço</label>
    <input type="text" name="endereco" value="{{ $consumidor->endereco }}" required>
    <label>Número do Medidor</label>
    <input type="text" name="numero_medidor" value="{{ $consumidor->numero_medidor }}" required>
    <label>Telefone</label>
    <input type="text" name="telefone" value="{{ $consumidor->telefone }}" required>
    <button type="submit">Salvar</button>
</form>
@endsection
