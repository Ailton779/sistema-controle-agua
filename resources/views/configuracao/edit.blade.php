@extends('layout')
@section('content')
<h2>Configuração de Taxa</h2>
<form method="POST" action="/configuracao">
    @csrf @method('PUT')
    <label>Taxa Fixa (R$)</label>
    <input type="number" name="taxa_fixa" step="0.01" value="{{ $config->taxa_fixa }}" required>
    <label>Valor por 1.000L excedentes (R$)</label>
    <input type="number" name="valor_excedente" step="0.01" value="{{ $config->valor_excedente }}" required>
    <button type="submit">Salvar</button>
</form>
@endsection
