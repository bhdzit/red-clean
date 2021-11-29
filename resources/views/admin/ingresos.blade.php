@extends('layouts.layout')
@section('contenido')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Ingresos</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                            <li class="breadcrumb-item active">Ingresos</li>
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
                                    data-target="#agregarIngresos">
                                    Agregar Ingreso
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
                                            @foreach ($ingresos as $ingreso)

                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>@foreach ($ingreso->items as $item)
                                                        <p>{{ $item->descripcion }} / $ {{ $item->total }}</p>
                                                    @endforeach</td>
                                                    <td>$ {{ $ingreso->items->sum('total') }}</td>
                                                    <td>
                                                       
                                                        <form class="d-inline"
                                                            action="{{ route('eliminarIngresos') }}" method="POST">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" value="{{ $ingreso->id }}"
                                                                name="idIngresos">

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


            <div class="modal fade" id="agregarIngresos">
                <form action="{{ route('guardarIngresos') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-dialog">
                        <div class="modal-content bg-info">
                            <div class="modal-header">
                                <h4 class="modal-title">Agregar Ingreso</h4>
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

    @foreach ($ingresos as $ingreso)
        <div class="modal fade" id="editarIngresos{{ $ingreso->id }}">
            <form action="{{ route('editarIngresos') }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" value="{{ $ingreso->id }}" name="idIngreso">
                <div class="modal-dialog">
                    <div class="modal-content bg-info">
                        <div class="modal-header">
                            <h4 class="modal-title">Editar Ingreso</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input name="descripcion" type="text" class="form-control mb-2" placeholder="Descripcion"
                                value="{{ $ingreso->descripcion }}">
                            <input name="cantidad" type="text" class="form-control" placeholder="Cantidad"
                                value="{{ $ingreso->cantidad }}">
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
