@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Horário de pedidos</div>
                    <div class="card-body">
                        <a href='{{route('manager.schedule.create')}}' class='btn btn-sm btn-primary'>Adicionar Horário</a>
                        @if(count($schedules)>0)
                            <hr>
                            <h4>Cardapios:</h4>
                            <div class='table-responsive'>
                                <table class="table table-bordered table-sm table-hover table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">Início</th>
                                            <th scope="col">Fim</th>
                                            <th scope="col">Ativo?</th>
                                            <th scope="col">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($schedules as $schedule)
                                            <tr class='text-center'>
                                                <td>{{$schedule->start}}</td>
                                                <td>{{$schedule->end}}</td>
                                                <td>
                                                    <form action="{{route('manager.schedule.update', $schedule->id)}}" method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        @if($schedule->active_flag == 0)
                                                            <button type='submit' class='btn btn-sm btn-danger' name='active_flag' value='1'>Não</button>
                                                        @else
                                                            <button type='submit' class='btn btn-sm btn-success' name='active_flag' value='0'>Sim</button>
                                                        @endif
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="{{ route('manager.schedule.destroy', $schedule->id) }}" method="post">
                                                        @method('delete')
                                                        @csrf
                                                        {{--<a href='#' class='btn btn-primary btn-sm'>Editar</a>--}}
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
