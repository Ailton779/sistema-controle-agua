<?php

namespace App\Http\Controllers;

use App\Models\Consumidor;
use App\Models\Leitura;
use App\Models\Fatura;
use App\Models\ConfiguracaoTaxa;
use App\Services\FaturaCalculatorService;
use Illuminate\Http\Request;

class LeituraController extends Controller
{
    // Injeção de dependência — o Controller não cria o Service com new, recebe pelo construtor (Dependency Inversion)
    public function __construct(
        private FaturaCalculatorService $calculator
    ) {}

    public function create()
    {
        $consumidores = Consumidor::all();
        return view('leituras.create', compact('consumidores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'consumidor_id' => 'required|exists:consumidores,id',
            'mes_referencia' => 'required|integer|min:1|max:12',
            'ano_referencia' => 'required|integer|min:2000',
            'leitura_anterior' => 'required|numeric|min:0',
            'leitura_atual' => 'required|numeric|gte:leitura_anterior',
        ]);

        $existe = Leitura::where('consumidor_id', $request->consumidor_id)
            ->where('mes_referencia', $request->mes_referencia)
            ->where('ano_referencia', $request->ano_referencia)
            ->exists();

        if ($existe) {
            return back()->withErrors(['mes_referencia' => 'Já existe leitura para este consumidor neste mês.']);
        }

        $consumo = $request->leitura_atual - $request->leitura_anterior;

        $leitura = Leitura::create([
            'consumidor_id' => $request->consumidor_id,
            'mes_referencia' => $request->mes_referencia,
            'ano_referencia' => $request->ano_referencia,
            'leitura_anterior' => $request->leitura_anterior,
            'leitura_atual' => $request->leitura_atual,
            'consumo_m3' => $consumo,
        ]);

        $config = ConfiguracaoTaxa::first();
        $taxaFixa = $config ? $config->taxa_fixa : 25.00;
        $valorExcedente = $config ? $config->valor_excedente : 2.00;
        $limiteM3 = 10.0; // 10 m³ = 10.000 litros

        // Single Responsibility: o cálculo é responsabilidade do Service, não do Controller
        $valor = $this->calculator->calcular($consumo, $taxaFixa, $limiteM3, $valorExcedente);

        Fatura::create([
            'leitura_id' => $leitura->id,
            'consumidor_id' => $request->consumidor_id,
            'valor_total' => $valor,
            'status' => 'pendente',
        ]);

        return redirect()->route('faturas.index')->with('sucesso', 'Leitura registrada! Fatura: R$ ' . number_format($valor, 2, ',', '.'));
    }
}
