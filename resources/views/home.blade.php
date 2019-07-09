@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    {{--<div class='table-responsive'>--}}
                        {{--<a href="#" class="btn btn-success btn-sm mb-3">--}}
                            {{--<i class="far fa-plus-square mr-1"></i> Novo Produto--}}
                        {{--</a>--}}
                        {{--@if(count($menus) > 0)--}}
                            {{--<table class='table table-striped table-bordered table-hover table-sm'>--}}
                                {{--<tr class="text-center">--}}
                                    {{--<th>ID</th>--}}
                                    {{--<th>Titulo</th>--}}
                                    {{--<th>Ações</th>--}}
                                {{--</tr>--}}
                                {{--@foreach($menus as $menu)--}}
                                    {{--<tr>--}}
                                        {{--<td>--}}

                                        {{--</td>--}}
                                        {{--<td>--}}

                                        {{--</td>--}}
                                        {{--<td class='text-center align-middle'>--}}
                                            {{--<a href='#' class='btn btn-primary btn-sm'>--}}
                                                {{--<i class="far fa-eye"></i> Editar--}}
                                            {{--</a>--}}
                                        {{--</td>--}}
                                    {{--</tr>--}}
                                {{--@endforeach--}}
                            {{--</table>--}}
                            {{--<div class='mt-3'>--}}
                                {{--{{ $menus->links() }}--}}
                            {{--</div>--}}
                        {{--@else--}}
                            {{--<div class='alert alert-info'>--}}
                                {{--Ainda não existem produtos cadastrados!--}}
                            {{--</div>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
