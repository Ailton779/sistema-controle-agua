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
            @php
                $msg = urlencode("Olá, {$f->consumidor->nome}! Segue o consumo de {$f->leitura->mes_referencia}/{$f->leitura->ano_referencia}:\nMedidor: {$f->consumidor->numero_medidor}\nLeitura anterior: {$f->leitura->leitura_anterior} m³ → Leitura atual: {$f->leitura->leitura_atual} m³\nConsumo: {$f->leitura->consumo_m3} m³ (".($f->leitura->consumo_m3*1000)." litros)\nValor da fatura: R$ ".number_format($f->valor_total,2,',','.').".\nAtt, Associação Comunitária");
                $tel = preg_replace('/\D/', '', $f->consumidor->telefone);
            @endphp
            <a href="https://wa.me/55{{ $tel }}?text={{ $msg }}" target="_blank" class="btn btn-sm" style="background:#25d366">WhatsApp</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection
