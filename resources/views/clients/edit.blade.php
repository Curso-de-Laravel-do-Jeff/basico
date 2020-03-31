@extends('templates.app')

@section('title')
    Edit Client
@stop

@section('css')
    <style type="text/css">
        .space-right {
            margin-right: 20px;
        }
    </style>
@stop

@section('content')
    <div class="container-fluid">
        <form method="POST" action="{{ route('clients.update', $client->id) }}">
            <div class="card">
                <div class="card-body">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        @include('clients.form')
                </div>

                <div class="card-footer">
                    <a href="{{ route('clients.index') }}" class="btn btn-primary"><i class="fa fa-reply"></i> &nbsp; Voltar</a>

                    <a href="#" class="btn btn-danger pull-right"><i class="fa fa-ban"></i> &nbsp; Deletar</a>
                    &nbsp;
                    <button type="submit" class="btn btn-secondary pull-right space-right"><i class="fa fa-edit"></i> &nbsp; Editar</button>
                </div>
            </div>
        </form>
    </div>
@stop
