@extends('layout')
@section('content')
<h2>Consumidores</h2>
<a href="/consumidores/create" class="btn">+ Novo Consumidor</a>
<table>
    <tr><th>Nome</th><th>Endereço</th><th>Medidor</th><th>Telefone</th><th>Ações</th></tr>
    @foreach($consumidores as $c)
    <tr>
        <td>{{ $c->nome }}</td>
        <td>{{ $c->endereco }}</td>
        <td>{{ $c->numero_medidor }}</td>
        <td>{{ $c->telefone }}</td>
        <td><a href="/consumidores/{{ $c->id }}/edit" class="btn btn-sm">Editar</a></td>
    </tr>
    @endforeach
</table>
@endsection
