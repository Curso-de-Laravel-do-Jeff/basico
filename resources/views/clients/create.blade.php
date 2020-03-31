@extends('templates.app')

@section('title')
    Create Client
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
        <form method="POST" action="{{ route('clients.store') }}">
            <div class="card">
                <div class="card-body">
                    {{ csrf_field() }}

                    @include('clients.form')
                </div>

                <div class="card-footer">
                    <a href="{{ route('clients.index') }}" class="btn btn-primary"><i class="fa fa-reply"></i> &nbsp; Voltar</a>

                    <button type="submit" class="btn btn-success pull-right space-right"><i class="fa fa-edit"></i> &nbsp; Cadastrar</button>
                </div>
            </div>
        </form>
    </div>
@stop
