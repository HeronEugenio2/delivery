@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Horários</div>
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
                        <form method="POST" action="{{ isset($schedule->id) ? route('manager.schedule.update', $schedule->id) : route('manager.schedule.store') }}" class="form-horizontal form-validate">
                            @csrf
                            @if(isset($schedule->id))
                                @method('PUT')
                            @endif
                            <div class='row'>
                                <div class='col-sm-12 col-md-6 col-lg-6'>
                                    <div class="form-group">
                                        <label>Início:</label>
                                        <input class="form-control hr" type="time" name="start" @if(isset($schedule)) value='{{old('title',$schedule->start)}}' @endif>
                                    </div>
                                </div>
                                <div class='col-sm-12 col-md-6 col-lg-6'>
                                    <div class="form-group">
                                        <label>Fim:</label>
                                        <input class="form-control hr" type="time" name="end" @if(isset($schedule)) value='{{old('price',$schedule->end)}}' @endif>
                                    </div>
                                </div>
                                <div class='col-sm-12 col-md-12 col-lg-12'>
                                    <button type="submit" class="btn btn-sm btn-primary mt-2 float-right">
                                        <i class="fas fa-save"></i> Salvar
                                    </button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('/js/jquery.mask.js') }}"></script>
    <script type='text/javascript'>
        $(document).ready(function(){
            $('.data').mask('00/00/0000');
        });
    </script>
@endsection
