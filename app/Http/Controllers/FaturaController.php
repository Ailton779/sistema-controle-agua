<?php
namespace App\Http\Controllers;
use App\Models\Fatura;
use Illuminate\Http\Request;

class FaturaController extends Controller
{
    public function index()
    {
        $faturas = Fatura::with(['consumidor', 'leitura'])->orderBy('created_at', 'desc')->get();
        return view('faturas.index', compact('faturas'));
    }

    public function pagar(Fatura $fatura)
    {
        $fatura->update(['status' => 'pago']);
        return back()->with('sucesso', 'Fatura marcada como paga!');
    }
}
