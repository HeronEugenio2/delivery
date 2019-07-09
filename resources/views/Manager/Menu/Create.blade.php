@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Criar Cardapio</div>
                    <div class='card-body'>
                        {{--MENSAGEM DE ERRO DO VALIDATION--}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {{--FORMULARIO--}}
                        <form method="POST" action="{{ isset($menu->id) ? route('manager.menu.update', $menu->id) : route('manager.menu.store') }}" class="form-horizontal form-validate">
                            @csrf
                            @if(isset($menu->id))
                                @method('PUT')
                            @endif
                            <div class='row'>
                                <div class='col-sm-12 col-md-6 col-lg-6'>
                                    <div class="form-group">
                                        <label>Título</label>
                                        <input class="form-control" type="text" name="title" @if(isset($menu)) value='{{old('title',$menu->title)}}' @endif>
                                    </div>
                                </div>
                                <div class='col-sm-12 col-md-6 col-lg-6'>
                                    <div class="form-group">
                                        <label>Preço</label>
                                        <input class="form-control" type="text" name="price" @if(isset($menu)) value='{{old('price',$menu->price)}}' @endif>
                                    </div>
                                </div>
                                <div class='col-sm-12 col-md-12 col-lg-12'>
                                    <div class="form-group">
                                        <label>Conteúdo</label>
                                        <textarea class="form-control" name='content' rows="3"></textarea>
                                    </div>
                                </div>
                                <div class='col-sm-12 col-md-12 col-lg-12'>
                                    <button type="submit" class="btn btn-sm btn-primary mt-2 float-right">
                                        <i class="fal fa-save mr-2"></i>Salvar
                                    </button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
