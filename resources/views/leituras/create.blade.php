@extends('layout')
@section('content')
<h2>Registrar Leitura</h2>
<form method="POST" action="/leituras">
    @csrf
    <label>Consumidor</label>
    <select name="consumidor_id" required>
        <option value="">Selecione...</option>
        @foreach($consumidores as $c)
            <option value="{{ $c->id }}">{{ $c->nome }} — Medidor {{ $c->numero_medidor }}</option>
        @endforeach
    </select>
    <label>Mês</label>
    <input type="number" name="mes_referencia" min="1" max="12" value="{{ old('mes_referencia') }}" required>
    <label>Ano</label>
    <input type="number" name="ano_referencia" value="{{ old('ano_referencia', date('Y')) }}" required>
    <label>Leitura Anterior (m³)</label>
    <input type="number" name="leitura_anterior" step="0.001" min="0" value="{{ old('leitura_anterior') }}" required>
    <label>Leitura Atual (m³)</label>
    <input type="number" name="leitura_atual" step="0.001" min="0" value="{{ old('leitura_atual') }}" required>
    <button type="submit">Registrar</button>
</form>
@endsection
