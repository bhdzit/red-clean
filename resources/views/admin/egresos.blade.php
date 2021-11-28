@extends('layouts.layout')
@section('contenido')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Egresos</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                            <li class="breadcrumb-item active">Egresos</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">

                            <div class="card-body">

                                <button type="button" class="btn btn-info mb-3" data-toggle="modal"
                                    data-target="#agregarEgreso">
                                    Agregar Egreso
                                </button>
                                <table id="example1" class="table table-bordered table-striped">
                                    <table id="example" class="table table-bordered table-striped dataTable dtr-inline">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Descripcion</th>
                                                <th>Cantidad</th>
                                                <th>Aciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i=1; @endphp
                                            @foreach ($egresos as $egreso)

                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $egreso->descripcion }}</td>
                                                    <td>$ {{ $egreso->cantidad }}</td>
                                                    <td>
                                                        <button class="btn btn-success " data-toggle="modal"
                                                            data-target="#editarEgreso{{ $egreso->id }}"><i
                                                                class="fa fa-btn fa-edit"></i></button>
                                                        <form class="d-inline"
                                                            action="{{ route('eliminarEgreso') }}" method="POST">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" value="{{ $egreso->id }}"
                                                                name="idEgreso">

                                                            <button type="submit" class="btn btn-danger"><i
                                                                    class="fa fa-btn fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>




                            </div>
                            <!-- /.card -->
                        </div>


                    </div>
                    <!-- /.col -->
                </div>
                <!-- ./row -->
            </div><!-- /.container-fluid -->


            <div class="modal fade" id="agregarEgreso">
                <form action="{{ route('guardarEgreso') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-dialog">
                        <div class="modal-content bg-info">
                            <div class="modal-header">
                                <h4 class="modal-title">Agregar egreso</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input name="descripcion" type="text" class="form-control mb-2" placeholder="Descripcion">
                                <input name="cantidad" type="text" class="form-control" placeholder="Cantidad">
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-outline-light">Guardar</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </form>
            </div>
        </section>
    </div>

    @foreach ($egresos as $egreso)
        <div class="modal fade" id="editarEgreso{{ $egreso->id }}">
            <form action="{{ route('editarEgreso') }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" value="{{ $egreso->id }}" name="idEgreso">
                <div class="modal-dialog">
                    <div class="modal-content bg-info">
                        <div class="modal-header">
                            <h4 class="modal-title">Editar egreso</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input name="descripcion" type="text" class="form-control mb-2" placeholder="Descripcion"
                                value="{{ $egreso->descripcion }}">
                            <input name="cantidad" type="text" class="form-control" placeholder="Cantidad"
                                value="{{ $egreso->cantidad }}">
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-outline-light">Guardar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </form>
        </div>
    @endforeach
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection
