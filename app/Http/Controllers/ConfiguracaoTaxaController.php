<?php
namespace App\Http\Controllers;
use App\Models\ConfiguracaoTaxa;
use Illuminate\Http\Request;

class ConfiguracaoTaxaController extends Controller
{
    public function edit()
    {
        $config = ConfiguracaoTaxa::first() ?? new ConfiguracaoTaxa(['taxa_fixa' => 25.00, 'valor_excedente' => 2.00]);
        return view('configuracao.edit', compact('config'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'taxa_fixa' => 'required|numeric|min:0',
            'valor_excedente' => 'required|numeric|min:0',
        ]);
        $config = ConfiguracaoTaxa::first();
        if ($config) {
            $config->update($request->all());
        } else {
            ConfiguracaoTaxa::create($request->all());
        }
        return back()->with('sucesso', 'Configuração atualizada!');
    }
}
