@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <a href='{{route('painel.order.index')}}' class='btn-sm btn btn-primary'>fazer pedido restaurante tal</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
