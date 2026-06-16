@extends('layout')
@section('content')
<h2>Faturas</h2>
<table>
    <tr><th>Consumidor</th><th>Mês/Ano</th><th>Consumo</th><th>Valor</th><th>Status</th><th>Ações</th></tr>
    @foreach($faturas as $f)
    <tr>
        <td>{{ $f->consumidor->nome }}</td>
        <td>{{ $f->leitura->mes_referencia }}/{{ $f->leitura->ano_referencia }}</td>
        <td>{{ number_format($f->leitura->consumo_m3, 3) }} m³</td>
        <td>R$ {{ number_format($f->valor_total, 2, ',', '.') }}</td>
        <td>{{ $f->status }}</td>
        <td>
            @if($f->status === 'pendente')
            <form method="POST" action="/faturas/{{ $f->id }}/pagar" style="display:inline">
                @csrf @method('PATCH')
                <button class="btn btn-green btn-sm">Marcar Pago</button>
            </form>
            @endif
        </td>
    </tr>
    @endforeach
</table>
@endsection
