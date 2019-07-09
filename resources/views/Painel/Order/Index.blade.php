@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cardápios</div>
                    <div class="card-body">
                        @if(count($menus)>0)
                            <h4>Cardapio:</h4>
                            <div class='table-responsive'>
                                <table class="table table-bordered table-sm table-hover table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">Título</th>
                                            <th scope="col">Conteúdo</th>
                                            <th scope="col">Quantidade</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($menus as $menu)
                                            <tr class='text-center'>
                                                <td>{{$menu->title}}</td>
                                                <td>{{$menu->content}}</td>
                                                <td>
                                                    <form method="POST" action="{{route('painel.order.store')}}" class="form-horizontal form-validate">
                                                        @csrf
                                                        <input type='number' name='qtd' value='' style='width: 40px'>
                                                        <input type='hidden' name='menuId' value='{{$menu->id}}' style='width: 40px'>
                                                        <input type='hidden' name='userId' value='{{auth()->user()->id}}' style='width: 40px'>
                                                        <button class='btn btn-primary btn-sm' type='submit'>Adicionar</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
                <div class='card mt-2'>
                    <div class="card-header">Pedido Geral</div>
                    <div class='card-body'>
                        @if(count($orders)>0)
                            <h4>Pedido Geral:</h4>
                            <div class='table-responsive'>
                                <table class="table table-bordered table-sm table-hover table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">Usuário</th>
                                            <th scope="col">Pedido</th>
                                            <th scope="col">QTD</th>
                                            <th scope="col">Alterar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                            <tr class='text-center'>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
