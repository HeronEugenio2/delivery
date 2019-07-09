@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Painel</div>
                    <div class="card-body">
                        Pedidos feitos após esse horário não seram aceitos:
                        <h3><i class="far fa-clock"></i> {{$schedule->start}} à {{$schedule->end}} horas</h3>
                        <hr>
                        <label for='#'>Escolha o Restaurante para fazer o pedido:</label>
                        <br>
                        <a href='{{route('painel.order.index')}}' class='btn-sm btn btn-primary'>Restaurante 1</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
