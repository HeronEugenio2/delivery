@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cardápios</div>
                    <div class="card-body">
                        <a href='{{route('manager.menu.create')}}' class='btn btn-primary'>Novo Cardapio</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
