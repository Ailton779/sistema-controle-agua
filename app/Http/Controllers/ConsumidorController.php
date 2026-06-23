<?php

namespace App\Http\Controllers;

use App\Models\Consumidor;
use App\Models\LogAcesso;
use Illuminate\Http\Request;

class ConsumidorController extends Controller
{
    public function index()
    {
        $consumidores = Consumidor::all();
        return view('consumidores.index', compact('consumidores'));
    }

    public function create()
    {
        return view('consumidores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'endereco' => 'required',
            'numero_medidor' => 'required|unique:consumidores',
            'telefone' => 'required',
        ]);

        Consumidor::create($request->all());
        return redirect()->route('consumidores.index')->with('sucesso', 'Consumidor cadastrado!');
    }

    public function edit(Consumidor $consumidor)
    {
        // LGPD: registra log de acesso a dados pessoais
        LogAcesso::create([
            'user_id' => auth()->id(),
            'consumidor_id' => $consumidor->id,
            'acao' => 'visualizou dados do consumidor',
        ]);

        return view('consumidores.edit', compact('consumidor'));
    }

    public function update(Request $request, Consumidor $consumidor)
    {
        $request->validate([
            'nome' => 'required',
            'endereco' => 'required',
            'numero_medidor' => 'required|unique:consumidores,numero_medidor,' . $consumidor->id,
            'telefone' => 'required',
        ]);

        // LGPD: registra log de edição de dados pessoais
        LogAcesso::create([
            'user_id' => auth()->id(),
            'consumidor_id' => $consumidor->id,
            'acao' => 'editou dados do consumidor',
        ]);

        $consumidor->update($request->all());
        return redirect()->route('consumidores.index')->with('sucesso', 'Consumidor atualizado!');
    }
}
