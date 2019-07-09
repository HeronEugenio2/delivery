@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cardápios</div>
                    <div class="card-body">
                        <a href='{{route('manager.menu.create')}}' class='btn btn-sm btn-primary'>Novo Cardapio</a>
                        @if(count($menus)>0)
                            <hr>
                            <h4>Cardapios:</h4>
                            <div class='table-responsive'>
                                <table class="table table-bordered table-sm table-hover table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">#ID</th>
                                            <th scope="col">Título</th>
                                            <th scope="col">Conteúdo</th>
                                            <th scope="col">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($menus as $menu)
                                            <tr class='text-center'>
                                                <td>{{$menu->id}}</td>
                                                <td>{{$menu->title}}</td>
                                                <td>{{$menu->content}}</td>
                                                <td>
                                                    <form action="{{ route('manager.menu.destroy', $menu->id) }}" method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <a href='#' class='btn btn-primary btn-sm'>Editar</a>
                                                        <button class="btn btn-danger btn-sm" type="submit" value="Delete">Delete</button>
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
            </div>
        </div>
    </div>
@endsection
