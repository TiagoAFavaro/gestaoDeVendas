<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CadastroContasaPagar;
use App\Models\CadastroContasaReceber;
use App\Models\CadastroVendas;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalContasPagar = CadastroContasaPagar::sum('valorBruto');

        $totalContasReceber = CadastroVendas::sum('valorTotal');

        $vendasPorMes = CadastroVendas::select(
            DB::raw('DATE_FORMAT(dataRecebimento, "%Y-%m") as mes'),
            DB::raw('SUM(valorTotal) as total')
        )
            ->whereBetween('dataRecebimento', [now()->subMonths(3)->startOfMonth(), now()->endOfMonth()])
            ->groupBy('mes')
            ->orderBy('mes')
            ->pluck('total', 'mes');

        $pagamentosPorMes = CadastroContasaPagar::select(
            DB::raw('DATE_FORMAT(vencimento, "%Y-%m") as mes'),
            DB::raw('SUM(valorBruto) as total')
        )
            ->whereBetween('vencimento', [now()->subMonths(3)->startOfMonth(), now()->endOfMonth()])
            ->groupBy('mes')
            ->orderBy('mes')
            ->pluck('total', 'mes');

        return view('welcome')->with([
            'totalContasPagar' => $totalContasPagar,
            'totalContasReceber' => $totalContasReceber,
            'vendasPorMes' => $vendasPorMes,
            'pagamentosPorMes' => $pagamentosPorMes,
        ]);
    }
}
