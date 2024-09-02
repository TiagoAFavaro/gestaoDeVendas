@extends('layouts.app')

@section('title', 'Sales Swift')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/style-home.css') }}">
@endpush

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="container01">
            <div class="receber-dashboard">
                <h3>Previsão de Vendas</h3>
                <h1>
                    <br />
                    R$ {{ number_format($totalContasReceber, 2, ',', '.') }}
                </h1>
                <a href="/contasreceber/list">
                    <button>Ir para contas a receber -></button>
                </a>
            </div>

            <div class="pagar-dashboard">
                <h3>Previsão de Pagamentos</h3>
                <h1>
                    <br />
                    R$ {{ number_format($totalContasPagar, 2, ',', '.') }}
                </h1>
                <a href="/contas_a_pagar/list">
                    <button>Ir para contas a pagar -></button>
                </a>
            </div>
        </div>
        <div class="grafico-container">
            <div class="col-md-6 col-sm-12 grafico">
                <canvas id="grafico1"></canvas>
            </div>
            <div class="col-md-6 col-sm-12 grafico">
                <canvas id="grafico2"></canvas>
            </div>
        </div>
    </main>

    <script>
        const ctx1 = document.getElementById('grafico1');
        new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: {!! json_encode(array_keys($vendasPorMes->toArray())) !!},
                datasets: [{
                    label: 'Vendas',
                    data: {!! json_encode(array_values($vendasPorMes->toArray())) !!},
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const ctx2 = document.getElementById('grafico2');
        new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: {!! json_encode(array_keys($pagamentosPorMes->toArray())) !!},
                datasets: [{
                    label: 'Fornecedores a pagar',
                    data: {!! json_encode(array_values($pagamentosPorMes->toArray())) !!},
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

@endsection
