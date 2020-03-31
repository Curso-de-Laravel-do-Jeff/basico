@extends('templates.app')

@section('title')
    Show Client
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
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-hover table-bordered">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $client->id }}</td>
                        </tr>

                        <tr>
                            <th>Name</th>
                            <td>{{ $client->name }}</td>
                        </tr>

                        <tr>
                            <th>E-mail</th>
                            <td>{{ $client->email }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                <a href="{{ route('clients.index') }}" class="btn btn-primary"><i class="fa fa-reply"></i> &nbsp; Voltar</a>

                <a href="#" class="btn btn-danger pull-right btn-del" data-id="{{ $client->id }}"><i class="fa fa-ban"></i> &nbsp; Deletar</a>
                &nbsp;
                <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-secondary pull-right space-right"><i class="fa fa-edit"></i> &nbsp; Editar</a>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript">
        $('.btn-del').on('click', function () {
            if (confirm('Deseja deletar?')) {
                $.ajax({
                    contentType: 'application/x-www-form-urlencoded',
                    method: 'DELETE',

                    url: '/clients/' + $(this).data('id'),
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    timeout: 0,

                    success: function (response) {
                        location.href = '/clients';
                    },

                    error: function (err) {
                        console.log(err);
                    }
                });
            }
        });
    </script>
@stop
