@extends('layouts.layout')
@section('contenido')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Prendas</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                            <li class="breadcrumb-item active">Prendas</li>
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
                                    data-target="#agregarPrenda">
                                    Agregar Prenda
                                </button>




                                <table id="example1" class="table table-bordered table-striped">
                                    <table id="example" class="table table-bordered table-striped dataTable dtr-inline">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Prenda</th>
                                                <th>Precio/Kg</th>
                                                <th>Aciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i=1; @endphp
                                            @foreach ($arregloDeprendas as $prenda)

                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $prenda->descripcion }}</td>
                                                    <td>$ {{ $prenda->precio }}</td>
                                                    <td>
                                                        <button class="btn btn-success " data-toggle="modal"
                                                        data-target="#editarPrenda{{$prenda->id}}"><i
                                                            class="fa fa-btn fa-edit"></i></button>
                                                        <form class="d-inline" action="{{ route('eliminarPrenda') }}" method="POST">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" value="{{ $prenda->id }}"
                                                                name="idPrenda">
                                                           
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


            <div class="modal fade" id="agregarPrenda">
                <form action="{{route("guardarPrenda")}}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-dialog">
                        <div class="modal-content bg-info">
                            <div class="modal-header">
                                <h4 class="modal-title">Agregar Prenda</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input name="descripcion" type="text" class="form-control mb-2" placeholder="Nombre de Prenda">
                                <input name="precio" type="text" class="form-control" placeholder="Precio por kilo">
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




            @foreach ($arregloDeprendas  as $prenda)
            <div class="modal fade" id="editarPrenda{{$prenda->id}}">
                <form action="{{route("editarPrenda")}}" method="post">
                    {{ csrf_field() }}
                    <input hidden name="id" value="{{$prenda->id}}">
                    <div class="modal-dialog">
                        <div class="modal-content bg-info">
                            <div class="modal-header">
                                <h4 class="modal-title">Editar Prenda</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input name="descripcion" type="text" class="form-control mb-2" placeholder="Nombre de Prenda" value="{{$prenda->descripcion}}">
                                <input name="precio" type="text" class="form-control" placeholder="Precio por kilo" value="{{$prenda->precio}}">
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
            <!-- /.modal -->

        </section>

    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection
