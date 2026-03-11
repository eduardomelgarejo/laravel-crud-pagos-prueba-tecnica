@extends('layout')
@section('content')
    <div class="row p-4">
        <div class="col-md-9">
            <h4 class="text-uppercase">Listado de Pagos</h4>
        </div>
        <div class="col-md-3 text-end">
            <a href="{{ route('payments-create') }}" class="btn btn-primary">Crear Pago</a>
        </div>
        <br>
        <br>
        <hr>
        @if (session()->has('alert-success'))
            <div class="alert alert-success" role="alert">
                {!! session()->get('alert-success') !!}
            </div>
        @endif
        @if (session('alert-error'))
            <div class="alert alert-danger" role="alert">
                {!! session('alert-error') !!}
            </div>
        @endif
        <div class="col-md-12">
            <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">DESCRIPCION</th>
                        <th class="text-center">PRECIO</th>
                        <th class="text-center">ACCIÓN</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">1</td>
                        <td class="text-center">Pago 1</td>
                        <td class="text-center">1000</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="#"
                                    class="btn btn-sm btn-warning">Editar</a>
                                <a href="#"
                                    class="btn btn-sm btn-danger">Eliminar</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $('#table').DataTable();
    </script>
@endsection
