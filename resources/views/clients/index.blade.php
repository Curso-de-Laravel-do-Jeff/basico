@extends('templates.app')

@section('title')
    Clientes
@stop

@section('content')
    <a href="{{ route('clients.create') }}" class="btn btn-success btn-lg"><i class="fa fa-plus"></i> &nbsp; Cadastrar Cliente</a>
    <hr/>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->email }}</td>
                    <td>
                        <a href="{{ route('clients.show', $client->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                        &nbsp;
                        <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-light btn-sm"><i class="fa fa-edit"></i></a>
                        &nbsp;
                        <a href="#" class="btn btn-danger btn-sm btn-del" data-id="{{ $client->id }}"><i class="fa fa-ban"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>

        <tfoot>
            <tr>
                <td colspan="4">
                    {{ $clients->links() }}
                </td>
            </tr>
        </tfoot>
    </table>
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
                        location.reload();
                    },

                    error: function (err) {
                        console.log(err);
                    }
                });
            }
        });
    </script>
@stop
